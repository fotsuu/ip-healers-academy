<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>{{ $plant->common_name }} - Plant Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
    .plant-hero {
        background: linear-gradient(180deg, #f7f8f5 0%, #495544 100%);
        min-height: 320px;
        position: relative;
        display: flex;
        align-items: flex-end;
        padding: 0 0 48px 0;
        overflow: hidden;
    }
    .plant-hero::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(45, 90, 39, 0.3) 0%, rgba(22, 163, 74, 0.2) 100%);
        z-index: 1;
    }
    .plant-hero-bg {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        width: 100%; height: 100%;
        object-fit: cover;
        filter: blur(12px);
        transform: scale(1.1);
        z-index: 0;
    }
    .plant-hero-img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 360px;
        height: 340px;
        object-fit: cover;
        border-radius: 12px;
        border: 3px solid #fff;
        box-shadow: 0 4px 16px rgba(0,0,0,0.15);
        z-index: 2;
    }
    .plant-hero-content {
        margin-left: 0;
        position: relative;
        z-index: 2;
        text-align: center;
        padding-top: 60px;
    }
    .plant-badge {
        background: #4b7942;
        color: #fff;
        font-weight: 700;
        border-radius: 18px;
        padding: 6px 18px;
        display: inline-block;
        font-size: 1.05rem;
        margin-bottom: 18px;
    }
    .plant-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.6rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 0.2em;
    }
    .plant-scientific {
        font-size: 1.3rem;
        color: #e3e7df;
        font-style: italic;
        margin-bottom: 0.5em;
    }
    .plant-main {
        background: #f7f8f5;
        padding: 48px 0 0 0;
        min-height: 60vh;
    }
    .plant-content {
        display: flex;
        gap: 32px;
        max-width: 1400px;
        margin: 0 auto;
        align-items: flex-start;
    }
    .plant-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 2px 12px rgba(44,62,80,0.06);
        padding: 36px 36px 32px 36px;
        flex: 2;
        margin-bottom: 32px;
    }
    .plant-sidebar {
        flex: 1;
        display: flex;
        flex-direction: column;
        gap: 32px;
    }
    .quick-facts, .healer-card {
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 2px 12px rgba(44,62,80,0.06);
        padding: 32px 28px 28px 28px;
        margin-bottom: 24px;
    }
    .quick-facts-title, .healer-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 700;
        color: #263a29;
        margin-bottom: 18px;
    }
    .quick-fact {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 14px;
        color: #295024;
        font-size: 1.08rem;
    }
    .quick-fact svg {
        width: 20px;
        height: 20px;
        color: #4b7942;
        flex-shrink: 0;
    }
    .healer-card-img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 16px;
    }
    .healer-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.3rem;
        font-weight: 700;
        color: #263a29;
        margin-bottom: 2px;
    }
    .healer-location {
        color: #295024;
        font-size: 1.05rem;
        margin-bottom: 10px;
    }
    .healer-info {
        color: #295024;
        font-size: 1.08rem;
        margin-bottom: 8px;
    }
    .healer-btn {
        background: #295024;
        color: #fff;
        border: none;
        border-radius: 7px;
        padding: 10px 24px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        margin-top: 10px;
        display: block;
        width: 100%;
        transition: background 0.2s;
    }
    .healer-btn:hover {
        background: #4b7942;
    }
    @media (max-width: 1100px) {
        .plant-content { flex-direction: column; }
        .plant-sidebar { flex-direction: row; gap: 24px; }
    }
    @media (max-width: 800px) {
        .plant-content { flex-direction: column; gap: 18px; }
        .plant-card, .quick-facts, .healer-card { padding: 18px 8vw; }
        .plant-sidebar { flex-direction: column; gap: 18px; }
    }
    .tribe-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(41, 80, 36, 0.2);
    }
    .tribe-btn:active {
        transform: translateY(0);
    }
    /* Mobile touch fixes */
    .healer-card, .healer-card a, a[href="javascript:history.back()"], .tribe-btn {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
        touch-action: manipulation;
        -webkit-touch-callout: none;
    }
    a[href="javascript:history.back()"] {
        min-height: 44px;
        min-width: 44px;
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
<body style="background:#f7f8f5; margin:0; min-height:100vh; font-family:'Inter', Arial, sans-serif;">
    <a href="javascript:history.back()" style="position:absolute;top:24px;left:32px;z-index:10;display:inline-flex;align-items:center;gap:6px;background:#fff;color:#2d5a27;border-radius:6px;padding:8px 18px;font-weight:600;font-size:1rem;text-decoration:none;box-shadow:0 2px 8px rgba(44,62,80,0.10);border:1.5px solid #e3e7df;transition:background 0.2s;">
        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
        Back
    </a>
    <div style="margin-top:0;">
        <div class="plant-hero">
            @if($plant->image)
                <img src="{{ asset('storage/' . $plant->image) }}" class="plant-hero-bg" alt="{{ $plant->common_name }} background">
            @endif
            <img src="{{ $plant->image ? asset('storage/' . $plant->image) : 'https://via.placeholder.com/80' }}" class="plant-hero-img" alt="{{ $plant->common_name }}">
            <div class="plant-hero-content">
                <span class="plant-badge">{{ $plant->category }}</span>
                <div class="plant-title">{{ $plant->common_name }}</div>
                <div class="plant-scientific">{{ $plant->scientific_name }}</div>
            </div>
        </div>
        <div class="plant-main">
            <div class="plant-content">
                <div class="plant-card">
                    <div style="margin-bottom: 32px;">
                        <div style="font-family: 'Playfair Display', serif; font-size:1.6rem; font-weight:700; color:#263a29; margin-bottom:12px;">Description</div>
                        <div style="font-size:1.15rem; color:#295024; margin-bottom:24px;white-space:pre-line;">{{ $plant->description }}</div>
                        <div style="font-family: 'Playfair Display', serif; font-size:1.35rem; font-weight:700; color:#263a29; margin-bottom:10px;">Traditional Uses</div>
                        <ul style="list-style:none; padding:0; margin:0 0 24px 0;">
                            @foreach(explode(',', $plant->documented_uses) as $use)
                                <li style="margin-bottom:8px; color:#295024;"><svg style="vertical-align:middle; margin-right:6px;" width="18" height="18" fill="none" stroke="#4b7942" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>{{ trim($use) }}</li>
                            @endforeach
                        </ul>
                        <div style="font-family: 'Playfair Display', serif; font-size:1.35rem; font-weight:700; color:#263a29; margin-bottom:16px;">Preparation Methods</div>
                        <div style="display:flex; gap:12px; margin-bottom:16px; flex-wrap:wrap;">
                            <button class="tribe-btn" data-tribe="general" onclick="showPreparationMethod('general')" style="background:#295024; color:#fff; border:none; border-radius:8px; padding:10px 20px; font-size:1rem; font-weight:600; cursor:pointer; transition:all 0.2s;">General</button>
                            <button class="tribe-btn" data-tribe="tagakaulo" onclick="showPreparationMethod('tagakaulo')" style="background:#eaf3ea; color:#295024; border:2px solid #295024; border-radius:8px; padding:10px 20px; font-size:1rem; font-weight:600; cursor:pointer; transition:all 0.2s;">Tagakaulo</button>
                            <button class="tribe-btn" data-tribe="bagobo" onclick="showPreparationMethod('bagobo')" style="background:#eaf3ea; color:#295024; border:2px solid #295024; border-radius:8px; padding:10px 20px; font-size:1rem; font-weight:600; cursor:pointer; transition:all 0.2s;">Bagobo</button>
                        </div>
                        <div id="preparationMethodsContent" data-general="{{ e($plant->preparation_methods) }}" data-tagakaulo="{{ e($plant->preparation_methods_tagakaulo ?? '') }}" data-bagobo="{{ e($plant->preparation_methods_bagobo ?? '') }}" style="font-size:1.12rem; color:#295024;white-space:pre-line; min-height:40px; padding:12px; background:#f7f8f5; border-radius:8px; border:1px solid #e3e7df;">
                            {{ $plant->preparation_methods ?: 'No preparation method available.' }}
                        </div>
                    </div>
                </div>
                <div class="plant-sidebar">
                    <div class="quick-facts">
                        <div class="quick-facts-title">Quick Facts</div>
                        <div class="quick-fact"><svg width="20" height="20" fill="none" stroke="#4b7942" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2C7 7 2 12 12 22C22 12 17 7 12 2Z"/><path d="M12 12v10"/><path d="M12 12l4-4"/><path d="M12 12l-4-4"/></svg><div><b>Natural Habitat</b><br><span style="white-space:pre-line;">{{ $plant->habitat }}</span></div></div>
                        <div class="quick-fact"><svg width="20" height="20" fill="none" stroke="#4b7942" stroke-width="2" viewBox="0 0 24 24"><rect x="4" y="4" width="16" height="16" rx="2"/><path d="M8 8h8M8 12h8M8 16h4"/></svg><div><b>Category</b><br>{{ $plant->category }}</div></div>
                    </div>
                    <div class="healer-card">
                        <div class="healer-title">Knowledgeable Healers</div>
                        @forelse($healers as $healer)
                            <img src="{{ $healer->image ? asset('storage/' . $healer->image) : 'https://randomuser.me/api/portraits/men/32.jpg' }}" class="healer-card-img" alt="Healer">
                            <div class="healer-name">{{ $healer->healer_name }}</div>
                            <div class="healer-location">
                                <svg width="16" height="16" fill="none" stroke="#4b7942" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                                {{ $healer->location }}
                            </div>
                            <div class="healer-info"><b>Specialty:</b> {{ $healer->specialization }}</div>
                            <div class="healer-info">
                                <svg width="16" height="16" fill="none" stroke="#4b7942" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                                Documented Plants: <b>{{ $healer->plants_count ?? 'N/A' }}</b>
                            </div>
                            <div class="healer-info"><b>Location:</b> {{ $healer->location }}</div>
                            <a href="/healers/{{ $healer->id }}" class="healer-btn">View Profile</a>
                        @empty
                            <div style="color:#888; font-size:1.08rem;">No healers documented for this plant yet.</div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Store preparation methods data
        const preparationMethods = {
            general: document.getElementById('preparationMethodsContent').getAttribute('data-general') || 'No preparation method available.',
            tagakaulo: document.getElementById('preparationMethodsContent').getAttribute('data-tagakaulo') || 'No preparation method available for Tagakaulo tribe.',
            bagobo: document.getElementById('preparationMethodsContent').getAttribute('data-bagobo') || 'No preparation method available for Bagobo tribe.'
        };
        
        // Function to show preparation method based on selected tribe
        function showPreparationMethod(tribe) {
            const contentDiv = document.getElementById('preparationMethodsContent');
            const buttons = document.querySelectorAll('.tribe-btn');
            
            // Update content
            contentDiv.textContent = preparationMethods[tribe] || 'No preparation method available.';
            
            // Update button styles
            buttons.forEach(btn => {
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
        
        // Initialize with general method selected
        document.addEventListener('DOMContentLoaded', function() {
            showPreparationMethod('general');
        });
    </script>
</body>
</html> 