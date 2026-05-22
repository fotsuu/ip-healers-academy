<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traditional Healers - EthnoMed Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }
        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        @keyframes fadeInModal {
            from { opacity: 0; backdrop-filter: blur(0); }
            to { opacity: 1; backdrop-filter: blur(4px); }
        }
        @keyframes scaleInModal {
            from { opacity: 0; transform: scale(0.9) translateY(-20px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }
        * {
            box-sizing: border-box;
        }
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
        }
        .topbar .user-avatar {
            /* fixed avatar size to match dashboard */
            width: 48px;
            height: 48px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fff;
            flex: 0 0 48px;
            margin-left: 8px;
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
        }
        .content-area {
            padding: 36px 48px 0 48px;
            margin-left: 0;
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
        .healers-table thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background: #f7f8f5;
        }
        .healers-table thead th {
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
            background: #b2c7b0;
            border-radius: 4px;
        }
        .table-scroll-wrapper::-webkit-scrollbar-thumb:hover {
            background: #4b7942;
        }
        .healers-table td, .healers-table th {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: middle;
            padding: 14px 10px;
        }
        .healers-table td.about-col {
            max-width: 200px;
            white-space: normal;
            overflow: visible;
        }
        .healers-table th {
            color: #6b7b5e;
            font-size: 1.05rem;
            font-weight: 600;
            background: #f7f8f5;
        }
        .healers-table th:nth-child(1),
        .healers-table td:nth-child(1) {
            text-align: left;
        }
        .healers-table th:nth-child(2),
        .healers-table td:nth-child(2) {
            text-align: left;
        }
        .healers-table th:nth-child(3),
        .healers-table td:nth-child(3) {
            text-align: center;
        }
        .healers-table td:nth-child(3) img {
            margin: 0 auto;
            display: block;
        }
        .healers-table td:nth-child(3) > div {
            margin: 0 auto;
        }
        .healers-table th:nth-child(4),
        .healers-table td:nth-child(4) {
            text-align: center;
        }
        .healers-table td {
            color: #263a29;
            font-size: 1.05rem;
            border-top: 1px solid #e3e7df;
        }
        .healer-info {
            font-weight: 700;
            color: #263a29;
        }
        .healer-meta {
            font-weight: 400;
            color: #6b7b5e;
            font-size: 0.98rem;
        }
        .healer-phone {
            color: #188a5a;
            font-size: 0.98rem;
        }
        .healer-location {
            color: #295024;
            font-size: 1.01rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .healer-location svg {
            width: 16px;
            height: 16px;
            color: #4b7942;
        }
        .healer-specialization {
            color: #0a2a5c;
            font-weight: 500;
        }
        .healer-dates {
            color: #6b7b5e;
            font-size: 0.98rem;
        }
        .healer-about-text {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }
        .healer-about-text.expanded {
            -webkit-line-clamp: unset;
            display: block;
        }
        .see-more-btn-healer {
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
        .see-more-btn-healer:hover {
            color: #24481f;
            text-decoration: underline;
        }
        .about-wrapper {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .profile-col, .location-col, .contact-col {
            vertical-align: top;
        }
        .nowrap {
            white-space: nowrap;
        }
        .action-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }
        .details-btn {
            background: linear-gradient(135deg, #2d5a27 0%, #24481f 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 8px 16px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(45, 90, 39, 0.15);
        }
        .details-btn:hover {
            background: linear-gradient(135deg, #24481f 0%, #1d3a18 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 90, 39, 0.25);
        }
        .edit-link {
            color: #188a5a;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.2s;
        }
        .edit-link:hover {
            color: #0f6b42;
            text-decoration: underline;
        }
        .delete-link {
            color: #e74c3c;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.2s;
        }
        .delete-link:hover {
            color: #c0392b;
            text-decoration: underline;
        }
        /* Healer Details Modal */
        .healer-details-modal {
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
        .healer-details-modal-content {
            background: #fff;
            border-radius: 16px;
            max-width: 700px;
            width: 90vw;
            max-height: 90vh;
            box-shadow: 0 12px 48px rgba(44,62,80,0.20);
            position: relative;
            animation: scaleInModal 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid rgba(227, 231, 223, 0.6);
            display: flex;
            flex-direction: column;
        }
        .healer-details-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 32px 18px 32px;
            border-bottom: 2px solid #e3e7df;
            flex-shrink: 0;
        }
        .healer-details-modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #263a29;
            font-family: 'Playfair Display', serif;
        }
        .healer-details-close-btn {
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
        .healer-details-close-btn:hover {
            background: #e3e7df;
            color: #263a29;
            transform: scale(1.1);
        }
        .healer-details-close-btn:active {
            transform: scale(0.95);
        }
        .healer-details-modal-body {
            padding: 24px 32px;
            overflow-y: auto;
            flex: 1;
            min-height: 0;
        }
        .healer-details-image-section {
            text-align: center;
            margin-bottom: 24px;
        }
        .healer-details-image {
            max-width: 300px;
            max-height: 300px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(44, 62, 80, 0.1);
            margin: 0 auto;
        }
        .healer-details-info {
            display: grid;
            gap: 18px;
            margin-bottom: 24px;
        }
        .healer-details-row {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .healer-details-label {
            font-weight: 600;
            color: #295024;
            font-size: 1rem;
        }
        .healer-details-value {
            color: #263a29;
            font-size: 1.05rem;
            line-height: 1.6;
        }
        .healer-details-value.empty {
            color: #b2c7b0;
            font-style: italic;
        }
        .healer-details-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            padding: 18px 32px 24px 32px;
            border-top: 2px solid #e3e7df;
            flex-shrink: 0;
            background: #fff;
        }
        .healer-details-btn {
            padding: 10px 24px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .healer-details-btn-edit {
            background: linear-gradient(135deg, #188a5a 0%, #0f6b42 100%);
            color: #fff;
            box-shadow: 0 4px 12px rgba(24, 138, 90, 0.2);
        }
        .healer-details-btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(24, 138, 90, 0.3);
        }
        .healer-details-btn-delete {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: #fff;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
        }
        .healer-details-btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(220, 38, 38, 0.3);
        }
        .healers-table {
            width: 100%;
            table-layout: auto;
            min-width: 600px;
            border-collapse: collapse;
        }
        /* Hide ID column */
        .healers-table th:nth-child(1),
        .healers-table td:nth-child(1) {
            display: none;
        }
        .healers-table th:nth-child(2) {
            width: 250px;
        }
        .healers-table th:nth-child(3) {
            width: 120px;
        }
        .healers-table th:nth-child(4) {
            width: 150px;
        }
        .table-footer {
            background: #f7f8f5;
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
        @media (max-width: 900px) {
            .content-area {
                padding: 24px 8vw 0 8vw;
                margin-left: 0;
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
                margin-left: 0;
            }
            .see-more-btn-healer {
                font-size: 0.85rem;
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
        /* Map Styles */
        .location-map-container {
            width: 100%;
            height: 300px;
            border-radius: 8px;
            overflow: hidden;
            border: 1.5px solid #e3e7df;
            margin-top: 8px;
            background: #f7f8f5;
        }
        .location-map-instruction {
            color: #6b7b5e;
            font-size: 0.9rem;
            margin-top: 4px;
            font-style: italic;
        }
        /* Edit Modal Styles */
        .edit-healer-modal-wrapper {
            background: #fff;
            border-radius: 12px;
            max-width: 480px;
            width: 95vw;
            max-height: 90vh;
            box-shadow: 0 4px 32px rgba(44,62,80,0.10);
            position: relative;
            display: flex;
            flex-direction: column;
        }
        .edit-healer-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 28px 18px 28px;
            border-bottom: 2px solid #e3e7df;
            flex-shrink: 0;
        }
        .edit-healer-modal-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #263a29;
        }
        .edit-healer-modal-close {
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
        .edit-healer-modal-close:hover {
            background: #e3e7df;
            color: #263a29;
            transform: scale(1.1);
        }
        .edit-healer-modal-close:active {
            transform: scale(0.95);
        }
        .edit-healer-modal-content {
            padding: 20px 28px;
            overflow-y: auto;
            flex: 1;
            min-height: 0;
        }
        .edit-healer-modal-footer {
            padding: 18px 28px 24px 28px;
            border-top: 2px solid #e3e7df;
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            flex-shrink: 0;
            background: #fff;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div class="admin-layout">
    @include('admin.partials.sidebar')
    <div class="main-content">
        @include('admin.partials.topbar')
        <div class="content-area">
            <div class="content-header">
                <div>
                    <div class="content-title">Traditional Healers</div>
                    <div class="content-desc">Database of registered traditional healers and their practices.</div>
                </div>
                <button class="add-btn" id="openAddModal">Add new</button>
            </div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search traditional healers...">
            </div>
            <div class="table-scroll-wrapper">
                <table class="healers-table" id="healersTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Healer Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($healers as $healer)
                        <tr
                            data-id="{{ $healer->id }}"
                            data-healer_name="{{ e($healer->healer_name) }}"
                            data-ethnic_group="{{ e($healer->ethnic_group) }}"
                            data-phone="{{ e($healer->phone) }}"
                            data-location="{{ e($healer->location) }}"
                            data-latitude="{{ e($healer->latitude) }}"
                            data-longitude="{{ e($healer->longitude) }}"
                            data-specialization="{{ e($healer->specialization) }}"
                            data-experience_years="{{ e($healer->experience_years) }}"
                            data-languages="{{ e($healer->languages) }}"
                            data-about="{{ e($healer->about) }}"
                            data-image="{{ $healer->image ? asset('storage/' . $healer->image) : '' }}"
                            data-created_at="{{ $healer->created_at ? $healer->created_at->format('n/j/Y') : '' }}"
                            data-updated_at="{{ $healer->updated_at ? $healer->updated_at->format('n/j/Y') : '' }}"
                        >
                            <td>{{ $healer->id }}</td>
                            <td>{{ $healer->healer_name }}</td>
    <td>
        @if($healer->image)
                                    <img src="/storage/{{ $healer->image }}" alt="Healer Image" style="max-width:64px; max-height:64px; border-radius:8px; object-fit:cover;">
        @else
                                    <div style="width:64px; height:64px; background:#e3e7df; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#b2c7b0; font-size:0.85rem;">No image</div>
        @endif
    </td>
    <td>
        <div class="action-links">
                                    <button class="details-btn" data-healer-id="{{ $healer->id }}">Details</button>
        </div>
    </td>
                        </tr>
                    @empty
                        <tr><td colspan="3" style="text-align:center; color:#6b7b5e;">No healers found.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="table-footer">
                <div>Showing 1 to 2 of 2 results</div>
                <div class="pagination">
                    <button>Previous</button>
                    <button>Next</button>
                </div>
            </div>
            <!-- Add New Healer Modal -->
            <div id="addHealerModal" class="modal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100vw; height:100vh; background:rgba(38,58,41,0.18); align-items:center; justify-content:center;">
                <div style="background:#fff; border-radius:12px; max-width:480px; width:95vw; padding:32px 28px; box-shadow:0 4px 32px rgba(44,62,80,0.10); position:relative; max-height:90vh; overflow-y:auto;">
                    <div style="font-size:1.3rem; font-weight:700; color:#263a29; margin-bottom:18px;">Add New Healer</div>
                    <form id="addHealerForm" enctype="multipart/form-data">
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Healer Name</label><br>
                            <input type="text" name="healer_name" required style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Ethnic Group</label><br>
                            <input type="text" name="ethnic_group" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Phone</label><br>
                            <input type="text" name="phone" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Location</label><br>
                            <input type="text" name="location" id="addHealerLocation" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Latitude</label><br>
                            <input type="text" name="latitude" id="addHealerLatitude" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Longitude</label><br>
                            <input type="text" name="longitude" id="addHealerLongitude" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Set Location on Map</label>
                            <div class="location-map-instruction">Click on the map to set coordinates or drag the marker</div>
                            <div id="addHealerMap" class="location-map-container"></div>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Specialization</label><br>
                            <input type="text" name="specialization" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Experience Years</label><br>
                            <input type="number" name="experience_years" min="0" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Languages</label><br>
                            <input type="text" name="languages" placeholder="e.g. English, Spanish" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">About</label><br>
                            <textarea name="about" rows="3" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Image</label><br>
                            <input type="file" name="image" id="healerImageInput" accept="image/*" style="width:100%; padding:10px 0;">
                            <div id="healerImagePreview" style="margin-top:8px;"></div>
                        </div>
                        <div style="display:flex; gap:12px; justify-content:flex-end; margin-top:24px;">
                            <button type="button" id="cancelAddHealer" style="background:#e3e7df; color:#263a29; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Cancel</button>
                            <button type="submit" style="background:#23a36d; color:#fff; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                document.getElementById('openAddModal').onclick = function() {
                    document.getElementById('addHealerModal').style.display = 'flex';
                };
                // Map variables
                let addHealerMap = null;
                let addHealerMarker = null;
                let editHealerMap = null;
                let editHealerMarker = null;

                // Initialize Add Healer Map
                function initAddHealerMap() {
                    if (addHealerMap) {
                        addHealerMap.remove();
                    }
                    const mapContainer = document.getElementById('addHealerMap');
                    if (!mapContainer) return;
                    
                    // Default center (Philippines approximate center)
                    const defaultLat = 12.8797;
                    const defaultLng = 121.7740;
                    
                    // Get existing coordinates if any
                    const latInput = document.getElementById('addHealerLatitude');
                    const lngInput = document.getElementById('addHealerLongitude');
                    const lat = latInput?.value ? parseFloat(latInput.value) : defaultLat;
                    const lng = lngInput?.value ? parseFloat(lngInput.value) : defaultLng;
                    
                    addHealerMap = L.map('addHealerMap', {
                        center: [lat, lng],
                        zoom: 6,
                        zoomControl: true
                    });
                    
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(addHealerMap);
                    
                    // Add marker if coordinates exist
                    if (latInput?.value && lngInput?.value) {
                        addHealerMarker = L.marker([lat, lng], {draggable: true}).addTo(addHealerMap);
                        addHealerMarker.on('dragend', function() {
                            const position = addHealerMarker.getLatLng();
                            if (latInput) latInput.value = position.lat.toFixed(6);
                            if (lngInput) lngInput.value = position.lng.toFixed(6);
                        });
                    }
                    
                    // Map click handler
                    addHealerMap.on('click', function(e) {
                        const lat = e.latlng.lat;
                        const lng = e.latlng.lng;
                        
                        if (latInput) latInput.value = lat.toFixed(6);
                        if (lngInput) lngInput.value = lng.toFixed(6);
                        
                        if (addHealerMarker) {
                            addHealerMarker.setLatLng([lat, lng]);
                        } else {
                            addHealerMarker = L.marker([lat, lng], {draggable: true}).addTo(addHealerMap);
                            addHealerMarker.on('dragend', function() {
                                const position = addHealerMarker.getLatLng();
                                if (latInput) latInput.value = position.lat.toFixed(6);
                                if (lngInput) lngInput.value = position.lng.toFixed(6);
                            });
                        }
                    });
                }

                // Initialize Edit Healer Map
                function initEditHealerMap() {
                    if (editHealerMap) {
                        editHealerMap.remove();
                    }
                    const mapContainer = document.getElementById('editHealerMap');
                    if (!mapContainer) return;
                    
                    // Default center (Philippines approximate center)
                    const defaultLat = 12.8797;
                    const defaultLng = 121.7740;
                    
                    // Get existing coordinates if any
                    const latInput = document.getElementById('editLatitude');
                    const lngInput = document.getElementById('editLongitude');
                    const lat = latInput?.value ? parseFloat(latInput.value) : defaultLat;
                    const lng = lngInput?.value ? parseFloat(lngInput.value) : defaultLng;
                    
                    editHealerMap = L.map('editHealerMap', {
                        center: [lat, lng],
                        zoom: latInput?.value ? 13 : 6,
                        zoomControl: true
                    });
                    
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(editHealerMap);
                    
                    // Add marker if coordinates exist
                    if (latInput?.value && lngInput?.value) {
                        editHealerMarker = L.marker([lat, lng], {draggable: true}).addTo(editHealerMap);
                        editHealerMarker.on('dragend', function() {
                            const position = editHealerMarker.getLatLng();
                            if (latInput) latInput.value = position.lat.toFixed(6);
                            if (lngInput) lngInput.value = position.lng.toFixed(6);
                        });
                    }
                    
                    // Map click handler
                    editHealerMap.on('click', function(e) {
                        const lat = e.latlng.lat;
                        const lng = e.latlng.lng;
                        
                        if (latInput) latInput.value = lat.toFixed(6);
                        if (lngInput) lngInput.value = lng.toFixed(6);
                        
                        if (editHealerMarker) {
                            editHealerMarker.setLatLng([lat, lng]);
                        } else {
                            editHealerMarker = L.marker([lat, lng], {draggable: true}).addTo(editHealerMap);
                            editHealerMarker.on('dragend', function() {
                                const position = editHealerMarker.getLatLng();
                                if (latInput) latInput.value = position.lat.toFixed(6);
                                if (lngInput) lngInput.value = position.lng.toFixed(6);
                            });
                        }
                    });
                    
                    // Update map when lat/lng inputs change manually
                    if (latInput && lngInput) {
                        const updateMapFromInputs = function() {
                            const lat = parseFloat(latInput.value);
                            const lng = parseFloat(lngInput.value);
                            if (!isNaN(lat) && !isNaN(lng) && lat >= -90 && lat <= 90 && lng >= -180 && lng <= 180) {
                                editHealerMap.setView([lat, lng], 13);
                                if (editHealerMarker) {
                                    editHealerMarker.setLatLng([lat, lng]);
                                } else {
                                    editHealerMarker = L.marker([lat, lng], {draggable: true}).addTo(editHealerMap);
                                    editHealerMarker.on('dragend', function() {
                                        const position = editHealerMarker.getLatLng();
                                        latInput.value = position.lat.toFixed(6);
                                        lngInput.value = position.lng.toFixed(6);
                                    });
                                }
                            }
                        };
                        latInput.addEventListener('change', updateMapFromInputs);
                        lngInput.addEventListener('change', updateMapFromInputs);
                    }
                }

                document.getElementById('openAddModal').onclick = function() {
                    document.getElementById('addHealerModal').style.display = 'flex';
                    // Initialize map after modal is shown
                    setTimeout(function() {
                        initAddHealerMap();
                    }, 100);
                };
                document.getElementById('cancelAddHealer').onclick = function() {
                    var form = document.getElementById('addHealerForm');
                    form.reset();
                    document.getElementById('healerImagePreview').innerHTML = '';
                    if (addHealerMap) {
                        addHealerMap.remove();
                        addHealerMap = null;
                        addHealerMarker = null;
                    }
                    document.getElementById('addHealerModal').style.display = 'none';
                };
                document.getElementById('healerImageInput').onchange = function(e) {
                    var preview = document.getElementById('healerImagePreview');
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
                document.getElementById('addHealerForm').onsubmit = function(e) {
                    e.preventDefault();
                    var form = e.target;
                    var saveBtn = form.querySelector('button[type="submit"]');
                    saveBtn.disabled = true;
                    saveBtn.textContent = 'Saving...';
                    var formData = new FormData(form);
                    fetch('/admin/healers', {
                        method: 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        saveBtn.disabled = false;
                        saveBtn.textContent = 'Save';
                        if (data.success) {
                            form.reset();
                            document.getElementById('healerImagePreview').innerHTML = '';
                            document.getElementById('addHealerModal').style.display = 'none';
                            showCustomAlert('success', 'Success', 'Healer added successfully!', function() {
                                window.location.reload();
                            });
                        } else {
                            showCustomAlert('error', 'Error', 'Failed to add healer.');
                        }
                    })
                    .catch(() => {
                        saveBtn.disabled = false;
                        saveBtn.textContent = 'Save';
                        showCustomAlert('error', 'Error', 'Failed to add healer.');
                    });
                };
                document.getElementById('searchInput').addEventListener('input', function() {
                    const filter = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#healersTable tbody tr');
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(filter) ? '' : 'none';
                    });
                });
            </script>
        </div>
    </div>
</div>
<!-- Edit Healer Modal -->
<div id="editHealerModal" class="modal" style="display:none; position:fixed; z-index:2500; left:0; top:0; width:100vw; height:100vh; background:rgba(38,58,41,0.18); align-items:center; justify-content:center; backdrop-filter: blur(4px);">
    <div class="edit-healer-modal-wrapper">
        <div class="edit-healer-modal-header">
            <div class="edit-healer-modal-title">Edit Healer</div>
            <button type="button" class="edit-healer-modal-close" id="closeEditHealerModal">&times;</button>
        </div>
        <div class="edit-healer-modal-content">
            <form id="editHealerForm">
            <input type="hidden" id="editHealerId" name="id">
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Healer Name</label><br>
                <input type="text" id="editHealerName" name="healer_name" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Ethnic Group</label><br>
                <input type="text" id="editEthnicGroup" name="ethnic_group" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Phone</label><br>
                <input type="text" id="editPhone" name="phone" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Location</label><br>
                <input type="text" id="editLocation" name="location" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Latitude</label><br>
                <input type="text" id="editLatitude" name="latitude" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Longitude</label><br>
                <input type="text" id="editLongitude" name="longitude" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Set Location on Map</label>
                <div class="location-map-instruction">Click on the map to set coordinates or drag the marker</div>
                <div id="editHealerMap" class="location-map-container"></div>
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Specialization</label><br>
                <input type="text" id="editSpecialization" name="specialization" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Experience Years</label><br>
                <input type="number" id="editExperienceYears" name="experience_years" min="0" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Languages</label><br>
                <input type="text" id="editLanguages" name="languages" placeholder="e.g. English, Spanish" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">About</label><br>
                <textarea id="editAbout" name="about" rows="3" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
            </div>
            <div style="margin-bottom:16px;">
                <label style="font-weight:600; color:#295024;">Image</label><br>
                <input type="file" name="image" id="editHealerImageInput" accept="image/*" style="width:100%; padding:10px 0;">
                <div id="editHealerImagePreview" style="margin-top:8px;"></div>
            </div>
            </form>
        </div>
        <div class="edit-healer-modal-footer">
            <button type="button" id="cancelEditHealer" style="background:#e3e7df; color:#263a29; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Cancel</button>
            <button type="submit" form="editHealerForm" style="background:#23a36d; color:#fff; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Save</button>
        </div>
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
        <div class="delete-modal-icon"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg></div>
        <div class="delete-modal-title">Confirm Deletion</div>
        <div class="delete-modal-message">Are you sure you want to delete this healer? This action cannot be undone.</div>
        <div class="delete-modal-actions">
            <button class="delete-btn-cancel" id="cancelDelete">Cancel</button>
            <button class="delete-btn-confirm" id="confirmDelete">Delete</button>
        </div>
    </div>
</div>
<!-- Healer Details Modal -->
<div class="healer-details-modal" id="healerDetailsModal">
    <div class="healer-details-modal-content">
        <div class="healer-details-modal-header">
            <div class="healer-details-modal-title">Healer Details</div>
            <button type="button" class="healer-details-close-btn" id="closeHealerDetailsModal">&times;</button>
        </div>
        <div class="healer-details-modal-body">
            <div class="healer-details-image-section" id="healerDetailsImageSection">
            <img id="healerDetailsImage" class="healer-details-image" src="" alt="Healer Image" style="display:none;">
            <div id="healerDetailsNoImage" style="display:none; width:300px; height:300px; background:#e3e7df; border-radius:12px; margin:0 auto; align-items:center; justify-content:center; color:#b2c7b0; font-size:1.1rem;">No image available</div>
        </div>
        <div class="healer-details-info" id="healerDetailsInfo">
            <div class="healer-details-row" style="display: none;">
                <div class="healer-details-label">ID</div>
                <div class="healer-details-value" id="healerDetailsId">-</div>
            </div>
            <div class="healer-details-row">
                <div class="healer-details-label">Healer Name</div>
                <div class="healer-details-value" id="healerDetailsName">-</div>
            </div>
            <div class="healer-details-row">
                <div class="healer-details-label">Ethnic Group</div>
                <div class="healer-details-value" id="healerDetailsEthnicGroup">-</div>
            </div>
            <div class="healer-details-row">
                <div class="healer-details-label">Phone</div>
                <div class="healer-details-value" id="healerDetailsPhone">-</div>
            </div>
            <div class="healer-details-row">
                <div class="healer-details-label">Location</div>
                <div class="healer-details-value" id="healerDetailsLocation">-</div>
            </div>
            <div class="healer-details-row">
                <div class="healer-details-label">Latitude</div>
                <div class="healer-details-value" id="healerDetailsLatitude">-</div>
            </div>
            <div class="healer-details-row">
                <div class="healer-details-label">Longitude</div>
                <div class="healer-details-value" id="healerDetailsLongitude">-</div>
            </div>
            <div class="healer-details-row">
                <div class="healer-details-label">Specialization</div>
                <div class="healer-details-value" id="healerDetailsSpecialization">-</div>
            </div>
            <div class="healer-details-row">
                <div class="healer-details-label">Experience Years</div>
                <div class="healer-details-value" id="healerDetailsExperienceYears">-</div>
            </div>
            <div class="healer-details-row">
                <div class="healer-details-label">Languages</div>
                <div class="healer-details-value" id="healerDetailsLanguages">-</div>
            </div>
            <div class="healer-details-row">
                <div class="healer-details-label">About</div>
                <div class="healer-details-value" id="healerDetailsAbout">-</div>
            </div>
            <div class="healer-details-row" style="display: none;">
                <div class="healer-details-label">Created At</div>
                <div class="healer-details-value" id="healerDetailsCreatedAt">-</div>
            </div>
            <div class="healer-details-row" style="display: none;">
                <div class="healer-details-label">Updated At</div>
                <div class="healer-details-value" id="healerDetailsUpdatedAt">-</div>
            </div>
        </div>
        </div>
        <div class="healer-details-actions">
            <button type="button" class="healer-details-btn healer-details-btn-edit" id="editHealerFromDetails">Edit</button>
            <button type="button" class="healer-details-btn healer-details-btn-delete" id="deleteHealerFromDetails">Delete</button>
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

document.addEventListener('DOMContentLoaded', function() {
    // Healer Details Modal Functionality
    let currentHealerRow = null;
    let currentHealerId = null;

    function openHealerDetailsModal(healerId) {
        const row = document.querySelector(`tr[data-id="${healerId}"]`);
        if (!row) {
            console.error('Row not found for healer ID:', healerId);
            return;
        }

        // Set global variables for edit/delete buttons
        currentHealerRow = row;
        currentHealerId = healerId;

        // Populate modal with healer data
        document.getElementById('healerDetailsId').textContent = row.dataset.id || '-';
        document.getElementById('healerDetailsName').textContent = row.dataset.healer_name || 'N/A';
        document.getElementById('healerDetailsEthnicGroup').textContent = row.dataset.ethnic_group || 'N/A';
        document.getElementById('healerDetailsPhone').textContent = row.dataset.phone || 'N/A';
        document.getElementById('healerDetailsLocation').textContent = row.dataset.location || 'N/A';
        document.getElementById('healerDetailsLatitude').textContent = row.dataset.latitude || 'N/A';
        document.getElementById('healerDetailsLongitude').textContent = row.dataset.longitude || 'N/A';
        document.getElementById('healerDetailsSpecialization').textContent = row.dataset.specialization || 'N/A';
        document.getElementById('healerDetailsExperienceYears').textContent = row.dataset.experience_years || 'N/A';
        document.getElementById('healerDetailsLanguages').textContent = row.dataset.languages || 'N/A';
        
        const about = row.dataset.about || '';
        document.getElementById('healerDetailsAbout').textContent = about || 'N/A';
        document.getElementById('healerDetailsAbout').className = about ? 'healer-details-value' : 'healer-details-value empty';
        
        document.getElementById('healerDetailsCreatedAt').textContent = row.dataset.created_at || '-';
        document.getElementById('healerDetailsUpdatedAt').textContent = row.dataset.updated_at || '-';

        // Handle image
        const imageUrl = row.dataset.image || '';
        const imageEl = document.getElementById('healerDetailsImage');
        const noImageEl = document.getElementById('healerDetailsNoImage');
        
        if (imageUrl) {
            imageEl.src = imageUrl;
            imageEl.style.display = 'block';
            noImageEl.style.display = 'none';
        } else {
            imageEl.style.display = 'none';
            noImageEl.style.display = 'flex';
        }

        // Show modal
        document.getElementById('healerDetailsModal').style.display = 'flex';
    }

    function closeHealerDetailsModal() {
        const modal = document.getElementById('healerDetailsModal');
        if (modal) {
            modal.style.display = 'none';
        }
        currentHealerRow = null;
        currentHealerId = null;
    }

    // Setup modal handlers
    function setupHealerDetailsModalHandlers() {
        // Close button (X)
        const closeBtn = document.getElementById('closeHealerDetailsModal');
        if (closeBtn) {
            closeBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                closeHealerDetailsModal();
            });
        }

        // Close modal when clicking backdrop
        const modal = document.getElementById('healerDetailsModal');
        const modalContent = document.querySelector('.healer-details-modal-content');
        if (modal && modalContent) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal && !modalContent.contains(e.target)) {
                    closeHealerDetailsModal();
                }
            });
            modalContent.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        }

        // Edit button
        const editBtn = document.getElementById('editHealerFromDetails');
        if (editBtn) {
            editBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                if (!currentHealerId || !currentHealerRow) {
                    showCustomAlert('error', 'Error', 'No healer selected.');
                    return;
                }
                
                openEditFormFromDetails(currentHealerId, currentHealerRow);
            });
        }

        // Delete button
        const deleteBtn = document.getElementById('deleteHealerFromDetails');
        if (deleteBtn) {
            deleteBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                if (currentHealerId && currentHealerRow) {
                    const healerIdToDelete = currentHealerId;
                    const rowToDelete = currentHealerRow;
                    closeHealerDetailsModal();
                    
                    // Show delete confirmation modal
                    const deleteModal = document.getElementById('deleteModal');
                    if (deleteModal) {
                        deleteModal.style.display = 'flex';
                        
                        // Remove any existing handlers
                        const confirmDeleteBtn = document.getElementById('confirmDelete');
                        const cancelDeleteBtn = document.getElementById('cancelDelete');
                        
                        // Clone buttons to remove old event listeners
                        const newConfirmBtn = confirmDeleteBtn.cloneNode(true);
                        const newCancelBtn = cancelDeleteBtn.cloneNode(true);
                        confirmDeleteBtn.parentNode.replaceChild(newConfirmBtn, confirmDeleteBtn);
                        cancelDeleteBtn.parentNode.replaceChild(newCancelBtn, cancelDeleteBtn);
                        
                        // Setup delete confirmation
                        newConfirmBtn.onclick = function() {
                            newConfirmBtn.disabled = true;
                            newConfirmBtn.textContent = 'Deleting...';
                            
                            fetch('/admin/healers/' + healerIdToDelete, {
                                method: 'POST',
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    'X-HTTP-Method-Override': 'DELETE',
                                },
                            })
                            .then(response => {
                                if (!response.ok) {
                                    throw new Error('Delete request failed');
                                }
                                return response.json();
                            })
                            .then(data => {
                                if (data.success) {
                                    if (rowToDelete) {
                                        rowToDelete.remove();
                                    }
                                    deleteModal.style.display = 'none';
                                    showCustomAlert('success', 'Success', 'Healer deleted successfully!');
                                } else {
                                    newConfirmBtn.disabled = false;
                                    newConfirmBtn.textContent = 'Delete';
                                    showCustomAlert('error', 'Error', data.error || 'Failed to delete healer.');
                                }
                            })
                            .catch((error) => {
                                console.error('Delete error:', error);
                                newConfirmBtn.disabled = false;
                                newConfirmBtn.textContent = 'Delete';
                                showCustomAlert('error', 'Error', 'Failed to delete healer. Please try again.');
                            });
                        };
                        
                        // Cancel delete
                        newCancelBtn.onclick = function() {
                            deleteModal.style.display = 'none';
                        };
                        
                        // Close on backdrop click
                        deleteModal.onclick = function(e) {
                            if (e.target === deleteModal) {
                                deleteModal.style.display = 'none';
                            }
                        };
                    }
                }
            });
        }
    }

    // Details button click handlers
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('details-btn')) {
        e.preventDefault();
            e.stopPropagation();
            const healerId = e.target.getAttribute('data-healer-id');
            if (healerId) {
                openHealerDetailsModal(healerId);
            }
        }
    });

    // Initialize modal handlers when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setupHealerDetailsModalHandlers);
    } else {
        setupHealerDetailsModalHandlers();
    }

    // Edit form handler - open from details
    function openEditFormFromDetails(healerIdToEdit, rowToEdit) {
        if (!healerIdToEdit) {
            showCustomAlert('error', 'Error', 'No healer selected for editing.');
            return;
        }
        
        // Close details modal first
        closeHealerDetailsModal();
        
        // Verify edit modal exists
        const editModal = document.getElementById('editHealerModal');
        if (!editModal) {
            showCustomAlert('error', 'Error', 'Edit modal not found. Please refresh the page.');
            return;
        }
        
        // Delay to ensure details modal is fully closed
        setTimeout(function() {
            const row = rowToEdit || document.querySelector(`tr[data-id="${healerIdToEdit}"]`);
            if (!row) {
                showCustomAlert('error', 'Error', 'Healer record not found.');
                return;
            }
            
            const id = row.dataset.id || healerIdToEdit;
            
            // Try to fetch from server first
        fetch('/admin/healers/' + encodeURIComponent(id), {
            method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch record: ' + response.status);
                }
                return response.json();
        })
        .then(json => {
            const healer = json.healer || json;
                if (!healer) {
                    throw new Error('No healer data received');
                }
                populateEditFormFields(healer, row.dataset);
            })
            .catch(err => {
                console.warn('Failed to fetch from server, using row data:', err);
                if (row && row.dataset) {
                    populateEditFormFields(null, row.dataset);
                } else {
                    showCustomAlert('error', 'Error', 'Failed to load healer data for editing.');
                }
            });
        }, 300);
    }

    // Reusable function to populate edit form
    function populateEditFormFields(healerData, rowData) {
        try {
            const healer = healerData || {};
            const data = rowData || {};
            const id = healer.id ?? data.id ?? '';
            
            // Verify required elements exist
            const editHealerId = document.getElementById('editHealerId');
            const editHealerName = document.getElementById('editHealerName');
            const editModal = document.getElementById('editHealerModal');
            
            if (!editHealerId || !editHealerName || !editModal) {
                console.error('Edit form elements not found');
                showCustomAlert('error', 'Error', 'Edit form elements not found. Please refresh the page.');
                return;
            }
            
            // Set form fields
            editHealerId.value = id;
            editHealerName.value = healer.healer_name ?? data.healer_name ?? '';
            document.getElementById('editEthnicGroup').value = healer.ethnic_group ?? data.ethnic_group ?? '';
            document.getElementById('editSpecialization').value = healer.specialization ?? data.specialization ?? '';
            document.getElementById('editExperienceYears').value = healer.experience_years ?? data.experience_years ?? '';
            document.getElementById('editLocation').value = healer.location ?? data.location ?? '';
            document.getElementById('editLatitude').value = healer.latitude ?? data.latitude ?? '';
            document.getElementById('editLongitude').value = healer.longitude ?? data.longitude ?? '';
            document.getElementById('editPhone').value = healer.phone ?? data.phone ?? '';
            document.getElementById('editLanguages').value = healer.languages ?? data.languages ?? '';
            document.getElementById('editAbout').value = healer.about ?? data.about ?? '';
            
            // Handle image preview
            const preview = document.getElementById('editHealerImagePreview');
            if (preview) {
            preview.innerHTML = '';
                const imageVal = healer.image_url ?? healer.image ?? data.image ?? '';
            const imageUrl = imageVal ? (imageVal.startsWith('http') ? imageVal : (imageVal.startsWith('/storage') ? imageVal : '/storage/' + imageVal)) : '';
            if (imageUrl) {
                const img = document.createElement('img');
                img.src = imageUrl;
                img.style.maxWidth = '160px';
                img.style.maxHeight = '120px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '6px';
                preview.appendChild(img);
                }
            }
            
            // Show modal - force it to be visible
            editModal.style.display = 'flex';
            editModal.style.zIndex = '2500';
            editModal.style.visibility = 'visible';
            editModal.style.opacity = '1';
            
            void editModal.offsetHeight; // Force reflow
            
            // Initialize map after modal is shown
            setTimeout(function() {
                initEditHealerMap();
            }, 100);
            
            // Setup submit button handler after modal is shown
            setTimeout(function() {
                var editHealerSubmitBtn = document.querySelector('button[form="editHealerForm"]');
                if (editHealerSubmitBtn) {
                    // Clone button to remove old listeners and attach new one
                    var newBtn = editHealerSubmitBtn.cloneNode(true);
                    editHealerSubmitBtn.parentNode.replaceChild(newBtn, editHealerSubmitBtn);
                    newBtn.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        submitEditHealerForm();
                    });
                }
            }, 150);
        } catch (error) {
            console.error('Error populating edit form:', error);
            showCustomAlert('error', 'Error', 'Failed to populate edit form. Please try again.');
        }
    }
    
    // Close edit modal handlers
    document.addEventListener('click', function(e) {
        if (e.target && (e.target.id === 'closeEditHealerModal' || e.target.closest('#closeEditHealerModal'))) {
            e.preventDefault();
            e.stopPropagation();
            document.getElementById('editHealerForm').reset();
            document.getElementById('editHealerImagePreview').innerHTML = '';
            if (editHealerMap) {
                editHealerMap.remove();
                editHealerMap = null;
                editHealerMarker = null;
            }
            document.getElementById('editHealerModal').style.display = 'none';
        }
    });
    
    document.getElementById('cancelEditHealer').onclick = function() {
        document.getElementById('editHealerForm').reset();
        document.getElementById('editHealerImagePreview').innerHTML = '';
        if (editHealerMap) {
            editHealerMap.remove();
            editHealerMap = null;
            editHealerMarker = null;
        }
        document.getElementById('editHealerModal').style.display = 'none';
    };
    
    // Edit form image preview handler
    document.getElementById('editHealerImageInput').onchange = function(e) {
        var preview = document.getElementById('editHealerImagePreview');
        preview.innerHTML = '';
        if (e.target.files && e.target.files[0]) {
            var reader = new FileReader();
            reader.onload = function(ev) {
                var img = document.createElement('img');
                img.src = ev.target.result;
                img.style.maxWidth = '160px';
                img.style.maxHeight = '120px';
                img.style.objectFit = 'cover';
                img.style.borderRadius = '6px';
                preview.appendChild(img);
            };
            reader.readAsDataURL(e.target.files[0]);
        }
    };
    
    // Function to handle healer form submission
    function submitEditHealerForm(e) {
        if (e) e.preventDefault();
        var form = document.getElementById('editHealerForm');
        if (!form) {
            showCustomAlert('error', 'Error', 'Edit form not found.');
            return;
        }
        var healerId = document.getElementById('editHealerId').value;
        if (!healerId) {
            showCustomAlert('error', 'Error', 'Healer ID not found.');
            return;
        }
        var saveBtn = form.querySelector('button[type="submit"]') || document.querySelector('button[form="editHealerForm"]');
        if (saveBtn) {
            saveBtn.disabled = true;
            saveBtn.textContent = 'Saving...';
        }
        var formData = new FormData(form);
        fetch('/admin/healers/' + healerId, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'X-HTTP-Method-Override': 'PUT',
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => {
                    throw new Error(data.error || 'Update failed');
                });
            }
            return response.json();
        })
        .then(data => {
            if (saveBtn) {
                saveBtn.disabled = false;
                saveBtn.textContent = 'Save';
            }
            if (data.success) {
                form.reset();
                document.getElementById('editHealerImagePreview').innerHTML = '';
                if (editHealerMap) {
                    editHealerMap.remove();
                    editHealerMap = null;
                    editHealerMarker = null;
                }
                document.getElementById('editHealerModal').style.display = 'none';
                showCustomAlert('success', 'Success', 'Healer updated successfully!', function() {
                    window.location.reload();
                });
            } else {
                showCustomAlert('error', 'Error', data.error || 'Failed to update healer.');
            }
        })
        .catch((error) => {
            console.error('Update error:', error);
            if (saveBtn) {
                saveBtn.disabled = false;
                saveBtn.textContent = 'Save';
            }
            showCustomAlert('error', 'Error', error.message || 'Failed to update healer.');
        });
    }
    
    // Attach form submit handler
    var editHealerForm = document.getElementById('editHealerForm');
    if (editHealerForm) {
        editHealerForm.onsubmit = submitEditHealerForm;
    }
    
    // Also attach click handler to submit button as fallback (set up when modal opens)
    function setupEditHealerSubmitButton() {
        var editHealerSubmitBtn = document.querySelector('button[form="editHealerForm"]');
        if (editHealerSubmitBtn) {
            // Remove any existing listeners by cloning
            var newBtn = editHealerSubmitBtn.cloneNode(true);
            editHealerSubmitBtn.parentNode.replaceChild(newBtn, editHealerSubmitBtn);
            newBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                submitEditHealerForm();
            });
        }
    }
    
    // Setup button handler initially
    setupEditHealerSubmitButton();
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

    // See more/less functionality for healer about text
    function initializeHealerSeeMoreButtons() {
        const wrappers = document.querySelectorAll('.about-wrapper');
        
        wrappers.forEach((wrapper) => {
            const aboutText = wrapper.querySelector('.healer-about-text');
            const seeMoreBtn = wrapper.querySelector('.see-more-btn-healer');
            
            if (aboutText && seeMoreBtn) {
                // Check if about text is truncated
                const lineHeight = parseFloat(getComputedStyle(aboutText).lineHeight);
                const maxHeight = lineHeight * 2; // 2 lines
                
                setTimeout(() => {
                    if (aboutText.scrollHeight > maxHeight + 5) {
                        seeMoreBtn.style.display = 'inline-block';
                    }
                }, 100);
                
                // Toggle about text
                seeMoreBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    if (aboutText.classList.contains('expanded')) {
                        aboutText.classList.remove('expanded');
                        seeMoreBtn.textContent = 'See more';
                    } else {
                        aboutText.classList.add('expanded');
                        seeMoreBtn.textContent = 'See less';
                    }
                });
            }
        });
    }
    
    // Initialize on page load
    initializeHealerSeeMoreButtons();
});
</script>
</body>
</html>