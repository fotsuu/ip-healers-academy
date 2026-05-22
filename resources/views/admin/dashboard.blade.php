<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP Healers Academy Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            background: linear-gradient(135deg, #f7f8f5 0%, #eef2eb 100%);
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            overflow: hidden;
        }
        .admin-layout {
            display: flex;
            min-height: 100vh;
            animation: fadeIn 0.6s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #2d5a27 0%, #234920 100%);
            border-right: 1px solid rgba(227, 231, 223, 0.2);
            display: flex;
            flex-direction: column;
            padding: 24px 0 32px 0;
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 10;
        }
        .sidebar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(180deg, rgba(255,255,255,0.03) 0%, rgba(0,0,0,0.05) 100%);
            pointer-events: none;
        }
        .sidebar .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            font-weight: 700;
            color: #fff;
            padding: 8px 32px 24px 32px;
            display: flex;
            align-items: center;
            gap: 10px;
            position: relative;
            z-index: 1;
            animation: slideInLeft 0.5s ease-out;
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .sidebar .logo svg {
            width: 26px;
            height: 26px;
            color: #a8d5a1;
            flex-shrink: 0;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }
        .sidebar-nav {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: 0 12px 16px 12px;
            position: relative;
            z-index: 1;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 1.02rem;
            font-weight: 500;
            padding: 14px 20px;
            border-left: 3px solid transparent;
            border-radius: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }
        .sidebar-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, rgba(255,255,255,0.1) 0%, transparent 100%);
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }
        .sidebar-link:hover::before {
            transform: translateX(0);
        }
        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.12);
            border-left-color: #a8d5a1;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .sidebar-link.active {
            background: linear-gradient(90deg, #24481f 0%, #1d3a18 100%);
            border-left-color: #a8d5a1;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
        }
        .sidebar-link.active::after {
            content: '';
            position: absolute;
            right: 12px;
            width: 6px;
            height: 6px;
            background: #a8d5a1;
            border-radius: 50%;
            animation: blink 2s ease-in-out infinite;
        }
        @keyframes blink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.3;
            }
        }
        .sidebar-link svg {
            width: 20px;
            height: 20px;
            color: #a8d5a1;
            flex-shrink: 0;
            transition: transform 0.3s ease;
        }
        .sidebar-link:hover svg {
            transform: scale(1.1) rotate(5deg);
        }
        .main-content {
            flex: 1;
            padding: 0 0 0 0;
            display: flex;
            flex-direction: column;
            animation: slideInRight 0.5s ease-out;
        }
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .topbar {
            background: linear-gradient(90deg, #2d5a27 0%, #2a5525 100%);
            color: #fff;
            padding: 20px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(227, 231, 223, 0.15);
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 5;
        }
        .topbar::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent 0%, rgba(168, 213, 161, 0.3) 50%, transparent 100%);
        }
        .topbar .user-info {
            display: flex;
            align-items: center;
            gap: 18px;
            color: #fff;
            animation: slideInRight 0.6s ease-out 0.2s both;
        }
        .topbar .user-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            flex: 0 0 56px;
            margin-left: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 3px solid rgba(168, 213, 161, 0.3);
        }
        .topbar .user-avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            border-color: #a8d5a1;
        }
        .topbar .user-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 50%;
        }
        /* responsive smaller avatar on narrower screens */
        @media (max-width: 900px) {
            .topbar .user-avatar {
                width: 44px;
                height: 44px;
                flex: 0 0 44px;
            }
            .topbar .user-avatar img {
                width: 100%;
                height: 100%;
            }
        }
        .topbar .user-name {
            color: #fff;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .dashboard-content {
            padding: 36px 48px 0 48px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #c3d1bb transparent;
        }
        .dashboard-content::-webkit-scrollbar {
            width: 8px;
        }
        .dashboard-content::-webkit-scrollbar-track {
            background: transparent;
        }
        .dashboard-content::-webkit-scrollbar-thumb {
            background: #c3d1bb;
            border-radius: 4px;
        }
        .dashboard-content::-webkit-scrollbar-thumb:hover {
            background: #a8d5a1;
        }
        .dashboard-title {
            font-size: 2rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 8px;
            animation: slideUp 0.6s ease-out 0.1s both;
        }
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .dashboard-subtitle {
            color: #6b7b5e;
            font-size: 1.1rem;
            margin-bottom: 32px;
            animation: slideUp 0.6s ease-out 0.2s both;
        }
        .dashboard-cards {
            display: flex;
            gap: 24px;
            margin-bottom: 32px;
        }
        .dashboard-card {
            background: linear-gradient(135deg, #ffffff 0%, #fafbf9 100%);
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(44, 62, 80, 0.06);
            border: 1px solid rgba(227, 231, 223, 0.6);
            padding: 28px 32px;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            animation: scaleIn 0.5s ease-out both;
        }
        .dashboard-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #4b7942 0%, #a8d5a1 100%);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        .dashboard-card:hover::before {
            transform: scaleX(1);
        }
        .dashboard-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(44, 62, 80, 0.12);
            border-color: #a8d5a1;
        }
        .dashboard-card:nth-child(1) {
            animation-delay: 0.3s;
        }
        .dashboard-card:nth-child(2) {
            animation-delay: 0.4s;
        }
        .dashboard-card:nth-child(3) {
            animation-delay: 0.5s;
        }
        .dashboard-card:nth-child(4) {
            animation-delay: 0.6s;
        }
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .dashboard-card .card-title {
            color: #6b7b5e;
            font-size: 1.1rem;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }
        .dashboard-card .card-title svg {
            width: 22px;
            height: 22px;
            color: #4b7942;
            transition: all 0.3s ease;
        }
        .dashboard-card:hover .card-title svg {
            transform: scale(1.15) rotate(5deg);
            color: #2d5a27;
        }
        .dashboard-card .card-value {
            font-size: 2.2rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 8px;
            background: linear-gradient(135deg, #263a29 0%, #4b7942 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: countUp 1s ease-out;
        }
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .dashboard-card .card-growth {
            color: #2ca14a;
            font-size: 0.95rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .recent-activity {
            background: linear-gradient(135deg, #ffffff 0%, #fafbf9 100%);
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(44, 62, 80, 0.06);
            border: 1px solid rgba(227, 231, 223, 0.6);
            margin-top: 24px;
            padding: 28px 32px;
            display: flex;
            flex-direction: column;
            height: 400px;
            animation: slideUp 0.6s ease-out 0.7s both;
            position: relative;
            overflow: hidden;
        }
        .recent-activity::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #4b7942 0%, #a8d5a1 100%);
        }
        .recent-activity-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 20px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .recent-activity-title::before {
            content: '●';
            color: #4b7942;
            font-size: 0.7em;
            animation: pulse 2s ease-in-out infinite;
        }
        .activity-list {
            list-style: none;
            padding: 0;
            margin: 0;
            overflow-y: auto;
            overflow-x: hidden;
            flex: 1 1 auto;
            min-height: 0;
            scrollbar-width: thin;
            scrollbar-color: #c3d1bb transparent;
        }
        .activity-list::-webkit-scrollbar {
            width: 6px;
        }
        .activity-list::-webkit-scrollbar-track {
            background: transparent;
        }
        .activity-list::-webkit-scrollbar-thumb {
            background: #c3d1bb;
            border-radius: 3px;
        }
        .activity-list::-webkit-scrollbar-thumb:hover {
            background: #a8d5a1;
        }
        .activity-item {
            padding: 14px 16px;
            border-bottom: 1px solid rgba(227, 231, 223, 0.5);
            color: #263a29;
            font-size: 1.05rem;
            transition: all 0.3s ease;
            border-radius: 6px;
            margin-bottom: 4px;
            animation: fadeInSlide 0.4s ease-out both;
            position: relative;
            left: 0;
        }
        .activity-item:hover {
            background: rgba(168, 213, 161, 0.08);
            border-color: #a8d5a1;
            left: 8px;
            box-shadow: -4px 0 0 #a8d5a1;
        }
        .activity-item:last-child {
            border-bottom: none;
        }
        @keyframes fadeInSlide {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .activity-item:nth-child(1) { animation-delay: 0.05s; }
        .activity-item:nth-child(2) { animation-delay: 0.1s; }
        .activity-item:nth-child(3) { animation-delay: 0.15s; }
        .activity-item:nth-child(4) { animation-delay: 0.2s; }
        .activity-item:nth-child(5) { animation-delay: 0.25s; }
        .activity-item:nth-child(6) { animation-delay: 0.3s; }
        .activity-item:nth-child(7) { animation-delay: 0.35s; }
        .activity-item:nth-child(8) { animation-delay: 0.4s; }
        .activity-meta {
            color: #6b7b5e;
            font-size: 0.95rem;
            margin-left: 8px;
            font-weight: 500;
        }
        @media (max-width: 900px) {
            .dashboard-cards {
                flex-direction: column;
            }
            .dashboard-content {
                padding: 24px 8vw 0 8vw;
            }
        }
        @media (max-width: 600px) {
            .sidebar {
                width: 100px;
                padding: 16px 0 0 0;
            }
            .main-content {
                padding: 0;
            }
            .dashboard-content {
                padding: 18px 2vw 0 2vw;
            }
        }
        .logout-modal {
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
        @keyframes fadeInModal {
            from {
                opacity: 0;
                backdrop-filter: blur(0);
            }
            to {
                opacity: 1;
                backdrop-filter: blur(4px);
            }
        }
        .logout-modal-content {
            background: #fff;
            border-radius: 16px;
            max-width: 380px;
            width: 90vw;
            padding: 36px 28px;
            box-shadow: 0 12px 48px rgba(44,62,80,0.20);
            text-align: center;
            animation: scaleInModal 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(227, 231, 223, 0.6);
        }
        @keyframes scaleInModal {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }
        .logout-modal-title {
            font-size: 1.35rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 20px;
        }
        .logout-modal-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 24px;
        }
        .logout-btn-confirm {
            background: linear-gradient(135deg, #2d5a27 0%, #24481f 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(45, 90, 39, 0.2);
            position: relative;
            overflow: hidden;
        }
        .logout-btn-confirm::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .logout-btn-confirm:hover::before {
            left: 100%;
        }
        .logout-btn-confirm:hover {
            background: linear-gradient(135deg, #24481f 0%, #1d3a18 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 90, 39, 0.3);
        }
        .logout-btn-confirm:active {
            transform: translateY(0);
        }
        .logout-btn-cancel {
            background: #e3e7df;
            color: #263a29;
            border: 1px solid #d3d7cf;
            border-radius: 8px;
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .logout-btn-cancel:hover {
            background: #d3d7cf;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(44, 62, 80, 0.1);
        }
        .logout-btn-cancel:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
<div class="admin-layout">
    @include('admin.partials.sidebar')
    <div class="main-content">
        @include('admin.partials.topbar')
        <div class="dashboard-content">
            <div class="dashboard-title">Dashboard</div>
            <div class="dashboard-subtitle">Welcome to the IP Healers Academy dashboard.</div>
            <div class="dashboard-cards">
                <div class="dashboard-card">
                    <div class="card-title"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20v-2a8 8 0 0116 0v2"/></svg>Healers</div>
                    <div class="card-value">{{ number_format($healerCount) }}</div>
                    <div class="card-growth">
                        @if($healerGrowth > 0)
                            +{{ $healerGrowth }} new in last 24 hours
                        @else
                            No new healers in last 24 hours
                        @endif
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card-title"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2C7 7 2 12 12 22C22 12 17 7 12 2Z"/><path d="M12 12v10"/><path d="M12 12l4-4"/><path d="M12 12l-4-4"/></svg>Plants</div>
                    <div class="card-value">{{ number_format($plantCount) }}</div>
                    <div class="card-growth">
                        @if($plantGrowth > 0)
                            +{{ $plantGrowth }} new in last 24 hours
                        @else
                            No new plants in last 24 hours
                        @endif
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card-title"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polygon points="8,5 19,12 8,19 8,5"/></svg>Tutorials</div>
                    <div class="card-value">{{ number_format($tutorialCount) }}</div>
                    <div class="card-growth">
                        @if($tutorialGrowth > 0)
                            +{{ $tutorialGrowth }} new in last 24 hours
                        @else
                            No new tutorials in last 24 hours
                        @endif
                    </div>
                </div>
                <div class="dashboard-card">
                    <div class="card-title"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="9" cy="7" r="4"/><circle cx="17" cy="17" r="3"/><path d="M2 21v-2a7 7 0 017-7h2a7 7 0 017 7v2"/></svg>Users</div>
                    <div class="card-value">{{ number_format($userCount) }}</div>
                    <div class="card-growth">
                        @if($userGrowth > 0)
                            +{{ $userGrowth }} new in last 24 hours
                        @else
                            No new users in last 24 hours
                        @endif
                    </div>
                </div>
            </div>
            <div class="recent-activity">
                <div class="recent-activity-title">Recent Activity</div>
                <ul class="activity-list">
                    @forelse($recentActivities as $activity)
                        <li class="activity-item">
                            {{ $activity->user ? $activity->user->name : 'System' }} {{ $activity->description }}
                            <span class="activity-meta">{{ $activity->created_at->diffForHumans() }}</span>
                        </li>
                    @empty
                        <li class="activity-item">No recent activity.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@include('admin.partials.logout_modal')
<script>
    // Ensure logout modal and buttons are wired to submit the real logout form
    (function(){
        const logoutBtn = document.getElementById('logoutBtn');
        const logoutModal = document.getElementById('logoutModal'); // existing modal partial
        const cancelBtn = document.getElementById('cancelLogout');
        const confirmBtn = document.getElementById('confirmLogout');
        const logoutForm = document.getElementById('logoutForm');

        if (logoutBtn) {
            logoutBtn.addEventListener('click', function(e){
                e.preventDefault();
                // if modal exists show it, otherwise submit immediately
                if (logoutModal) {
                    logoutModal.style.display = 'flex';
                } else {
                    if (logoutForm) logoutForm.submit();
                }
            });
        }

        if (cancelBtn) {
            cancelBtn.addEventListener('click', function(e){
                e.preventDefault();
                if (logoutModal) logoutModal.style.display = 'none';
            });
        }

        if (confirmBtn) {
            confirmBtn.addEventListener('click', function(e){
                e.preventDefault();
                if (logoutForm) {
                    logoutForm.submit();
                } else {
                    // fallback: navigate to logout route (GET) if form missing
                    window.location.href = "{{ url('/logout') }}";
                }
            });
        }
    })();
</script>
</body>
</html>