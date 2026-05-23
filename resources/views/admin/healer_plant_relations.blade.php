<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Healer-Plant Relations - IP Healers Academy</title>
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
        body {
            background: linear-gradient(135deg, #f7f8f5 0%, #eef2eb 100%);
            font-family: 'Inter', Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
        }
        .admin-layout {
            display: flex;
            min-height: 100vh;
            animation: fadeIn 0.6s ease-in-out;
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
        .topbar .user-name {
            color: #fff;
            font-weight: 600;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .content-area {
            padding: 36px 48px 0 48px;
        }
        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 18px;
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
        .table-scroll-wrapper {
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
        .relations-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }
        /* Hide ID column */
        .relations-table th:nth-child(1),
        .relations-table td:nth-child(1) {
            display: none;
        }
        /* Hide Created At and Updated At columns */
        .relations-table th:nth-child(5),
        .relations-table td:nth-child(5),
        .relations-table th:nth-child(6),
        .relations-table td:nth-child(6) {
            display: none;
        }
        .relations-table thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background: linear-gradient(180deg, #f7f8f5 0%, #eef2eb 100%);
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.05);
        }
        .relations-table thead th {
            box-shadow: 0 2px 4px rgba(44, 62, 80, 0.08);
        }
        .table-scroll-wrapper::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        .table-scroll-wrapper::-webkit-scrollbar-track {
            background: #f7f8f5;
            border-radius: 4px;
        }
        .table-scroll-wrapper::-webkit-scrollbar-thumb {
            background: #c3d1bb;
            border-radius: 4px;
        }
        .table-scroll-wrapper::-webkit-scrollbar-thumb:hover {
            background: #a8d5a1;
        }
        .relations-table th, .relations-table td {
            padding: 16px 12px;
            text-align: left;
        }
        .relations-table th {
            color: #6b7b5e;
            font-size: 1.05rem;
            font-weight: 600;
            background: #f7f8f5;
        }
        .relations-table td {
            color: #263a29;
            font-size: 1.05rem;
            border-top: 1px solid #e3e7df;
        }
        .healer-info, .plant-info {
            font-weight: 700;
            color: #263a29;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .healer-info img, .plant-info img {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
            background: #eaf3ea;
        }
        .healer-meta, .plant-meta {
            font-weight: 400;
            color: #6b7b5e;
            font-size: 0.98rem;
        }
        .usage-desc {
            color: #0a2a5c;
            font-weight: 500;
        }
        .relation-dates {
            color: #6b7b5e;
            font-size: 0.98rem;
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
            background: linear-gradient(180deg, #eef2eb 0%, #f7f8f5 100%);
            padding: 12px 16px;
            color: #6b7b5e;
            font-size: 0.98rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid rgba(227, 231, 223, 0.6);
            border-top: none;
            border-radius: 0 0 12px 12px;
            margin-top: -1px;
            box-shadow: 0 -2px 8px rgba(44, 62, 80, 0.03);
        }
        .pagination {
            display: flex;
            gap: 8px;
        }
        .pagination button {
            background: #fff;
            border: 1px solid #d3d7cf;
            border-radius: 6px;
            padding: 6px 16px;
            color: #263a29;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .pagination button:hover {
            background: #eaf3ea;
            border-color: #a8d5a1;
            transform: translateY(-1px);
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .pagination button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: translateY(0);
            box-shadow: none;
        }
        @media (max-width: 900px) {
            .content-area {
                padding: 24px 8vw 0 8vw;
            }
            .table-scroll-wrapper {
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
            .table-scroll-wrapper {
                max-height: calc(100vh - 300px);
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
            font-size: 1.35rem;
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
            font-size: 1.35rem;
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
                    <div class="content-title">Healer-Plant Relationships</div>
                    <div class="content-desc">Manage relationships between healers and medicinal plants.</div>
                </div>
                <button class="add-btn" id="openAddModal">Add new</button>
            </div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search healer-plant relationships...">
            </div>
            <div class="table-scroll-wrapper">
                <table class="relations-table" id="relationsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Healer</th>
                        <th>Plant</th>
                        <th>Notes</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($relations as $relation)
                    <tr data-id="{{ $relation->id }}" data-healer-id="{{ $relation->healer_id }}" data-plant-id="{{ $relation->plant_id }}">
                        <td>{{ $relation->id }}</td>
                        <td>
                            <div class="healer-info">
                                {{ optional($healers->firstWhere('id', $relation->healer_id))->healer_name ?? 'Unknown' }}
                            </div>
                        </td>
                        <td>
                            <div class="plant-info">
                                {{ optional($plants->firstWhere('id', $relation->plant_id))->common_name ?? 'Unknown' }}
                            </div>
                        </td>
                        <td data-notes="{{ $relation->notes }}" style="max-width:180px;white-space:pre-line;overflow:hidden;text-overflow:ellipsis;">{{ Str::limit($relation->notes, 80) }}</td>
                        <td class="relation-dates">{{ $relation->created_at ? $relation->created_at->format('n/j/Y') : '' }}</td>
                        <td class="relation-dates">{{ $relation->updated_at ? $relation->updated_at->format('n/j/Y') : '' }}</td>
                        <td>
                            <div class="action-links">
                                <a href="#" class="edit-link">Edit</a>
                                <a href="#" class="delete-link">Delete</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" style="text-align:center; color:#6b7b5e;">No relations found.</td></tr>
                @endforelse
                </tbody>
            </table>
            </div>
            <div class="table-footer">
                <div>Showing 1 to 1 of 1 results</div>
                <div class="pagination">
                    <button>Previous</button>
                    <button>Next</button>
                </div>
            </div>
            <!-- Add New Healer-Plant Relation Modal -->
            <div id="addRelationModal" class="modal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100vw; height:100vh; background:rgba(38,58,41,0.18); align-items:center; justify-content:center;">
                <div style="background:#fff; border-radius:12px; max-width:480px; width:95vw; padding:32px 28px; box-shadow:0 4px 32px rgba(44,62,80,0.10); position:relative; max-height:90vh; overflow-y:auto;">
                    <div style="font-size:1.3rem; font-weight:700; color:#263a29; margin-bottom:18px;">Add New Healer-Plant Relation</div>
                    <div id="addRelationError" style="color:#e74c3c; font-weight:600; margin-bottom:12px; display:none;"></div>
                    <form id="addRelationForm">
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Healer</label><br>
                            <select name="healer_id" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                                <option value="">Select Healer</option>
                                @foreach($healers as $healer)
                                    <option value="{{ $healer->id }}">{{ $healer->healer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Plant</label><br>
                            <select name="plant_id" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                                <option value="">Select Plant</option>
                                @foreach($plants as $plant)
                                    <option value="{{ $plant->id }}">{{ $plant->common_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Notes</label><br>
                            <textarea name="notes" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="display:flex; gap:12px; justify-content:flex-end; margin-top:24px;">
                            <button type="button" id="cancelAddRelation" style="background:#e3e7df; color:#263a29; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Cancel</button>
                            <button type="submit" style="background:#23a36d; color:#fff; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Edit Healer-Plant Relation Modal -->
            <div id="editRelationModal" class="modal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100vw; height:100vh; background:rgba(38,58,41,0.18); align-items:center; justify-content:center;">
                <div style="background:#fff; border-radius:12px; max-width:480px; width:95vw; padding:32px 28px; box-shadow:0 4px 32px rgba(44,62,80,0.10); position:relative; max-height:90vh; overflow-y:auto;">
                    <div style="font-size:1.3rem; font-weight:700; color:#263a29; margin-bottom:18px;">Edit Healer-Plant Relation</div>
                    <div id="editRelationError" style="color:#e74c3c; font-weight:600; margin-bottom:12px; display:none;"></div>
                    <form id="editRelationForm">
                        <input type="hidden" id="editRelationId" name="id">
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Healer</label><br>
                            <select id="editRelationHealer" name="healer_id" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                                <option value="">Select Healer</option>
                                @foreach($healers as $healer)
                                    <option value="{{ $healer->id }}">{{ $healer->healer_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Plant</label><br>
                            <select id="editRelationPlant" name="plant_id" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                                <option value="">Select Plant</option>
                                @foreach($plants as $plant)
                                    <option value="{{ $plant->id }}">{{ $plant->common_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Notes</label><br>
                            <textarea id="editRelationNotes" name="notes" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="display:flex; gap:12px; justify-content:flex-end; margin-top:24px;">
                            <button type="button" id="cancelEditRelation" style="background:#e3e7df; color:#263a29; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Cancel</button>
                            <button type="submit" style="background:#23a36d; color:#fff; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Logout Confirmation Modal -->
            <div class="logout-modal" id="logoutModal">
                <div class="logout-modal-content">
                    <div class="logout-modal-title">Are you sure you want to logout?</div>
                    <div class="logout-modal-actions">
                        <button class="logout-btn-confirm" id="confirmLogout">Yes</button>
                        <button class="logout-btn-cancel" id="cancelLogout">Cancel</button>
                    </div>
                </div>
            </div>
            <!-- Delete Confirmation Modal -->
            <div class="delete-modal" id="deleteModal">
                <div class="delete-modal-content">
                    <div class="delete-modal-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><path d="M12 9v2m0 4h.01"/></div>
                    <div class="delete-modal-title">Confirm Deletion</div>
                    <div class="delete-modal-message">Are you sure you want to delete this healer-plant relationship? This action cannot be undone.</div>
                    <div class="delete-modal-actions">
                        <button class="delete-btn-cancel" id="cancelDelete">Cancel</button>
                        <button class="delete-btn-confirm" id="confirmDelete">Delete</button>
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
                    document.getElementById('addRelationModal').style.display = 'flex';
                };
                document.getElementById('cancelAddRelation').onclick = function() {
                    document.getElementById('addRelationModal').style.display = 'none';
                };
                document.getElementById('addRelationForm').onsubmit = function(e) {
                    e.preventDefault();
                    var form = e.target;
                    var saveBtn = form.querySelector('button[type="submit"]');
                    var errorDiv = document.getElementById('addRelationError');
                    errorDiv.style.display = 'none';
                    errorDiv.textContent = '';
                    saveBtn.disabled = true;
                    saveBtn.textContent = 'Saving...';
                    var formData = new FormData(form);
                    fetch('/admin/healer-plant-relations', {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: formData
                    })
                    .then(async response => {
                        saveBtn.disabled = false;
                        saveBtn.textContent = 'Save';
                        if (response.ok) {
                            const data = await response.json();
                            if (data.success) {
                                form.reset();
                                document.getElementById('addRelationModal').style.display = 'none';
                                showCustomAlert('success', 'Success', 'Relation added successfully!', function() {
                                    window.location.reload();
                                });
                            } else {
                                errorDiv.textContent = 'Failed to add relation.';
                                errorDiv.style.display = 'block';
                            }
                        } else if (response.status === 422) {
                            const data = await response.json();
                            let errors = Object.values(data.errors).flat().join(' ');
                            errorDiv.textContent = errors;
                            errorDiv.style.display = 'block';
                        } else {
                            errorDiv.textContent = 'Failed to add relation.';
                            errorDiv.style.display = 'block';
                        }
                    })
                    .catch(() => {
                        saveBtn.disabled = false;
                        saveBtn.textContent = 'Save';
                        errorDiv.textContent = 'Failed to add relation.';
                        errorDiv.style.display = 'block';
                    });
                };
                document.getElementById('searchInput').addEventListener('input', function() {
                    const filter = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#relationsTable tbody tr');
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(filter) ? '' : 'none';
                    });
                });
                
                // Edit functionality for healer-plant relations
                document.querySelectorAll('.edit-link').forEach(function(btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        var row = btn.closest('tr');
                        
                        // Get data from row attributes
                        var relationId = row.dataset.id;
                        var healerId = row.dataset.healerId;
                        var plantId = row.dataset.plantId;
                        var notes = row.querySelector('[data-notes]').dataset.notes || '';
                        
                        // Populate form fields
                        document.getElementById('editRelationId').value = relationId;
                        document.getElementById('editRelationHealer').value = healerId;
                        document.getElementById('editRelationPlant').value = plantId;
                        document.getElementById('editRelationNotes').value = notes;
                        
                        // Show modal
                        document.getElementById('editRelationModal').style.display = 'flex';
                    });
                });
                
                // Cancel edit
                document.getElementById('cancelEditRelation').onclick = function() {
                    document.getElementById('editRelationModal').style.display = 'none';
                };
                
                // Submit edit form
                document.getElementById('editRelationForm').onsubmit = function(e) {
                    e.preventDefault();
                    var form = e.target;
                    var relationId = document.getElementById('editRelationId').value;
                    var saveBtn = form.querySelector('button[type="submit"]');
                    var errorDiv = document.getElementById('editRelationError');
                    errorDiv.style.display = 'none';
                    errorDiv.textContent = '';
                    saveBtn.disabled = true;
                    saveBtn.textContent = 'Saving...';
                    var formData = new FormData(form);
                    fetch('/admin/healer-plant-relations/' + relationId, {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'X-HTTP-Method-Override': 'PUT',
                        },
                        body: formData
                    })
                    .then(async response => {
                        saveBtn.disabled = false;
                        saveBtn.textContent = 'Save';
                        if (response.ok) {
                            const data = await response.json();
                            if (data.success) {
                                form.reset();
                                document.getElementById('editRelationModal').style.display = 'none';
                                showCustomAlert('success', 'Success', 'Relation updated successfully!', function() {
                                    window.location.reload();
                                });
                            } else {
                                errorDiv.textContent = 'Failed to update relation.';
                                errorDiv.style.display = 'block';
                            }
                        } else if (response.status === 422) {
                            const data = await response.json();
                            let errors = Object.values(data.errors).flat().join(' ');
                            errorDiv.textContent = errors;
                            errorDiv.style.display = 'block';
                        } else {
                            errorDiv.textContent = 'Failed to update relation.';
                            errorDiv.style.display = 'block';
                        }
                    })
                    .catch(() => {
                        saveBtn.disabled = false;
                        saveBtn.textContent = 'Save';
                        errorDiv.textContent = 'Failed to update relation.';
                        errorDiv.style.display = 'block';
                    });
                };
                
                // Delete functionality for healer-plant relations
                document.querySelectorAll('.delete-link').forEach(function(btn) {
                    btn.addEventListener('click', function(e) {
                        e.preventDefault();
                        var row = btn.closest('tr');
                        var relationId = row.dataset.id;
                        document.getElementById('deleteModal').style.display = 'flex';
                        
                        // Create a closure to capture the relation ID
                        var currentRelationId = relationId;
                        document.getElementById('confirmDelete').onclick = function() {
                            fetch('/admin/healer-plant-relations/' + currentRelationId, {
                                method: 'POST',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'X-HTTP-Method-Override': 'DELETE',
                                },
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    row.remove();
                                    document.getElementById('deleteModal').style.display = 'none';
                                        showCustomAlert('success', 'Success', 'Healer-plant relation deleted successfully!');
                                } else {
                                    showCustomAlert('error', 'Error', 'Failed to delete healer-plant relation.');
                                }
                            })
                            .catch(() => {
                                showCustomAlert('error', 'Error', 'Failed to delete healer-plant relation.');
                            });
                        };
                        document.getElementById('cancelDelete').onclick = function() {
                            document.getElementById('deleteModal').style.display = 'none';
                        };
                    });
                });
                document.getElementById('logoutBtn').onclick = function(e) {
                    e.preventDefault();
                    document.getElementById('logoutModal').style.display = 'flex';
                };
                document.getElementById('cancelLogout').onclick = function() {
                    document.getElementById('logoutModal').style.display = 'none';
                };
                document.getElementById('confirmLogout').onclick = function() {
                    window.location.href = '/register?logout=success';
                };
            </script>
        </div>
    </div>
</div>
@include('admin.partials.logout_modal')
<script>document.addEventListener('DOMContentLoaded', function(){});</script>
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