<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>About IP Healers Academy</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    @include('User.partials.footer_css')
    <style>
        body {
            background: #f7f8f5;
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
        }
        .about-hero {
            background: linear-gradient(rgba(45,90,39,0.85), rgba(45,90,39,0.85)), #2d5a27;
            color: #fff;
            padding: 80px 0 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .about-hero::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 100px;
            background: linear-gradient(to bottom, rgba(22,163,74,0) 0%, #f7f8f5 100%);
            pointer-events: none;
        }
        .about-hero-icon {
            background: #3a4a32;
            border-radius: 50%;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px auto;
        }
        .about-hero-icon svg {
            width: 38px;
            height: 38px;
            color: #b2c7b0;
        }
        .about-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 18px;
        }
        .about-hero-desc {
            font-size: 1.25rem;
            color: #e3e7df;
            margin-bottom: 0;
            font-weight: 400;
        }
        .about-section {
            background: #f7f8f5;
            padding: 64px 0 0 0;
        }
        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 4vw;
        }
        .about-mission-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 18px;
        }
        .about-mission-desc {
            color: #425336;
            font-size: 1.18rem;
            margin-bottom: 32px;
            max-width: 900px;
        }
        .about-quote {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 24px rgba(44, 62, 80, 0.10);
            padding: 22px 32px;
            font-style: italic;
            color: #425336;
            font-size: 1.13rem;
            max-width: 600px;
            margin: 0 0 0 auto;
            margin-top: -30px;
            margin-bottom: 48px;
        }
        .about-core-section {
            background: #e9ede4;
            padding: 64px 0 64px 0;
            text-align: center;
        }
        .about-core-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.1rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 12px;
        }
        .about-core-desc {
            color: #425336;
            font-size: 1.15rem;
            margin-bottom: 38px;
        }
        .about-core-cards {
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
        }
        .about-core-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.08);
            padding: 32px 28px 28px 28px;
            min-width: 320px;
            max-width: 350px;
            flex: 1 1 320px;
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .about-core-icon {
            background: #eaf3ea;
            border-radius: 50%;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
        }
        .about-core-icon svg {
            width: 28px;
            height: 28px;
            color: #4b7942;
        }
        .about-core-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.18rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 8px;
        }
        .about-core-card-desc {
            color: #6b7b5e;
            font-size: 1.05rem;
        }
        .about-team-section {
            background: #f7f8f5;
            padding: 64px 0 0 0;
            text-align: center;
        }
        .about-team-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.1rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 12px;
        }
        .about-team-desc {
            color: #425336;
            font-size: 1.15rem;
            margin-bottom: 38px;
        }
        .about-team-cards {
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
        }
        .about-team-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.08);
            min-width: 320px;
            max-width: 350px;
            flex: 1 1 320px;
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            overflow: hidden;
        }
        .about-team-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            margin-bottom: 0;
        }
        .about-team-card-content {
            padding: 24px 22px 22px 22px;
        }
        .about-team-card-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.18rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 4px;
        }
        .about-team-card-role {
            color: #4b7942;
            font-size: 1.05rem;
            font-weight: 500;
            margin-bottom: 10px;
        }
        .about-team-card-desc {
            color: #425336;
            font-size: 1.05rem;
        }
        .about-join-section {
            background: #31703b;
            color: #fff;
            padding: 64px 0 0 0;
            text-align: center;
        }
        .about-join-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.1rem;
            font-weight: 700;
            margin-bottom: 18px;
        }
        .about-join-desc {
            font-size: 1.18rem;
            margin-bottom: 32px;
        }
        .about-join-buttons {
            display: flex;
            gap: 18px;
            justify-content: center;
            margin-bottom: 0;
        }
        .about-join-btn {
            background: #fff;
            color: #263a29;
            border: none;
            border-radius: 6px;
            padding: 14px 38px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
            display: inline-block;
        }
        .about-join-btn:hover {
            background: #e3e7df;
            color: #295024;
        }
        .about-contact-btn {
            background: #295024;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 14px 38px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
            display: inline-block;
        }
        .about-contact-btn:hover {
            background: #1d3a1a;
        }
        @media (max-width: 1100px) {
            .about-core-cards, .about-team-cards {
                flex-direction: column;
                align-items: center;
            }
        }
        @media (max-width: 900px) {
            .about-hero-title {
                font-size: 2.1rem;
            }
            .about-container {
                padding: 0 2vw;
            }
        }
        @media (max-width: 700px) {
            .about-core-card, .about-team-card {
                min-width: 90vw;
                max-width: 95vw;
            }
        }

        @media (max-width: 600px) {
            .about-hero {
                padding: 64px 0 80px 0;
            }
            .about-hero-title {
                font-size: 1.8rem;
            }
            .about-hero-desc {
                font-size: 1.1rem;
            }
            .about-mission-title {
                font-size: 1.7rem;
            }
            .about-mission-desc {
                font-size: 1.05rem;
            }
            .about-quote {
                font-size: 1.05rem;
                padding: 18px 24px;
                margin-top: -20px;
            }
            .about-core-title, .about-team-title {
                font-size: 1.8rem;
            }
            .about-core-desc, .about-team-desc {
                font-size: 1.05rem;
            }
            .about-join-title {
                font-size: 1.8rem;
            }
            .about-join-desc {
                font-size: 1.05rem;
            }
            .about-join-buttons {
                flex-direction: column;
                width: 90%;
                margin: 0 auto;
            }
            .about-join-btn, .about-contact-btn {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .about-hero {
                padding: 48px 0 64px 0;
            }
            .about-hero-icon {
                width: 56px;
                height: 56px;
            }
            .about-hero-icon svg {
                width: 32px;
                height: 32px;
            }
            .about-hero-title {
                font-size: 1.5rem;
            }
            .about-hero-desc {
                font-size: 1rem;
            }
            .about-section {
                padding: 48px 0 0 0;
            }
            .about-mission-title {
                font-size: 1.5rem;
            }
            .about-mission-desc {
                font-size: 1rem;
            }
            .about-quote {
                font-size: 1rem;
                padding: 16px 20px;
            }
            .about-core-section, .about-team-section {
                padding: 48px 0 48px 0;
            }
            .about-core-title, .about-team-title {
                font-size: 1.5rem;
            }
            .about-core-desc, .about-team-desc {
                font-size: 1rem;
            }
            .about-core-card, .about-team-card {
                padding: 24px 20px 20px 20px;
            }
            .about-core-card-title, .about-team-card-title {
                font-size: 1.1rem;
            }
            .about-core-card-desc, .about-team-card-desc {
                font-size: 0.98rem;
            }
            .about-join-section {
                padding: 48px 0 0 0;
            }
            .about-join-title {
                font-size: 1.5rem;
            }
            .about-join-desc {
                font-size: 1rem;
                padding: 0 4vw;
            }
            .about-join-btn, .about-contact-btn {
                font-size: 1rem;
                padding: 12px 32px;
            }
        }

        @media (max-width: 375px) {
            .about-hero-title {
                font-size: 1.3rem;
            }
            .about-mission-title {
                font-size: 1.3rem;
            }
            .about-core-title, .about-team-title {
                font-size: 1.3rem;
            }
            .about-join-title {
                font-size: 1.3rem;
            }
        }

        @media (max-width: 320px) {
            .about-hero {
                padding: 40px 0 56px 0;
            }
            .about-hero-icon {
                width: 48px;
                height: 48px;
                margin-bottom: 16px;
            }
            .about-hero-icon svg {
                width: 28px;
                height: 28px;
            }
            .about-hero-title {
                font-size: 1.2rem;
            }
            .about-hero-desc {
                font-size: 0.95rem;
                padding: 0 3vw;
            }
            .about-section {
                padding: 40px 0 0 0;
            }
            .about-container {
                padding: 0 3vw;
            }
            .about-mission-title {
                font-size: 1.2rem;
            }
            .about-mission-desc {
                font-size: 0.95rem;
            }
            .about-quote {
                font-size: 0.95rem;
                padding: 14px 18px;
                margin-top: -16px;
                margin-bottom: 36px;
                max-width: 94vw;
            }
            .about-core-section, .about-team-section {
                padding: 40px 0 40px 0;
            }
            .about-core-title, .about-team-title {
                font-size: 1.2rem;
                padding: 0 3vw;
            }
            .about-core-desc, .about-team-desc {
                font-size: 0.95rem;
                padding: 0 3vw;
            }
            .about-core-card, .about-team-card {
                min-width: 94vw;
                max-width: 94vw;
                padding: 20px 18px 18px 18px;
            }
            .about-core-icon {
                width: 44px;
                height: 44px;
            }
            .about-core-icon svg {
                width: 26px;
                height: 26px;
            }
            .about-core-card-title, .about-team-card-title {
                font-size: 1.05rem;
            }
            .about-core-card-desc, .about-team-card-desc {
                font-size: 0.95rem;
            }
            .about-team-img {
                height: 200px;
            }
            .about-team-card-content {
                padding: 20px 18px 18px 18px;
            }
            .about-team-card-role {
                font-size: 1rem;
            }
            .about-join-section {
                padding: 40px 0 0 0;
            }
            .about-join-title {
                font-size: 1.2rem;
                padding: 0 3vw;
            }
            .about-join-desc {
                font-size: 0.95rem;
                padding: 0 3vw;
            }
            .about-join-buttons {
                width: 94%;
                gap: 12px;
            }
            .about-join-btn, .about-contact-btn {
                font-size: 0.95rem;
                padding: 10px 24px;
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

        /* Better text wrapping */
        .about-hero-title, .about-mission-title, .about-core-title, 
        .about-team-title, .about-join-title {
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
        }

        /* Smooth quote styling */
        .about-quote {
            transition: all 0.3s ease;
        }
        /* Mobile touch fixes */
        .about-join-buttons a, .about-section a {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
            touch-action: manipulation;
            -webkit-touch-callout: none;
        }
        .about-join-buttons a {
            min-height: 48px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
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
    @include('User.partials.navbar')
    @include('User.partials.hero_green', [
        'title' => 'About IP Healers Academy',
        'desc' => 'Preserving indigenous plant knowledge through documentation, education, and community engagement.'
    ])
    <section class="about-section">
        <div class="about-container">
            <div class="about-mission-title">Our Mission</div>
            <div class="about-mission-desc">
                IP Healers Academy is dedicated to the preservation and promotion of indigenous plant knowledge and healing practices that have been developed over generations.<br><br>
                We believe that these traditional practices contain valuable wisdom that should be documented, respected, and shared with the world in a way that honors the communities from which they originate.<br><br>
                By creating a digital platform for this knowledge, we aim to ensure that these practices are not lost to time and can continue to benefit future generations while supporting the indigenous communities who are the rightful stewards of this knowledge.
            </div>
            <div class="about-quote">"Preserving knowledge that has sustained communities for centuries."</div>
        </div>
    </section>
    <section class="about-core-section">
        <div class="about-core-title">Our Core Values</div>
        <div class="about-core-desc">These principles guide our approach to preserving indigenous plant knowledge</div>
        <div class="about-core-cards">
            <div class="about-core-card">
                <div class="about-core-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" fill="#eaf3ea"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/>
                    </svg>
                </div>
                <div class="about-core-card-title">Respect for Indigenous Rights</div>
                <div class="about-core-card-desc">We acknowledge the intellectual property rights of indigenous communities over their traditional knowledge and ensure they benefit from any use of this knowledge.</div>
            </div>
            <div class="about-core-card">
                <div class="about-core-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" fill="#eaf3ea"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/>
                    </svg>
                </div>
                <div class="about-core-card-title">Cultural Preservation</div>
                <div class="about-core-card-desc">We are committed to documenting ethnobotanical practices within their cultural context, recognizing that plants are often integral to cultural identity.</div>
            </div>
            <div class="about-core-card">
                <div class="about-core-icon">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="9" fill="#eaf3ea"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/>
                    </svg>
                </div>
                <div class="about-core-card-title">Ethical Documentation</div>
                <div class="about-core-card-desc">We follow strict ethical guidelines in our documentation process, ensuring informed consent and appropriate attribution for all knowledge shared.</div>
            </div>
        </div>
    </section>
    <section class="about-team-section">
        <div class="about-container">
            <div class="about-team-title">Meet Our Team</div>
            <div class="about-team-desc">Dedicated professionals working to bridge traditional knowledge with modern preservation techniques</div>
            <div class="about-team-cards">
               
                <div class="about-team-card">
                    <img class="about-team-img" src="/images/programmer.jpg" alt="Programmer">
                    <div class="about-team-card-content">
                        <div class="about-team-card-title">Programmer</div>
                        <div class="about-team-card-role">Lead Developer</div>
                        <div class="about-team-card-desc">Responsible for building and maintaining the IP Healers Academy platform, implementing features and ensuring the application runs smoothly.</div>
                    </div>
                </div>
                <div class="about-team-card">
                    <img class="about-team-img" src="/images/paper_in_charge.jpg" alt="Paper In-Charge">
                    <div class="about-team-card-content">
                        <div class="about-team-card-title">Paper In‑Charge</div>
                        <div class="about-team-card-role">Records & Documentation</div>
                        <div class="about-team-card-desc">Manages documentation, consent records, and administrative paperwork to ensure ethical and accurate preservation of indigenous knowledge.</div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <section class="about-join-section">
        <div class="about-join-title">Join Our Mission</div>
        <div class="about-join-desc">Whether you're an indigenous healer, a plant enthusiast, or someone who values traditional knowledge, there's a place for you in our community.</div>
        <div class="about-join-buttons">
            <a href="/register" class="about-join-btn">Create Account</a>
            <a href="/contact" class="about-contact-btn">Contact Us</a>
        </div>
    </section>
    @include('User.partials.footer')
</body>
</html>