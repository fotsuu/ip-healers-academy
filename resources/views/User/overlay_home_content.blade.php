<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap');

    /* Overlay Navbar Styles */
    .overlay-navbar {
        position: sticky;
        top: 0;
        left: 0;
        right: 0;
        height: 72px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 4vw;
        background: #fff;
        z-index: 1100;
        box-shadow: 0 2px 12px rgba(44,62,80,0.04);
    }
    
    .overlay-navbar .overlay-nav-links {
        z-index: 1050;
    }

    .overlay-navbar-left {
        display: flex;
        align-items: center;
        gap: 36px;
    }

    .overlay-logo {
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

    .overlay-logo img {
        height: 40px;
        width: 40px;
        object-fit: contain;
    }

    .overlay-nav-links {
        display: flex;
        gap: 28px;
        align-items: center;
    }

    .overlay-nav-link {
        color: #6b7b5e;
        font-size: 1.08rem;
        text-decoration: none;
        font-weight: 500;
        padding-bottom: 2px;
        border-bottom: 2px solid transparent;
        transition: color 0.2s, border 0.2s;
    }

    .overlay-nav-link.active, .overlay-nav-link:hover {
        color: #16a34a;
        border-bottom: 2px solid #16a34a;
    }

    .overlay-navbar-right {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .overlay-sign-in-btn {
        background: #2d5a27;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 10px 24px;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: background 0.2s;
    }

    .overlay-sign-in-btn:hover {
        background: #24481f;
    }

    /* Mobile menu toggle */
    .overlay-mobile-menu-toggle {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
        flex-direction: column;
        gap: 5px;
    }

    .overlay-mobile-menu-toggle span {
        display: block;
        width: 25px;
        height: 3px;
        background: #263a29;
        border-radius: 2px;
        transition: all 0.3s ease;
    }

    /* Hero Section Styles */
    .hero {
        background: linear-gradient(rgba(45,90,39,0.85), rgba(45,90,39,0.85)), #2d5a27;
        color: #fff;
        padding: 64px 0 80px 0;
        text-align: left;
        position: relative;
        overflow: hidden;
    }

    .hero::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        height: 120px;
        background: linear-gradient(to bottom, rgba(22,163,74,0) 0%, #f7f8f5 100%);
        pointer-events: none;
    }

    .hero-content {
        max-width: 900px;
        margin: 0 auto;
        padding: 0 4vw;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 18px;
        line-height: 1.15;
    }

    .hero-desc {
        font-size: 1.25rem;
        color: #e3e7df;
        margin-bottom: 36px;
        font-weight: 400;
    }

    .hero-buttons {
        display: flex;
        gap: 18px;
        flex-wrap: wrap;
    }

    .explore-btn, .find-btn {
        border: none;
        border-radius: 6px;
        padding: 12px 28px;
        font-size: 1.1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
        transition: background 0.2s;
    }

    .explore-btn {
        background: #2d5a27;
        color: #fff;
    }

    .explore-btn:hover {
        background: #24481f;
    }

    .find-btn {
        background: #f7f8f5;
        color: #263a29;
    }

    .find-btn svg {
        color: #4b7942;
    }

    .find-btn:hover {
        background: #e3e7df;
    }

    .explore-btn svg, .find-btn svg {
        width: 20px;
        height: 20px;
    }

    /* Responsive Hero */
    @media (max-width: 900px) {
        .hero-title {
            font-size: 2.1rem;
        }
        .hero-content {
            padding: 0 2vw;
        }
        .overlay-navbar-left {
            gap: 24px;
        }
        .overlay-nav-links {
            gap: 20px;
        }
        .overlay-nav-link {
            font-size: 1rem;
        }
    }

    @media (max-width: 768px) {
        .overlay-navbar {
            padding: 12px 4vw;
        }
        .overlay-logo {
            font-size: 1.2rem;
        }
        .overlay-logo img {
            height: 32px;
            width: 32px;
        }
        .overlay-nav-links {
            display: none;
        }
        .overlay-mobile-menu-toggle {
            display: flex;
        }
    }

    @media (max-width: 600px) {
        .hero-title {
            font-size: 1.8rem;
        }
        .hero-desc {
            font-size: 1.1rem;
        }
        .hero-content {
            padding: 0 1vw;
        }
        .hero-buttons {
            flex-direction: column;
            gap: 12px;
        }
        .explore-btn, .find-btn {
            width: 100%;
            justify-content: center;
        }
        .overlay-logo {
            font-size: 1rem;
        }
        .overlay-logo img {
            height: 28px;
            width: 28px;
        }
        .overlay-sign-in-btn {
            padding: 8px 16px;
            font-size: 0.9rem;
        }
    }

    /* Search Section Styles */
    .search-section {
        background: #f7f8f5;
        padding: 36px 0 0 0;
        margin-top: -48px;
    }

    .search-container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 16px rgba(44, 62, 80, 0.08);
        max-width: 90vw;
        width: 90vw;
        max-width: 1300px;
        margin: 0 auto;
        padding: 32px 24px 32px 24px;
    }

    .search-title {
        font-size: 1.25rem;
        color: #263a29;
        font-weight: 600;
        margin-bottom: 18px;
    }

    .search-bar {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .search-input {
        flex: 1;
        padding: 12px 16px;
        border: 1.5px solid #e3e7df;
        border-radius: 6px;
        font-size: 1.1rem;
        background: #f7f8f5;
        color: #263a29;
        outline: none;
        transition: border 0.2s;
    }

    .search-input:focus {
        border: 1.5px solid #4b7942;
    }

    .search-btn {
        background: #2d5a27;
        color: #fff;
        border: none;
        border-radius: 6px;
        padding: 10px 28px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }

    .search-btn:hover {
        background: #24481f;
    }

    @media (max-width: 600px) {
        .search-container {
            padding: 18px 4vw;
        }
        .search-bar {
            flex-direction: column;
            width: 100%;
        }
        .search-input {
            width: 100%;
            font-size: 1rem;
        }
        .search-btn {
            width: 100%;
            padding: 12px;
        }
    }

    /* Knowledge Section Styles */
    .knowledge-section {
        background: #f7f8f5;
        padding: 48px 0 32px 0;
        text-align: center;
    }

    .knowledge-header {
        margin-bottom: 32px;
        padding: 0 4vw;
    }

    .knowledge-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: #263a29;
        margin-bottom: 8px;
    }

    .knowledge-desc {
        color: #6b7b5e;
        font-size: 1.15rem;
        max-width: 800px;
        margin: 0 auto;
    }

    .knowledge-cards {
        display: flex;
        justify-content: center;
        gap: 32px;
        margin-top: 24px;
        flex-wrap: wrap;
        padding: 0 4vw;
    }

    .knowledge-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(44, 62, 80, 0.08);
        padding: 32px 28px 28px 28px;
        min-width: 320px;
        max-width: 350px;
        flex: 1 1 320px;
        text-align: left;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .card-icon {
        background: #eaf3ea;
        border-radius: 50%;
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px;
    }

    .card-icon svg {
        width: 32px;
        height: 32px;
        color: #4b7942;
    }

    .card-title {
        font-family: 'Playfair Display', serif;
        font-size: 1.18rem;
        font-weight: 700;
        color: #263a29;
        margin-bottom: 8px;
    }

    .card-desc {
        color: #6b7b5e;
        font-size: 1.05rem;
    }

    @media (max-width: 1100px) {
        .knowledge-cards {
            flex-direction: column;
            align-items: center;
        }
    }

    @media (max-width: 700px) {
        .knowledge-title {
            font-size: 1.8rem;
        }
        .knowledge-desc {
            font-size: 1rem;
        }
        .knowledge-card {
            min-width: 90vw;
            max-width: 95vw;
        }
    }

    /* Featured Section Styles */
    .featured-section {
        background: #ecf1e7;
        padding: 36px 0 48px 0;
    }

    .featured-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1300px;
        margin: 0 auto 8px auto;
        padding: 0 24px;
    }

    .featured-title {
        font-family: 'Playfair Display', serif;
        font-size: 2rem;
        font-weight: 700;
        color: #263a29;
    }

    .view-all {
        color: #16a34a;
        font-size: 1.1rem;
        text-decoration: none;
        font-weight: 500;
    }

    .featured-desc {
        color: #6b7b5e;
        font-size: 1.08rem;
        max-width: 1300px;
        margin: 0 auto 18px auto;
        padding: 0 24px;
    }

    .featured-scroll {
        display: flex;
        gap: 24px;
        overflow-x: auto;
        padding: 18px 24px 0 24px;
        max-width: 1300px;
        margin: 0 auto;
        scroll-behavior: smooth;
    }

    .plant-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(44, 62, 80, 0.08);
        min-width: 260px;
        max-width: 260px;
        flex: 0 0 260px;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 18px 12px 16px 12px;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .plant-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 16px rgba(44, 62, 80, 0.12);
    }

    .plant-card img {
        width: 100%;
        height: 140px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 12px;
    }

    .plant-name {
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: #263a29;
        text-align: center;
    }

    @media (max-width: 1100px) {
        .featured-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }
    }

    @media (max-width: 700px) {
        .featured-title {
            font-size: 1.6rem;
        }
        .featured-scroll {
            padding: 18px 4vw 0 4vw;
        }
    }

    /* Footer Section Styles */
    .footer-section {
        background: #425336;
        color: #e3e7df;
        margin-top: 0;
        font-family: 'Inter', Arial, sans-serif;
    }

    .footer-cta {
        padding: 48px 0 0 0;
        text-align: left;
    }

    .footer-cta-content {
        max-width: 1300px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 32px;
        padding: 0 24px;
    }

    .footer-cta-title {
        font-family: 'Playfair Display', serif;
        font-size: 2.2rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 8px;
    }

    .footer-cta-desc {
        color: #e3e7df;
        font-size: 1.15rem;
        margin-bottom: 0;
    }

    .footer-cta-buttons {
        display: flex;
        gap: 18px;
    }

    .footer-signup-btn, .footer-learn-btn {
        border: none;
        border-radius: 6px;
        padding: 12px 32px;
        font-size: 1.1rem;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s;
        display: inline-block;
        cursor: pointer;
    }

    .footer-signup-btn {
        background: #2d5a27;
        color: #fff;
    }

    .footer-signup-btn:hover {
        background: #24481f;
    }

    .footer-learn-btn {
        background: #5a6d4a;
        color: #fff;
    }

    .footer-learn-btn:hover {
        background: #3d4d2e;
    }

    .footer-main {
        max-width: 1300px;
        margin: 48px auto 0 auto;
        display: flex;
        gap: 48px;
        padding: 0 24px 32px 24px;
        flex-wrap: wrap;
    }

    .footer-col {
        flex: 1 1 180px;
        min-width: 180px;
        margin-bottom: 24px;
    }

    .brand-col {
        flex: 2 1 320px;
        min-width: 320px;
    }

    .footer-logo {
        display: flex;
        align-items: center;
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        font-weight: 700;
        color: #fff;
        margin-bottom: 12px;
        gap: 8px;
    }

    .footer-logo svg {
        width: 32px;
        height: 32px;
        color: #7fc47f;
    }

    .footer-brand-desc {
        color: #e3e7df;
        font-size: 1.05rem;
        margin-bottom: 18px;
        max-width: 400px;
    }

    .footer-socials {
        display: flex;
        gap: 16px;
        margin-bottom: 0;
    }

    .footer-socials a {
        color: #b2c7b0;
        transition: color 0.2s;
    }

    .footer-socials a:hover {
        color: #fff;
    }

    .footer-col-title {
        font-weight: 700;
        color: #fff;
        margin-bottom: 10px;
        font-size: 1.08rem;
        letter-spacing: 1px;
    }

    .footer-col a {
        color: #e3e7df;
        text-decoration: none;
        display: block;
        margin-bottom: 8px;
        font-size: 1.05rem;
        transition: color 0.2s;
    }

    .footer-col a:hover {
        color: #7fc47f;
    }

    .footer-bottom {
        border-top: 1px solid #5a6d4a;
        max-width: 1300px;
        margin: 0 auto;
        padding: 18px 24px 12px 24px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #b2c7b0;
        font-size: 1rem;
        flex-wrap: wrap;
    }

    .footer-copyright, .footeropyright {
        margin: 0;
    }

    .footer-made {
        margin: 0;
    }

    .footer-heart {
        color: #7fc47f;
        font-size: 1.1em;
    }

    @media (max-width: 900px) {
        .footer-main {
            flex-direction: column;
            gap: 18px;
        }
        .footer-cta-content {
            flex-direction: column;
            align-items: flex-start;
            gap: 18px;
        }
        .footer-bottom {
            flex-direction: column;
            gap: 8px;
            align-items: flex-start;
        }
        .footer-cta-title {
            font-size: 1.8rem;
        }
    }

    @media (max-width: 600px) {
        .footer-cta {
            padding: 32px 0 0 0;
        }
        .footer-cta-title {
            font-size: 1.5rem;
        }
        .footer-cta-desc {
            font-size: 1rem;
        }
        .footer-cta-buttons {
            flex-direction: column;
            width: 100%;
            gap: 12px;
        }
        .footer-signup-btn, .footer-learn-btn {
            width: 100%;
            text-align: center;
        }
        .brand-col {
            min-width: 100%;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 1.5rem;
        }
        .hero-desc {
            font-size: 1rem;
        }
        .explore-btn, .find-btn {
            font-size: 1rem;
            padding: 10px 20px;
        }
        .search-title {
            font-size: 1.1rem;
        }
        .knowledge-title {
            font-size: 1.5rem;
        }
        .featured-title {
            font-size: 1.4rem;
        }
        .footer-cta-title {
            font-size: 1.3rem;
        }
    }

    @media (max-width: 375px) {
        .hero-title {
            font-size: 1.3rem;
        }
        .overlay-logo span {
            display: none;
        }
        .overlay-sign-in-btn {
            padding: 8px 12px;
            font-size: 0.85rem;
        }
    }

    /* Extra small devices (320px and below) */
    @media (max-width: 320px) {
        .overlay-navbar {
            padding: 10px 3vw;
            height: 60px;
        }
        .overlay-logo {
            font-size: 0.9rem;
        }
        .overlay-logo img {
            height: 24px;
            width: 24px;
        }
        .overlay-sign-in-btn {
            padding: 6px 10px;
            font-size: 0.8rem;
        }
        .hero {
            padding: 48px 0 64px 0;
        }
        .hero-title {
            font-size: 1.2rem;
            line-height: 1.3;
        }
        .hero-desc {
            font-size: 0.95rem;
        }
        .explore-btn, .find-btn {
            font-size: 0.95rem;
            padding: 10px 16px;
        }
        .search-container {
            padding: 16px 3vw;
            width: 94vw;
        }
        .search-title {
            font-size: 1rem;
        }
        .search-input {
            font-size: 0.95rem;
            padding: 10px 12px;
        }
        .search-btn {
            font-size: 0.95rem;
            padding: 10px 16px;
        }
        .knowledge-title {
            font-size: 1.3rem;
        }
        .knowledge-desc {
            font-size: 0.95rem;
        }
        .knowledge-card {
            min-width: 94vw;
            max-width: 94vw;
            padding: 24px 20px 20px 20px;
        }
        .card-title {
            font-size: 1.1rem;
        }
        .card-desc {
            font-size: 0.98rem;
        }
        .featured-title {
            font-size: 1.3rem;
        }
        .featured-desc {
            font-size: 0.95rem;
        }
        .featured-scroll {
            padding: 16px 3vw 0 3vw;
        }
        .plant-card {
            min-width: 220px;
            max-width: 220px;
            flex: 0 0 220px;
        }
        .plant-card img {
            height: 120px;
        }
        .plant-name {
            font-size: 1rem;
        }
        .footer-cta {
            padding: 24px 0 0 0;
        }
        .footer-cta-content {
            padding: 0 3vw;
        }
        .footer-cta-title {
            font-size: 1.2rem;
        }
        .footer-cta-desc {
            font-size: 0.95rem;
        }
        .footer-signup-btn, .footer-learn-btn {
            font-size: 0.95rem;
            padding: 10px 24px;
        }
        .footer-main {
            padding: 0 3vw 24px 3vw;
        }
        .footer-logo {
            font-size: 1.2rem;
        }
        .footer-brand-desc {
            font-size: 0.95rem;
        }
        .footer-col-title {
            font-size: 1rem;
        }
        .footer-col a {
            font-size: 0.98rem;
        }
        .footer-bottom {
            padding: 16px 3vw 10px 3vw;
            font-size: 0.9rem;
        }
        .brand-col {
            min-width: 100%;
        }
    }

    /* Prevent horizontal overflow */
    * {
        box-sizing: border-box;
    }

    body {
        overflow-x: hidden;
        width: 100%;
    }

    /* Better text wrapping */
    .hero-title, .knowledge-title, .featured-title, .footer-cta-title {
        word-wrap: break-word;
        overflow-wrap: break-word;
        hyphens: auto;
    }

    /* Smooth scrolling for horizontal scrolls */
    .featured-scroll::-webkit-scrollbar {
        height: 8px;
    }

    .featured-scroll::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .featured-scroll::-webkit-scrollbar-thumb {
        background: #4b7942;
        border-radius: 10px;
    }

    .featured-scroll::-webkit-scrollbar-thumb:hover {
        background: #2d5a27;
    }
</style>

<section class="hero">
    <div class="hero-content">
        <div class="hero-title">Preserving Indigenous Plant Knowledge for Future Generations</div>
        <div class="hero-desc">Discover the ancient wisdom of indigenous healers and their ethnobotanical practices in a modern, accessible format.</div>
        <div class="hero-buttons">
            <button class="explore-btn">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
                Explore Plants
            </button>
            <button class="find-btn">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v4a1 1 0 001 1h3m10 0h3a1 1 0 001-1V7m-1-4H5a2 2 0 00-2 2v16a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z"/>
                </svg>
                Find Healers
            </button>
        </div>
    </div>
</section>
<section class="search-section">
    <div class="search-container">
        <div class="search-title">Find Ethnobotanical Knowledge</div>
        <form class="search-bar">
            <input class="search-input" type="text" placeholder="Search for plants, healers, or remedies...">
            <button class="search-btn" type="submit">Search</button>
        </form>
    </div>
</section>
<section class="knowledge-section">
    <div class="knowledge-header">
        <div class="knowledge-title">Preserving Indigenous Knowledge</div>
        <div class="knowledge-desc">Our platform connects traditional wisdom with modern accessibility to ensure these valuable practices are documented for future generations.</div>
    </div>
    <div class="knowledge-cards">
        <div class="knowledge-card">
            <div class="card-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9" fill="#eaf3ea"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/>
                </svg>
            </div>
            <div class="card-title">Ethnobotanical Database</div>
            <div class="card-desc">Explore our comprehensive collection of indigenous plants and their traditional uses documented by healers.</div>
        </div>
        <div class="knowledge-card">
            <div class="card-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9" fill="#eaf3ea"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v4a1 1 0 001 1h3m10 0h3a1 1 0 001-1V7m-1-4H5a2 2 0 00-2 2v16a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z"/>
                </svg>
            </div>
            <div class="card-title">Geo-tagged Healers</div>
            <div class="card-desc">Discover indigenous healers in your region and learn about their specialized knowledge and practices.</div>
        </div>
        <div class="knowledge-card">
            <div class="card-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="9" fill="#eaf3ea"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v4a1 1 0 001 1h3m10 0h3a1 1 0 001-1V7m-1-4H5a2 2 0 00-2 2v16a2 2 0 002 2h14a2 2 0 002-2V5a2 2 0 00-2-2z"/>
                </svg>
            </div>
            <div class="card-title">DIY Plant Tutorials</div>
            <div class="card-desc">Learn how to safely apply traditional plant knowledge with step-by-step tutorials approved by indigenous healers.</div>
        </div>
    </div>
</section>
<section class="featured-section">
    <div class="featured-header">
        <div class="featured-title">Featured Plants</div>
        <a href="#" class="view-all">View all plants</a>
    </div>
    <div class="featured-desc">Discover some of our most documented ethnobotanical plants</div>
    <div class="featured-scroll">
        @if(isset($featuredPlants) && count($featuredPlants))
            @foreach($featuredPlants as $plant)
                <a href="{{ route('plants.show', $plant->id) }}" class="plant-card" style="text-decoration:none;">
                    <img src="{{ $plant->image ? asset('storage/' . $plant->image) : 'https://via.placeholder.com/400x170?text=No+Image' }}" alt="{{ $plant->common_name }}">
                    <div class="plant-name">{{ $plant->common_name }}</div>
                </a>
            @endforeach
        @else
            <div class="plant-card">
                <img src="https://via.placeholder.com/400x170?text=No+Image" alt="No Image">
                <div class="plant-name">No plants available</div>
            </div>
        @endif
    </div>
</section>
<footer class="footer-section">
    <div class="footer-cta">
        <div class="footer-cta-content">
            <div>
                <div class="footer-cta-title">Join Our Community</div>
                <div class="footer-cta-desc">Help preserve indigenous knowledge by contributing to our growing database.</div>
            </div>
            <div class="footer-cta-buttons">
                <a href="/register" class="footer-signup-btn">Sign Up</a>
                <a href="#" class="footer-learn-btn">Learn More</a>
            </div>
        </div>
    </div>
    <div class="footer-main">
        <div class="footer-col brand-col">
            <div class="footer-logo">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21c-4.97 0-9-4.03-9-9 0-4.97 4.03-9 9-9s9 4.03 9 9c0 4.97-4.03 9-9 9zm0 0c0-4.97 4.03-9 9-9m-9 9c0-4.97-4.03-9-9-9m9 9c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4z"/>
                </svg>
                <span>IP Healers Academy</span>
            </div>
            <div class="footer-brand-desc">Preserving indigenous knowledge of ethnobotanical plants and healing practices for future generations through documentation and community engagement.</div>
            <div class="footer-socials">
                <a href="#" aria-label="Instagram"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.5" y2="6.5"/></svg></a>
                <a href="#" aria-label="Facebook"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                <a href="#" aria-label="Twitter"><svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53A4.48 4.48 0 0 0 22.4 1.64a9.09 9.09 0 0 1-2.88 1.1A4.52 4.52 0 0 0 16.11 0c-2.5 0-4.52 2.02-4.52 4.52 0 .35.04.7.11 1.03A12.94 12.94 0 0 1 3.1.67a4.52 4.52 0 0 0-.61 2.28c0 1.57.8 2.96 2.02 3.77A4.48 4.48 0 0 1 2 6.13v.06c0 2.2 1.56 4.03 3.64 4.45a4.52 4.52 0 0 1-2.04.08c.57 1.77 2.23 3.06 4.2 3.1A9.05 9.05 0 0 1 0 19.54a12.8 12.8 0 0 0 6.95 2.04c8.34 0 12.9-6.91 12.9-12.9 0-.2 0-.39-.01-.58A9.22 9.22 0 0 0 24 4.59a9.1 9.1 0 0 1-2.6.71z"/></svg></a>
            </div>
        </div>
        <div class="footer-col">
            <div class="footer-col-title">EXPLORE</div>
            <a href="/plants">Plants</a>
            <a href="/healers">Healers</a>
            <a href="/tutorials">Tutorials</a>
            <a href="/about">About Us</a>
        </div>
        <div class="footer-col">
            <div class="footer-col-title">SUPPORT</div>
            <a href="/feedback">Feedback</a>
            <a href="/privacy">Privacy Policy</a>
            <a href="/terms">Terms of Service</a>
            <a href="/contact">Contact</a>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footeropyright">© 2025 IP Healers Academy. All rights reserved.</div>
        <div class="footer-made">Made with <span class="footer-heart">♡</span> for indigenous knowledge preservation</div>
    </div>
</footer> 