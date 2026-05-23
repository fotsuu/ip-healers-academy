<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Plant Use Tutorials</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background: #f7f8f5;
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
        }
        .tutorials-hero {
            background: linear-gradient(rgba(45,90,39,0.85), rgba(45,90,39,0.85)), #2d5a27;
            color: #fff;
            padding: 56px 0 48px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .tutorials-hero::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 80px;
            background: linear-gradient(to bottom, rgba(22,163,74,0) 0%, #f7f8f5 100%);
            pointer-events: none;
        }
        .tutorials-hero-icon {
            background: #eaf3ea;
            border-radius: 50%;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px auto;
        }
        .tutorials-hero-icon svg {
            width: 32px;
            height: 32px;
            color: #4b7942;
        }
        .tutorials-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.3rem;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .tutorials-hero-desc {
            font-size: 1.18rem;
            color: #e3e7df;
            margin-bottom: 0;
            font-weight: 400;
        }
        .tutorials-search-section {
            margin-top: -32px;
            margin-bottom: 32px;
            display: flex;
            justify-content: center;
            width: 100%;
            padding: 0 24px;
            box-sizing: border-box;
        }
        .tutorials-search-bar {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.08);
            width: 100%;
            max-width: 900px;
            padding: 24px 24px 18px 24px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            box-sizing: border-box;
        }
        .tutorials-search-bar-row {
            display: flex;
            width: 100%;
            align-items: center;
            gap: 12px;
            box-sizing: border-box;
        }
        .tutorials-search-bar svg {
            color: #b2c7b0;
            width: 22px;
            height: 22px;
            flex-shrink: 0;
        }
        .tutorials-search-input {
            flex: 1;
            padding: 10px 16px;
            border: none;
            background: none;
            font-size: 1.1rem;
            color: #263a29;
            outline: none;
            min-width: 0;
            box-sizing: border-box;
        }
        .tutorials-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
        }
        .tutorials-filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .tutorials-filter-label {
            font-weight: 600;
            color: #495742;
            font-size: 1.05rem;
        }
        .tutorials-filter-options {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .tutorials-filter-btn {
            background: #eaf3ea;
            color: #295024;
            border: none;
            border-radius: 16px;
            padding: 6px 18px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .tutorials-filter-btn.active, .tutorials-filter-btn:hover {
            background: #295024;
            color: #fff;
        }
        .tutorials-list-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px 48px 24px;
        }
        .tutorials-list-title {
            font-size: 1.25rem;
            color: #263a29;
            font-weight: 600;
            margin-bottom: 24px;
        }
        .tutorial-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(44, 62, 80, 0.10);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 320px;
            position: relative;
            border: 1.5px solid #e3e7df;
            max-width: 700px;
            margin-bottom: 32px;
        }
        .tutorial-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            background: #e3e7df;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            cursor: pointer;
            transition: transform 0.3s, filter 0.3s;
            border: none;
            padding: 0;
            display: block;
        }
        .tutorial-img:hover {
            transform: scale(1.02);
            filter: brightness(0.95);
        }
        .tutorial-img-wrapper {
            position: relative;
            overflow: hidden;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }
        .tutorial-play-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(41, 80, 36, 0.9);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
            transition: all 0.3s;
        }
        .tutorial-img-wrapper:hover .tutorial-play-overlay {
            background: rgba(41, 80, 36, 1);
            transform: translate(-50%, -50%) scale(1.1);
        }
        .tutorial-play-overlay svg {
            width: 28px;
            height: 28px;
            color: #fff;
            margin-left: 4px;
        }
        .tutorial-card-content {
            padding: 18px 20px 16px 20px;
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
        }
        .tutorial-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.18rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 2px;
        }
        .tutorial-desc {
            color: #6b7b5e;
            font-size: 1.05rem;
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }
        .tutorial-desc.expanded {
            -webkit-line-clamp: unset;
            display: block;
        }
        .see-more-btn {
            background: none;
            border: none;
            color: #2d5a27;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            padding: 0;
            margin-top: 4px;
            text-decoration: none;
            transition: color 0.2s;
            display: inline-block;
        }
        .see-more-btn:hover {
            color: #24481f;
            text-decoration: underline;
        }
        @media (max-width: 900px) {
            .tutorials-list-section {
                padding: 0 24px 48px 24px;
            }
            .tutorials-hero-title {
                font-size: 1.9rem;
            }
            .tutorials-hero-desc {
                font-size: 1.05rem;
                padding: 0 20px;
            }
            .tutorials-grid {
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)) !important;
                gap: 24px !important;
            }
        }

        @media (max-width: 768px) {
            .tutorials-hero {
                padding: 48px 0 40px 0;
            }
            .tutorials-hero-icon {
                width: 56px;
                height: 56px;
            }
            .tutorials-hero-icon svg {
                width: 28px;
                height: 28px;
            }
            .tutorials-hero-title {
                font-size: 2rem;
                padding: 0 16px;
            }
            .tutorials-hero-desc {
                font-size: 1.1rem;
                padding: 0 16px;
            }
            .tutorials-search-section {
                padding: 0 16px;
                margin-top: -20px;
                margin-bottom: 24px;
            }
            .tutorials-search-bar {
                padding: 20px 16px 16px 16px;
                border-radius: 8px;
            }
            .tutorials-search-bar-row {
                gap: 10px;
            }
            .tutorials-search-bar svg {
                width: 20px;
                height: 20px;
            }
            .tutorials-search-input {
                font-size: 1rem;
                padding: 10px 12px;
            }
            .tutorials-list-section {
                padding: 0 16px 48px 16px;
            }
            .tutorials-grid {
                grid-template-columns: 1fr !important;
                gap: 24px !important;
            }
            .tutorial-card {
                max-width: 100% !important;
            }
        }

        @media (max-width: 600px) {
            .tutorials-search-section {
                padding: 0 12px;
                margin-top: -16px;
                margin-bottom: 20px;
            }
            .tutorials-search-bar {
                padding: 16px 12px 14px 12px;
                border-radius: 8px;
            }
            .tutorials-search-bar-row {
                gap: 8px;
            }
            .tutorials-search-bar svg {
                width: 18px;
                height: 18px;
            }
            .tutorials-search-input {
                font-size: 0.95rem;
                padding: 8px 10px;
            }
            .tutorials-list-section {
                padding: 0 12px 48px 12px;
            }
            .tutorials-hero-title {
                font-size: 1.6rem;
            }
            .tutorials-hero-desc {
                font-size: 1rem;
                padding: 0 12px;
            }
            .tutorials-filters {
                gap: 18px;
            }
            .tutorials-filter-options {
                gap: 8px;
            }
            .tutorials-filter-btn {
                padding: 5px 14px;
                font-size: 0.95rem;
            }
            .tutorials-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 12px !important;
            }
            .tutorial-card {
                max-width: 100% !important;
                margin-bottom: 12px;
                min-height: auto;
            }
            .tutorial-img, .tutorial-img-wrapper a {
                height: 140px !important;
            }
            .tutorial-card-content, .tutorial-card > div:last-child {
                padding: 16px 12px 14px 12px !important;
            }
            .tutorial-play-overlay {
                width: 50px;
                height: 50px;
            }
            .tutorial-play-overlay svg {
                width: 24px;
                height: 24px;
            }
        }

        @media (max-width: 480px) {
            .tutorials-hero {
                padding: 40px 0 32px 0;
            }
            .tutorials-hero-icon {
                width: 48px;
                height: 48px;
            }
            .tutorials-hero-icon svg {
                width: 24px;
                height: 24px;
            }
            .tutorials-hero-title {
                font-size: 1.4rem;
                padding: 0 10px;
            }
            .tutorials-hero-desc {
                font-size: 0.95rem;
                padding: 0 10px;
            }
            .tutorials-search-section {
                padding: 0 10px;
                margin-top: -12px;
                margin-bottom: 16px;
            }
            .tutorials-search-bar {
                padding: 14px 10px 12px 10px;
                border-radius: 6px;
            }
            .tutorials-search-bar-row {
                gap: 6px;
            }
            .tutorials-search-bar svg {
                width: 16px;
                height: 16px;
            }
            .tutorials-search-input {
                font-size: 0.9rem;
                padding: 8px 8px;
            }
            .tutorials-filter-label {
                font-size: 0.95rem;
            }
            .tutorials-filter-btn {
                font-size: 0.85rem;
                padding: 4px 10px;
            }
            .tutorials-list-section {
                padding: 0 10px 40px 10px;
            }
            .tutorials-list-title {
                font-size: 1.1rem;
                margin-bottom: 18px;
            }
            .tutorials-grid {
                gap: 10px !important;
            }
            .tutorial-card {
                margin-bottom: 10px;
                border-radius: 10px;
            }
            .tutorial-img, .tutorial-img-wrapper a {
                height: 120px !important;
            }
            .tutorial-card-content, .tutorial-card > div:last-child {
                padding: 12px 10px 10px 10px !important;
            }
            .tutorial-title {
                font-size: 0.95rem !important;
                margin-bottom: 4px !important;
            }
            .tutorial-desc {
                font-size: 0.85rem !important;
                margin-bottom: 8px !important;
            }
            .tutorial-card > div:last-child > div:nth-child(2) {
                font-size: 0.8rem !important;
                padding: 2px 10px !important;
                margin-bottom: 6px !important;
            }
            .tutorial-card > div:last-child > div:nth-child(4) {
                gap: 10px !important;
                margin-bottom: 8px !important;
            }
            .tutorial-card > div:last-child > div:nth-child(4) > span {
                font-size: 0.8rem !important;
            }
            .tutorial-card > div:last-child > a {
                font-size: 0.85rem !important;
            }
            .see-more-btn {
                font-size: 0.8rem !important;
            }
            .tutorial-play-overlay {
                width: 40px;
                height: 40px;
            }
            .tutorial-play-overlay svg {
                width: 18px;
                height: 18px;
            }
        }

        @media (max-width: 375px) {
            .tutorials-search-section {
                padding: 0 8px;
                margin-top: -10px;
                margin-bottom: 14px;
            }
            .tutorials-search-bar {
                padding: 12px 8px 10px 8px;
                border-radius: 6px;
            }
            .tutorials-search-bar-row {
                gap: 5px;
            }
            .tutorials-search-bar svg {
                width: 14px;
                height: 14px;
            }
            .tutorials-search-input {
                font-size: 0.85rem;
                padding: 6px 6px;
            }
            .tutorials-filter-label {
                font-size: 0.9rem;
            }
            .tutorials-filter-btn {
                font-size: 0.8rem;
                padding: 3px 8px;
            }
            .tutorials-list-section {
                padding: 0 8px 36px 8px;
            }
            .tutorials-list-title {
                font-size: 1rem;
            }
            .tutorials-grid {
                gap: 8px !important;
            }
            .tutorial-card {
                margin-bottom: 8px;
            }
            .tutorial-img, .tutorial-img-wrapper a {
                height: 100px !important;
            }
            .tutorial-card-content, .tutorial-card > div:last-child {
                padding: 10px 8px 8px 8px !important;
            }
            .tutorial-title {
                font-size: 0.9rem !important;
            }
            .tutorial-desc {
                font-size: 0.8rem !important;
            }
            .tutorial-card > div:last-child > div:nth-child(2) {
                font-size: 0.75rem !important;
                padding: 2px 8px !important;
            }
            .tutorial-card > div:last-child > div:nth-child(4) > span {
                font-size: 0.75rem !important;
            }
            .tutorial-card > div:last-child > a {
                font-size: 0.8rem !important;
            }
            .see-more-btn {
                font-size: 0.75rem !important;
            }
            .tutorial-play-overlay {
                width: 35px;
                height: 35px;
            }
            .tutorial-play-overlay svg {
                width: 16px;
                height: 16px;
            }
        }

        @media (max-width: 320px) {
            .tutorials-hero-title {
                font-size: 1.2rem;
            }
            .tutorials-hero-desc {
                font-size: 0.9rem;
            }
            .tutorials-list-section {
                padding: 0 6px 32px 6px;
            }
            .tutorials-grid {
                gap: 6px !important;
            }
            .tutorial-card {
                margin-bottom: 6px;
            }
            .tutorial-img, .tutorial-img-wrapper a {
                height: 90px !important;
            }
            .tutorial-card-content, .tutorial-card > div:last-child {
                padding: 8px 6px 6px 6px !important;
            }
            .tutorial-title {
                font-size: 0.85rem !important;
            }
            .tutorial-desc {
                font-size: 0.75rem !important;
            }
            .tutorial-card > div:last-child > div:nth-child(2) {
                font-size: 0.7rem !important;
            }
            .tutorial-card > div:last-child > a {
                font-size: 0.75rem !important;
            }
            .see-more-btn {
                font-size: 0.7rem !important;
            }
        }
        /* Mobile touch fixes */
        .tutorials-search-input, .tutorials-filter-btn, .tutorial-card, .tutorial-card a, .see-more-btn {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
            touch-action: manipulation;
            -webkit-touch-callout: none;
        }
        .tutorials-search-input {
            min-height: 44px;
            font-size: 16px !important; /* Prevents zoom on iOS */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .tutorials-filter-btn {
            min-height: 44px;
            min-width: 44px;
        }
        .tutorial-card {
            position: relative;
            z-index: 1;
        }
        .tutorial-card a {
            display: block;
            width: 100%;
            height: 100%;
        }
        .see-more-btn {
            min-height: 44px;
        }
        .tribe-btn-tutorial:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 6px rgba(41, 80, 36, 0.2);
        }
        .tribe-btn-tutorial:active {
            transform: translateY(0);
        }
        .tribe-btn-tutorial {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
            touch-action: manipulation;
            -webkit-touch-callout: none;
        }
        @media (max-width: 768px) {
            .mobile-menu-backdrop:not(.active) {
                display: none !important;
            }
            .mobile-menu-overlay:not(.active) {
                display: none !important;
            }
        }
        /* Tutorial Video Modal Styles */
        @keyframes fadeInModal { from { opacity: 0; backdrop-filter: blur(0); } to { opacity: 1; backdrop-filter: blur(4px); } }
        @keyframes scaleInModal { from { opacity: 0; transform: scale(0.9) translateY(-20px); } to { opacity: 1; transform: scale(1) translateY(0); } }
        .tutorial-video-modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(38,58,41,0.25);
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(4px);
            animation: fadeInModal 0.3s ease-out;
        }
        .tutorial-video-modal-content {
            background: #fff;
            border-radius: 16px;
            max-width: 90vw;
            max-height: 90vh;
            width: 1200px;
            padding: 24px;
            box-shadow: 0 12px 48px rgba(44,62,80,0.20);
            position: relative;
            animation: scaleInModal 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(227, 231, 223, 0.6);
            display: flex;
            flex-direction: column;
        }
        .tutorial-video-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e3e7df;
            position: relative;
            z-index: 10;
        }
        .tutorial-video-modal-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #263a29;
            font-family: 'Playfair Display', serif;
        }
        .tutorial-video-close-btn {
            background: none;
            border: none;
            font-size: 1.8rem;
            color: #6b7b5e;
            cursor: pointer;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: all 0.2s;
            padding: 0;
            margin: 0;
            line-height: 1;
            position: relative;
            z-index: 10;
            pointer-events: auto;
        }
        .tutorial-video-close-btn:hover {
            background: #e3e7df;
            color: #263a29;
            transform: scale(1.1);
        }
        .tutorial-video-close-btn:active {
            transform: scale(0.95);
        }
        .tutorial-video-iframe-container {
            width: 100%;
            position: relative;
            background: #000;
            border-radius: 8px;
            overflow: hidden;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
        }
        .tutorial-video-iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        .tutorial-video-fallback {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 16px;
            padding: 40px;
            text-align: center;
            color: #6b7b5e;
        }
        .tutorial-video-fallback a {
            color: #23a36d;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.2s;
        }
        .tutorial-video-fallback a:hover {
            background: #23a36d;
            color: #fff;
            text-decoration: none;
        }
        @media (max-width: 600px) {
            .tutorial-video-modal-content {
                max-width: 95vw;
                padding: 16px;
            }
            .tutorial-video-modal-title {
                font-size: 1.1rem;
            }
            .tutorial-video-iframe-container {
                padding-bottom: 56.25%; /* Maintain 16:9 on mobile */
            }
        }
    </style>
</head>
<body>
    @include('User.partials.navbar')
    @include('User.partials.hero_green', [
        'title' => 'Plant Use Tutorials',
        'desc' => 'Learn how to apply traditional plant knowledge with step-by-step tutorials approved by indigenous healers.'
    ])
    <div class="tutorials-search-section">
        <form class="tutorials-search-bar">
            <div class="tutorials-search-bar-row">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input class="tutorials-search-input" id="tutorial-search-input" type="text" placeholder="Search tutorials...">
            </div>
            <div class="tutorials-filters">
                <div class="tutorials-filter-group">
                    <span class="tutorials-filter-label">Categories</span>
                    <div class="tutorials-filter-options">
                        <button type="button" class="tutorials-filter-btn active" data-filter-type="category" data-category="All">All</button>
                        <button type="button" class="tutorials-filter-btn" data-filter-type="category" data-category="Pain Reliever">Pain Reliever</button>
                        <button type="button" class="tutorials-filter-btn" data-filter-type="category" data-category="Respiratory">Respiratory</button>
                        <button type="button" class="tutorials-filter-btn" data-filter-type="category" data-category="Fever">Fever</button>
                        <button type="button" class="tutorials-filter-btn" data-filter-type="category" data-category="Antibacterial">Antibacterial</button>
                        <button type="button" class="tutorials-filter-btn" data-filter-type="category" data-category="Antidiabetic">Antidiabetic</button>
                        <button type="button" class="tutorials-filter-btn" data-filter-type="category" data-category="Urination">Urination</button>
                        <button type="button" class="tutorials-filter-btn" data-filter-type="category" data-category="Antihypertensive">Antihypertensive</button>
                        <button type="button" class="tutorials-filter-btn" data-filter-type="category" data-category="Digestive">Digestive</button>
                        <button type="button" class="tutorials-filter-btn" data-filter-type="category" data-category="Anti-Parasite">Anti-Parasite</button>
                        <button type="button" class="tutorials-filter-btn" data-filter-type="category" data-category="Anti-inflammatory">Anti-inflammatory</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <section class="tutorials-list-section">
        <div class="tutorials-list-title" id="tutorial-count">{{ $tutorials->count() }} Tutorials Found</div>
        <div class="tutorials-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(340px,1fr));gap:32px;">
            @foreach($tutorials as $tutorial)
            <div class="tutorial-card" style="background:#fff;border-radius:12px;box-shadow:0 2px 12px rgba(44,62,80,0.08);overflow:hidden;display:flex;flex-direction:column;" 
                 data-categories="{{ strtolower($tutorial->category ?? '') }}"
                 data-title="{{ strtolower($tutorial->title ?? '') }}"
                 data-description="{{ strtolower($tutorial->description ?? '') }}">
                <div class="tutorial-img-wrapper" style="border-radius:0;">
                    <a href="#" class="tutorial-video-trigger" data-tutorial-link="{{ $tutorial->link }}" data-tutorial-link-tagakaulo="{{ $tutorial->link_tagakaulo ?? '' }}" data-tutorial-link-bagobo="{{ $tutorial->link_bagobo ?? '' }}" data-tutorial-title="{{ $tutorial->title }}" data-current-tribe="general" style="display:block;width:100%;height:160px;">
                        <img src="{{ $tutorial->image ? asset('storage/' . $tutorial->image) : 'https://via.placeholder.com/700x160?text=No+Image' }}" alt="{{ $tutorial->title }}" class="tutorial-img" style="width:100%;height:160px;object-fit:cover;border-radius:0;">
                        <div class="tutorial-play-overlay">
                            <svg fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                    </a>
                </div>
                <div style="padding:24px 24px 20px 24px;flex:1;display:flex;flex-direction:column;">
                    <div style="color:#295024;background:#eaf3ea;display:inline-block;padding:2px 14px;border-radius:12px;font-size:1rem;font-weight:600;margin-bottom:8px;width:max-content;">{{ $tutorial->category ?? 'Uncategorized' }}</div>
                    <div class="tutorial-title" style="font-family:'Playfair Display',serif;font-size:1.18rem;font-weight:700;color:#263a29;margin-bottom:6px;">{{ $tutorial->title }}</div>
                    <div class="tutorial-desc" style="color:#495742;font-size:1.05rem;margin-bottom:4px;" data-full-text="{{ $tutorial->description }}">{{ $tutorial->description }}</div>
                    <button class="see-more-btn" style="display:none;">See more</button>
                    <div style="display:flex;align-items:center;gap:18px;margin-bottom:14px;margin-top:10px;">
                        <span style="display:flex;align-items:center;gap:6px;color:#295024;font-size:1.01rem;"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6v6H9z"/></svg> {{ $tutorial->difficulty ?? 'N/A' }}</span>
                    </div>
                    <div style="margin-top:12px;">
                        <div style="display:flex; gap:8px; margin-bottom:8px; flex-wrap:wrap;">
                            <button class="tribe-btn-tutorial" data-tribe="general" onclick="showTutorialVideo('general', this)" style="background:#295024; color:#fff; border:none; border-radius:6px; padding:6px 14px; font-size:0.9rem; font-weight:600; cursor:pointer; transition:all 0.2s;">General</button>
                            <button class="tribe-btn-tutorial" data-tribe="tagakaulo" onclick="showTutorialVideo('tagakaulo', this)" style="background:#eaf3ea; color:#295024; border:2px solid #295024; border-radius:6px; padding:6px 14px; font-size:0.9rem; font-weight:600; cursor:pointer; transition:all 0.2s;">Tagakaulo</button>
                            <button class="tribe-btn-tutorial" data-tribe="bagobo" onclick="showTutorialVideo('bagobo', this)" style="background:#eaf3ea; color:#295024; border:2px solid #295024; border-radius:6px; padding:6px 14px; font-size:0.9rem; font-weight:600; cursor:pointer; transition:all 0.2s;">Bagobo</button>
                        </div>
                        <a href="#" class="tutorial-video-trigger" data-tutorial-link="{{ $tutorial->link }}" data-tutorial-link-tagakaulo="{{ $tutorial->link_tagakaulo ?? '' }}" data-tutorial-link-bagobo="{{ $tutorial->link_bagobo ?? '' }}" data-tutorial-title="{{ $tutorial->title }}" data-current-tribe="general" style="color:#295024;font-weight:600;text-decoration:none;display:inline-flex;align-items:center;gap:6px;font-size:1.05rem;cursor:pointer;">Learn more <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Footer Start -->
    <footer class="custom-footer">
        <div class="footer-container">
            <div class="footer-brand">
                <div class="footer-logo">
                    <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" width="32" height="32">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/>
                    </svg>
                    <span>IP Healers Academy</span>
                </div>
                <div class="footer-desc">
                    Preserving indigenous knowledge of ethnobotanical plants and healing practices for future generations through documentation and community engagement.
                </div>
                <div class="footer-socials">
                    <a href="#" aria-label="Instagram"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
                    <a href="#" aria-label="Facebook"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg></a>
                    <a href="#" aria-label="Twitter"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 01-3.14 1.53A4.48 4.48 0 0022.4.36a9.09 9.09 0 01-2.88 1.1A4.52 4.52 0 0016.11 0c-2.5 0-4.52 2.02-4.52 4.52 0 .35.04.7.11 1.03C7.69 5.4 4.07 3.7 1.64 1.15c-.38.65-.6 1.4-.6 2.2 0 1.52.77 2.86 1.95 3.65A4.48 4.48 0 01.96 6v.06c0 2.13 1.52 3.91 3.54 4.31-.37.1-.76.16-1.16.16-.28 0-.55-.03-.81-.08.55 1.72 2.16 2.97 4.07 3A9.05 9.05 0 010 19.54a12.8 12.8 0 006.92 2.03c8.3 0 12.85-6.88 12.85-12.85 0-.2 0-.41-.01-.61A9.22 9.22 0 0023 3z"/></svg></a>
                </div>
            </div>
            <div class="footer-links">
                <div class="footer-col">
                    <div class="footer-title">EXPLORE</div>
                    <a href="/plants">Plants</a>
                    <a href="/healers">Healers</a>
                    <a href="/tutorials">Tutorials</a>
                    <a href="/about">About Us</a>
                </div>
                <div class="footer-col">
                    <div class="footer-title">SUPPORT</div>
                    <a href="/feedback">Feedback</a>
                    <a href="/privacy">Privacy Policy</a>
                    <a href="/terms">Terms of Service</a>
                    <a href="/contact">Contact</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© 2025 IP Healers Academy. All rights reserved.</span>
            <span class="footer-made">Made with <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="vertical-align:middle;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21C12 21 4 13.5 4 8.5C4 5.42 6.42 3 9.5 3C11.24 3 12.91 3.81 14 5.08C15.09 3.81 16.76 3 18.5 3C21.58 3 24 5.42 24 8.5C24 13.5 16 21 16 21H12Z"/></svg> for indigenous knowledge preservation</span>
        </div>
    </footer>
    <style>
        .custom-footer {
            background: #495742;
            color: #e3e7df;
            font-family: 'Inter', Arial, sans-serif;
            padding-top: 36px;
            padding-bottom: 0;
            margin-top: 48px;
        }
        .footer-container {
            display: flex;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 4vw 24px 4vw;
            flex-wrap: wrap;
        }
        .footer-brand {
            max-width: 420px;
        }
        .footer-logo {
            display: flex;
            align-items: center;
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: #e3e7df;
            margin-bottom: 18px;
        }
        .footer-logo svg {
            color: #7fc47f;
            margin-right: 8px;
        }
        .footer-desc {
            font-size: 1.04rem;
            color: #c6d1c0;
            margin-bottom: 18px;
        }
        .footer-socials {
            display: flex;
            gap: 18px;
        }
        .footer-socials a svg {
            color: #b2c7b0;
            transition: color 0.2s;
        }
        .footer-socials a:hover svg {
            color: #7fc47f;
        }
        .footer-links {
            display: flex;
            gap: 64px;
        }
        .footer-col {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .footer-title {
            font-weight: 700;
            color: #fff;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }
        .footer-col a {
            color: #e3e7df;
            text-decoration: none;
            font-size: 1.04rem;
            transition: color 0.2s;
        }
        .footer-col a:hover {
            color: #7fc47f;
        }
        .footer-bottom {
            border-top: 1px solid #5e6b56;
            margin-top: 18px;
            padding: 18px 4vw 18px 4vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.01rem;
            color: #b2c7b0;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }
        .footer-made svg {
            color: #7fc47f;
            margin: 0 2px 0 2px;
        }
        @media (max-width: 900px) {
            .footer-container {
                flex-direction: column;
                gap: 32px;
            }
            .footer-links {
                gap: 32px;
            }
            .footer-bottom {
                flex-direction: column;
                gap: 8px;
                text-align: center;
            }
        }
        @media (max-width: 600px) {
            .footer-container {
                padding: 0 2vw 24px 2vw;
            }
            .footer-links {
                flex-direction: column;
                gap: 18px;
            }
        }
    </style>
    <!-- Footer End -->
    <script>
    (function(){
        function normalizeCategories(raw){
            if(!raw) return [];
            return raw.toString().toLowerCase().split(',').map(s=>s.trim()).filter(Boolean);
        }
        
        let currentCategory = 'All';
        let currentSearch = '';
        
        function updateTutorialCount() {
            const allCards = document.querySelectorAll('.tutorial-card');
            const visibleCount = Array.from(allCards).filter(card => {
                const display = card.style.display || getComputedStyle(card).display;
                return display !== 'none';
            }).length;
            
            const countElement = document.getElementById('tutorial-count');
            if (countElement) {
                countElement.textContent = visibleCount + ' Tutorial' + (visibleCount !== 1 ? 's' : '') + ' Found';
            }
        }
        
        function getCardText(card) {
            const title = card.dataset.title || '';
            const desc = card.dataset.description || '';
            const category = card.dataset.categories || '';
            return (title + ' ' + desc + ' ' + category).toLowerCase();
        }
        
        function filterByCategory(category){
            currentCategory = category;
            applyFilters();
        }
        
        function searchTutorials(searchTerm){
            currentSearch = searchTerm.toLowerCase();
            applyFilters();
        }
        
        function applyFilters(){
            const allCards = document.querySelectorAll('.tutorial-card');
            const catLower = (currentCategory || 'All').toString().toLowerCase();
            
            allCards.forEach(card=>{
                // First check category filter
                let visible = true;
                if(catLower !== 'all'){
                    const cardCats = normalizeCategories(card.dataset.categories);
                    visible = cardCats.includes(catLower);
                }
                
                // Then check search filter
                if(visible && currentSearch){
                    const cardText = getCardText(card);
                    visible = cardText.includes(currentSearch);
                }
                
                card.style.display = visible ? '' : 'none';
            });
            
            updateTutorialCount();
        }
        
        // Category filter buttons
        const catButtons = document.querySelectorAll('.tutorials-filter-btn[data-filter-type="category"]');
        if(catButtons.length){
            catButtons.forEach(btn=>{
                btn.addEventListener('click', function(){
                    catButtons.forEach(b=>b.classList.remove('active'));
                    this.classList.add('active');
                    const selected = this.dataset.category || 'All';
                    filterByCategory(selected);
                });
            });
        }
        
        // Search input
        const searchInput = document.getElementById('tutorial-search-input');
        if(searchInput){
            searchInput.addEventListener('input', function(){
                searchTutorials(this.value);
            });
        }
        
        // Initialize count on page load
        updateTutorialCount();
    })();

    // See more/less functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tutorialCards = document.querySelectorAll('.tutorial-card');
        
        tutorialCards.forEach(card => {
            const desc = card.querySelector('.tutorial-desc');
            const seeMoreBtn = card.querySelector('.see-more-btn');
            
            if (desc && seeMoreBtn) {
                // Check if description is truncated
                const lineHeight = parseFloat(getComputedStyle(desc).lineHeight);
                const maxHeight = lineHeight * 2; // 2 lines
                
                // Use a small delay to ensure rendering is complete
                setTimeout(() => {
                    if (desc.scrollHeight > maxHeight + 5) {
                        seeMoreBtn.style.display = 'inline-block';
                    }
                }, 100);
                
                // Toggle description
                seeMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    if (desc.classList.contains('expanded')) {
                        desc.classList.remove('expanded');
                        seeMoreBtn.textContent = 'See more';
                    } else {
                        desc.classList.add('expanded');
                        seeMoreBtn.textContent = 'See less';
                    }
                });
            }
        });
    });

    // Tutorial Video Modal Functionality
    function convertToEmbedUrl(url) {
        if (!url) return null;
        
        // YouTube URL patterns
        const youtubeRegex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
        const youtubeMatch = url.match(youtubeRegex);
        if (youtubeMatch) {
            return {
                url: 'https://www.youtube.com/embed/' + youtubeMatch[1] + '?autoplay=1&rel=0',
                type: 'youtube',
                embeddable: true
            };
        }
        
        // Vimeo URL patterns
        const vimeoRegex = /(?:vimeo\.com\/)(?:.*\/)?(\d+)/;
        const vimeoMatch = url.match(vimeoRegex);
        if (vimeoMatch) {
            return {
                url: 'https://player.vimeo.com/video/' + vimeoMatch[1] + '?autoplay=1',
                type: 'vimeo',
                embeddable: true
            };
        }
        
        // Direct video file (mp4, webm, ogg)
        if (/\.(mp4|webm|ogg|mov|avi)(\?.*)?$/i.test(url)) {
            return {
                url: url,
                type: 'direct',
                embeddable: true
            };
        }
        
        // If it's already an embed URL, return as is
        if (url.includes('/embed/') || url.includes('iframe')) {
            return {
                url: url,
                type: 'embed',
                embeddable: true
            };
        }
        
        // Generic URL - likely a webpage, not directly embeddable
        return {
            url: url,
            type: 'generic',
            embeddable: false
        };
    }
    
    function openTutorialVideoModal(link, title) {
        const modal = document.getElementById('tutorialVideoModal');
        const iframeContainer = document.getElementById('tutorialVideoIframeContainer');
        const iframe = document.getElementById('tutorialVideoIframe');
        const fallback = document.getElementById('tutorialVideoFallback');
        const modalTitle = document.getElementById('tutorialVideoModalTitle');
        
        modalTitle.textContent = title || 'Tutorial Video';
        
        const embedInfo = convertToEmbedUrl(link);
        
        // Reset iframe
        iframe.src = '';
        iframe.style.display = 'none';
        fallback.style.display = 'none';
        
        if (embedInfo && embedInfo.embeddable) {
            // Try to embed the video
            iframe.src = embedInfo.url;
            iframe.style.display = 'block';
            
            // Monitor iframe load errors
            let loadTimeout;
            const checkIframeLoad = () => {
                try {
                    // Try to access iframe content (will throw error if blocked)
                    const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;
                    // If we can access it, it loaded successfully
                    clearTimeout(loadTimeout);
                } catch (e) {
                    // Cross-origin error is expected and normal for YouTube/Vimeo
                    // This means the iframe is loading
                    clearTimeout(loadTimeout);
                }
            };
            
            // Check if iframe loads or if it's blocked
            iframe.onload = function() {
                clearTimeout(loadTimeout);
                // Check for common blocking indicators
                try {
                    // If we can access content, it's not blocked
                    checkIframeLoad();
                } catch (e) {
                    // Cross-origin is normal, means it's loading
                }
            };
            
            // Fallback: if iframe fails to load after 3 seconds, show fallback
            loadTimeout = setTimeout(() => {
                // Double check - if iframe is still not displaying properly
                if (iframe.style.display === 'block') {
                    // Give it one more chance, then show fallback if needed
                    setTimeout(() => {
                        // If still no content, might be blocked
                        // Keep trying, but this is a safeguard
                    }, 1000);
                }
            }, 3000);
            
            // Error handler for iframe
            iframe.onerror = function() {
                clearTimeout(loadTimeout);
                // Iframe failed to load - show fallback
                iframe.style.display = 'none';
                fallback.style.display = 'flex';
                const fallbackLink = fallback.querySelector('a');
                if (fallbackLink) {
                    fallbackLink.href = link;
                    fallbackLink.textContent = 'Open Video in New Tab';
                }
            };
        } else {
            // Not embeddable - show fallback immediately
            iframe.style.display = 'none';
            fallback.style.display = 'flex';
            const fallbackLink = fallback.querySelector('a');
            if (fallbackLink) {
                fallbackLink.href = link;
                fallbackLink.textContent = 'Open Video in New Tab';
            }
        }
        
        modal.style.display = 'flex';
    }
    
    function closeTutorialVideoModal() {
        const modal = document.getElementById('tutorialVideoModal');
        const iframe = document.getElementById('tutorialVideoIframe');
        modal.style.display = 'none';
        // Stop video playback by clearing src
        iframe.src = '';
    }
    
    // Function to show tutorial video based on selected tribe
    function showTutorialVideo(tribe, button) {
        // Find the tutorial card containing this button
        const card = button.closest('.tutorial-card');
        const triggerLinks = card.querySelectorAll('.tutorial-video-trigger');
        triggerLinks.forEach(triggerLink => {
            // Update current tribe attribute
            triggerLink.setAttribute('data-current-tribe', tribe);
        });
        
        // Update all tribe buttons in this card
        const allButtons = card.querySelectorAll('.tribe-btn-tutorial');
        allButtons.forEach(btn => {
            const btnTribe = btn.getAttribute('data-tribe');
            if (btnTribe === tribe) {
                btn.style.background = '#295024';
                btn.style.color = '#fff';
                btn.style.border = '2px solid #295024';
            } else {
                btn.style.background = '#eaf3ea';
                btn.style.color = '#295024';
                btn.style.border = '2px solid #295024';
            }
        });
    }
    
    // Initialize tribe buttons on page load
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.tutorial-card').forEach(card => {
            const buttons = card.querySelectorAll('.tribe-btn-tutorial');
            buttons.forEach(btn => {
                const tribe = btn.getAttribute('data-tribe');
                if (tribe === 'general') {
                    btn.style.background = '#295024';
                    btn.style.color = '#fff';
                    btn.style.border = '2px solid #295024';
                }
            });
        });
    });
    
    // Handle tutorial link clicks
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('tutorial-video-trigger') || e.target.closest('.tutorial-video-trigger')) {
            e.preventDefault();
            e.stopPropagation();
            const link = e.target.closest('.tutorial-video-trigger') || e.target;
            const currentTribe = link.getAttribute('data-current-tribe') || 'general';
            
            // Get the appropriate link based on selected tribe
            let tutorialLink;
            if (currentTribe === 'tagakaulo') {
                tutorialLink = link.getAttribute('data-tutorial-link-tagakaulo') || link.getAttribute('data-tutorial-link');
            } else if (currentTribe === 'bagobo') {
                tutorialLink = link.getAttribute('data-tutorial-link-bagobo') || link.getAttribute('data-tutorial-link');
            } else {
                tutorialLink = link.getAttribute('data-tutorial-link');
            }
            
            const tutorialTitle = link.getAttribute('data-tutorial-title');
            if (tutorialLink) {
                openTutorialVideoModal(tutorialLink, tutorialTitle);
            }
        }
    });
    
    // Close modal handlers - use event delegation to ensure it works
    document.addEventListener('click', function(e) {
        // Close button click
        if (e.target && (e.target.id === 'closeTutorialVideoModal' || e.target.closest('#closeTutorialVideoModal'))) {
            e.preventDefault();
            e.stopPropagation();
            closeTutorialVideoModal();
        }
    });
    
    // Close modal when clicking backdrop (but not on modal content)
    document.addEventListener('click', function(e) {
        const videoModal = document.getElementById('tutorialVideoModal');
        const modalContent = videoModal ? videoModal.querySelector('.tutorial-video-modal-content') : null;
        if (videoModal && e.target === videoModal && !modalContent?.contains(e.target)) {
            closeTutorialVideoModal();
        }
    });
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('tutorialVideoModal');
            if (modal && modal.style.display === 'flex') {
                closeTutorialVideoModal();
            }
        }
    });
    </script>
    <!-- Tutorial Video Modal -->
    <div class="tutorial-video-modal" id="tutorialVideoModal">
        <div class="tutorial-video-modal-content">
            <div class="tutorial-video-modal-header">
                <div class="tutorial-video-modal-title" id="tutorialVideoModalTitle">Tutorial Video</div>
                <button type="button" class="tutorial-video-close-btn" id="closeTutorialVideoModal">&times;</button>
            </div>
            <div class="tutorial-video-iframe-container" id="tutorialVideoIframeContainer">
                <iframe id="tutorialVideoIframe" class="tutorial-video-iframe" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <div class="tutorial-video-fallback" id="tutorialVideoFallback" style="display: none;">
                    <svg width="64" height="64" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                        <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div style="margin-bottom: 8px; font-weight: 600; color: #263a29;">Video Cannot Be Embedded</div>
                    <div style="margin-bottom: 16px; max-width: 500px; line-height: 1.6;">
                        This video URL cannot be embedded in an iframe. Common reasons include:
                        <ul style="text-align: left; margin: 12px 0; padding-left: 24px;">
                            <li>The website blocks iframe embedding (X-Frame-Options header)</li>
                            <li>The URL is a webpage, not a direct video file or embed URL</li>
                            <li>Embedding is restricted by the video platform</li>
                        </ul>
                    </div>
                    <a href="#" target="_blank" style="color:#23a36d;text-decoration:none;font-weight:600;font-size:1.1rem;padding:12px 24px;border:2px solid #23a36d;border-radius:8px;display:inline-block;transition:all 0.2s;">Open Video in New Tab</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>