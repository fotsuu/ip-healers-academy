# ==============================================================================
# Stage 1: Build frontend assets
# ==============================================================================
FROM node:20-alpine AS node_builder
WORKDIR /app
COPY package.json package-lock.json tailwind.config.js vite.config.js ./
COPY resources/ ./resources/
# Create public directory to ensure Vite outputs to it correctly
RUN mkdir -p public
RUN npm ci && npm run build

# ==============================================================================
# Stage 2: Install Composer PHP dependencies
# ==============================================================================
FROM composer:2.7 AS composer_builder
WORKDIR /app
COPY composer.json composer.lock ./
# Install dependencies without running artisan scripts
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction
COPY . .
RUN composer dump-autoload --no-dev --optimize

# ==============================================================================
# Stage 3: Production Runtime (PHP-FPM + Nginx + Supervisor)
# ==============================================================================
FROM php:8.2-fpm-alpine AS runner
WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    supervisor \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    icu-dev \
    shadow

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql bcmath gd zip intl opcache

# Configure PHP (production settings)
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Configure Nginx & Supervisor
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
RUN mkdir -p /var/log/supervisor /var/run/nginx

# Copy application code
COPY --chown=www-data:www-data --from=composer_builder /app /var/www/html
COPY --chown=www-data:www-data --from=node_builder /app/public/build /var/www/html/public/build

# Set correct storage and bootstrap permissions
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expose port 80
EXPOSE 80

ENTRYPOINT ["entrypoint.sh"]
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
