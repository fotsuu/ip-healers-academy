<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>{{ $healer->healer_name }} - Healer Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            background: #f7f8f5;
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
        }
        .profile-cover {
            background: #2d5a27;
            position: relative;
            height: 320px;
            display: flex;
            align-items: flex-end;
            justify-content: center;
        }
        .profile-cover::after {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: 80px;
            background: linear-gradient(to bottom, rgba(45,90,39,0) 0%, #f7f8f5 100%);
            pointer-events: none;
        }
        .profile-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(44, 62, 80, 0.35);
        }
        .profile-header {
            position: relative;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            width: 100%;
            z-index: 2;
            height: 100%;
        }
        .profile-avatar {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 6px solid #fff;
            object-fit: cover;
            box-shadow: 0 4px 24px rgba(44,62,80,0.18);
            background: #e3e7df;
            margin-bottom: -90px;
            left: 50%;
            transform: translateX(0);
        }
        .profile-main {
            max-width: 1200px;
            margin: 0 auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(44,62,80,0.10);
            margin-top: -40px;
            padding: 64px 4vw 32px 4vw;
            display: flex;
            gap: 48px;
        }
        .profile-info {
            flex: 1.2;
        }
        .profile-name {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 8px;
        }
        .profile-location {
            color: #6b7b5e;
            font-size: 1.15rem;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }
        .profile-specialty {
            background: #eaf3ea;
            color: #295024;
            font-weight: 600;
            font-size: 1.08rem;
            border-radius: 18px;
            padding: 6px 18px;
            display: inline-block;
            margin-bottom: 18px;
        }
        .profile-badges {
            display: flex;
            gap: 18px;
            margin-bottom: 18px;
        }
        .profile-badge {
            background: #fff;
            border: 1.5px solid #e3e7df;
            border-radius: 10px;
            padding: 12px 24px;
            color: #263a29;
            font-size: 1.08rem;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 500;
        }
        .profile-about {
            margin-bottom: 24px;
        }
        .profile-about-title {
            font-size: 1.18rem;
            font-weight: 600;
            color: #263a29;
            margin-bottom: 6px;
        }
        .profile-about-text {
            color: #495742;
            font-size: 1.07rem;
        }
        .profile-side {
            flex: 0.8;
            background: #f7f8f5;
            border-radius: 14px;
            padding: 32px 24px;
            box-shadow: 0 2px 12px rgba(44,62,80,0.06);
            display: flex;
            flex-direction: column;
            gap: 18px;
            min-width: 260px;
            max-width: 340px;
        }
        .profile-side-label {
            color: #6b7b5e;
            font-size: 1.01rem;
            margin-bottom: 2px;
        }
        .profile-side-value {
            color: #263a29;
            font-weight: 600;
            font-size: 1.09rem;
            margin-bottom: 8px;
        }
        .profile-side-list {
            color: #263a29;
            font-size: 1.07rem;
            margin-bottom: 8px;
        }
        .profile-section-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: #263a29;
            margin: 48px 0 18px 0;
        }
        .profile-plants-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 28px;
        }
        .plant-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 18px rgba(44, 62, 80, 0.10);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 220px;
            border: 1.5px solid #e3e7df;
        }
        .plant-img {
            width: 100%;
            height: 120px;
            object-fit: cover;
            background: #e3e7df;
        }
        .plant-card-details {
            padding: 16px 18px 18px 18px;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .plant-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.13rem;
            font-weight: 700;
            color: #263a29;
        }
        .plant-category {
            background: #eaf3ea;
            color: #295024;
            font-weight: 600;
            font-size: 0.98rem;
            border-radius: 12px;
            padding: 3px 12px;
            display: inline-block;
            margin-bottom: 4px;
        }
        .plant-scientific {
            color: #6b7b5e;
            font-style: italic;
            font-size: 1.01rem;
        }
        .plant-details-btn {
            background: #2d5a27;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 7px 18px;
            font-size: 1rem;
            font-weight: 600;
            margin-top: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: background 0.2s;
            width: fit-content;
        }
        .plant-details-btn:hover {
            background: #24481f;
        }
        .back-btn {
            position: absolute;
            top: 24px;
            left: 32px;
            z-index: 10;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fff;
            color: #2d5a27;
            border-radius: 6px;
            padding: 8px 18px;
            font-weight: 600;
            font-size: 1rem;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(44,62,80,0.10);
            border: 1.5px solid #e3e7df;
            transition: background 0.2s;
        }
        .back-btn:hover {
            background: #f7f8f5;
        }
        @media (max-width: 900px) {
            .profile-main {
                flex-direction: column;
                gap: 24px;
            }
            .profile-side {
                max-width: 100%;
            }
        }

        @media (max-width: 768px) {
            .back-btn {
                top: 16px;
                left: 16px;
                padding: 6px 14px;
                font-size: 0.95rem;
            }
            .back-btn svg {
                width: 16px;
                height: 16px;
            }
            .profile-cover {
                height: 280px;
            }
            .profile-avatar {
                width: 140px;
                height: 140px;
                margin-bottom: -70px;
                border: 5px solid #fff;
            }
            .profile-main {
                padding: 80px 16px 24px 16px;
                margin-top: -30px;
            }
            .profile-name {
                font-size: 1.8rem;
                text-align: center;
            }
            .profile-location {
                font-size: 1.05rem;
                justify-content: center;
            }
            .profile-specialty {
                font-size: 1rem;
                text-align: center;
                display: block;
            }
            .profile-badges {
                flex-direction: column;
                gap: 12px;
            }
            .profile-badge {
                justify-content: center;
            }
            .profile-section-title {
                padding: 0 16px;
            }
            .profile-plants-grid {
                padding: 0 16px;
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .profile-cover {
                height: 240px;
            }
            .profile-avatar {
                width: 120px;
                height: 120px;
                margin-bottom: -60px;
                border: 4px solid #fff;
            }
            .profile-main {
                padding: 70px 12px 20px 12px;
                margin-top: -20px;
            }
            .profile-name {
                font-size: 1.5rem;
            }
            .profile-location {
                font-size: 1rem;
            }
            .profile-specialty {
                font-size: 0.95rem;
                padding: 5px 14px;
            }
            .profile-about-title {
                font-size: 1.1rem;
            }
            .profile-about-text {
                font-size: 1rem;
            }
            .profile-side {
                padding: 24px 16px;
            }
            .profile-side-label {
                font-size: 0.95rem;
            }
            .profile-side-value {
                font-size: 1.05rem;
            }
            .profile-section-title {
                font-size: 1.2rem;
                padding: 0 12px;
                margin-top: 32px;
            }
            .profile-plants-grid {
                padding: 0 12px;
                gap: 18px;
            }
            .profile-badge {
                font-size: 1rem;
                padding: 10px 16px;
            }
        }

        @media (max-width: 480px) {
            .back-btn {
                top: 12px;
                left: 12px;
                padding: 6px 12px;
                font-size: 0.9rem;
            }
            .back-btn svg {
                width: 14px;
                height: 14px;
            }
            .profile-cover {
                height: 200px;
            }
            .profile-avatar {
                width: 100px;
                height: 100px;
                margin-bottom: -50px;
                border: 4px solid #fff;
            }
            .profile-main {
                padding: 60px 12px 16px 12px;
                margin-top: -15px;
            }
            .profile-name {
                font-size: 1.3rem;
            }
            .profile-location {
                font-size: 0.95rem;
            }
            .profile-specialty {
                font-size: 0.9rem;
                padding: 4px 12px;
            }
            .profile-badge {
                font-size: 0.9rem;
                padding: 8px 12px;
                gap: 6px;
            }
            .profile-badge svg {
                width: 16px;
                height: 16px;
            }
        }
        /* Mobile touch fixes */
        .back-btn, .plant-card, .plant-card a, .plant-details-btn {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
            touch-action: manipulation;
            -webkit-touch-callout: none;
        }
        .back-btn, .plant-details-btn {
            min-height: 44px;
            min-width: 44px;
        }
        .plant-card {
            position: relative;
            z-index: 1;
        }
        .plant-card a {
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
    <a href="javascript:history.back()" class="back-btn">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        Back
    </a>
    <div class="profile-cover">
        <div class="profile-overlay"></div>
        <div class="profile-header">
            <img class="profile-avatar" src="{{ $healer->image ? asset('storage/' . $healer->image) : 'https://via.placeholder.com/180?text=No+Image' }}" alt="{{ $healer->healer_name }}">
        </div>
    </div>
    <div class="profile-main">
        <div class="profile-info">
            <div class="profile-name">{{ $healer->healer_name }}</div>
            <div class="profile-location"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/></svg> {{ $healer->location }}</div>
            <div class="profile-specialty">{{ $healer->specialization }}</div>
            <div class="profile-badges">
                <div class="profile-badge"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="10" r="3"/><path d="M12 2a8 8 0 018 8c0 7-8 12-8 12S4 17 4 10a8 8 0 018-8z"/></svg> Experience: <span>{{ $healer->experience_years ?? 'N/A' }} years</span></div>
                <div class="profile-badge"><svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="7" rx="3.5"/><path d="M6 10v.01M18 10v.01"/></svg> Languages: <span>{{ $healer->languages ?? 'N/A' }}</span></div>
            </div>
            <div class="profile-about">
                <div class="profile-about-title">About</div>
                <div class="profile-about-text">{{ $healer->about ?? 'No description available.' }}</div>
            </div>
        </div>
        <div class="profile-side">
            <div class="profile-side-label">Ethnic Group</div>
            <div class="profile-side-value">{{ $healer->ethnic_group ?? 'N/A' }}</div>
            <div class="profile-side-label">Phone</div>
            <div class="profile-side-value">{{ $healer->phone ?? 'N/A' }}</div>
            <div class="profile-side-label">Location</div>
            <div class="profile-side-value">{{ $healer->location ?? 'N/A' }}</div>

            @php
                $lat = $healer->latitude ?? null;
                $lng = $healer->longitude ?? null;
                if ($lat && $lng) {
                    $mapsUrl = "https://www.google.com/maps/search/?api=1&query={$lat},{$lng}";
                } elseif (!empty($healer->location)) {
                    $mapsUrl = "https://www.google.com/maps/search/?api=1&query=" . urlencode($healer->location);
                } else {
                    $mapsUrl = null;
                }
            @endphp

            @if($mapsUrl)
                <a href="{{ $mapsUrl }}" target="_blank" rel="noopener noreferrer" class="plant-details-btn" style="margin-top:8px;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="vertical-align:middle;margin-right:6px;"><path d="M21 10c0 7-9 12-9 12s-9-5-9-12a9 9 0 1118 0z"/><circle cx="12" cy="10" r="2.5"/></svg>
                    Open Google Map
                </a>
            @else
                <button class="plant-details-btn" disabled style="margin-top:8px;opacity:0.6;cursor:not-allowed;">Open Google Map</button>
            @endif
        </div>
    </div>
    <div class="profile-section-title" style="max-width:1200px;margin-left:auto;margin-right:auto;">Documented Plants</div>
    <div class="profile-plants-grid" style="max-width:1200px;margin-left:auto;margin-right:auto;">
        @forelse($healer->plants as $plant)
            <div class="plant-card">
                <img class="plant-img" src="{{ $plant->image ? asset('storage/' . $plant->image) : 'https://via.placeholder.com/400x120?text=No+Image' }}" alt="{{ $plant->common_name }}">
                <div class="plant-card-details">
                    <div class="plant-category">{{ $plant->category }}</div>
                    <div class="plant-name">{{ $plant->common_name }}</div>
                    <div class="plant-scientific">{{ $plant->scientific_name }}</div>
                    <a href="{{ route('plants.show', ['id' => $plant->id]) }}" class="plant-details-btn">View Details</a>
                </div>
            </div>
        @empty
            <div style="grid-column: 1/-1; color: #6b7b5e; font-size: 1.1rem; text-align: center;">No documented plants found for this healer.</div>
        @endforelse
    </div>
    @include('User.partials.footer_css')
    @include('User.partials.footer')
</body>
</html>