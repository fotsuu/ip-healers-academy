<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In to IP Healers Academy</title>
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
        .form-options {
            display: flex;
            align-items: center;
            width: 100%;
            margin-bottom: 18px;
        }
        .remember-me {
            display: flex;
            align-items: center;
            font-size: 1rem;
            color: #263a29;
        }
        .remember-me input[type="checkbox"] {
            margin-right: 6px;
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
        .signup-link {
            margin-top: 18px;
            color: #263a29;
            font-size: 1rem;
            text-align: center;
        }
        .signup-link a {
            color: #386a33;
            text-decoration: none;
            font-weight: 500;
        }
        @media (max-width: 500px) {
            .form-card {
                min-width: 90vw;
                padding: 24px 8vw;
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
            .signup-link {
                font-size: 0.95rem;
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
    <div class="title">Sign In to IP Healers Academy</div>
    <div class="subtitle">Access your account to contribute and explore</div>
    <form class="form-card" method="POST" action="{{ route('login') }}" id="loginForm" novalidate>
        @csrf
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
            <div class="input-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-2v-2a6 6 0 10-12 0v2m12 0v2a2 2 0 01-2 2H8a2 2 0 01-2-2v-2"/>
                </svg>
                <input type="password" id="password" name="password" required placeholder="••••••••">
                @error('password')
                    <div style="color:#b91c1c;font-size:0.95rem;margin-top:2px;">{{ $message }}</div>
                @enderror
                <div class="js-error" id="password_error" style="color:#b91c1c;font-size:0.95rem;margin-top:2px;display:none;"></div>
            </div>
        </div>
        <div class="form-options">
            <label class="remember-me">
                <input type="checkbox" name="remember">
                Remember me
            </label>
        </div>
        <button type="submit" class="submit-btn">Sign In</button>
        <div class="signup-link">
            Don't have an account? <a href="{{ route('register') }}">Sign up</a>
        </div>
    </form>
</div>
<script>
document.getElementById('loginForm').addEventListener('submit', function(e) {
    let valid = true;
    document.querySelectorAll('.js-error').forEach(el => el.style.display = 'none');
    // Email
    const email = document.getElementById('email').value.trim();
    if (!email.match(/^\S+@\S+\.\S+$/)) {
        document.getElementById('email_error').textContent = 'Please enter a valid email address.';
        document.getElementById('email_error').style.display = 'block';
        valid = false;
    }
    // Password
    const password = document.getElementById('password').value;
    if (!password) {
        document.getElementById('password_error').textContent = 'Password is required.';
        document.getElementById('password_error').style.display = 'block';
        valid = false;
    }
    if (!valid) e.preventDefault();
});
</script>
</body>
</html> 