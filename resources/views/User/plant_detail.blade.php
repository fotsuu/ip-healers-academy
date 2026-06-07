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
    .plant-tutorial-video {
        display: none;
        margin-top: 16px;
    }
    .plant-tutorial-video.is-visible {
        display: block;
    }
    .plant-tutorial-video-trigger {
        display: block;
        text-decoration: none;
        color: inherit;
        cursor: pointer;
    }
    .plant-tutorial-thumb-wrapper {
        position: relative;
        border-radius: 10px;
        overflow: hidden;
        background: #e3e7df;
        box-shadow: 0 2px 12px rgba(44,62,80,0.08);
    }
    .plant-tutorial-thumb {
        width: 100%;
        height: 200px;
        object-fit: cover;
        display: block;
        transition: transform 0.3s, filter 0.3s;
    }
    .plant-tutorial-video-trigger:hover .plant-tutorial-thumb {
        transform: scale(1.02);
        filter: brightness(0.95);
    }
    .plant-tutorial-play-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(41, 80, 36, 0.9);
        border-radius: 50%;
        width: 56px;
        height: 56px;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
        transition: all 0.3s;
    }
    .plant-tutorial-video-trigger:hover .plant-tutorial-play-overlay {
        background: rgba(41, 80, 36, 1);
        transform: translate(-50%, -50%) scale(1.08);
    }
    .plant-tutorial-play-overlay svg {
        width: 26px;
        height: 26px;
        color: #fff;
        margin-left: 3px;
    }
    .plant-tutorial-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 10px;
        color: #295024;
        font-weight: 600;
        font-size: 1.05rem;
    }
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
    }
    .tutorial-video-modal-content {
        background: #fff;
        border-radius: 16px;
        max-width: 90vw;
        max-height: 90vh;
        width: 1200px;
        padding: 24px;
        box-shadow: 0 12px 48px rgba(44,62,80,0.20);
        display: flex;
        flex-direction: column;
    }
    .tutorial-video-modal-header {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 12px;
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
    }
    .tutorial-video-close-btn:hover {
        background: #e3e7df;
        color: #263a29;
    }
    .tutorial-video-iframe-container {
        width: 100%;
        position: relative;
        background: #000;
        border-radius: 8px;
        overflow: hidden;
        padding-bottom: 56.25%;
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
        background: #fff;
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
                            <button class="tribe-btn" data-tribe="general" onclick="showPreparationMethod('general')" style="background:#295024; color:#fff; border:none; border-radius:8px; padding:10px 20px; font-size:1rem; font-weight:600; cursor:pointer; transition:all 0.2s;">DOH</button>
                            <button class="tribe-btn" data-tribe="tagakaulo" onclick="showPreparationMethod('tagakaulo')" style="background:#eaf3ea; color:#295024; border:2px solid #295024; border-radius:8px; padding:10px 20px; font-size:1rem; font-weight:600; cursor:pointer; transition:all 0.2s;">Tagakaulo</button>
                            <button class="tribe-btn" data-tribe="bagobo" onclick="showPreparationMethod('bagobo')" style="background:#eaf3ea; color:#295024; border:2px solid #295024; border-radius:8px; padding:10px 20px; font-size:1rem; font-weight:600; cursor:pointer; transition:all 0.2s;">Bagobo</button>
                        </div>
                        <div id="preparationMethodsContent" data-general="{{ e($plant->preparation_methods) }}" data-tagakaulo="{{ e($plant->preparation_methods_tagakaulo ?? '') }}" data-bagobo="{{ e($plant->preparation_methods_bagobo ?? '') }}" style="font-size:1.12rem; color:#295024;white-space:pre-line; min-height:40px; padding:12px; background:#f7f8f5; border-radius:8px; border:1px solid #e3e7df;">
                            {{ $plant->preparation_methods ?: 'No preparation method available.' }}
                        </div>
                        @if(isset($tutorial) && $tutorial)
                        @php
                            $tutorialThumb = $tutorial->image
                                ? asset('storage/' . $tutorial->image)
                                : 'https://via.placeholder.com/700x200?text=Tutorial+Video';
                        @endphp
                        <div id="plantTutorialVideo" class="plant-tutorial-video"
                            data-fallback-image="{{ $tutorialThumb }}">
                            <a href="#" class="plant-tutorial-video-trigger"
                                data-tutorial-link="{{ $tutorial->link }}"
                                data-tutorial-link-tagakaulo="{{ $tutorial->link_tagakaulo ?? '' }}"
                                data-tutorial-link-bagobo="{{ $tutorial->link_bagobo ?? '' }}"
                                data-current-tribe="general">
                                <div class="plant-tutorial-thumb-wrapper">
                                    <img id="plantTutorialThumb" src="{{ $tutorialThumb }}" alt="{{ $tutorial->title }} tutorial thumbnail" class="plant-tutorial-thumb">
                                    <div class="plant-tutorial-play-overlay">
                                        <svg fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                    </div>
                                </div>
                                <span class="plant-tutorial-label">Watch Tutorial <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg></span>
                            </a>
                        </div>
                        @endif
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
    @if(isset($tutorial) && $tutorial)
    <div class="tutorial-video-modal" id="tutorialVideoModal">
        <div class="tutorial-video-modal-content">
            <div class="tutorial-video-modal-header">
                <button type="button" class="tutorial-video-close-btn" id="closeTutorialVideoModal">&times;</button>
            </div>
            <div class="tutorial-video-iframe-container" id="tutorialVideoIframeContainer">
                <iframe id="tutorialVideoIframe" class="tutorial-video-iframe" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <div class="tutorial-video-fallback" id="tutorialVideoFallback" style="display: none;">
                    <div style="font-weight: 600; color: #263a29;">Video Cannot Be Embedded</div>
                    <a href="#" target="_blank" rel="noopener" style="color:#23a36d;text-decoration:none;font-weight:600;font-size:1.1rem;padding:12px 24px;border:2px solid #23a36d;border-radius:8px;">Open Video in New Tab</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    <script>
        let currentPreparationTribe = 'general';

        const preparationMethods = {
            general: document.getElementById('preparationMethodsContent').getAttribute('data-general') || 'No preparation method available.',
            tagakaulo: document.getElementById('preparationMethodsContent').getAttribute('data-tagakaulo') || 'No preparation method available for Tagakaulo tribe.',
            bagobo: document.getElementById('preparationMethodsContent').getAttribute('data-bagobo') || 'No preparation method available for Bagobo tribe.'
        };

        function getYoutubeVideoId(url) {
            if (!url) return null;
            const match = url.match(/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/);
            return match ? match[1] : null;
        }

        function getYoutubeThumbnail(url) {
            const videoId = getYoutubeVideoId(url);
            return videoId ? 'https://img.youtube.com/vi/' + videoId + '/hqdefault.jpg' : null;
        }

        function getTutorialLinkForTribe(tribe, trigger) {
            if (!trigger) return '';
            if (tribe === 'tagakaulo') {
                return trigger.getAttribute('data-tutorial-link-tagakaulo') || trigger.getAttribute('data-tutorial-link') || '';
            }
            if (tribe === 'bagobo') {
                return trigger.getAttribute('data-tutorial-link-bagobo') || trigger.getAttribute('data-tutorial-link') || '';
            }
            return trigger.getAttribute('data-tutorial-link') || '';
        }

        function updatePlantTutorialVideo(tribe) {
            const section = document.getElementById('plantTutorialVideo');
            const trigger = document.querySelector('.plant-tutorial-video-trigger');
            const thumb = document.getElementById('plantTutorialThumb');
            if (!section || !trigger) return;

            trigger.setAttribute('data-current-tribe', tribe);
            const tutorialLink = getTutorialLinkForTribe(tribe, trigger);

            if (tutorialLink) {
                section.classList.add('is-visible');
                if (thumb) {
                    const fallbackImage = section.getAttribute('data-fallback-image');
                    const youtubeThumb = getYoutubeThumbnail(tutorialLink);
                    thumb.src = youtubeThumb || fallbackImage;
                    thumb.alt = 'Tutorial video thumbnail';
                }
            } else {
                section.classList.remove('is-visible');
            }
        }

        function showPreparationMethod(tribe) {
            currentPreparationTribe = tribe;
            const contentDiv = document.getElementById('preparationMethodsContent');
            const buttons = document.querySelectorAll('.tribe-btn');

            contentDiv.textContent = preparationMethods[tribe] || 'No preparation method available.';

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

            updatePlantTutorialVideo(tribe);
        }

        function convertToEmbedUrl(url) {
            if (!url) return null;

            const youtubeRegex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
            const youtubeMatch = url.match(youtubeRegex);
            if (youtubeMatch) {
                return { url: 'https://www.youtube.com/embed/' + youtubeMatch[1] + '?autoplay=1&rel=0', embeddable: true };
            }

            const vimeoRegex = /(?:vimeo\.com\/)(?:.*\/)?(\d+)/;
            const vimeoMatch = url.match(vimeoRegex);
            if (vimeoMatch) {
                return { url: 'https://player.vimeo.com/video/' + vimeoMatch[1] + '?autoplay=1', embeddable: true };
            }

            if (/\.(mp4|webm|ogg|mov|avi)(\?.*)?$/i.test(url)) {
                return { url: url, embeddable: true };
            }

            if (url.includes('/embed/') || url.includes('iframe')) {
                return { url: url, embeddable: true };
            }

            return { url: url, embeddable: false };
        }

        function openTutorialVideoModal(link) {
            const modal = document.getElementById('tutorialVideoModal');
            const iframe = document.getElementById('tutorialVideoIframe');
            const fallback = document.getElementById('tutorialVideoFallback');
            if (!modal || !iframe || !fallback) return;

            const embedInfo = convertToEmbedUrl(link);
            iframe.src = '';
            iframe.style.display = 'none';
            fallback.style.display = 'none';

            if (embedInfo && embedInfo.embeddable) {
                iframe.src = embedInfo.url;
                iframe.style.display = 'block';
            } else {
                fallback.style.display = 'flex';
                const fallbackLink = fallback.querySelector('a');
                if (fallbackLink) {
                    fallbackLink.href = link;
                }
            }

            modal.style.display = 'flex';
        }

        function closeTutorialVideoModal() {
            const modal = document.getElementById('tutorialVideoModal');
            const iframe = document.getElementById('tutorialVideoIframe');
            if (!modal || !iframe) return;
            modal.style.display = 'none';
            iframe.src = '';
        }

        document.addEventListener('DOMContentLoaded', function() {
            showPreparationMethod('general');

            document.addEventListener('click', function(e) {
                const trigger = e.target.closest('.plant-tutorial-video-trigger');
                if (!trigger) return;
                e.preventDefault();
                e.stopPropagation();
                const tribe = trigger.getAttribute('data-current-tribe') || currentPreparationTribe || 'general';
                const tutorialLink = getTutorialLinkForTribe(tribe, trigger);
                if (tutorialLink) {
                    openTutorialVideoModal(tutorialLink);
                }
            });

            const closeBtn = document.getElementById('closeTutorialVideoModal');
            if (closeBtn) {
                closeBtn.addEventListener('click', closeTutorialVideoModal);
            }

            const videoModal = document.getElementById('tutorialVideoModal');
            if (videoModal) {
                videoModal.addEventListener('click', function(e) {
                    if (e.target === videoModal) {
                        closeTutorialVideoModal();
                    }
                });
            }

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeTutorialVideoModal();
                }
            });
        });
    </script>
</body>
</html> 