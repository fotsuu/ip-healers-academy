<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Ethnobotanical Plants</title>
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
        .plants-hero {
            background: linear-gradient(rgba(45,90,39,0.85), rgba(45,90,39,0.85)), #2d5a27;
            color: #fff;
            padding: 56px 0 48px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .plants-hero::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 80px;
            background: linear-gradient(to bottom, rgba(22,163,74,0) 0%, #f7f8f5 100%);
            pointer-events: none;
        }
        .plants-hero-icon {
            background: #eaf3ea;
            border-radius: 50%;
            width: 64px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 18px auto;
        }
        .plants-hero-icon svg {
            width: 32px;
            height: 32px;
            color: #4b7942;
        }
        .plants-hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.3rem;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .plants-hero-desc {
            font-size: 1.18rem;
            color: #e3e7df;
            margin-bottom: 0;
            font-weight: 400;
        }
        .plants-search-section {
            margin-top: -32px;
            margin-bottom: 32px;
            display: flex;
            justify-content: center;
            width: 100%;
            padding: 0 24px;
            box-sizing: border-box;
        }
        .plants-search-bar {
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
        .plants-search-bar-row {
            display: flex;
            width: 100%;
            align-items: center;
            gap: 12px;
            box-sizing: border-box;
        }
        .plants-search-bar svg {
            color: #b2c7b0;
            width: 22px;
            height: 22px;
            flex-shrink: 0;
        }
        .plants-search-input {
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
        .plants-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
        }
        .plants-filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .plants-filter-label {
            font-weight: 600;
            color: #495742;
            font-size: 1.05rem;
        }
        .plants-filter-options {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .plants-filter-btn {
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
        .plants-filter-btn.active, .plants-filter-btn:hover {
            background: #295024;
            color: #fff;
        }
        .plants-list-section {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px 48px 24px;
        }
        .plants-list-title {
            font-size: 1.25rem;
            color: #263a29;
            font-weight: 600;
            margin-bottom: 18px;
        }
        .plants-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 28px;
        }
        .plant-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(44, 62, 80, 0.10);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 370px;
            position: relative;
            border: 1.5px solid #e3e7df;
        }
        .plant-img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            background: #e3e7df;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            display: block;
        }
        .plant-card-content {
            padding: 18px 20px 16px 20px;
            flex: 1 1 auto;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            background: #fff;
        }
        .plant-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.18rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 2px;
        }
        .plant-scientific {
            font-style: italic;
            color: #6b7b5e;
            font-size: 1.02rem;
            margin-bottom: 10px;
        }
        .plant-info-row {
            display: flex;
            align-items: center;
            font-size: 1.01rem;
            color: #263a29;
            margin-bottom: 4px;
        }
        .plant-info-row svg {
            width: 18px;
            height: 18px;
            color: #4b7942;
            margin-right: 6px;
        }
        .plant-info-label {
            color: #6b7b5e;
            margin-right: 4px;
        }
        .plant-info-value {
            font-weight: 500;
        }
        .plant-details-btn {
            background: #166534;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            font-size: 0.82rem;
            font-weight: 600;
            margin-top: 12px;
            cursor: pointer;
            transition: background 0.2s, box-shadow 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            box-shadow: 0 1px 3px rgba(44, 62, 80, 0.08);
            align-self: center;
            width: auto;
            text-decoration: none;
        }
        .plant-details-btn:hover {
            background: #14532d;
        }
        .plant-details-btn svg {
            width: 15px;
            height: 15px;
        }
        .plant-type {
            position: absolute;
            top: 14px;
            right: 14px;
            background: #386a33;
            color: #fff;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 16px;
            padding: 4px 16px;
            z-index: 2;
        }
        .plant-categories {
            position: absolute;
            top: 14px;
            right: 14px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            z-index: 2;
        }
        .plant-categories .plant-type {
            position: static;
            font-size: 0.9rem;
            padding: 3px 12px;
        }
        /* Responsive Hero Section */
        @media (max-width: 768px) {
            .plants-hero {
                padding: 48px 0 40px 0;
            }
            .plants-hero-icon {
                width: 56px;
                height: 56px;
            }
            .plants-hero-icon svg {
                width: 28px;
                height: 28px;
            }
            .plants-hero-title {
                font-size: 2rem;
                padding: 0 16px;
            }
            .plants-hero-desc {
                font-size: 1.1rem;
                padding: 0 16px;
            }
        }

        @media (max-width: 900px) {
            .plants-list-section {
                padding: 0 24px 48px 24px;
            }
        }

        @media (max-width: 768px) {
            .plants-search-section {
                padding: 0 16px;
                margin-top: -20px;
                margin-bottom: 24px;
            }
            .plants-search-bar {
                padding: 20px 16px 16px 16px;
                border-radius: 8px;
            }
            .plants-search-bar-row {
                gap: 10px;
            }
            .plants-search-bar svg {
                width: 20px;
                height: 20px;
            }
            .plants-search-input {
                font-size: 1rem;
                padding: 10px 12px;
            }
            .plants-filters {
                gap: 18px;
            }
            .plants-filter-options {
                gap: 8px;
            }
            .plants-filter-btn {
                font-size: 0.95rem;
                padding: 5px 14px;
            }
            .plants-list-section {
                padding: 0 16px 48px 16px;
            }
            .plants-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
            }
            .plant-card {
                min-height: auto;
            }
            .plant-img {
                height: 150px;
            }
            .plant-name {
                font-size: 1.08rem;
            }
            .plant-scientific {
                font-size: 0.95rem;
            }
            .plant-info-row {
                font-size: 0.95rem;
            }
            .plant-type {
                font-size: 0.85rem;
                padding: 3px 10px;
            }
            .plant-categories .plant-type {
                font-size: 0.8rem;
                padding: 2px 8px;
            }
        }

        @media (max-width: 600px) {
            .plants-search-section {
                padding: 0 12px;
                margin-top: -16px;
                margin-bottom: 20px;
            }
            .plants-search-bar {
                padding: 16px 12px 14px 12px;
                border-radius: 8px;
            }
            .plants-search-bar-row {
                gap: 8px;
            }
            .plants-search-bar svg {
                width: 18px;
                height: 18px;
            }
            .plants-search-input {
                font-size: 0.95rem;
                padding: 8px 10px;
            }
            .plants-list-section {
                padding: 0 12px 48px 12px;
            }
            .plants-grid {
                gap: 12px;
            }
            .plant-img {
                height: 130px;
            }
            .plant-name {
                font-size: 1rem;
            }
            .plant-scientific {
                font-size: 0.9rem;
            }
            .plant-info-row {
                font-size: 0.9rem;
            }
            .plants-hero-title {
                font-size: 1.6rem;
            }
            .plants-hero-desc {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .plants-hero {
                padding: 40px 0 32px 0;
            }
            .plants-hero-icon {
                width: 48px;
                height: 48px;
            }
            .plants-hero-icon svg {
                width: 24px;
                height: 24px;
            }
            .plants-hero-title {
                font-size: 1.4rem;
            }
            .plants-hero-desc {
                font-size: 0.95rem;
            }
            .plants-search-section {
                padding: 0 10px;
                margin-top: -12px;
                margin-bottom: 16px;
            }
            .plants-search-bar {
                padding: 14px 10px 12px 10px;
                border-radius: 6px;
            }
            .plants-search-bar-row {
                gap: 6px;
            }
            .plants-search-bar svg {
                width: 16px;
                height: 16px;
            }
            .plants-search-input {
                font-size: 0.9rem;
                padding: 8px 8px;
            }
            .plants-filter-label {
                font-size: 0.95rem;
            }
            .plants-filter-btn {
                font-size: 0.85rem;
                padding: 4px 10px;
            }
            .plants-list-section {
                padding: 0 8px 48px 8px;
            }
            .plants-grid {
                gap: 10px;
            }
            .plant-card {
                border-radius: 12px;
            }
            .plant-img {
                height: 110px;
            }
            .plant-card-content {
                padding: 12px 10px;
            }
            .plant-name {
                font-size: 0.95rem;
            }
            .plant-scientific {
                font-size: 0.85rem;
                margin-bottom: 6px;
            }
            .plant-info-row {
                font-size: 0.85rem;
                margin-bottom: 2px;
            }
            .plant-info-row svg {
                width: 15px;
                height: 15px;
                margin-right: 4px;
            }
            .plant-details-btn {
                font-size: 0.7rem;
                padding: 2px 6px;
                margin-top: 6px;
            }
            .plant-details-btn svg {
                width: 12px;
                height: 12px;
            }
            .plant-type {
                font-size: 0.7rem;
                padding: 2px 8px;
                top: 8px;
                right: 8px;
            }
            .plant-categories .plant-type {
                font-size: 0.65rem;
                padding: 2px 6px;
            }
            .plants-list-title {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 375px) {
            .plants-search-section {
                padding: 0 8px;
                margin-top: -10px;
                margin-bottom: 14px;
            }
            .plants-search-bar {
                padding: 12px 8px 10px 8px;
                border-radius: 6px;
            }
            .plants-search-bar-row {
                gap: 5px;
            }
            .plants-search-bar svg {
                width: 14px;
                height: 14px;
            }
            .plants-search-input {
                font-size: 0.85rem;
                padding: 6px 6px;
            }
            .plants-filter-label {
                font-size: 0.9rem;
            }
            .plants-filter-btn {
                font-size: 0.8rem;
                padding: 3px 8px;
            }
            .plants-list-section {
                padding: 0 6px 48px 6px;
            }
            .plants-grid {
                gap: 8px;
            }
            .plant-img {
                height: 100px;
            }
            .plant-name {
                font-size: 0.9rem;
            }
            .plant-scientific {
                font-size: 0.8rem;
            }
            .plant-card-content {
                padding: 10px 8px;
            }
            .plant-info-row {
                font-size: 0.8rem;
            }
            .plant-type {
                font-size: 0.65rem;
                padding: 2px 6px;
            }
        }

        @media (max-width: 320px) {
            .plants-hero-title {
                font-size: 1.2rem;
            }
            .plants-grid {
                gap: 6px;
            }
            .plant-img {
                height: 90px;
            }
            .plant-name {
                font-size: 0.85rem;
            }
            .plant-scientific {
                font-size: 0.75rem;
            }
            .plant-info-row {
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    @include('User.partials.navbar')
    @include('User.partials.hero_green', [
        'title' => 'Ethnobotanical Plants',
        'desc' => 'Explore our collection of plants used in traditional healing practices across different cultures and regions.'
    ])
    <div class="plants-search-section">
        <form class="plants-search-bar">
            <div class="plants-search-bar-row">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                <input class="plants-search-input" type="text" placeholder="Search plants...">
            </div>
            <div class="plants-filters">
                <div class="plants-filter-group">
                    <span class="plants-filter-label">Categories</span>
                    <div class="plants-filter-options">
                        <button type="button" class="plants-filter-btn active" data-category="all">All</button>
                        <button type="button" class="plants-filter-btn" data-category="Pain Reliever">Pain Reliever</button>
                        <button type="button" class="plants-filter-btn" data-category="Respiratory">Respiratory</button>
                        <button type="button" class="plants-filter-btn" data-category="Fever">Fever</button>
                        <button type="button" class="plants-filter-btn" data-category="Antibacterial">Antibacterial</button>
                        <button type="button" class="plants-filter-btn" data-category="Antidiabetic">Antidiabetic</button>
                        <button type="button" class="plants-filter-btn" data-category="Urination">Urination</button>
                        <button type="button" class="plants-filter-btn" data-category="Antihypertensive">Antihypertensive</button>
                        <button type="button" class="plants-filter-btn" data-category="Digestive">Digestive</button>
                        <button type="button" class="plants-filter-btn" data-category="Anti-Parasite">Anti-Parasite</button>
                        <button type="button" class="plants-filter-btn" data-category="Anti-inflammatory">Anti-inflammatory</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <section class="plants-list-section">
        <div class="plants-list-title"><span id="plants-count">{{ $plants->count() }}</span> Plants Found</div>
        <div class="plants-grid">
            @forelse($plants as $plant)
                <div class="plant-card" data-categories="{{ $plant->category }}">
                    @if($plant->category)
                        @php
                            $categories = array_map('trim', explode(',', $plant->category));
                        @endphp
                        @if(count($categories) > 1)
                            <div class="plant-categories">
                                @foreach($categories as $category)
                                    <span class="plant-type">{{ $category }}</span>
                                @endforeach
                            </div>
                        @else
                            <span class="plant-type">{{ $plant->category }}</span>
                        @endif
                    @endif
                    <img class="plant-img" src="{{ $plant->image ? asset('storage/' . $plant->image) : 'https://via.placeholder.com/400x170?text=No+Image' }}" alt="{{ $plant->common_name }}">
                    <div class="plant-card-content">
                        <div class="plant-name">{{ $plant->common_name }}</div>
                        <div class="plant-scientific">{{ $plant->scientific_name }}</div>
                        <div class="plant-info-row"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 8a6 6 0 01-12 0"/></svg><span class="plant-info-label">Category:</span> <span class="plant-info-value">{{ $plant->category }}</span></div>
                        <div class="plant-info-row"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M16 8a6 6 0 01-12 0"/></svg><span class="plant-info-label">Documented Uses:</span> <span class="plant-info-value">{{ $plant->documented_uses }}</span></div>
                        <div class="plant-info-row"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/></svg><span class="plant-info-label">Scientific Name:</span> <span class="plant-info-value"><i>{{ $plant->scientific_name }}</i></span></div>
                        <a href="{{ route('plants.show', $plant->id) }}" class="plant-details-btn">View Details <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></a>
                    </div>
                </div>
            @empty
                <div>No plants found.</div>
            @endforelse
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
                    <a href="#">Healers</a>
                    <a href="#">Tutorials</a>
                    <a href="#">About Us</a>
                </div>
                <div class="footer-col">
                    <div class="footer-title">SUPPORT</div>
                    <a href="#">Feedback</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                    <a href="#">Contact</a>
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
        /* Mobile touch fixes */
        .plants-search-input, .plants-filter-btn, .plant-card, .plant-card a {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
            touch-action: manipulation;
            -webkit-touch-callout: none;
        }
        .plants-search-input {
            min-height: 44px;
            font-size: 16px !important; /* Prevents zoom on iOS */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .plants-filter-btn {
            min-height: 44px;
            min-width: 44px;
        }
        .plant-card {
            position: relative;
            z-index: 1;
        }
        .plant-card a:not(.plant-details-btn) {
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
    <!-- Footer End -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(function() {
        var $input = $('.plants-search-input');
        var $plantCards = $('.plant-card');
        var $filterBtns = $('.plants-filter-btn');
        var $plantsCount = $('#plants-count');

        // Function to update the plants count
        function updatePlantsCount() {
            var visibleCount = $plantCards.filter(':visible').length;
            $plantsCount.text(visibleCount);
        }

        // Category filter functionality
        $filterBtns.on('click', function() {
            $filterBtns.removeClass('active');
            $(this).addClass('active');
            
            var selectedCategory = $(this).data('category');
            
            if (selectedCategory === 'all') {
                $plantCards.show();
            } else {
                $plantCards.hide();
                $plantCards.each(function() {
                    var $card = $(this);
                    var categories = $card.data('categories');
                    
                    if (categories) {
                        // Split categories by comma and check if selected category exists
                        var categoryArray = categories.split(',').map(function(cat) {
                            return cat.trim();
                        });
                        
                        if (categoryArray.includes(selectedCategory)) {
                            $card.show();
                        }
                    }
                });
            }
            
            // Update the count after filtering
            updatePlantsCount();
        });

        // Search functionality
        $input.on('input', function() {
            var query = $(this).val().toLowerCase();
            
            $plantCards.each(function() {
                var $card = $(this);
                var plantName = $card.find('.plant-name').text().toLowerCase();
                var scientificName = $card.find('.plant-scientific').text().toLowerCase();
                
                if (plantName.includes(query) || scientificName.includes(query)) {
                    $card.show();
                } else {
                    $card.hide();
                }
            });
            
            // Update the count after searching
            updatePlantsCount();
        });
    });
    </script>
</body>
</html>