<style>
    :root { --site-nav-height: 72px; }

    /* fixed navbar so it does not scroll with page content */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: var(--site-nav-height);
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 4vw; /* vertical padding removed to rely on fixed height */
        background: #fff;
        z-index: 1100;
        box-shadow: 0 2px 12px rgba(44,62,80,0.04);
        box-sizing: border-box;
    }

    .navbar-left {
        display: flex;
        align-items: center;
        gap: 36px;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        color: #263a29;
        text-decoration: none;
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        font-weight: 700;
    }

    .logo img {
        height: 40px;
        width: 40px;
        object-fit: contain;
    }

    .nav-links {
        display: flex;
        gap: 28px;
        align-items: center;
    }

    .nav-link {
        color: #6b7b5e;
        font-size: 1.08rem;
        text-decoration: none;
        font-weight: 500;
        padding-bottom: 2px;
        border-bottom: 2px solid transparent;
        transition: color 0.2s, border 0.2s;
    }

    .nav-link.active, .nav-link:hover {
        color: #16a34a;
        border-bottom: 2px solid #16a34a;
    }

    .navbar-right {
        display: flex;
        align-items: center;
    }

    .sign-in-btn {
        background: #2d5a27;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 10px 24px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: background 0.2s;
    }

    .sign-in-btn:hover {
        background: #24481f;
    }

    .sign-in-btn svg {
        width: 18px;
        height: 18px;
    }

    /* Hamburger menu button */
    .mobile-menu-toggle {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
        flex-direction: column;
        gap: 5px;
    }

    .mobile-menu-toggle span {
        display: block;
        width: 25px;
        height: 3px;
        background: #263a29;
        border-radius: 2px;
        transition: all 0.3s;
    }

    /* Mobile menu backdrop */
    .mobile-menu-backdrop {
        display: none;
        position: fixed;
        top: var(--site-nav-height);
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(38, 58, 41, 0.3);
        z-index: 1049;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .mobile-menu-backdrop.active {
        opacity: 1;
    }

    /* Mobile menu overlay */
    .mobile-menu-overlay {
        display: none;
        position: fixed;
        top: var(--site-nav-height);
        left: 0;
        bottom: 0;
        width: 50vw;
        min-width: 250px;
        max-width: 320px;
        background: #fff;
        z-index: 1050;
        padding: 20px 4vw;
        overflow-y: auto;
        box-shadow: 2px 0 12px rgba(44, 62, 80, 0.1);
        transform: translateX(-100%);
        transition: transform 0.3s ease-in-out;
    }

    .mobile-menu-overlay.active {
        transform: translateX(0);
    }

    .mobile-nav-links {
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .mobile-nav-link {
        color: #6b7b5e;
        font-size: 1.2rem;
        text-decoration: none;
        font-weight: 500;
        padding: 12px 0;
        border-bottom: 2px solid #e3e7df;
        transition: color 0.2s;
    }

    .mobile-nav-link.active, .mobile-nav-link:hover {
        color: #16a34a;
        border-bottom: 2px solid #16a34a;
    }

    .mobile-auth-section {
        margin-top: 24px;
        padding-top: 24px;
        border-top: 2px solid #e3e7df;
    }

    .mobile-sign-in-btn {
        background: #2d5a27;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 12px 24px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        transition: background 0.2s;
    }

    .mobile-sign-in-btn:hover {
        background: #24481f;
    }

    .mobile-sign-in-btn svg {
        width: 20px;
        height: 20px;
    }

    /* push page content below the fixed navbar */
    .site-content-offset {
        height: var(--site-nav-height);
        width: 100%;
        pointer-events: none;
    }

    /* Responsive styles */
    @media (max-width: 1024px) {
        .navbar-left {
            gap: 24px;
        }
        
        .nav-links {
            gap: 20px;
        }
        
        .nav-link {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        :root { --site-nav-height: 72px; }
        
        .navbar {
            padding: 0 4vw;
        }

        .navbar-left {
            gap: 16px;
        }

        .logo {
            font-size: 1.2rem;
        }

        .logo img {
            height: 32px;
            width: 32px;
        }

        .nav-links {
            display: none;
        }

        .mobile-menu-toggle {
            display: flex;
        }

        .mobile-menu-overlay {
            display: block;
        }

        .mobile-menu-backdrop {
            display: block;
        }
    }

    @media (max-width: 480px) {
        .logo {
            font-size: 1rem;
        }

        .logo img {
            height: 28px;
            width: 28px;
        }

        .sign-in-btn {
            padding: 8px 16px;
            font-size: 0.9rem;
        }

        .sign-in-btn svg {
            width: 16px;
            height: 16px;
        }
    }
</style>

<nav class="navbar">
    <div class="navbar-left">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="IP Healers Academy Logo">
            <span>IP Healers Academy</span>
        </div>
        <div class="nav-links">
            <a href="/home" class="nav-link @if(\Request::is('home')) active @endif">Home</a>
            <a href="/plants" class="nav-link @if(\Request::is('plants')) active @endif">Plants</a>
                @auth
                    <a href="/healers" class="nav-link @if(\Request::is('healers')) active @endif">Healers</a>
                @else
                    <a href="/register" id="healers-guest-link" class="nav-link">Healers</a>
                @endauth
            <a href="/tutorials" class="nav-link @if(\Request::is('tutorials')) active @endif">Tutorials</a>
            <a href="/about" class="nav-link @if(\Request::is('about')) active @endif">About</a>
            <a href="/feedback" class="nav-link @if(\Request::is('feedback*')) active @endif">Feedback</a>
        </div>
    </div>
    <div class="navbar-right">
        <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        @auth
        <form method="POST" action="{{ route('logout') }}" id="logoutForm-user-navbar" style="display:inline;">
            @csrf
            <button type="button" class="sign-in-btn" id="showLogoutModal-user-navbar">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 16l-4-4m0 0l4-4m-4 4h14"/><path d="M17 16v1a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1"/></svg>
                Logout
            </button>
        </form>
        @if(empty($__logout_modal_rendered))
        @php($__logout_modal_rendered = true)
        <!-- Logout Confirmation Modal -->
        <div id="logoutModal-user-navbar" style="display:none;position:fixed;z-index:2000;left:0;top:0;width:100vw;height:100vh;background:rgba(38,58,41,0.18);align-items:center;justify-content:center;">
            <div style="background:#fff;border-radius:12px;max-width:350px;width:90vw;padding:32px 24px;box-shadow:0 4px 32px rgba(44,62,80,0.10);text-align:center;">
                <div style="font-size:1.2rem;font-weight:700;color:#263a29;margin-bottom:18px;">Are you sure you want to logout?</div>
                <div style="display:flex;gap:16px;justify-content:center;margin-top:18px;">
                    <button id="confirmLogout-user-navbar" style="background:#2d5a27;color:#fff;border:none;border-radius:6px;padding:10px 24px;font-size:1rem;font-weight:600;cursor:pointer;transition:background 0.2s;">Logout</button>
                    <button id="cancelLogout-user-navbar" style="background:#e3e7df;color:#263a29;border:none;border-radius:6px;padding:10px 24px;font-size:1rem;font-weight:600;cursor:pointer;">Cancel</button>
                </div>
            </div>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var showBtn = document.getElementById('showLogoutModal-user-navbar');
            var modal = document.getElementById('logoutModal-user-navbar');
            var cancelBtn = document.getElementById('cancelLogout-user-navbar');
            var confirmBtn = document.getElementById('confirmLogout-user-navbar');
            var form = document.getElementById('logoutForm-user-navbar');
            if(showBtn && modal && cancelBtn && confirmBtn && form) {
                showBtn.onclick = function(e) {
                    e.preventDefault();
                    modal.style.display = 'flex';
                };
                cancelBtn.onclick = function() {
                    modal.style.display = 'none';
                };
                confirmBtn.onclick = function() {
                    form.submit();
                    setTimeout(function() {
                        window.location.href = '/register?logout=success';
                    }, 100);
                };
            }
        });
        </script>
        @endif
        @else
        <a href="/login" class="sign-in-btn">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 12H3"/><path d="M8 7l-5 5 5 5"/><path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Sign In
        </a>
        @endauth
    </div>
</nav>

<!-- Mobile Menu Backdrop -->
<div class="mobile-menu-backdrop" id="mobile-menu-backdrop"></div>

<!-- Mobile Menu Overlay -->
<div class="mobile-menu-overlay" id="mobile-menu-overlay">
    <div class="mobile-nav-links">
        <a href="/home" class="mobile-nav-link @if(\Request::is('home')) active @endif">Home</a>
        <a href="/plants" class="mobile-nav-link @if(\Request::is('plants')) active @endif">Plants</a>
            @auth
                <a href="/healers" class="mobile-nav-link @if(\Request::is('healers')) active @endif">Healers</a>
            @else
                <a href="/register" id="healers-mobile-guest-link" class="mobile-nav-link">Healers</a>
            @endauth
        <a href="/tutorials" class="mobile-nav-link @if(\Request::is('tutorials')) active @endif">Tutorials</a>
        <a href="/about" class="mobile-nav-link @if(\Request::is('about')) active @endif">About</a>
        <a href="/feedback" class="mobile-nav-link @if(\Request::is('feedback*')) active @endif">Feedback</a>
    </div>
    <div class="mobile-auth-section">
        @auth
        <form method="POST" action="{{ route('logout') }}" id="mobileLogoutForm" style="display:block;">
            @csrf
            <button type="button" class="mobile-sign-in-btn" id="showLogoutModal-mobile">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 16l-4-4m0 0l4-4m-4 4h14"/><path d="M17 16v1a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v1"/></svg>
                Logout
            </button>
        </form>
        @if(empty($__mobile_logout_modal_rendered))
        @php($__mobile_logout_modal_rendered = true)
        <!-- Mobile Logout Confirmation Modal -->
        <div id="logoutModal-mobile" style="display:none;position:fixed;z-index:2000;left:0;top:0;width:100vw;height:100vh;background:rgba(38,58,41,0.18);align-items:center;justify-content:center;">
            <div style="background:#fff;border-radius:12px;max-width:350px;width:90vw;padding:32px 24px;box-shadow:0 4px 32px rgba(44,62,80,0.10);text-align:center;">
                <div style="font-size:1.2rem;font-weight:700;color:#263a29;margin-bottom:18px;">Are you sure you want to logout?</div>
                <div style="display:flex;gap:16px;justify-content:center;margin-top:18px;">
                    <button id="confirmLogout-mobile" style="background:#2d5a27;color:#fff;border:none;border-radius:6px;padding:10px 24px;font-size:1rem;font-weight:600;cursor:pointer;transition:background 0.2s;">Logout</button>
                    <button id="cancelLogout-mobile" style="background:#e3e7df;color:#263a29;border:none;border-radius:6px;padding:10px 24px;font-size:1rem;font-weight:600;cursor:pointer;">Cancel</button>
                </div>
            </div>
        </div>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            var showBtn = document.getElementById('showLogoutModal-mobile');
            var modal = document.getElementById('logoutModal-mobile');
            var cancelBtn = document.getElementById('cancelLogout-mobile');
            var confirmBtn = document.getElementById('confirmLogout-mobile');
            var form = document.getElementById('mobileLogoutForm');
            if(showBtn && modal && cancelBtn && confirmBtn && form) {
                showBtn.onclick = function(e) {
                    e.preventDefault();
                    modal.style.display = 'flex';
                    document.getElementById('mobile-menu-toggle').click();
                };
                cancelBtn.onclick = function() {
                    modal.style.display = 'none';
                };
                confirmBtn.onclick = function() {
                    form.submit();
                    setTimeout(function() {
                        window.location.href = '/register?logout=success';
                    }, 100);
                };
            }
        });
        </script>
        @endif
        @else
        <a href="/login" class="mobile-sign-in-btn">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 12H3"/><path d="M8 7l-5 5 5 5"/><path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Sign In
        </a>
        @endauth
    </div>
</div>

<!-- ensure every page's content starts below the fixed navbar -->
<div class="site-content-offset" aria-hidden="true"></div>

@guest
<!-- Guest-only modal shown when clicking Healers -->
<div id="guestHealerModal" style="display:none;position:fixed;z-index:2100;left:0;top:0;width:100vw;height:100vh;background:rgba(0,0,0,0.45);align-items:center;justify-content:center;">
    <div style="background:#fff;border-radius:12px;max-width:420px;width:92%;padding:20px 20px;box-shadow:0 8px 40px rgba(0,0,0,0.2);margin:0 auto;">
        <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:12px;">
            <div>
                <h3 style="margin:0 0 8px 0;font-size:1.15rem;color:#263a29;">Account required</h3>
                <p style="margin:0;color:#51624e;">You need an account to access healer profiles. Please sign in or create an account to continue.</p>
            </div>
        </div>
        <div style="display:flex;justify-content:flex-end;gap:12px;margin-top:18px;">
            <button id="guestHealerCancel" style="background:#e3e7df;color:#263a29;border:none;padding:10px 14px;border-radius:8px;cursor:pointer;font-weight:600;">Cancel</button>
            <a id="guestHealerSignIn" href="/login" style="background:#2d5a27;color:#fff;padding:10px 14px;border-radius:8px;text-decoration:none;font-weight:600;">Sign In</a>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var guestLink = document.getElementById('healers-guest-link');
    var mobileGuestLink = document.getElementById('healers-mobile-guest-link');
    var modal = document.getElementById('guestHealerModal');
    var cancelBtn = document.getElementById('guestHealerCancel');
    var signInBtn = document.getElementById('guestHealerSignIn');

    function showModal(e) {
        if (e) e.preventDefault();
        if (modal) modal.style.display = 'flex';
    }

    if (guestLink) guestLink.addEventListener('click', showModal);
    if (mobileGuestLink) mobileGuestLink.addEventListener('click', function(e){ e.preventDefault(); showModal(); document.getElementById('mobile-menu-toggle').click(); });
    if (cancelBtn) cancelBtn.addEventListener('click', function(e){ e.preventDefault(); if (modal) modal.style.display = 'none'; });
    if (signInBtn) signInBtn.addEventListener('click', function(){ /* natural navigation to /login */ });
});
</script>
@endguest

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('mobile-menu-toggle');
    const overlay = document.getElementById('mobile-menu-overlay');
    const backdrop = document.getElementById('mobile-menu-backdrop');
    
    function closeMenu() {
        if (overlay && backdrop) {
            overlay.classList.remove('active');
            backdrop.classList.remove('active');
            const spans = toggle.querySelectorAll('span');
            spans[0].style.transform = '';
            spans[1].style.opacity = '';
            spans[2].style.transform = '';
        }
    }
    
    function openMenu() {
        if (overlay && backdrop) {
            overlay.classList.add('active');
            backdrop.classList.add('active');
            const spans = toggle.querySelectorAll('span');
            spans[0].style.transform = 'rotate(45deg) translate(8px, 8px)';
            spans[1].style.opacity = '0';
            spans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
        }
    }
    
    if (toggle && overlay && backdrop) {
        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            if (overlay.classList.contains('active')) {
                closeMenu();
            } else {
                openMenu();
            }
        });
        
        // Close menu when clicking on backdrop
        backdrop.addEventListener('click', function() {
            closeMenu();
        });
        
        // Close menu when clicking on a link
        const mobileLinks = overlay.querySelectorAll('.mobile-nav-link');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                closeMenu();
            });
        });
    }
});
</script>