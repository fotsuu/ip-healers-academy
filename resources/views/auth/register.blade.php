<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join IP Healers Academy</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f7f8f5;
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
        }
        .centered-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .icon {
            background: #eaf3ea;
            border-radius: 50%;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
        }
        .icon svg {
            width: 32px;
            height: 32px;
            color: #4b7942;
        }
        .icon img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
        .title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 8px;
            text-align: center;
        }
        .subtitle {
            color: #6b7b5e;
            font-size: 1.1rem;
            margin-bottom: 32px;
            text-align: center;
        }
        .form-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 8px 36px rgba(44, 62, 80, 0.13), 0 2px 8px rgba(44, 62, 80, 0.10);
            border: none;
            padding: 40px 32px 32px 32px;
            min-width: 370px;
            max-width: 400px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-row {
            display: flex;
            gap: 16px;
            width: 100%;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 18px;
            width: 100%;
        }
        .form-label {
            font-size: 0.98rem;
            color: #263a29;
            margin-bottom: 4px;
            font-weight: 500;
        }
        .input-icon {
            position: relative;
        }
        .input-icon input {
            width: 100%;
            box-sizing: border-box;
            margin: 0;
            padding: 10px 12px 10px 36px;
            border: 1.5px solid #e3e7df;
            border-radius: 6px;
            font-size: 1rem;
            background: #f7f8f5;
            color: #263a29;
            outline: none;
            transition: border 0.2s;
        }
        .input-icon input:focus {
            border: 1.5px solid #4b7942;
        }
        .input-icon svg {
            position: absolute;
            left: 8px;
            top: 50%;
            transform: translateY(-50%);
            color: #b2c7b0;
            width: 18px;
            height: 18px;
        }
        .input-icon.password-wrapper {
            position: relative;
        }
        .input-icon.password-wrapper input {
            padding-right: 40px;
        }
        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6b7b5e;
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
        }
        .password-toggle:hover {
            color: #4b7942;
        }
        .password-toggle svg {
            width: 18px;
            height: 18px;
            position: static;
            transform: none;
        }
        .submit-btn {
            background: #256029;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 14px 0;
            font-size: 1.15rem;
            font-weight: 600;
            width: 100%;
            margin-top: 8px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .submit-btn:hover {
            background: #386a33;
        }
        .signin-link {
            margin-top: 18px;
            color: #263a29;
            font-size: 1rem;
        }
        .signin-link a {
            color: #386a33;
            text-decoration: none;
            font-weight: 500;
        }
        .terms {
            margin-top: 18px;
            color: #6b7b5e;
            font-size: 0.95rem;
            text-align: center;
        }
        .terms a {
            color: #386a33;
            text-decoration: underline;
        }
        @media (max-width: 500px) {
            .form-card {
                min-width: 90vw;
                padding: 24px 8vw;
            }
        }
        @media (max-width: 600px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }
        }
        @media (max-width: 375px) {
            .title {
                font-size: 1.8rem;
            }
            .subtitle {
                font-size: 1rem;
            }
            .icon {
                width: 56px;
                height: 56px;
            }
            .icon img {
                width: 70px;
                height: 70px;
            }
            .terms {
                font-size: 0.9rem;
            }
        }
        @media (max-width: 320px) {
            .centered-container {
                padding: 0 2vw;
            }
            .title {
                font-size: 1.5rem;
            }
            .subtitle {
                font-size: 0.95rem;
            }
            .icon {
                width: 48px;
                height: 48px;
                margin-bottom: 16px;
            }
            .icon img {
                width: 60px;
                height: 60px;
            }
            .form-card {
                min-width: 94vw;
                padding: 20px 5vw;
            }
            .form-label {
                font-size: 0.9rem;
            }
            .input-icon input {
                font-size: 0.95rem;
                padding: 9px 10px 9px 32px;
            }
            .submit-btn {
                font-size: 1rem;
                padding: 12px 0;
            }
            .signin-link {
                font-size: 0.95rem;
            }
            .terms {
                font-size: 0.85rem;
            }
        }
        /* Prevent horizontal overflow */
        * {
            box-sizing: border-box;
        }
        html, body {
            overflow-x: hidden;
            width: 100%;
            max-width: 100vw;
        }
        .flash-message {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2000;
            min-width: 320px;
            max-width: 90vw;
            padding: 16px 24px;
            border-radius: 8px;
            font-size: 1.08rem;
            font-weight: 500;
            box-shadow: 0 4px 20px rgba(44, 62, 80, 0.15);
            animation: slideDown 0.3s ease-out;
        }
        .flash-message.success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .flash-message.error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        @keyframes slideDown {
            from {
                transform: translateX(-50%) translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateX(-50%) translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
@if(request()->has('logout') && request()->get('logout') == 'success')
    <div class="flash-message success">
        ✓ You have been successfully logged out.
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.flash-message').style.display = 'none';
        }, 4000);
    </script>
@endif
@if(session('success'))
    <div class="flash-message success">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.flash-message').style.display = 'none';
        }, 4000);
    </script>
@endif
@if(session('error'))
    <div class="flash-message error">
        {{ session('error') }}
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.flash-message').style.display = 'none';
        }, 4000);
    </script>
@endif
<div class="centered-container">
    <div class="icon">
        <img src="{{ asset('images/logo.png') }}" alt="IP Healers Academy Logo">
    </div>
    <div class="title">Join IP Healers Academy</div>
    <div class="subtitle">Create an account to join our community of plant enthusiasts</div>
    <form class="form-card" method="POST" action="{{ route('register') }}" id="registerForm" novalidate>
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="first_name">First Name</label>
                <div class="input-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <input type="text" id="first_name" name="first_name" required placeholder="John">
                    @error('first_name')
                        <div style="color:#b91c1c;font-size:0.95rem;margin-top:2px;">{{ $message }}</div>
                    @enderror
                    <div class="js-error" id="first_name_error" style="color:#b91c1c;font-size:0.95rem;margin-top:2px;display:none;"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="last_name">Last Name</label>
                <div class="input-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    <input type="text" id="last_name" name="last_name" required placeholder="Doe">
                    @error('last_name')
                        <div style="color:#b91c1c;font-size:0.95rem;margin-top:2px;">{{ $message }}</div>
                    @enderror
                    <div class="js-error" id="last_name_error" style="color:#b91c1c;font-size:0.95rem;margin-top:2px;display:none;"></div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="email">Email Address</label>
            <div class="input-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m8 0a4 4 0 11-8 0 4 4 0 018 0zm0 0v1a4 4 0 01-8 0v-1"/>
                </svg>
                <input type="email" id="email" name="email" required placeholder="you@example.com">
                @error('email')
                    <div style="color:#b91c1c;font-size:0.95rem;margin-top:2px;">{{ $message }}</div>
                @enderror
                <div class="js-error" id="email_error" style="color:#b91c1c;font-size:0.95rem;margin-top:2px;display:none;"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="password">Password</label>
            <div class="input-icon password-wrapper">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-2v-2a6 6 0 10-12 0v2m12 0v2a2 2 0 01-2 2H8a2 2 0 01-2-2v-2"/>
                </svg>
                <input type="password" id="password" name="password" required placeholder="••••••••">
                <button type="button" class="password-toggle" id="togglePassword" aria-label="Toggle password visibility">
                    <svg id="passwordEyeIcon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <svg id="passwordEyeOffIcon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                    </svg>
                </button>
                @error('password')
                    <div style="color:#b91c1c;font-size:0.95rem;margin-top:2px;">{{ $message }}</div>
                @enderror
                <div class="js-error" id="password_error" style="color:#b91c1c;font-size:0.95rem;margin-top:2px;display:none;"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="form-label" for="password_confirmation">Confirm Password</label>
            <div class="input-icon password-wrapper">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-2v-2a6 6 0 10-12 0v2m12 0v2a2 2 0 01-2 2H8a2 2 0 01-2-2v-2"/>
                </svg>
                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="••••••••">
                <button type="button" class="password-toggle" id="togglePasswordConfirmation" aria-label="Toggle password visibility">
                    <svg id="passwordConfirmationEyeIcon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                    <svg id="passwordConfirmationEyeOffIcon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18"/>
                    </svg>
                </button>
                @error('password_confirmation')
                    <div style="color:#b91c1c;font-size:0.95rem;margin-top:2px;">{{ $message }}</div>
                @enderror
                <div class="js-error" id="password_confirmation_error" style="color:#b91c1c;font-size:0.95rem;margin-top:2px;display:none;"></div>
            </div>
        </div>
        <button type="submit" class="submit-btn">Create Account</button>
        <div class="signin-link">
            Already have an account? <a href="{{ route('login') }}">Sign in</a>
        </div>
        <div class="terms">
            By creating an account, you agree to our <a href="/terms">Terms of Service</a> and <a href="/privacy">Privacy Policy</a>.
        </div>
    </form>
</div>
<script>
// Password visibility toggle functionality
document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('passwordEyeIcon');
    const eyeOffIcon = document.getElementById('passwordEyeOffIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.style.display = 'block';
        eyeOffIcon.style.display = 'none';
    } else {
        passwordInput.type = 'password';
        eyeIcon.style.display = 'none';
        eyeOffIcon.style.display = 'block';
    }
});

document.getElementById('togglePasswordConfirmation').addEventListener('click', function() {
    const passwordConfirmationInput = document.getElementById('password_confirmation');
    const eyeIcon = document.getElementById('passwordConfirmationEyeIcon');
    const eyeOffIcon = document.getElementById('passwordConfirmationEyeOffIcon');
    
    if (passwordConfirmationInput.type === 'password') {
        passwordConfirmationInput.type = 'text';
        eyeIcon.style.display = 'block';
        eyeOffIcon.style.display = 'none';
    } else {
        passwordConfirmationInput.type = 'password';
        eyeIcon.style.display = 'none';
        eyeOffIcon.style.display = 'block';
    }
});

// Form validation
document.getElementById('registerForm').addEventListener('submit', function(e) {
    let valid = true;
    // Clear previous errors
    document.querySelectorAll('.js-error').forEach(el => el.style.display = 'none');

    // First Name
    const firstName = document.getElementById('first_name').value.trim();
    if (!firstName.match(/^[A-Za-z\s'-]+$/)) {
        document.getElementById('first_name_error').textContent = 'Please enter a valid first name.';
        document.getElementById('first_name_error').style.display = 'block';
        valid = false;
    }
    // Last Name
    const lastName = document.getElementById('last_name').value.trim();
    if (!lastName.match(/^[A-Za-z\s'-]+$/)) {
        document.getElementById('last_name_error').textContent = 'Please enter a valid last name.';
        document.getElementById('last_name_error').style.display = 'block';
        valid = false;
    }
    // Email
    const email = document.getElementById('email').value.trim();
    if (!email.match(/^\S+@\S+\.\S+$/)) {
        document.getElementById('email_error').textContent = 'Please enter a valid email address.';
        document.getElementById('email_error').style.display = 'block';
        valid = false;
    }
    // Password
    const password = document.getElementById('password').value;
    if (password.length < 6) {
        document.getElementById('password_error').textContent = 'Password must be at least 6 characters.';
        document.getElementById('password_error').style.display = 'block';
        valid = false;
    }
    // Password Confirmation
    const passwordConfirmation = document.getElementById('password_confirmation').value;
    if (passwordConfirmation.length < 6) {
        document.getElementById('password_confirmation_error').textContent = 'Password must be at least 6 characters.';
        document.getElementById('password_confirmation_error').style.display = 'block';
        valid = false;
    } else if (password !== passwordConfirmation) {
        document.getElementById('password_confirmation_error').textContent = 'Passwords do not match.';
        document.getElementById('password_confirmation_error').style.display = 'block';
        valid = false;
    }
    if (!valid) e.preventDefault();
});
</script>
</body>
</html> 