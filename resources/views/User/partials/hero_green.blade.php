<section class="hero-green" style="background: linear-gradient(rgba(45,90,39,0.85), rgba(45,90,39,0.85)), #2d5a27; color: #fff; padding: 64px 0 80px 0; text-align: left; position: relative; overflow: hidden;">
    <div class="hero-green-content" style="max-width: 900px; margin: 0 auto; padding: 0 4vw;">
        <div class="hero-green-title" style="font-family: 'Playfair Display', serif; font-size: 3rem; font-weight: 700; margin-bottom: 18px; line-height: 1.15;">
            {{ $title ?? (isset($slot) ? $slot : '') }}
        </div>
        @if(!empty($desc))
        <div class="hero-green-desc" style="font-size: 1.25rem; color: #e3e7df; margin-bottom: 36px; font-weight: 400;">
            {{ $desc }}
        </div>
        @endif
        @if(!empty($buttons))
        <div class="hero-buttons">{!! $buttons !!}</div>
        @endif
    </div>
    <div style="content: ''; position: absolute; left: 0; right: 0; bottom: 0; height: 120px; background: linear-gradient(to bottom, rgba(22,163,74,0) 0%, #f7f8f5 100%); pointer-events: none;"></div>
</section> 