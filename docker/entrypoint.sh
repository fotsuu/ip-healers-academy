#!/bin/sh
set -e

# Wait for MySQL if DB_CONNECTION is mysql
if [ "$DB_CONNECTION" = "mysql" ]; then
    echo "Checking database connection on host: $DB_HOST..."
    DB_PORT_VAL=${DB_PORT:-3306}
    
    # Try to connect up to 30 times
    count=0
    until php -r "
        try {
            new PDO('mysql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
            exit(0);
        } catch (Exception \$e) {
            exit(1);
        }
    " 2>/dev/null || [ $count -eq 30 ]; do
        echo "Database is unavailable - sleeping 2 seconds... ($count/30)"
        sleep 2
        count=$((count + 1))
    done

    if [ $count -eq 30 ]; then
        echo "Error: Database connection timed out."
        exit 1
    fi
    echo "Database is ready!"
fi

# Run database migrations before caching config (schema must exist first)
if [ "$RUN_MIGRATIONS" = "true" ]; then
    echo "Running database migrations..."
    php artisan migrate --force
fi

# Cache configuration, routes, and views if running in production
if [ "$APP_ENV" = "production" ]; then
    echo "Caching configuration and routes for production..."
    php artisan config:clear
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
fi

# Execute the container's main command
exec "$@"
