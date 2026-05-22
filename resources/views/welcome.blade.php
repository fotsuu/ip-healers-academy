<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP Healers Academy - Welcome</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
            <style>
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        body {
            background: #f7f8f5;
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            animation: fadeIn 0.5s ease-in-out;
        }
        .navbar {
            position: sticky;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 4vw;
            background: #fff;
            box-shadow: 0 2px 12px rgba(44, 62, 80, 0.04);
            z-index: 1100;
            animation: slideInDown 0.6s ease-out;
        }
        .navbar-left {
            display: flex;
            align-items: center;
            gap: 36px;
        }
        .logo {
            display: flex;
            align-items: center;
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: #263a29;
            gap: 8px;
            animation: slideInLeft 0.7s ease-out 0.1s both;
        }
        .logo svg {
            width: 32px;
            height: 32px;
            color: #4b7942;
            animation: pulse 2s ease-in-out infinite;
        }
        .logo img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }
        .nav-links {
            display: flex;
            gap: 28px;
            align-items: center;
            animation: slideInLeft 0.8s ease-out 0.2s both;
        }
        .nav-link {
            color: #6b7b5e;
            font-size: 1.08rem;
            text-decoration: none;
            font-weight: 500;
            padding-bottom: 2px;
            border-bottom: 2px solid transparent;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #16a34a;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .nav-link.active, .nav-link:hover {
            color: #16a34a;
            transform: translateY(-2px);
        }
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideInRight 0.7s ease-out 0.3s both;
        }
        .sign-in-btn {
            background: linear-gradient(135deg, #2d5a27 0%, #24481f 100%);
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
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(45, 90, 39, 0.2);
            position: relative;
            overflow: hidden;
        }
        .sign-in-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .sign-in-btn:hover::before {
            left: 100%;
        }
        .sign-in-btn:hover {
            background: linear-gradient(135deg, #24481f 0%, #1d3a18 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 90, 39, 0.3);
        }
        .sign-in-btn:active {
            transform: translateY(0);
        }
        .sign-in-btn svg {
            width: 18px;
            height: 18px;
            transition: transform 0.3s ease;
        }
        .sign-in-btn:hover svg {
            transform: translateX(-2px);
        }

        /* Mobile menu toggle */
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
            transition: all 0.3s ease;
        }

        /* Mobile menu overlay */
        .mobile-menu-overlay {
            display: none;
            position: fixed;
            top: 72px;
            left: 0;
            right: 0;
            bottom: 0;
            background: #fff;
            z-index: 1050;
            padding: 20px 4vw;
            overflow-y: auto;
            transform: translateX(-100%);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 20px rgba(44, 62, 80, 0.15);
        }

        .mobile-menu-overlay.active {
            transform: translateX(0);
            animation: slideInLeft 0.4s ease-out;
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
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        .mobile-nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 0;
            height: 2px;
            background: #16a34a;
            transition: width 0.3s ease;
        }
        .mobile-nav-link:hover::before {
            width: 100%;
        }

        .mobile-nav-link.active, .mobile-nav-link:hover {
            color: #16a34a;
            transform: translateX(8px);
        }

        .mobile-auth-section {
            margin-top: 24px;
            padding-top: 24px;
            border-top: 2px solid #e3e7df;
        }

        .mobile-sign-in-btn {
            background: linear-gradient(135deg, #2d5a27 0%, #24481f 100%);
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
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(45, 90, 39, 0.2);
            position: relative;
            overflow: hidden;
        }
        .mobile-sign-in-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .mobile-sign-in-btn:hover::before {
            left: 100%;
        }

        .mobile-sign-in-btn:hover {
            background: linear-gradient(135deg, #24481f 0%, #1d3a18 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 90, 39, 0.3);
        }

        .mobile-sign-in-btn svg {
            width: 20px;
            height: 20px;
            transition: transform 0.3s ease;
        }
        .mobile-sign-in-btn:hover svg {
            transform: translateX(-2px);
        }
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
            animation: slideUp 0.8s ease-out 0.2s both;
        }
        .hero-desc {
            font-size: 1.25rem;
            color: #e3e7df;
            margin-bottom: 36px;
            font-weight: 400;
            animation: slideUp 0.8s ease-out 0.4s both;
        }
        .hero-buttons {
            display: flex;
            gap: 18px;
            flex-wrap: wrap;
            animation: slideUp 0.8s ease-out 0.6s both;
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
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
        .explore-btn::before, .find-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s ease;
        }
        .explore-btn:hover::before, .find-btn:hover::before {
            left: 100%;
        }
        .explore-btn {
            background: linear-gradient(135deg, #2d5a27 0%, #24481f 100%);
            color: #fff;
        }
        .explore-btn:hover {
            background: linear-gradient(135deg, #24481f 0%, #1d3a18 100%);
            transform: translateY(-3px);
            box-shadow: 0 4px 16px rgba(45, 90, 39, 0.3);
        }
        .explore-btn:active {
            transform: translateY(-1px);
        }
        .explore-btn svg, .find-btn svg {
            width: 20px;
            height: 20px;
            transition: transform 0.3s ease;
        }
        .explore-btn:hover svg {
            transform: scale(1.1);
        }
        .find-btn {
            background: #f7f8f5;
            color: #263a29;
            border: 2px solid rgba(75, 121, 66, 0.2);
        }
        .find-btn svg {
            color: #4b7942;
        }
        .find-btn:hover {
            background: #e3e7df;
            border-color: #4b7942;
            transform: translateY(-3px);
            box-shadow: 0 4px 16px rgba(44, 62, 80, 0.15);
        }
        .find-btn:hover svg {
            transform: scale(1.1) rotate(5deg);
        }
        .find-btn:active {
            transform: translateY(-1px);
        }
        .search-section {
            background: #f7f8f5;
            padding: 36px 0 0 0;
            margin-top: -48px;
        }
        .search-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(44, 62, 80, 0.08);
            max-width: 90vw;
            width: 90vw;
            max-width: 1300px;
            margin: 0 auto;
            padding: 32px 24px 32px 24px;
            animation: scaleIn 0.6s ease-out 0.4s both;
            transition: box-shadow 0.3s ease;
        }
        .search-container:hover {
            box-shadow: 0 6px 24px rgba(44, 62, 80, 0.12);
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
            transition: all 0.3s ease;
        }
        .search-input:focus {
            border: 1.5px solid #4b7942;
            box-shadow: 0 0 0 3px rgba(75, 121, 66, 0.1);
            transform: translateY(-1px);
        }
        .search-btn {
            background: linear-gradient(135deg, #2d5a27 0%, #24481f 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 28px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(45, 90, 39, 0.2);
            position: relative;
            overflow: hidden;
        }
        .search-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .search-btn:hover::before {
            left: 100%;
        }
        .search-btn:hover {
            background: linear-gradient(135deg, #24481f 0%, #1d3a18 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 90, 39, 0.3);
        }
        .search-btn:active {
            transform: translateY(0);
        }
        /* Responsive Navbar */
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
            .navbar {
                padding: 12px 4vw;
            }
            .navbar-left {
                gap: 16px;
            }
            .logo {
                font-size: 1.2rem;
            }
            .logo svg, .logo img {
                width: 32px;
                height: 32px;
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
        }

        /* Responsive Hero */
        @media (max-width: 900px) {
            .hero-title {
                font-size: 2.1rem;
            }
            .hero-content {
                padding: 0 2vw;
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

        @media (max-width: 480px) {
            .logo {
                font-size: 1rem;
            }
            .logo svg, .logo img {
                width: 28px;
                height: 28px;
            }
            .sign-in-btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
            .sign-in-btn svg {
                width: 16px;
                height: 16px;
            }
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
        }

        @media (max-width: 375px) {
            .hero-title {
                font-size: 1.3rem;
            }
            .logo span {
                display: none;
            }
            .sign-in-btn {
                padding: 8px 12px;
                font-size: 0.85rem;
            }
        }

        /* Extra small devices (320px and below) */
        @media (max-width: 320px) {
            .navbar {
                padding: 10px 3vw;
                height: 60px;
            }
            .logo {
                font-size: 0.9rem;
            }
            .logo svg, .logo img {
                width: 24px;
                height: 24px;
            }
            .sign-in-btn {
                padding: 6px 10px;
                font-size: 0.8rem;
            }
            .sign-in-btn svg {
                width: 14px;
                height: 14px;
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
            .explore-btn svg, .find-btn svg {
                width: 16px;
                height: 16px;
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
            .mobile-nav-link {
                font-size: 1.1rem;
            }
            .mobile-sign-in-btn {
                font-size: 1rem;
                padding: 10px 20px;
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
        .knowledge-section {
            background: #f7f8f5;
            padding: 48px 0 32px 0;
            text-align: center;
        }
        .knowledge-header {
            margin-bottom: 32px;
            padding: 0 4vw;
            animation: slideUp 0.6s ease-out 0.6s both;
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
            box-shadow: 0 4px 12px rgba(44, 62, 80, 0.08);
            padding: 32px 28px 28px 28px;
            min-width: 320px;
            max-width: 350px;
            flex: 1 1 320px;
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            animation: scaleIn 0.6s ease-out both;
            border: 2px solid transparent;
        }
        .knowledge-card:nth-child(1) { animation-delay: 0.7s; }
        .knowledge-card:nth-child(2) { animation-delay: 0.8s; }
        .knowledge-card:nth-child(3) { animation-delay: 0.9s; }
        .knowledge-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(44, 62, 80, 0.15);
            border-color: rgba(75, 121, 66, 0.3);
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
            transition: all 0.3s ease;
        }
        .knowledge-card:hover .card-icon {
            transform: scale(1.1) rotate(5deg);
            background: #d4e8d2;
        }
        .card-icon svg {
            width: 32px;
            height: 32px;
            color: #4b7942;
            transition: transform 0.3s ease;
        }
        .knowledge-card:hover .card-icon svg {
            animation: pulse 1s ease-in-out infinite;
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
            animation: slideUp 0.6s ease-out 1s both;
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
            transition: all 0.3s ease;
            position: relative;
        }
        .view-all::after {
            content: '→';
            margin-left: 6px;
            transition: margin-left 0.3s ease;
        }
        .view-all:hover {
            color: #24481f;
        }
        .view-all:hover::after {
            margin-left: 12px;
        }
        .featured-desc {
            color: #6b7b5e;
            font-size: 1.08rem;
            max-width: 1300px;
            margin: 0 auto 18px auto;
            padding: 0 24px;
            animation: slideUp 0.6s ease-out 1.1s both;
        }
        .featured-scroll {
            display: flex;
            gap: 24px;
            overflow-x: auto;
            padding: 18px 24px 0 24px;
            max-width: 1300px;
            margin: 0 auto;
            scroll-behavior: smooth;
            animation: slideUp 0.6s ease-out 1.2s both;
        }
        .plant-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(44, 62, 80, 0.08);
            min-width: 260px;
            max-width: 260px;
            flex: 0 0 260px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 18px 12px 16px 12px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
        }
        .plant-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 8px 24px rgba(44, 62, 80, 0.15);
            border-color: rgba(75, 121, 66, 0.3);
        }
        .plant-card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }
        .plant-card:hover img {
            transform: scale(1.05);
            filter: brightness(1.05);
        }
        .plant-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: #263a29;
            text-align: center;
        }

        /* Responsive Knowledge & Featured Sections */
        @media (max-width: 1100px) {
            .knowledge-cards {
                flex-direction: column;
                align-items: center;
            }
            .featured-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
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
            .featured-title {
                font-size: 1.6rem;
            }
            .featured-scroll {
                padding: 18px 4vw 0 4vw;
            }
        }

        @media (max-width: 480px) {
            .knowledge-title {
                font-size: 1.5rem;
            }
            .featured-title {
                font-size: 1.4rem;
            }
        }
        .footer-section {
            background: #425336;
            color: #e3e7df;
            margin-top: 0;
            font-family: 'Inter', Arial, sans-serif;
            animation: slideUp 0.6s ease-out 1.3s both;
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
            animation: slideUp 0.6s ease-out 1.4s both;
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
        .footer-signup-btn {
            background: linear-gradient(135deg, #2d5a27 0%, #24481f 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px 32px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }
        .footer-signup-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .footer-signup-btn:hover::before {
            left: 100%;
        }
        .footer-signup-btn:hover {
            background: linear-gradient(135deg, #24481f 0%, #1d3a18 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 90, 39, 0.3);
        }
        .footer-learn-btn {
            background: #5a6d4a;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px 32px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }
        .footer-learn-btn:hover {
            background: #3d4d2e;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
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
            transition: all 0.3s ease;
            display: inline-block;
        }
        .footer-socials a:hover {
            color: #fff;
            transform: translateY(-3px) scale(1.1);
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
            transition: all 0.3s ease;
            position: relative;
            padding-left: 0;
        }
        .footer-col a::before {
            content: '→';
            position: absolute;
            left: -20px;
            opacity: 0;
            transition: all 0.3s ease;
        }
        .footer-col a:hover {
            color: #7fc47f;
            padding-left: 20px;
        }
        .footer-col a:hover::before {
            left: 0;
            opacity: 1;
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
        .footer-heart {
            color: #7fc47f;
            font-size: 1.1em;
        }
        /* Responsive Footer */
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
            .footer-cta-title {
                font-size: 1.3rem;
            }
        }
            </style>
    </head>
<body>
    <div class="navbar">
        <div class="navbar-left">
            <div class="logo">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M8 12l2 2 4-4"/></svg>
                <span>IP Healers Academy</span>
            </div>
            <div class="nav-links">
                <a href="/home" class="nav-link">Home</a>
                <a href="/plants" class="nav-link">Plants</a>
                <a href="/healers" class="nav-link">Healers</a>
                <a href="/tutorials" class="nav-link">Tutorials</a>
                <a href="/about" class="nav-link">About</a>
                <a href="/feedback" class="nav-link">Feedback</a>
            </div>
        </div>
        <div class="navbar-right">
            <button class="mobile-menu-toggle" id="mobile-menu-toggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <a href="/login" class="sign-in-btn">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 12H3"/><path d="M8 7l-5 5 5 5"/><path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Sign In
            </a>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div class="mobile-menu-overlay" id="mobile-menu-overlay">
        <div class="mobile-nav-links">
            <a href="/home" class="mobile-nav-link">Home</a>
            <a href="/plants" class="mobile-nav-link">Plants</a>
            <a href="/healers" class="mobile-nav-link">Healers</a>
            <a href="/tutorials" class="mobile-nav-link">Tutorials</a>
            <a href="/about" class="mobile-nav-link">About</a>
            <a href="/feedback" class="mobile-nav-link">Feedback</a>
        </div>
        <div class="mobile-auth-section">
            <a href="/login" class="mobile-sign-in-btn">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 12H3"/><path d="M8 7l-5 5 5 5"/><path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                Sign In
            </a>
        </div>
    </div>
    <!-- Home Pop-up Modal (shown to guests) -->
    <div id="home-modal-overlay" style="display:none;position:fixed;z-index:9998;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.5);"></div>
    <div id="home-modal" style="display:none;position:fixed;z-index:9999;top:50%;left:50%;transform:translate(-50%,-50%);width:95%;max-width:1000px;max-height:90vh;background:white;border-radius:12px;overflow-y:auto;box-shadow:0 10px 40px rgba(0,0,0,0.3);">
        <div style="position:sticky;top:0;background:white;padding:16px 24px;border-bottom:1px solid #e3e7df;display:flex;justify-content:space-between;align-items:center;z-index:10000;border-radius:12px 12px 0 0;">
            <h2 style="margin:0;font-family:'Playfair Display',serif;font-size:1.5rem;color:#263a29;">Welcome to IP Healers Academy</h2>
            <button id="close-home-modal" style="background:none;border:none;font-size:2rem;cursor:pointer;color:#6b7b5e;padding:0;width:40px;height:40px;display:flex;align-items:center;justify-content:center;line-height:1;">×</button>
        </div>
        <div id="home-modal-content" style="padding:32px;background:#f7f8f5;">
            <section style="background:linear-gradient(rgba(45,90,39,0.85), rgba(45,90,39,0.85)), #2d5a27;color:#fff;padding:48px 24px;border-radius:10px;text-align:center;margin-bottom:32px;">
                <h1 style="font-family:'Playfair Display',serif;font-size:2.2rem;font-weight:700;margin:0 0 16px 0;line-height:1.15;">Preserving Indigenous Plant Knowledge for Future Generations</h1>
                <p style="font-size:1.15rem;color:#e3e7df;margin:0 0 28px 0;font-weight:400;max-width:700px;margin-left:auto;margin-right:auto;">Discover the ancient wisdom of indigenous healers and their ethnobotanical practices in a modern, accessible format.</p>
                <div style="display:flex;gap:18px;justify-content:center;flex-wrap:wrap;">
                    <a href="/plants" style="background:#f7f8f5;color:#263a29;border:none;border-radius:6px;padding:12px 28px;font-size:1.1rem;font-weight:600;display:inline-flex;align-items:center;gap:8px;cursor:pointer;text-decoration:none;transition:all 0.3s ease;">✓ Explore Plants</a>
                    <a href="/healers" style="background:#f7f8f5;color:#263a29;border:none;border-radius:6px;padding:12px 28px;font-size:1.1rem;font-weight:600;display:inline-flex;align-items:center;gap:8px;cursor:pointer;text-decoration:none;transition:all 0.3s ease;">📋 Find Healers</a>
                </div>
            </section>

            <section style="background:white;border-radius:10px;padding:32px;margin-bottom:24px;box-shadow:0 2px 8px rgba(44,62,80,0.08);">
                <h3 style="font-family:'Playfair Display',serif;font-size:1.4rem;font-weight:700;color:#263a29;margin:0 0 16px 0;">Preserving Indigenous Knowledge</h3>
                <p style="color:#6b7b5e;font-size:1rem;margin:0;line-height:1.6;">Our platform connects traditional wisdom with modern accessibility to ensure these valuable practices are documented for future generations.</p>
            </section>

            <div style="background:white;border-radius:10px;padding:24px;box-shadow:0 2px 8px rgba(44,62,80,0.08);">
                <h4 style="font-family:'Playfair Display',serif;font-size:1.2rem;font-weight:700;color:#263a29;margin:0 0 16px 0;text-align:center;">Featured Collections</h4>
                <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;">
                    <div style="text-align:center;padding:16px;border-radius:8px;background:#f7f8f5;">
                        <div style="font-size:2rem;margin-bottom:8px;">🌿</div>
                        <p style="font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:700;color:#263a29;margin:0 0 4px 0;">Ethnobotanical Database</p>
                        <p style="color:#6b7b5e;font-size:0.95rem;margin:0;">Explore our comprehensive collection of indigenous plants</p>
                    </div>
                    <div style="text-align:center;padding:16px;border-radius:8px;background:#f7f8f5;">
                        <div style="font-size:2rem;margin-bottom:8px;">📍</div>
                        <p style="font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:700;color:#263a29;margin:0 0 4px 0;">Geo-tagged Healers</p>
                        <p style="color:#6b7b5e;font-size:0.95rem;margin:0;">Discover indigenous healers in your region</p>
                    </div>
                    <div style="text-align:center;padding:16px;border-radius:8px;background:#f7f8f5;">
                        <div style="font-size:2rem;margin-bottom:8px;">📚</div>
                        <p style="font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:700;color:#263a29;margin:0 0 4px 0;">DIY Tutorials</p>
                        <p style="color:#6b7b5e;font-size:0.95rem;margin:0;">Learn step-by-step traditional plant knowledge</p>
                    </div>
                </div>
            </div>

            <div style="text-align:center;margin-top:32px;padding-top:24px;border-top:1px solid #e3e7df;">
                <p style="color:#6b7b5e;font-size:1rem;margin:0 0 16px 0;">Ready to explore? Sign up or browse our public collections.</p>
                <a href="/register" style="background:linear-gradient(135deg, #2d5a27 0%, #24481f 100%);color:#fff;border:none;border-radius:6px;padding:12px 32px;font-size:1.1rem;font-weight:600;text-decoration:none;display:inline-block;transition:all 0.3s ease;box-shadow:0 2px 8px rgba(45, 90, 39, 0.2);">Create Account</a>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const isGuest = {{ auth()->check() ? 'false' : 'true' }};
        console.log('isGuest:', isGuest);
        
        if (isGuest) {
            // Show home modal for guests immediately
            const modal = document.getElementById('home-modal');
            const overlay = document.getElementById('home-modal-overlay');
            const closeBtn = document.getElementById('close-home-modal');
            
            console.log('Modal element:', modal);
            console.log('Overlay element:', overlay);
            
            // Show modal after page loads
            setTimeout(function() {
                console.log('Showing modal');
                modal.style.display = 'block';
                overlay.style.display = 'block';
            }, 300);
            
            // Close modal handlers
            if (closeBtn) {
                closeBtn.addEventListener('click', function() {
                    modal.style.display = 'none';
                    overlay.style.display = 'none';
                });
            }
            
            if (overlay) {
                overlay.addEventListener('click', function() {
                    modal.style.display = 'none';
                    overlay.style.display = 'none';
                });
            }

            // Prevent modal close when clicking inside modal content
            if (modal) {
                modal.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            }
        }

        // Mobile menu toggle functionality
        const toggle = document.getElementById('mobile-menu-toggle');
        const navOverlay = document.getElementById('mobile-menu-overlay');
        
        if (toggle && navOverlay) {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                navOverlay.classList.toggle('active');
                
                // Animate hamburger to X
                const spans = toggle.querySelectorAll('span');
                if (navOverlay.classList.contains('active')) {
                    spans[0].style.transform = 'rotate(45deg) translate(8px, 8px)';
                    spans[1].style.opacity = '0';
                    spans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
                } else {
                    spans[0].style.transform = '';
                    spans[1].style.opacity = '';
                    spans[2].style.transform = '';
                }
            });
            
            // Close menu when clicking on a link
            const mobileLinks = navOverlay.querySelectorAll('.mobile-nav-link, .mobile-sign-in-btn');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    navOverlay.classList.remove('active');
                    const spans = toggle.querySelectorAll('span');
                    spans[0].style.transform = '';
                    spans[1].style.opacity = '';
                    spans[2].style.transform = '';
                });
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(e) {
                if (!toggle.contains(e.target) && !navOverlay.contains(e.target)) {
                    navOverlay.classList.remove('active');
                    const spans = toggle.querySelectorAll('span');
                    spans[0].style.transform = '';
                    spans[1].style.opacity = '';
                    spans[2].style.transform = '';
                }
            });
        }

        if (isGuest) {
            // For guests: redirect to register on most interactions (except modal)
            document.querySelectorAll('a:not(.overlay-nav-link)').forEach(link => {
                if (!link.closest('#home-modal')) {
                    link.setAttribute('href', '/register');
                    link.onclick = function(e) { e.preventDefault(); window.location='/register'; return false; };
                }
            });
            document.querySelectorAll('button:not(#mobile-menu-toggle):not(#close-home-modal)').forEach(btn => {
                if (!btn.closest('#home-modal')) {
                    btn.onclick = function(e) { e.preventDefault(); window.location='/register'; return false; };
                }
            });
            document.querySelectorAll('img').forEach(img => {
                if (!img.closest('.logo') && !img.closest('#home-modal')) {
                    img.style.cursor = 'pointer';
                    img.onclick = function(e) { e.preventDefault(); window.location='/register'; };
                }
            });
            document.querySelectorAll('.plant-card, .knowledge-card').forEach(card => {
                if (!card.closest('#home-modal')) {
                    card.style.cursor = 'pointer';
                    card.onclick = function(e) { e.preventDefault(); window.location='/register'; };
                }
            });
            document.querySelectorAll('form').forEach(form => {
                if (!form.closest('#home-modal')) {
                    form.onsubmit = function(e) { e.preventDefault(); window.location='/register'; return false; };
                }
            });
        }
    });
    </script>
    </body>
</html>
