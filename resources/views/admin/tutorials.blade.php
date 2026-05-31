<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorials - IP Healers Academy Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <style>
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slideInLeft { from { opacity: 0; transform: translateX(-20px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes slideInRight { from { opacity: 0; transform: translateX(20px); } to { opacity: 1; transform: translateX(0); } }
        @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.05); } }
        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0.3; } }
        @keyframes scaleIn { from { opacity: 0; transform: scale(0.9); } to { opacity: 1; transform: scale(1); } }
        @keyframes fadeInModal { from { opacity: 0; backdrop-filter: blur(0); } to { opacity: 1; backdrop-filter: blur(4px); } }
        @keyframes scaleInModal { from { opacity: 0; transform: scale(0.9) translateY(-20px); } to { opacity: 1; transform: scale(1) translateY(0); } }
        
        * { box-sizing: border-box; }
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            background: linear-gradient(135deg, #f7f8f5 0%, #eef2eb 100%);
            font-family: 'Inter', Arial, sans-serif;
        }
        .admin-layout {
            display: flex;
            height: 100vh;
            animation: fadeIn 0.6s ease-in-out;
        }
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #2d5a27 0%, #234920 100%);
            border-right: 1px solid rgba(227, 231, 223, 0.2);
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
        .sidebar {
            width: 250px;
            background: linear-gradient(180deg, #2d5a27 0%, #234920 100%);
            border-right: 1px solid rgba(227, 231, 223, 0.2);
            display: flex;
            flex-direction: column;
            padding: 24px 0 32px 0;
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
        .sidebar .logo svg {
            width: 26px;
            height: 26px;
            color: #a8d5a1;
            flex-shrink: 0;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
            animation: pulse 2s ease-in-out infinite;
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
            flex-shrink: 0;
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
        }
        .topbar .user-avatar {
            background: #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: #16a34a;
            font-size: 1.1rem;
        }
        .topbar .user-name {
            color: #fff;
            font-weight: 600;
        }
        .content-area {
            padding: 36px 48px 0 48px;
            display: flex;
            flex-direction: column;
            flex: 1;
            min-height: 0;
        }
        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
            flex-shrink: 0;
        }
        .content-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #263a29;
            animation: slideUp 0.6s ease-out 0.1s both;
        }
        .content-desc {
            color: #6b7b5e;
            font-size: 1.05rem;
            margin-bottom: 18px;
            animation: slideUp 0.6s ease-out 0.2s both;
        }
        .add-btn {
            background: linear-gradient(135deg, #2d5a27 0%, #24481f 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 24px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(45, 90, 39, 0.2);
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .add-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .add-btn:hover::before {
            left: 100%;
        }
        .add-btn:hover {
            background: linear-gradient(135deg, #24481f 0%, #1d3a18 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 90, 39, 0.3);
        }
        .add-btn:active {
            transform: translateY(0);
        }
        .search-bar {
            margin-bottom: 18px;
            flex-shrink: 0;
        }
        .search-bar input {
            width: 100%;
            padding: 10px 16px;
            border: 1.5px solid #e3e7df;
            border-radius: 6px;
            font-size: 1rem;
            background: #f7f8f5;
            color: #263a29;
            outline: none;
            transition: all 0.3s ease;
            animation: slideUp 0.6s ease-out 0.3s both;
        }
        .search-bar input:focus {
            border: 1.5px solid #4b7942;
            box-shadow: 0 0 0 3px rgba(75, 121, 66, 0.1);
            transform: translateY(-1px);
        }

        .tutorials-table th, .tutorials-table td {
            padding: 16px 12px;
            text-align: left;
            vertical-align: top;
        }
        .description-wrapper {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .tutorials-table th {
            color: #6b7b5e;
            font-size: 1.05rem;
            font-weight: 600;
            background: #f7f8f5;
        }
        .tutorials-table td {
            color: #263a29;
            font-size: 1.05rem;
            border-top: 1px solid #e3e7df;
        }
        .tutorial-title {
            font-weight: 700;
            color: #0a2a5c;
        }
        .tutorial-link {
            color: #23a36d;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 4px;
            cursor: pointer;
            transition: color 0.2s;
        }
        .tutorial-link:hover {
            color: #1a7a4f;
            text-decoration: underline;
        }
        .tutorial-link svg {
            width: 16px;
            height: 16px;
            color: #23a36d;
        }
        .tutorial-dates {
            color: #6b7b5e;
            font-size: 0.98rem;
        }
        .tutorial-description {
            color: #263a29;
            font-size: 1.05rem;
            max-width: 300px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }
        .tutorial-description.expanded {
            -webkit-line-clamp: unset;
            display: block;
        }
        .see-more-btn-admin {
            background: none;
            border: none;
            color: #2d5a27;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            padding: 0;
            margin-top: 4px;
            text-decoration: none;
            transition: color 0.2s;
            display: inline-block;
        }
        .see-more-btn-admin:hover {
            color: #24481f;
            text-decoration: underline;
        }
        .action-links {
            display: flex;
            gap: 16px;
        }
        .edit-link {
            color: #188a5a;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }
        .delete-link {
            color: #e74c3c;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
        }
        .table-footer {
            background: #f7f8f5;
            padding: 12px 16px;
            color: #6b7b5e;
            font-size: 0.98rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
            border: 1px solid rgba(227, 231, 223, 0.6);
            border-top: none;
            border-radius: 0 0 12px 12px;
            margin-top: -1px;
        }
        .pagination {
            display: flex;
            gap: 8px;
        }
        .pagination button {
            background: #fff;
            border: 1.5px solid #e3e7df;
            border-radius: 6px;
            padding: 6px 16px;
            color: #263a29;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.2s;
        }
        .pagination button:hover {
            background: #eaf3ea;
        }
        .logout-btn-confirm {
            background: #2d5a27;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px 24px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .logout-btn-confirm:hover {
            background: #24481f;
        }
        /* Delete Confirmation Modal Styles */
        .delete-modal {
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
        .delete-modal-content {
            background: #fff;
            border-radius: 16px;
            max-width: 400px;
            width: 90vw;
            padding: 36px 28px;
            box-shadow: 0 12px 48px rgba(44,62,80,0.20);
            text-align: center;
            animation: scaleInModal 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(227, 231, 223, 0.6);
        }
        .delete-modal-icon {
            width: 48px;
            height: 48px;
            background: #fee2e2;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px auto;
        }
        .delete-modal-icon svg {
            width: 24px;
            height: 24px;
            color: #dc2626;
        }
        .delete-modal-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 8px;
        }
        .delete-modal-message {
            color: #6b7b5e;
            font-size: 1rem;
            margin-bottom: 24px;
            line-height: 1.5;
        }
        .delete-modal-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
        }
        .delete-btn-cancel {
            background: #e3e7df;
            color: #263a29;
            border: 1px solid #d3d7cf;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .delete-btn-cancel:hover {
            background: #d3d7cf;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(44, 62, 80, 0.1);
        }
        .delete-btn-cancel:active {
            transform: translateY(0);
        }
        .delete-btn-confirm {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
            position: relative;
            overflow: hidden;
        }
        .delete-btn-confirm::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .delete-btn-confirm:hover::before {
            left: 100%;
        }
        .delete-btn-confirm:hover {
            background: linear-gradient(135deg, #b91c1c 0%, #991b1b 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.3);
        }
        .delete-btn-confirm:active {
            transform: translateY(0);
        }
        @media (max-width: 900px) {
            .content-area {
                padding: 24px 8vw 0 8vw;
            }
            .table-container {
                max-height: calc(100vh - 350px);
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
            .content-area {
                padding: 18px 2vw 0 2vw;
            }
            .tutorial-description {
                max-width: 200px;
                font-size: 0.95rem;
            }
            .see-more-btn-admin {
                font-size: 0.85rem;
            }
            .table-container {
                max-height: calc(100vh - 300px);
            }
            .tutorial-video-modal-content {
                max-width: 95vw;
                padding: 16px;
            }
            .tutorial-video-modal-title {
                font-size: 1.1rem;
            }
            .tutorial-video-iframe-container {
                padding-bottom: 56.25%; /* Maintain 16:9 on mobile */
            }
        }
        /* Custom Alert Styles */
        .custom-alert {
            display: none;
            position: fixed;
            z-index: 3000;
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
        .custom-alert-content {
            background: #fff;
            border-radius: 16px;
            max-width: 400px;
            width: 90vw;
            padding: 36px 28px;
            box-shadow: 0 12px 48px rgba(44,62,80,0.20);
            text-align: center;
            position: relative;
            animation: scaleInModal 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(227, 231, 223, 0.6);
        }
        .custom-alert-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px auto;
        }
        .custom-alert-icon.success {
            background: #dcfce7;
        }
        .custom-alert-icon.error {
            background: #fee2e2;
        }
        .custom-alert-icon svg {
            width: 24px;
            height: 24px;
        }
        .custom-alert-icon.success svg {
            color: #16a34a;
        }
        .custom-alert-icon.error svg {
            color: #dc2626;
        }
        .custom-alert-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #263a29;
            margin-bottom: 8px;
        }
        .custom-alert-message {
            color: #6b7b5e;
            font-size: 1rem;
            margin-bottom: 24px;
            line-height: 1.5;
        }
        .custom-alert-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
        }
        .custom-alert-btn {
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .custom-alert-btn-primary {
            background: linear-gradient(135deg, #2d5a27 0%, #24481f 100%);
            color: #fff;
            box-shadow: 0 4px 12px rgba(45, 90, 39, 0.2);
            position: relative;
            overflow: hidden;
        }
        .custom-alert-btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .custom-alert-btn-primary:hover::before {
            left: 100%;
        }
        .custom-alert-btn-primary:hover {
            background: linear-gradient(135deg, #24481f 0%, #1d3a18 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(45, 90, 39, 0.3);
        }
        .custom-alert-btn-primary:active {
            transform: translateY(0);
        }
        .custom-alert-btn-secondary {
            background: #e3e7df;
            color: #263a29;
            border: 1px solid #d3d7cf;
        }
        .custom-alert-btn-secondary:hover {
            background: #d3d7cf;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(44, 62, 80, 0.1);
        }
        .custom-alert-btn-secondary:active {
            transform: translateY(0);
        }
        /* Tutorial Video Modal */
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
            animation: fadeInModal 0.3s ease-out;
        }
        .tutorial-video-modal-content {
            background: #fff;
            border-radius: 16px;
            max-width: 90vw;
            max-height: 90vh;
            width: 1200px;
            padding: 24px;
            box-shadow: 0 12px 48px rgba(44,62,80,0.20);
            position: relative;
            animation: scaleInModal 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(227, 231, 223, 0.6);
            display: flex;
            flex-direction: column;
        }
        .tutorial-video-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
            padding-bottom: 12px;
            border-bottom: 2px solid #e3e7df;
            position: relative;
            z-index: 10;
        }
        .tutorial-video-modal-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #263a29;
            font-family: 'Playfair Display', serif;
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
            transition: all 0.2s;
            padding: 0;
            margin: 0;
            line-height: 1;
            position: relative;
            z-index: 10;
            pointer-events: auto;
        }
        .tutorial-video-close-btn:hover {
            background: #e3e7df;
            color: #263a29;
            transform: scale(1.1);
        }
        .tutorial-video-close-btn:active {
            transform: scale(0.95);
        }
        .tutorial-video-iframe-container {
            width: 100%;
            position: relative;
            background: #000;
            border-radius: 8px;
            overflow: hidden;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
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
        }
        .tutorial-video-fallback a {
            color: #23a36d;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .tutorial-video-fallback a:hover {
            text-decoration: underline;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
            max-height: calc(100vh - 400px);
            overflow-y: auto;
            border: 1px solid rgba(227, 231, 223, 0.6);
            border-bottom: none;
            border-radius: 12px 12px 0 0;
            background: linear-gradient(135deg, #ffffff 0%, #fafbf9 100%);
            box-shadow: 0 4px 16px rgba(44, 62, 80, 0.06);
            animation: slideUp 0.6s ease-out 0.4s both;
        }
        .table-container .tutorials-table {
            width: 100%;
            min-width: 900px;
            border-collapse: collapse;
        }
        /* Hide ID column */
        .tutorials-table th:nth-child(1),
        .tutorials-table td:nth-child(1) {
            display: none;
        }
        /* Hide Dates column */
        .tutorials-table th:nth-child(8),
        .tutorials-table td:nth-child(8) {
            display: none;
        }
        .tutorials-table thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background: #f7f8f5;
        }
        .tutorials-table thead th {
            box-shadow: 0 2px 4px rgba(44, 62, 80, 0.08);
        }
        .table-container::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        .table-container::-webkit-scrollbar-track {
            background: #f7f8f5;
            border-radius: 4px;
        }
        .table-container::-webkit-scrollbar-thumb {
            background: #b2c7b0;
            border-radius: 4px;
        }
        .table-container::-webkit-scrollbar-thumb:hover {
            background: #4b7942;
        }
    </style>
</head>
<body>
<div class="admin-layout">
    @include('admin.partials.sidebar')
    <div class="main-content">
        @include('admin.partials.topbar')
        <div class="content-area">
            <div class="content-header">
                <div>
                    <div class="content-title">Tutorials</div>
                    <div class="content-desc">Educational content and resources about traditional medicine.</div>
                </div>
                <button class="add-btn" id="openAddModal">Add new</button>
            </div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search tutorials...">
            </div>
            <div class="table-container">
                <table class="tutorials-table" id="tutorialsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Difficulty</th>
                            <th>Link</th>
                            <th>Dates</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($tutorials as $tutorial)
                        <tr>
                            <td>{{ $tutorial->id }}</td>
                            <td>
                                @if($tutorial->image)
                                    <img src="{{ asset('storage/' . $tutorial->image) }}" alt="{{ $tutorial->title }}" style="width:60px;height:40px;object-fit:cover;border-radius:4px;">
                                @else
                                    -
                                @endif
                            </td>
                            <td class="tutorial-title">{{ $tutorial->title }}</td>
                            <td>
                                <div class="description-wrapper">
                                    <div class="tutorial-description" data-full-text="{{ $tutorial->description }}">{{ $tutorial->description }}</div>
                                    <button class="see-more-btn-admin" style="display:none;">See more</button>
                                </div>
                            </td>
                            <td>{{ $tutorial->category }}</td>
                            <td>{{ $tutorial->difficulty }}</td>
                            <td><a href="#" class="tutorial-link" data-tutorial-link="{{ $tutorial->link }}" data-tutorial-link-tagakaulo="{{ $tutorial->link_tagakaulo ?? '' }}" data-tutorial-link-bagobo="{{ $tutorial->link_bagobo ?? '' }}" data-tutorial-title="{{ $tutorial->title }}">View Tutorial</a></td>
                            <td class="tutorial-dates">Created: {{ $tutorial->created_at->format('n/j/Y') }}<br>Updated: {{ $tutorial->updated_at->format('n/j/Y') }}</td>
                            <td>
                                <div class="action-links">
                                    <a href="#" class="edit-link">Edit</a>
                                    <a href="#" class="delete-link">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" style="text-align:center; color:#6b7b5e;">No tutorials found.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="table-footer">
                <div>Showing 1 to 3 of 3 results</div>
                <div class="pagination">
                    <button>Previous</button>
                    <button>Next</button>
                </div>
            </div>
            <!-- Add New Tutorial Modal -->
            <div id="addTutorialModal" class="modal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100vw; height:100vh; background:rgba(38,58,41,0.18); align-items:flex-start; justify-content:center; overflow-y:auto; padding-top:40px;">
                <div style="background:#fff; border-radius:12px; max-width:480px; width:95vw; padding:32px 28px; box-shadow:0 4px 32px rgba(44,62,80,0.10); position:relative; max-height:90vh; overflow-y:auto;">
                    <div style="font-size:1.3rem; font-weight:700; color:#263a29; margin-bottom:18px;">Add New Tutorial</div>
                    <form id="addTutorialForm" enctype="multipart/form-data">
                        @csrf
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Image</label><br><input type="file" name="image" accept="image/*" style="width:100%;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Title</label><br><input type="text" name="title" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Description</label><br><textarea name="description" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Category</label><br>
    <div id="addCategoryOptions" style="display:flex;flex-wrap:wrap;gap:8px;margin-top:8px;">
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Pain Reliever"> Pain Reliever
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Respiratory"> Respiratory
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Fever"> Fever
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Antibacterial"> Antibacterial
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Antidiabetic"> Antidiabetic
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Urination"> Urination
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Antihypertensive"> Antihypertensive
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Digestive"> Digestive
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Anti-Parasite"> Anti-Parasite
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Anti-inflammatory"> Anti-inflammatory
        </label>
    </div></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Difficulty</label><br><input type="text" name="difficulty" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Link (General)</label><br><input type="text" name="link" placeholder="Optional" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Link - Tagakaulo Tribe</label><br><input type="text" name="link_tagakaulo" placeholder="Optional" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Link - Bagobo Tribe</label><br><input type="text" name="link_bagobo" placeholder="Optional" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="display:flex; gap:12px; justify-content:flex-end; margin-top:24px;"><button type="button" id="cancelAddTutorial" style="background:#e3e7df; color:#263a29; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Cancel</button><button type="submit" style="background:#23a36d; color:#fff; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Save</button></div>
                    </form>
                </div>
            </div>
            <!-- Edit Tutorial Modal -->
            <div id="editTutorialModal" class="modal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100vw; height:100vh; background:rgba(38,58,41,0.18); align-items:center; justify-content:center;">
                <div style="background:#fff; border-radius:12px; max-width:480px; width:95vw; padding:32px 28px; box-shadow:0 4px 32px rgba(44,62,80,0.10); position:relative; max-height:90vh; overflow-y:auto;">
                    <div style="font-size:1.3rem; font-weight:700; color:#263a29; margin-bottom:18px;">Edit Tutorial</div>
                    <form id="editTutorialForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="tutorial_id" id="editTutorialId">
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Image</label><br><input type="file" name="image" id="editTutorialImageInput" accept="image/*" style="width:100%;"><div id="editTutorialImagePreview" style="margin-top:8px;"></div></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Title</label><br><input type="text" name="title" id="editTutorialTitle" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Description</label><br><textarea name="description" id="editTutorialDescription" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Category</label><br>
    <div id="editCategoryOptions" style="display:flex;flex-wrap:wrap;gap:8px;margin-top:8px;">
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Pain Reliever"> Pain Reliever
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Respiratory"> Respiratory
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Fever"> Fever
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Antibacterial"> Antibacterial
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Antidiabetic"> Antidiabetic
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Urination"> Urination
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Antihypertensive"> Antihypertensive
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Digestive"> Digestive
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Anti-Parasite"> Anti-Parasite
        </label>
        <label style="background:#eef6ea;border-radius:20px;padding:8px 12px;display:inline-flex;align-items:center;gap:8px;">
            <input type="checkbox" name="category" value="Anti-inflammatory"> Anti-inflammatory
        </label>
    </div></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Difficulty</label><br><input type="text" name="difficulty" id="editTutorialDifficulty" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Link (General)</label><br><input type="text" name="link" id="editTutorialLink" placeholder="Optional" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Link - Tagakaulo Tribe</label><br><input type="text" name="link_tagakaulo" id="editTutorialLinkTagakaulo" placeholder="Optional" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Link - Bagobo Tribe</label><br><input type="text" name="link_bagobo" id="editTutorialLinkBagobo" placeholder="Optional" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="display:flex; gap:12px; justify-content:flex-end; margin-top:24px;"><button type="button" id="cancelEditTutorial" style="background:#e3e7df; color:#263a29; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Cancel</button><button type="submit" style="background:#23a36d; color:#fff; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Save</button></div>
                    </form>
                </div>
            </div>
            <!-- Delete Confirmation Modal -->
            <div id="deleteTutorialModal" class="delete-modal">
                <div class="delete-modal-content">
                    <div class="delete-modal-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><path d="M12 9v2m0 4h.01"/></svg>
                    </div>
                    <div class="delete-modal-title">Confirm Deletion</div>
                    <div class="delete-modal-message">Are you sure you want to delete this tutorial? This action cannot be undone.</div>
                    <div class="delete-modal-actions">
                        <button type="button" class="delete-btn-cancel" id="cancelDeleteTutorial">Cancel</button>
                        <button type="button" class="delete-btn-confirm" id="confirmDeleteTutorial">Delete</button>
                    </div>
                </div>
            </div>
            <script>
                // Custom Alert Function
                function showCustomAlert(type, title, message, callback) {
                    const alertModal = document.getElementById('customAlert');
                    const alertIcon = document.getElementById('alertIcon');
                    const alertTitle = document.getElementById('alertTitle');
                    const alertMessage = document.getElementById('alertMessage');
                    const alertOkBtn = document.getElementById('alertOkBtn');
                    
                    // Set icon and styling based on type
                    if (type === 'success') {
                        alertIcon.className = 'custom-alert-icon success';
                        alertIcon.innerHTML = '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
                    } else if (type === 'error') {
                        alertIcon.className = 'custom-alert-icon error';
                        alertIcon.innerHTML = '<svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>';
                    }
                    
                    alertTitle.textContent = title;
                    alertMessage.textContent = message;
                    
                    // Show modal
                    alertModal.style.display = 'flex';
                    
                    // Handle OK button click
                    alertOkBtn.onclick = function() {
                        alertModal.style.display = 'none';
                        if (callback) callback();
                    };
                    
                    // Auto-hide after 3 seconds for success messages
                    if (type === 'success') {
                        setTimeout(() => {
                            if (alertModal.style.display === 'flex') {
                                alertModal.style.display = 'none';
                                if (callback) callback();
                            }
                        }, 3000);
                    }
                }

                document.getElementById('openAddModal').onclick = function() {
                    document.getElementById('addTutorialModal').style.display = 'flex';
                };
                document.getElementById('cancelAddTutorial').onclick = function() {
                    document.getElementById('addTutorialModal').style.display = 'none';
                };
                document.getElementById('addTutorialForm').onsubmit = async function(e) {
                    e.preventDefault();
                    const form = e.target;
                    const formData = new FormData(form);
                    // collect checked categories and append as comma-separated string
                    const checkedAdd = Array.from(form.querySelectorAll('#addCategoryOptions input[name="category"]:checked')).map(i=>i.value);
                    // remove any existing category entries and set single CSV value
                    formData.delete('category');
                    formData.append('category', checkedAdd.join(','));
                    // Get CSRF token from meta tag or blade directive
                    let token = document.querySelector('meta[name="csrf-token"]');
                    if (!token) {
                        // fallback: try to get from Laravel's @csrf directive if present
                        token = document.querySelector('input[name="_token"]');
                        token = token ? token.value : '';
                    } else {
                        token = token.content;
                    }
                    try {
                        const response = await fetch('/admin/tutorials', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': token,
                                'Accept': 'application/json',
                            },
                            body: formData
                        });
                        if (response.ok) {
                            document.getElementById('addTutorialModal').style.display = 'none';
                            showCustomAlert('success', 'Success', 'Tutorial added successfully!', function() {
                                window.location.reload();
                            });
                        } else {
                            const data = await response.json();
                            showCustomAlert('error', 'Error', 'Failed to add tutorial: ' + (data.message || 'Validation error'));
                        }
                    } catch (err) {
                        showCustomAlert('error', 'Error', 'An error occurred.');
                    }
                };
                // Edit button logic
                const editLinks = document.querySelectorAll('.edit-link');
                editLinks.forEach((btn, idx) => {
                    btn.onclick = function(e) {
                        e.preventDefault();
                        // Find the row and extract data
                        const row = btn.closest('tr');
                        const id = row.children[0].textContent.trim( );
                        const imgCell = row.children[1];
                        const title = row.querySelector('.tutorial-title').textContent.trim();
                        const description = row.children[3].textContent.trim();
                        const category = row.children[4].textContent.trim();
                        const difficulty = row.children[5].textContent.trim();
                        const linkEl = row.querySelector('.tutorial-link');
                        const link = linkEl.getAttribute('data-tutorial-link');
                        const linkTagakaulo = linkEl.getAttribute('data-tutorial-link-tagakaulo') || '';
                        const linkBagobo = linkEl.getAttribute('data-tutorial-link-bagobo') || '';
                        document.getElementById('editTutorialId').value = id;
                        document.getElementById('editTutorialTitle').value = title;
                        document.getElementById('editTutorialDescription').value = description;
                        // populate checkboxes in edit modal from comma-separated category string
                        const categories = category ? category.split(',').map(s=>s.trim()) : [];
                        document.querySelectorAll('#editCategoryOptions input[name="category"]').forEach(opt=>{
                            opt.checked = categories.includes(opt.value);
                        });
                        document.getElementById('editTutorialDifficulty').value = difficulty;
                        document.getElementById('editTutorialLink').value = link;
                        document.getElementById('editTutorialLinkTagakaulo').value = linkTagakaulo;
                        document.getElementById('editTutorialLinkBagobo').value = linkBagobo;
                        // Image preview
                        const preview = document.getElementById('editTutorialImagePreview');
                        preview.innerHTML = '';
                        const img = imgCell.querySelector('img');
                        if (img) {
                            const previewImg = document.createElement('img');
                            previewImg.src = img.src;
                            previewImg.style.maxWidth = '120px';
                            previewImg.style.maxHeight = '120px';
                            previewImg.style.borderRadius = '8px';
                            previewImg.style.marginTop = '4px';
                            preview.appendChild(previewImg);
                        }
                        document.getElementById('editTutorialModal').style.display = 'flex';
                    };
                });
                document.getElementById('cancelEditTutorial').onclick = function() {
                    document.getElementById('editTutorialForm').reset();
                    document.getElementById('editTutorialImagePreview').innerHTML = '';
                    document.getElementById('editTutorialModal').style.display = 'none';
                };
                document.getElementById('editTutorialImageInput').onchange = function(e) {
                    var preview = document.getElementById('editTutorialImagePreview');
                    preview.innerHTML = '';
                    if (e.target.files && e.target.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(ev) {
                            var img = document.createElement('img');
                            img.src = ev.target.result;
                            img.style.maxWidth = '120px';
                            img.style.maxHeight = '120px';
                            img.style.borderRadius = '8px';
                            img.style.marginTop = '4px';
                            preview.appendChild(img);
                        };
                        reader.readAsDataURL(e.target.files[0]);
                    }
                };
                document.getElementById('editTutorialForm').onsubmit = async function(e) {
                    e.preventDefault();
                    const id = document.getElementById('editTutorialId').value;
                    // collect checked categories from edit modal and send as CSV
                    const checkedEdit = Array.from(document.querySelectorAll('#editCategoryOptions input[name="category"]:checked')).map(i=>i.value);
                    const categoriesCsv = checkedEdit.join(',');
                    let token = document.querySelector('meta[name="csrf-token"]');
                    if (!token) {
                        token = document.querySelector('input[name="_token"]');
                        token = token ? token.value : '';
                    } else {
                        token = token.content;
                    }

                    try {
                        const form = document.getElementById('editTutorialForm');
                        const formData = new FormData(form);
                        // ensure category CSV is set
                        formData.delete('category');
                        formData.append('category', categoriesCsv);
                        // method override for PUT
                        formData.append('_method', 'PUT');

                        const response = await fetch(`/admin/tutorials/${id}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': token,
                                'Accept': 'application/json',
                            },
                            body: formData
                        });

                        if (response.ok) {
                            document.getElementById('editTutorialModal').style.display = 'none';
                            showCustomAlert('success', 'Success', 'Tutorial updated successfully!', function() {
                                window.location.reload();
                            });
                        } else {
                            const data = await response.json();
                            showCustomAlert('error', 'Error', 'Failed to update tutorial: ' + (data.message || 'Validation error'));
                        }
                    } catch (err) {
                        showCustomAlert('error', 'Error', 'An error occurred.');
                    }
                };
                // Delete button logic
                const deleteLinks = document.querySelectorAll('.delete-link');
                deleteLinks.forEach((btn, idx) => {
                    btn.onclick = async function(e) {
                        e.preventDefault();
                        const tutorialId = btn.closest('tr').children[0].textContent.trim();
                        document.getElementById('deleteTutorialModal').style.display = 'flex';
                        document.getElementById('confirmDeleteTutorial').onclick = async function() {
                            let token = document.querySelector('meta[name="csrf-token"]');
                            if (!token) {
                                token = document.querySelector('input[name="_token"]');
                                token = token ? token.value : '';
                            } else {
                                token = token.content;
                            }
                            try {
                                const response = await fetch(`/admin/tutorials/${tutorialId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': token,
                                        'Accept': 'application/json',
                                    }
                                });
                                if (response.ok) {
                                    document.getElementById('deleteTutorialModal').style.display = 'none';
                                    showCustomAlert('success', 'Success', 'Tutorial deleted successfully!');
                                    window.location.reload();
                                } else {
                                    const data = await response.json();
                                    showCustomAlert('error', 'Error', 'Failed to delete tutorial: ' + (data.message || 'Error'));
                                }
                            } catch (err) {
                                showCustomAlert('error', 'Error', 'An error occurred.');
                            }
                        };
                        document.getElementById('cancelDeleteTutorial').onclick = function() {
                            document.getElementById('deleteTutorialModal').style.display = 'none';
                        };
                    };
                });
                document.getElementById('searchInput').addEventListener('input', function() {
                    const filter = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#tutorialsTable tbody tr');
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(filter) ? '' : 'none';
                    });
                });

                // See more/less functionality for descriptions
                function initializeSeeMoreButtons() {
                    const wrappers = document.querySelectorAll('.description-wrapper');
                    
                    wrappers.forEach((wrapper) => {
                        const desc = wrapper.querySelector('.tutorial-description');
                        const seeMoreBtn = wrapper.querySelector('.see-more-btn-admin');
                        
                        if (desc && seeMoreBtn) {
                            // Check if description is truncated
                            const lineHeight = parseFloat(getComputedStyle(desc).lineHeight);
                            const maxHeight = lineHeight * 2; // 2 lines
                            
                            // Use a small delay to ensure rendering is complete
                            setTimeout(() => {
                                if (desc.scrollHeight > maxHeight + 5) {
                                    seeMoreBtn.style.display = 'inline-block';
                                }
                            }, 100);
                            
                            // Toggle description
                            seeMoreBtn.addEventListener('click', function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                                
                                if (desc.classList.contains('expanded')) {
                                    desc.classList.remove('expanded');
                                    seeMoreBtn.textContent = 'See more';
                                } else {
                                    desc.classList.add('expanded');
                                    seeMoreBtn.textContent = 'See less';
                                }
                            });
                        }
                    });
                }
                
                // Initialize on page load
                document.addEventListener('DOMContentLoaded', initializeSeeMoreButtons);
                
                // Tutorial Video Modal Functionality
                function convertToEmbedUrl(url) {
                    if (!url) return null;
                    
                    // YouTube URL patterns
                    const youtubeRegex = /(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/;
                    const youtubeMatch = url.match(youtubeRegex);
                    if (youtubeMatch) {
                        return {
                            url: 'https://www.youtube.com/embed/' + youtubeMatch[1] + '?autoplay=1&rel=0',
                            type: 'youtube',
                            embeddable: true
                        };
                    }
                    
                    // Vimeo URL patterns
                    const vimeoRegex = /(?:vimeo\.com\/)(?:.*\/)?(\d+)/;
                    const vimeoMatch = url.match(vimeoRegex);
                    if (vimeoMatch) {
                        return {
                            url: 'https://player.vimeo.com/video/' + vimeoMatch[1] + '?autoplay=1',
                            type: 'vimeo',
                            embeddable: true
                        };
                    }
                    
                    // Direct video file (mp4, webm, ogg)
                    if (/\.(mp4|webm|ogg|mov|avi)(\?.*)?$/i.test(url)) {
                        return {
                            url: url,
                            type: 'direct',
                            embeddable: true
                        };
                    }
                    
                    // If it's already an embed URL, return as is
                    if (url.includes('/embed/') || url.includes('iframe')) {
                        return {
                            url: url,
                            type: 'embed',
                            embeddable: true
                        };
                    }
                    
                    // Generic URL - likely a webpage, not directly embeddable
                    return {
                        url: url,
                        type: 'generic',
                        embeddable: false
                    };
                }
                
                function openTutorialVideoModal(link, title) {
                    const modal = document.getElementById('tutorialVideoModal');
                    const iframeContainer = document.getElementById('tutorialVideoIframeContainer');
                    const iframe = document.getElementById('tutorialVideoIframe');
                    const fallback = document.getElementById('tutorialVideoFallback');
                    const modalTitle = document.getElementById('tutorialVideoModalTitle');
                    
                    modalTitle.textContent = title || 'Tutorial Video';
                    
                    const embedInfo = convertToEmbedUrl(link);
                    
                    // Reset iframe
                    iframe.src = '';
                    iframe.style.display = 'none';
                    fallback.style.display = 'none';
                    
                    if (embedInfo && embedInfo.embeddable) {
                        // Try to embed the video
                        iframe.src = embedInfo.url;
                        iframe.style.display = 'block';
                        
                        // Monitor iframe load
                        let loadTimeout;
                        iframe.onload = function() {
                            clearTimeout(loadTimeout);
                        };
                        
                        // Error handler for iframe
                        iframe.onerror = function() {
                            clearTimeout(loadTimeout);
                            // Iframe failed to load - show fallback
                            iframe.style.display = 'none';
                            fallback.style.display = 'flex';
                            const fallbackLink = fallback.querySelector('a');
                            if (fallbackLink) {
                                fallbackLink.href = link;
                                fallbackLink.textContent = 'Open Video in New Tab';
                            }
                        };
                        
                        // Fallback timeout
                        loadTimeout = setTimeout(() => {
                            // If iframe hasn't loaded in 5 seconds, might be blocked
                            // But don't force fallback - let it keep trying for YouTube/Vimeo
                        }, 5000);
                    } else {
                        // Not embeddable - show fallback immediately
                        iframe.style.display = 'none';
                        fallback.style.display = 'flex';
                        const fallbackLink = fallback.querySelector('a');
                        if (fallbackLink) {
                            fallbackLink.href = link;
                            fallbackLink.textContent = 'Open Video in New Tab';
                        }
                    }
                    
                    modal.style.display = 'flex';
                }
                
                function closeTutorialVideoModal() {
                    const modal = document.getElementById('tutorialVideoModal');
                    const iframe = document.getElementById('tutorialVideoIframe');
                    modal.style.display = 'none';
                    // Stop video playback by clearing src
                    iframe.src = '';
                }
                
                // Handle tutorial link clicks
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('tutorial-link') || e.target.closest('.tutorial-link')) {
                        e.preventDefault();
                        e.stopPropagation();
                        const link = e.target.closest('.tutorial-link') || e.target;
                        const tutorialLink = link.getAttribute('data-tutorial-link');
                        const tutorialTitle = link.getAttribute('data-tutorial-title');
                        if (tutorialLink) {
                            openTutorialVideoModal(tutorialLink, tutorialTitle);
                        }
                    }
                });
                
                // Close modal handlers - use event delegation to ensure it works
                document.addEventListener('click', function(e) {
                    // Close button click
                    if (e.target && (e.target.id === 'closeTutorialVideoModal' || e.target.closest('#closeTutorialVideoModal'))) {
                        e.preventDefault();
                        e.stopPropagation();
                        closeTutorialVideoModal();
                    }
                });
                
                // Close modal when clicking backdrop (but not on modal content)
                document.addEventListener('click', function(e) {
                    const videoModal = document.getElementById('tutorialVideoModal');
                    const modalContent = videoModal ? videoModal.querySelector('.tutorial-video-modal-content') : null;
                    if (videoModal && e.target === videoModal && !modalContent?.contains(e.target)) {
                        closeTutorialVideoModal();
                    }
                });
                
                // Close modal with Escape key
                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape') {
                        const modal = document.getElementById('tutorialVideoModal');
                        if (modal && modal.style.display === 'flex') {
                            closeTutorialVideoModal();
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
@include('admin.partials.logout_modal')
<script>document.addEventListener('DOMContentLoaded', function(){});</script>
<!-- Tutorial Video Modal -->
<div class="tutorial-video-modal" id="tutorialVideoModal">
    <div class="tutorial-video-modal-content">
        <div class="tutorial-video-modal-header">
            <div class="tutorial-video-modal-title" id="tutorialVideoModalTitle">Tutorial Video</div>
            <button type="button" class="tutorial-video-close-btn" id="closeTutorialVideoModal">&times;</button>
        </div>
        <div class="tutorial-video-iframe-container" id="tutorialVideoIframeContainer">
            <iframe id="tutorialVideoIframe" class="tutorial-video-iframe" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <div class="tutorial-video-fallback" id="tutorialVideoFallback" style="display: none;">
                <svg width="64" height="64" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                    <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div style="margin-bottom: 8px; font-weight: 600; color: #263a29;">Video Cannot Be Embedded</div>
                <div style="margin-bottom: 16px; max-width: 500px; line-height: 1.6;">
                    This video URL cannot be embedded in an iframe. Common reasons include:
                    <ul style="text-align: left; margin: 12px 0; padding-left: 24px;">
                        <li>The website blocks iframe embedding (X-Frame-Options header)</li>
                        <li>The URL is a webpage, not a direct video file or embed URL</li>
                        <li>Embedding is restricted by the video platform</li>
                    </ul>
                </div>
                <a href="#" target="_blank" style="color:#23a36d;text-decoration:none;font-weight:600;font-size:1.1rem;padding:12px 24px;border:2px solid #23a36d;border-radius:8px;display:inline-block;transition:all 0.2s;">Open Video in New Tab</a>
            </div>
        </div>
    </div>
</div>
<!-- Custom Alert Modal -->
<div class="custom-alert" id="customAlert">
    <div class="custom-alert-content">
        <div class="custom-alert-icon" id="alertIcon">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>
        <div class="custom-alert-title" id="alertTitle">Success</div>
        <div class="custom-alert-message" id="alertMessage">Operation completed successfully!</div>
        <div class="custom-alert-actions">
            <button class="custom-alert-btn custom-alert-btn-primary" id="alertOkBtn">OK</button>
        </div>
    </div>
</div>
</body>
</html>