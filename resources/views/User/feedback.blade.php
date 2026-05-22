<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Feedback - IP Healers Academy</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f7f8f5;
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
        }
        .feedback-section {
            padding: 56px 0 0 0;
            background: #f7f8f5;
            min-height: 100vh;
        }
        .feedback-header-icon {
            background: #e9ede4;
            border-radius: 50%;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px auto;
        }
        .feedback-header-icon svg {
            width: 36px;
            height: 36px;
            color: #425336;
        }
        .feedback-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: #263a29;
            text-align: center;
            margin-bottom: 8px;
        }
        .feedback-desc {
            color: #425336;
            font-size: 1.13rem;
            text-align: center;
            margin-bottom: 38px;
        }
        .feedback-form-container {
            max-width: 800px;
            margin: 0 auto 0 auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(44, 62, 80, 0.08);
            padding: 38px 36px 28px 36px;
        }
        .feedback-form-row {
            display: flex;
            gap: 24px;
            margin-bottom: 18px;
        }
        .feedback-form-group {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .feedback-label {
            font-weight: 600;
            color: #425336;
            margin-bottom: 6px;
            font-size: 1.05rem;
        }
        .feedback-input, .feedback-select, .feedback-textarea {
            background: #f7f8f5;
            border: none;
            border-radius: 6px;
            padding: 12px 16px;
            font-size: 1.08rem;
            color: #263a29;
            margin-bottom: 0;
            outline: none;
            border: 1.5px solid #e3e7df;
            transition: border 0.2s;
        }
        .feedback-input:focus, .feedback-select:focus, .feedback-textarea:focus {
            border: 1.5px solid #4b7942;
        }
        .feedback-select {
            appearance: none;
        }
        .feedback-textarea {
            min-height: 120px;
            resize: vertical;
        }
        .feedback-file-upload {
            background: #f7f8f5;
            border: 2px dashed #b2c7b0;
            border-radius: 8px;
            padding: 32px 0;
            text-align: center;
            color: #425336;
            margin-bottom: 18px;
            margin-top: 8px;
        }
        .feedback-file-upload svg {
            width: 38px;
            height: 38px;
            color: #7fc47f;
            margin-bottom: 8px;
        }
        .feedback-file-upload-desc {
            font-weight: 600;
            color: #386a33;
            margin-bottom: 2px;
        }
        .feedback-file-upload-note {
            color: #6b7b5e;
            font-size: 0.98rem;
        }
        .feedback-checkbox-row {
            display: flex;
            align-items: center;
            margin-bottom: 18px;
        }
        .feedback-checkbox {
            margin-right: 10px;
        }
        .feedback-submit-btn {
            background: #2d5a27;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 16px 0;
            font-size: 1.18rem;
            font-weight: 600;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .feedback-submit-btn:hover {
            background: #24481f;
        }
        .feedback-submit-btn svg {
            width: 22px;
            height: 22px;
        }
        .feedback-info-box {
            background: #f3f6ef;
            border: 1.5px solid #b2c7b0;
            border-radius: 12px;
            padding: 28px 32px 18px 32px;
            max-width: 800px;
            margin: 38px auto 0 auto;
        }
        .feedback-info-title {
            color: #31703b;
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .feedback-info-title svg {
            color: #7fc47f;
            width: 22px;
            height: 22px;
        }
        .feedback-info-list {
            color: #425336;
            font-size: 1.08rem;
            margin: 0;
            padding-left: 24px;
        }
        .feedback-info-list li {
            margin-bottom: 8px;
            list-style-type: decimal;
        }
        @media (max-width: 900px) {
            .feedback-form-container, .feedback-info-box {
                padding: 18px 4vw;
            }
        }
        @media (max-width: 700px) {
            .feedback-form-row {
                flex-direction: column;
                gap: 0;
            }
        }
        /* Mobile touch fixes */
        .feedback-input, .feedback-select, .feedback-textarea, .feedback-submit-btn, 
        .feedback-file-upload, .feedback-checkbox, .star-rating label {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
            touch-action: manipulation;
            -webkit-touch-callout: none;
        }
        .feedback-submit-btn {
            min-height: 48px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .feedback-input, .feedback-select, .feedback-textarea {
            min-height: 44px;
            font-size: 16px !important; /* Prevents zoom on iOS */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .feedback-file-upload {
            min-height: 120px;
            touch-action: manipulation;
        }
        .feedback-file-upload label {
            display: block;
            width: 100%;
            height: 100%;
            cursor: pointer;
            touch-action: manipulation;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
        }
        .feedback-checkbox {
            width: 24px;
            height: 24px;
            min-width: 24px;
            min-height: 24px;
            cursor: pointer;
            touch-action: manipulation;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
        }
        .star-rating label {
            min-width: 44px;
            min-height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            touch-action: manipulation;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
        }
        /* Ensure form container is above any overlapping elements */
        .feedback-form-container {
            position: relative;
            z-index: 1;
        }
        /* Fix for mobile menu backdrop not blocking */
        @media (max-width: 768px) {
            .mobile-menu-backdrop:not(.active) {
                display: none !important;
            }
            .mobile-menu-overlay:not(.active) {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    @if(session('success'))
    <div style="background:#e6f7e6;color:#31703b;padding:16px 0;border-radius:2px;font-size:1.08rem;font-weight:400;text-align:center;margin:24px auto 0 auto;max-width:96%;width:98%;box-shadow:none;border:none;opacity:1;z-index:1000;position:relative;">
        {{ session('success') }}
    </div>
    @endif
    @if($errors->any())
    <div style="background:#fff3f3;color:#b91c1c;padding:16px 0;border-radius:2px;font-size:1.08rem;font-weight:400;text-align:center;margin:24px auto 0 auto;max-width:96%;width:98%;box-shadow:none;border:none;opacity:1;z-index:1000;position:relative;">
        {{ $errors->first() }}
    </div>
    @endif
    @include('User.partials.navbar')
    @include('User.partials.hero_green', [
        'title' => 'We Value Your Feedback',
        'desc' => 'Share your thoughts, suggestions, or report issues to help us improve IP Healers Academy.'
    ])
    <section class="feedback-section">
        <div class="feedback-header-icon">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="3" y="5" width="18" height="14" rx="4" fill="#e9ede4"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h8M8 14h5"/>
            </svg>
        </div>
        <div class="feedback-title">We Value Your Feedback</div>
        <div class="feedback-desc">Share your thoughts, suggestions, or report issues to help us improve IP Healers Academy</div>
        <form class="feedback-form-container" method="POST" action="{{ route('feedback.submit') }}" enctype="multipart/form-data">
            @csrf
            @if(auth()->check())
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            @endif
            <div class="feedback-form-row">
                <div class="feedback-form-group">
                    <label class="feedback-label" for="name">Your Name</label>
                    <input class="feedback-input" type="text" id="name" name="name" placeholder="John Doe" value="{{ old('name', auth()->check() ? auth()->user()->name : '') }}">
                </div>
                <div class="feedback-form-group">
                    <label class="feedback-label" for="email">Email Address</label>
                    <input class="feedback-input" type="email" id="email" name="email" placeholder="you@example.com" value="{{ old('email', auth()->check() ? auth()->user()->email : '') }}">
                </div>
            </div>
            <div class="feedback-form-group" style="margin-bottom: 18px;">
                <label class="feedback-label" for="type">Feedback Type</label>
                <select class="feedback-select" id="type" name="type">
                    <option value="">Select a feedback type</option>
                    <option value="suggestion" @if(old('type')=='suggestion') selected @endif>Suggestion</option>
                    <option value="issue" @if(old('type')=='issue') selected @endif>Issue</option>
                    <option value="question" @if(old('type')=='question') selected @endif>Question</option>
                    <option value="other" @if(old('type')=='other') selected @endif>Other</option>
                </select>
            </div>
            <div class="feedback-form-group" style="margin-bottom: 18px;">
                <label class="feedback-label" for="subject">Subject</label>
                <input class="feedback-input" type="text" id="subject" name="subject" placeholder="Brief summary of your feedback" value="{{ old('subject') }}">
            </div>
            <div class="feedback-form-group" style="margin-bottom: 18px;">
                <label class="feedback-label" for="comment">Your Message</label>
                <textarea class="feedback-textarea" id="comment" name="comment" placeholder="Please provide as much detail as possible...">{{ old('comment') }}</textarea>
            </div>
            <div class="feedback-form-group" style="margin-bottom: 18px;">
                <label class="feedback-label" for="rating">Rating</label>
                <div class="star-rating" style="display:flex;flex-direction:row-reverse;justify-content:flex-start;gap:8px;">
                    @for ($i = 5; $i >= 1; $i--)
                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" @if(old('rating') == $i) checked @endif required style="display:none;">
                        <label for="star{{ $i }}" style="font-size:2rem; color:#e3e7df; cursor:pointer; transition:color 0.2s; min-width:44px; min-height:44px; display:flex; align-items:center; justify-content:center; touch-action:manipulation; -webkit-tap-highlight-color:rgba(0,0,0,0.1);">
                            ★
                        </label>
                    @endfor
                </div>
                <style>
                    .star-rating input:checked ~ label,
                    .star-rating label:hover,
                    .star-rating label:hover ~ label {
                        color: #fbbf24 !important;
                    }
                    .star-rating input:checked + label {
                        color: #fbbf24 !important;
                    }
                </style>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const stars = document.querySelectorAll('.star-rating label');
                        const highlightStars = function(targetStar) {
                            stars.forEach(function(s) {
                                s.style.color = '';
                            });
                            let prev = targetStar;
                            while (prev) {
                                prev.style.color = '#fbbf24';
                                prev = prev.nextElementSibling;
                            }
                        };
                        stars.forEach(function(star) {
                            // Desktop hover
                            star.addEventListener('mouseenter', function() {
                                highlightStars(star);
                            });
                            star.addEventListener('mouseleave', function() {
                                stars.forEach(function(s) {
                                    s.style.color = '';
                                });
                                const checked = document.querySelector('.star-rating input:checked');
                                if (checked) {
                                    let label = checked.nextElementSibling;
                                    while (label) {
                                        label.style.color = '#fbbf24';
                                        label = label.nextElementSibling;
                                    }
                                }
                            });
                            // Click and touch events
                            star.addEventListener('click', function(e) {
                                e.preventDefault();
                                highlightStars(star);
                                const radio = document.getElementById(star.getAttribute('for'));
                                if (radio) {
                                    radio.checked = true;
                                    radio.dispatchEvent(new Event('change', { bubbles: true }));
                                }
                            });
                            // Touch events for mobile
                            star.addEventListener('touchstart', function(e) {
                                e.preventDefault();
                                highlightStars(star);
                            });
                            star.addEventListener('touchend', function(e) {
                                e.preventDefault();
                                const radio = document.getElementById(star.getAttribute('for'));
                                if (radio) {
                                    radio.checked = true;
                                    radio.dispatchEvent(new Event('change', { bubbles: true }));
                                }
                            });
                        });
                    });
                </script>
            </div>
            <div class="feedback-form-group">
                <label class="feedback-label" for="file">Attach File (optional)</label>
                <div class="feedback-file-upload" style="position:relative;">
                    <input type="file" id="file" name="file" accept="image/*,.pdf,.doc,.docx" style="position:absolute;top:0;left:0;width:100%;height:100%;opacity:0;cursor:pointer;z-index:2;touch-action:manipulation;" onchange="document.getElementById('file-label-text').innerText = this.files[0]?.name || 'Upload a file or drag and drop'">
                    <label for="file" id="file-label" style="cursor:pointer;display:block;width:100%;height:100%;position:relative;z-index:1;pointer-events:none;touch-action:manipulation;">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <rect x="3" y="5" width="18" height="14" rx="4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h8M8 14h5"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v8m-4-4h8"/>
                        </svg>
                        <div class="feedback-file-upload-desc" id="file-label-text">Upload a file or drag and drop</div>
                        <div class="feedback-file-upload-note">PNG, JPG, GIF up to 10MB</div>
                    </label>
                </div>
            </div>
            <div class="feedback-checkbox-row">
                <input class="feedback-checkbox" type="checkbox" id="privacy_agreed" name="privacy_agreed" value="1" @if(old('privacy_agreed')) checked @endif>
                <label for="privacy_agreed">I agree to the privacy policy for handling my data.</label>
            </div>
            <button class="feedback-submit-btn" type="submit">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                </svg>
                Submit Feedback
            </button>
        </form>
        <div class="feedback-info-box">
            <div class="feedback-info-title">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
                What happens after you submit feedback?
            </div>
            <ol class="feedback-info-list">
                <li>Our team reviews your feedback within 2-3 business days.</li>
                <li>If applicable, we'll investigate any issues or consider suggestions for future updates.</li>
                <li>You'll receive a confirmation email with a reference number for your feedback.</li>
            </ol>
        </div>
    </section>
    <footer class="footer-section" style="margin-top: 0; background:#4A563A; color:#e3e7df;">
        <div class="footer-main" style="max-width: 1300px; margin: 48px auto 0 auto; display: flex; gap: 48px; padding: 36px 24px 32px 24px; flex-wrap: wrap;">
            <div class="footer-col brand-col" style="flex: 2 1 320px; min-width: 320px;">
                <div class="footer-logo" style="display: flex; align-items: center; font-family: 'Playfair Display', serif; font-size: 1.4rem; font-weight: 700; color: #fff; margin-bottom: 12px; gap: 8px;">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="width:26px;height:26px;color:#fff;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/>
                    </svg>
                    <span style="color:#fff">IP Healers Academy</span>
                </div>
                <div class="footer-brand-desc" style="color: #e3e7df; font-size: 1.05rem; margin-bottom: 18px; max-width: 400px;">
                    Preserving indigenous knowledge of ethnobotanical plants and healing practices for future generations through documentation and community engagement.
                </div>
                <div class="footer-socials" style="display: flex; gap: 16px; margin-bottom: 0;">
                    <a href="#" aria-label="Instagram" style="color:#e3e7df"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
                    <a href="#" aria-label="Facebook" style="color:#e3e7df"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                    <a href="#" aria-label="Twitter" style="color:#e3e7df"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53A4.48 4.48 0 0 0 22.4 1.64a9.09 9.09 0 0 1-2.88 1.1A4.52 4.52 0 0 0 16.11 0c-2.5 0-4.52 2.02-4.52 4.52 0 .35.04.7.11 1.03A12.94 12.94 0 0 1 3.1.67a4.52 4.52 0 0 0-.61 2.28c0 1.57.8 2.96 2.02 3.77A4.48 4.48 0 0 1 2 6.13v.06c0 2.2 1.56 4.03 3.64 4.45a4.52 4.52 0 0 1-2.04.08c.57 1.77 2.23 3.06 4.2 3.1A9.05 9.05 0 0 1 0 19.54a12.8 12.8 0 0 0 6.95 2.04c8.34 0 12.9-6.91 12.9-12.9 0-.2 0-.39-.01-.58A9.22 9.22 0 0 0 24 4.59a9.1 9.1 0 0 1-2.6.71z"/></svg></a>
                </div>
            </div>
            <div class="footer-col" style="min-width:140px;">
                <div class="footer-col-title" style="font-weight: 700; color: #fff; margin-bottom: 10px; font-size: 1.08rem; letter-spacing: 1px;">EXPLORE</div>
                <a href="#" style="display:block;color:#e3e7df;text-decoration:none;margin-bottom:6px;">Plants</a>
                <a href="#" style="display:block;color:#e3e7df;text-decoration:none;margin-bottom:6px;">Healers</a>
                <a href="#" style="display:block;color:#e3e7df;text-decoration:none;margin-bottom:6px;">Tutorials</a>
                <a href="#" style="display:block;color:#e3e7df;text-decoration:none;">About Us</a>
            </div>
            <div class="footer-col" style="min-width:140px;">
                <div class="footer-col-title" style="font-weight: 700; color: #fff; margin-bottom: 10px; font-size: 1.08rem; letter-spacing: 1px;">SUPPORT</div>
                <a href="#" style="display:block;color:#e3e7df;text-decoration:none;margin-bottom:6px;">Feedback</a>
                <a href="#" style="display:block;color:#e3e7df;text-decoration:none;margin-bottom:6px;">Privacy Policy</a>
                <a href="#" style="display:block;color:#e3e7df;text-decoration:none;margin-bottom:6px;">Terms of Service</a>
                <a href="#" style="display:block;color:#e3e7df;text-decoration:none;">Contact</a>
            </div>
        </div>
        <div class="footer-bottom" style="border-top: 1px solid rgba(255,255,255,0.08); max-width: 1300px; margin: 0 auto; padding: 18px 24px 12px 24px; display: flex; justify-content: space-between; align-items: center; color: #d3e6d3; font-size: 1rem; flex-wrap: wrap;">
            <div class="footer-copyright">© 2025 IP Healers Academy. All rights reserved.</div>
            <div class="footer-made">Made with <span class="footer-heart" style="color: #7fc47f; font-size: 1.1em;">♡</span> for indigenous knowledge preservation</div>
        </div>
    </footer>
</body>
</html>