<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Indigenous Healers</title>
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
        .healers-hero {
            background: linear-gradient(rgba(45,90,39,0.85), rgba(45,90,39,0.85)), #2d5a27;
            color: #fff;
            padding: 56px 0 48px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .healers-hero::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 80px;
            background: linear-gradient(to bottom, rgba(45,90,39,0) 0%, #f7f8f5 100%);
            pointer-events: none;
        }
        .healers-hero-icon {
            position: absolute;
            left: 50%;
            top: 32px;
            transform: translateX(-50%);
            background: #eaf3ea;
            border-radius: 50%;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .healers-hero-icon svg {
            width: 32px;
            height: 32px;
            color: #4b7942;
        }
        .healers-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.3rem;
            font-weight: 700;
            margin-bottom: 12px;
            margin-top: 32px;
        }
        .healers-hero-desc {
            font-size: 1.18rem;
            color: #e3e7df;
            margin-bottom: 0;
            font-weight: 400;
        }
        .healers-search-section {
            margin-top: 24px;
            margin-bottom: 32px;
            padding: 0 24px;
        }
        .healers-search-wrapper {
            max-width: 900px;
            margin: 0 auto;
        }
        .healers-search-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }
        .healers-search-bar {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.08);
            width: 100%;
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .healers-search-bar svg {
            color: #b2c7b0;
            width: 22px;
            height: 22px;
            flex-shrink: 0;
        }
        .healers-search-input {
            flex: 1;
            padding: 10px 16px;
            border: none;
            background: none;
            font-size: 1.1rem;
            color: #263a29;
            outline: none;
        }
        .healers-search-actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }
        .healers-toggle-btn {
            background: #fff;
            border: 2px solid #dbe7d0;
            color: #495742;
            border-radius: 6px;
            padding: 8px 18px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s, border 0.2s, color 0.2s;
            white-space: nowrap;
        }
        .healers-toggle-btn.active, .healers-toggle-btn:hover {
            background: #eaf3ea;
            border-color: #b2c7b0;
            color: #263a29;
        }

        /* Responsive Search Section */
        @media (max-width: 768px) {
            .healers-search-section {
                padding: 0 16px;
            }
            .healers-search-bar {
                padding: 14px 16px;
            }
            .healers-search-input {
                font-size: 1rem;
                padding: 8px 12px;
            }
            .healers-search-actions {
                width: 100%;
            }
            .healers-toggle-btn {
                flex: 1;
                justify-content: center;
                display: flex;
                align-items: center;
            }
        }

        @media (max-width: 480px) {
            .healers-search-section {
                padding: 0 12px;
            }
            .healers-search-bar {
                padding: 12px;
            }
            .healers-search-input {
                font-size: 0.95rem;
                padding: 6px 8px;
            }
            .healers-toggle-btn {
                padding: 8px 12px;
                font-size: 0.9rem;
            }
        }
        .healers-list-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px 48px 24px;
        }
        .healers-list-title {
            font-size: 1.25rem;
            color: #263a29;
            font-weight: 600;
            margin-bottom: 18px;
        }
        .healers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
            align-items: stretch;
        }
        .healers-map {
            display: none;
            height: 600px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(44, 62, 80, 0.10);
        }
        .healers-map.active {
            display: block;
        }
        .healers-grid.hidden {
            display: none;
        }
        #map {
            width: 100%;
            height: 100%;
            border-radius: 16px;
        }
        .map-marker {
            background: #2d5a27;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(45, 90, 39, 0.3);
            cursor: pointer;
            transition: transform 0.2s;
        }
        .map-marker:hover {
            transform: scale(1.05);
        }
        .healer-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(44, 62, 80, 0.10);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            position: relative;
            border: 1.5px solid #e3e7df;
        }
        .healer-img-wrap {
            position: relative;
        }
        .healer-img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            background: #e3e7df;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }
        .healer-overlay {
            position: absolute;
            left: 0; right: 0; bottom: 0; top: 0;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 0 0 18px 18px;
            background: linear-gradient(0deg, rgba(44,62,80,0.45) 60%, rgba(255,255,255,0) 100%);
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
        }
        .healer-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 2px;
            text-shadow: 0 2px 8px rgba(44,62,80,0.25);
        }
        .healer-location {
            color: #e3e7df;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
            gap: 6px;
            text-shadow: 0 2px 8px rgba(44,62,80,0.18);
        }
        .healer-card-details {
            background: #fff;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
            padding: 18px 20px 20px 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
        }
        .healer-specialty {
            color: #295024;
            font-size: 1.08rem;
            font-weight: 600;
            margin-bottom: 2px;
        }
        .healer-info-row {
            display: flex;
            align-items: center;
            font-size: 1.01rem;
            color: #263a29;
            margin-bottom: 2px;
            gap: 6px;
        }
        .healer-info-label {
            color: #6b7b5e;
            margin-right: 2px;
        }
        .healer-info-value {
            font-weight: 500;
        }
        .healer-profile-btn {
            background: #2d5a27;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 8px 28px;
            font-size: 1rem;
            font-weight: 600;
            margin-top: auto;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s;
        }
        .healer-profile-btn svg {
            width: 18px;
            height: 18px;
        }
        .healer-profile-btn:hover {
            background: #24481f;
        }
        /* Responsive Hero Section */
        @media (max-width: 768px) {
            .healers-hero {
                padding: 48px 0 40px 0;
            }
            .healers-hero-icon {
                width: 56px;
                height: 56px;
                top: 24px;
            }
            .healers-hero-icon svg {
                width: 28px;
                height: 28px;
            }
            .healers-hero-title {
                font-size: 2rem;
                margin-top: 24px;
            }
            .healers-hero-desc {
                font-size: 1.1rem;
                padding: 0 16px;
            }
        }

        @media (max-width: 480px) {
            .healers-hero {
                padding: 40px 0 32px 0;
            }
            .healers-hero-icon {
                width: 48px;
                height: 48px;
                top: 20px;
            }
            .healers-hero-icon svg {
                width: 24px;
                height: 24px;
            }
            .healers-hero-title {
                font-size: 1.6rem;
                margin-top: 20px;
            }
            .healers-hero-desc {
                font-size: 1rem;
                padding: 0 12px;
            }
        }

        /* Responsive List Section */
        @media (max-width: 900px) {
            .healers-list-section {
                padding: 0 16px 48px 16px;
            }
            .healers-grid {
                grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 600px) {
            .healers-list-section {
                padding: 0 12px 48px 12px;
            }
            .healers-list-title {
                font-size: 1.1rem;
            }
            .healers-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
            .healers-map {
                height: 400px;
            }
            .healer-img {
                height: 140px;
            }
            .healer-card-details {
                padding: 14px 12px 16px 12px;
            }
        }

        @media (max-width: 480px) {
            .healers-grid {
                gap: 10px;
            }
            .healer-card {
                border-radius: 12px;
            }
            .healer-img {
                height: 120px;
            }
            .healer-card-details {
                padding: 12px 10px 14px 10px;
            }
            .healer-name {
                font-size: 1.05rem;
            }
            .healer-location {
                font-size: 0.9rem;
            }
            .healer-overlay {
                padding: 0 0 12px 12px;
            }
            .healer-specialty {
                font-size: 0.95rem;
            }
            .healer-info-row {
                font-size: 0.85rem;
            }
            .healer-info-row svg {
                width: 15px;
                height: 15px;
            }
            .healer-profile-btn {
                padding: 6px 12px;
                font-size: 0.85rem;
                margin-top: 6px;
            }
            .healer-profile-btn svg {
                width: 15px;
                height: 15px;
            }
        }

        @media (max-width: 375px) {
            .healers-grid {
                gap: 8px;
            }
            .healer-img {
                height: 110px;
            }
            .healer-card-details {
                padding: 10px 8px 12px 8px;
            }
            .healer-name {
                font-size: 1rem;
            }
            .healer-location {
                font-size: 0.85rem;
            }
            .healer-specialty {
                font-size: 0.9rem;
            }
            .healer-info-row {
                font-size: 0.8rem;
            }
            .healer-profile-btn {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 320px) {
            .healers-grid {
                gap: 6px;
            }
            .healer-img {
                height: 100px;
            }
            .healer-name {
                font-size: 0.95rem;
            }
            .healer-location {
                font-size: 0.8rem;
            }
            .healer-specialty {
                font-size: 0.85rem;
            }
            .healer-info-row {
                font-size: 0.75rem;
            }
        }
        /* Mobile touch fixes */
        .healers-search-input, .healer-card, .healer-card a {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
            touch-action: manipulation;
            -webkit-touch-callout: none;
        }
        .healers-search-input {
            min-height: 44px;
            font-size: 16px !important; /* Prevents zoom on iOS */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .healer-card {
            position: relative;
            z-index: 1;
        }
        .healer-card a {
            display: block;
            width: 100%;
            height: 100%;
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
        'title' => 'Indigenous Healers',
        'desc' => 'Discover traditional healers from around the world who are preserving ethnobotanical knowledge and practices for future generations.'
    ])
    <div class="healers-search-section">
        <div class="healers-search-wrapper">
            <div class="healers-search-container">
                <div style="position:relative;">
                    <form class="healers-search-bar" method="GET" action="{{ route('healers') }}" autocomplete="off" data-search-url="{{ route('healers.search') }}">
                        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        <input class="healers-search-input" type="text" name="search" id="healer-search-input" value="{{ request('search') }}" placeholder="Search healers by name, location, or specialty...">
                    </form>
                    <ul id="healer-suggestions" style="position:absolute; left:0; right:0; background:#fff; z-index:10; list-style:none; margin:0; padding:0; border-radius:0 0 10px 10px; box-shadow:0 2px 8px rgba(44,62,80,0.08); display:none;"></ul>
                </div>
                <div class="healers-search-actions">
                    <button type="button" class="healers-toggle-btn active">Grid</button>
                    <button type="button" class="healers-toggle-btn">Map</button>
                </div>
            </div>
        </div>
    </div>
    <section class="healers-list-section">
        <div class="healers-list-title">{{ $healers->count() }} Healers Found</div>
        
        <!-- Grid View -->
        <div class="healers-grid" id="healers-grid">
            @forelse($healers as $healer)
                <div class="healer-card">
                    <div class="healer-img-wrap">
                        <img class="healer-img" src="{{ $healer->image ? asset('storage/' . $healer->image) : 'https://via.placeholder.com/400x170?text=No+Image' }}" alt="{{ $healer->healer_name }}">
                        <div class="healer-overlay">
                            <div class="healer-name">{{ $healer->healer_name }}</div>
                            <div class="healer-location"><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/></svg> {{ $healer->location }}</div>
                        </div>
                    </div>
                    <div class="healer-card-details">
                        <div class="healer-specialty"><b>{{ $healer->specialization }}</b></div>
                        <div class="healer-info-row"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="10" r="3"/><path d="M12 2a8 8 0 018 8c0 7-8 12-8 12S4 17 4 10a8 8 0 018-8z"/></svg> <span class="healer-info-label">Ethnic Group:</span> <span class="healer-info-value">{{ $healer->ethnic_group }}</span></div>
                        <div class="healer-info-row"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg> <span class="healer-info-label">Specialization:</span> <span class="healer-info-value">{{ $healer->specialization }}</span></div>
                        <div class="healer-info-row"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/></svg> <span class="healer-info-label">Location:</span> <span class="healer-info-value">{{ $healer->location }}</span></div>
                        <a href="{{ route('healers.show', ['id' => $healer->id]) }}" class="healer-profile-btn" style="text-decoration: none; justify-content: center; box-sizing: border-box;">
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> View Profile
                        </a>
                    </div>
                </div>
            @empty
                <div>No healers found.</div>
            @endforelse
        </div>
        
        <!-- Map View -->
        <div class="healers-map" id="healers-map">
            <div id="map"></div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCEKtZSczA8iiWRrskKx_5BQurBrXAbdWA&callback=initMap" async defer></script>
    <script id="healers-data-json" type="application/json">
        {!! json_encode($healers) !!}
    </script>
    <script>
    let map;
    let markers = [];
    let healersData = JSON.parse(document.getElementById('healers-data-json').textContent);

    function initMap() {
        // Initialize Google Map
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 20, lng: 0 },
            zoom: 2,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: true
        });

        addHealerMarkers();
    }

    function addHealerMarkers() {
        // Clear existing markers
        markers.forEach(function(marker) { marker.setMap(null); });
        markers = [];

        // Filter healers with valid coordinates
        const healersWithCoords = healersData.filter(function(healer) {
            return healer.latitude && healer.longitude &&
                !isNaN(parseFloat(healer.latitude)) && !isNaN(parseFloat(healer.longitude));
        });

        const bounds = new google.maps.LatLngBounds();
        const infoWindow = new google.maps.InfoWindow();

        healersWithCoords.forEach(function(healer) {
            const lat = parseFloat(healer.latitude);
            const lng = parseFloat(healer.longitude);

            if (lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
                const position = { lat: lat, lng: lng };

                const marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    icon: 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                    title: healer.healer_name
                });

                const popupContent = `
                    <div style="padding: 8px; max-width: 250px;">
                        <h3 style="margin: 0 0 8px 0; color: #2d5a27; font-family: 'Playfair Display', serif;">${healer.healer_name}</h3>
                        <p style="margin: 0 0 4px 0; color: #6b7b5e; font-size: 14px;"><strong>Specialization:</strong> ${healer.specialization || 'Not specified'}</p>
                        <p style="margin: 0 0 4px 0; color: #6b7b5e; font-size: 14px;"><strong>Location:</strong> ${healer.location || 'Not specified'}</p>
                        <p style="margin: 0 0 8px 0; color: #6b7b5e; font-size: 14px;"><strong>Ethnic Group:</strong> ${healer.ethnic_group || 'Not specified'}</p>
                        <a href="/healers/${healer.id}" style="display: inline-block; background: #2d5a27; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 12px;">View Profile</a>
                    </div>
                `;

                marker.addListener('click', function() {
                    infoWindow.setContent(popupContent);
                    infoWindow.open(map, marker);
                });

                markers.push(marker);
                bounds.extend(position);
            }
        });

        // Update the title to show how many healers are on the map
        const titleElement = document.querySelector('.healers-list-title');
        if (titleElement) {
            const totalHealers = healersData.length;
            const mappedHealers = healersWithCoords.length;
            if (mappedHealers < totalHealers) {
                titleElement.textContent = `${totalHealers} Healers Found (${mappedHealers} with location data)`;
            } else {
                titleElement.textContent = `${totalHealers} Healers Found`;
            }
        }

        // Fit map to show all markers
        if (markers.length > 0) {
            map.fitBounds(bounds);
        } else {
            // Default view if no markers
            map.setCenter({ lat: 20, lng: 0 });
            map.setZoom(2);
        }
    }

    $(function() {
        var $input = $('#healer-search-input');
        var $suggestions = $('#healer-suggestions');
        var $gridView = $('#healers-grid');
        var $mapView = $('#healers-map');
        var $gridBtn = $('.healers-toggle-btn').first();
        var $mapBtn = $('.healers-toggle-btn').last();

        // Toggle between grid and map view
        $gridBtn.on('click', function() {
            $gridBtn.addClass('active');
            $mapBtn.removeClass('active');
            $gridView.removeClass('hidden');
            $mapView.removeClass('active');
        });

        $mapBtn.on('click', function() {
            $mapBtn.addClass('active');
            $gridBtn.removeClass('active');
            $gridView.addClass('hidden');
            $mapView.addClass('active');
            
            // Initialize map if not already done
            if (!map) {
                setTimeout(initMap, 100);
            }
        });

        // Search functionality
        $input.on('input', function() {
            var query = $(this).val();
            if (query.length < 2) {
                $suggestions.hide();
                return;
            }
            var searchUrl = $('.healers-search-bar').data('search-url');
            $.get(searchUrl, {q: query}, function(data) {
                $suggestions.empty();
                if (data.length === 0) {
                    $suggestions.hide();
                    return;
                }
                data.forEach(function(healer) {
                    $suggestions.append('<li style="padding:8px 16px; cursor:pointer;" data-name="'+healer.healer_name+'">'+healer.healer_name+'</li>');
                });
                $suggestions.show();
            });
        });

        $suggestions.on('click', 'li', function() {
            $input.val($(this).data('name'));
            $suggestions.hide();
            $input.closest('form').submit();
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('#healer-search-input, #healer-suggestions').length) {
                $suggestions.hide();
            }
        });
    });
    </script>
</body>
</html> 