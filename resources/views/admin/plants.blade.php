<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plants - EthnoMed Admin</title>
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
            overflow: hidden;
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
            min-height: 100vh;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            z-index: 100;
            box-sizing: border-box;
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
            margin-left: 250px;
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
            padding: 24px 48px 24px 48px;
            margin-left: 0;
            /* keep header/search fixed and make the table area scrollable */
            display: flex;
            flex-direction: column;
            height: calc(100vh - 120px); /* adjust so content fits under topbar */
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
        .plants-table {
            width: 100%;
            table-layout: auto;
            min-width: 600px;
            border-collapse: collapse;
        }
        /* Hide ID column */
        .plants-table th:nth-child(1),
        .plants-table td:nth-child(1) {
            display: none;
        }
        .plants-table th:nth-child(2) {
            width: 250px;
        }
        .plants-table th:nth-child(3) {
            width: 120px;
        }
        .plants-table th:nth-child(4) {
            width: 150px;
        }
        .plants-table thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background: #f7f8f5;
        }
        .plants-table thead th {
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
        .plants-table th, .plants-table td {
            padding: 14px 10px;
            text-align: left;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            vertical-align: top;
        }
        .plants-table td.details-col {
            max-width: 200px;
            white-space: normal;
            overflow: visible;
        }
        .plants-table th {
            color: #6b7b5e;
            font-size: 1.05rem;
            font-weight: 600;
            background: #f7f8f5;
        }
        .plants-table td {
            color: #263a29;
            font-size: 1.05rem;
            border-top: 1px solid #e3e7df;
        }
        .plant-info {
            font-weight: 700;
            color: #263a29;
        }
        .plant-meta {
            font-weight: 400;
            color: #6b7b5e;
            font-size: 0.98rem;
        }
        .plant-location {
            color: #295024;
            font-size: 1.01rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .plant-location svg {
            width: 16px;
            height: 16px;
            color: #4b7942;
        }
        .plant-uses {
            color: #0a2a5c;
            font-weight: 500;
        }
        .plant-dates {
            color: #6b7b5e;
            font-size: 0.98rem;
        }
        .plant-details-text {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }
        .plant-details-text.expanded {
            -webkit-line-clamp: unset;
            display: block;
        }
        .see-more-btn-plants {
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
        .see-more-btn-plants:hover {
            color: #24481f;
            text-decoration: underline;
        }
        .details-wrapper {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .action-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
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
        /* Plant Details Modal */
        .plant-details-modal {
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
        .plant-details-modal-content {
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
        .plant-details-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 32px 18px 32px;
            border-bottom: 2px solid #e3e7df;
            flex-shrink: 0;
        }
        .plant-details-modal-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #263a29;
            font-family: 'Playfair Display', serif;
        }
        .plant-details-close-btn {
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
        .plant-details-close-btn:hover {
            background: #e3e7df;
            color: #263a29;
            transform: scale(1.1);
        }
        .plant-details-close-btn:active {
            transform: scale(0.95);
        }
        .plant-details-modal-body {
            padding: 24px 32px;
            overflow-y: auto;
            flex: 1;
            min-height: 0;
        }
        .plant-details-image-section {
            text-align: center;
            margin-bottom: 24px;
        }
        .plant-details-image {
            max-width: 300px;
            max-height: 300px;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(44, 62, 80, 0.1);
            margin: 0 auto;
        }
        .plant-details-info {
            display: grid;
            gap: 18px;
            margin-bottom: 24px;
        }
        .plant-details-row {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .plant-details-label {
            font-weight: 600;
            color: #295024;
            font-size: 1rem;
        }
        .plant-details-value {
            color: #263a29;
            font-size: 1.05rem;
            line-height: 1.6;
        }
        .plant-details-value.empty {
            color: #b2c7b0;
            font-style: italic;
        }
        .plant-details-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            padding: 18px 32px 24px 32px;
            border-top: 2px solid #e3e7df;
            flex-shrink: 0;
            background: #fff;
        }
        .plant-details-btn {
            padding: 10px 24px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .plant-details-btn-edit {
            background: linear-gradient(135deg, #188a5a 0%, #0f6b42 100%);
            color: #fff;
            box-shadow: 0 4px 12px rgba(24, 138, 90, 0.2);
        }
        .plant-details-btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(24, 138, 90, 0.3);
        }
        .plant-details-btn-delete {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: #fff;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.2);
        }
        .plant-details-btn-delete:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(220, 38, 38, 0.3);
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
                padding: 24px 8vw 24px 8vw;
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
            .see-more-btn-plants {
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
        /* Edit Plant Modal Styles */
        .edit-plant-modal-wrapper {
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
        .edit-plant-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px 28px 18px 28px;
            border-bottom: 2px solid #e3e7df;
            flex-shrink: 0;
        }
        .edit-plant-modal-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #263a29;
        }
        .edit-plant-modal-close {
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
        .edit-plant-modal-close:hover {
            background: #e3e7df;
            color: #263a29;
            transform: scale(1.1);
        }
        .edit-plant-modal-close:active {
            transform: scale(0.95);
        }
        .edit-plant-modal-content {
            padding: 20px 28px;
            overflow-y: auto;
            flex: 1;
            min-height: 0;
        }
        .edit-plant-modal-footer {
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
                    <div class="content-title">Plants</div>
                    <div class="content-desc">Database of registered plants and their uses.</div>
                </div>
                <button class="add-btn" id="openAddModal">Add new</button>
            </div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search plants...">
            </div>
            <div class="table-scroll-wrapper">
                <table class="plants-table" id="plantsTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($plants as $plant)
                        <tr
                            data-id="{{ $plant->id }}"
                            data-common_name="{{ e($plant->common_name) }}"
                            data-scientific_name="{{ e($plant->scientific_name) }}"
                            data-category="{{ e($plant->category) }}"
                            data-description="{{ e($plant->description) }}"
                            data-documented_uses="{{ e($plant->documented_uses) }}"
                            data-preparation_methods="{{ e($plant->preparation_methods) }}"
                            data-preparation_methods_tagakaulo="{{ e($plant->preparation_methods_tagakaulo) }}"
                            data-preparation_methods_bagobo="{{ e($plant->preparation_methods_bagobo) }}"
                            data-habitat="{{ e($plant->habitat) }}"
                            data-image="{{ $plant->image ? asset('storage/' . $plant->image) : '' }}"
                            data-created_at="{{ $plant->created_at ? $plant->created_at->format('n/j/Y') : '' }}"
                            data-updated_at="{{ $plant->updated_at ? $plant->updated_at->format('n/j/Y') : '' }}"
                        >
                            <td>{{ $plant->id }}</td>
                            <td>
                                <strong>{{ $plant->common_name }}</strong><br>
                                <em style="color:#6b7b5e; font-size:0.95rem;">{{ $plant->scientific_name }}</em>
                            </td>
                            <td>
                                @if($plant->image)
                                    <img src="/storage/{{ $plant->image }}" alt="Plant Image" style="max-width:64px; max-height:64px; border-radius:8px; object-fit:cover;">
                                @else
                                    <div style="width:64px; height:64px; background:#e3e7df; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#b2c7b0; font-size:0.85rem;">No image</div>
                                @endif
                            </td>
                            <td>
                                <div class="action-links">
                                    <button class="details-btn" data-plant-id="{{ $plant->id }}">Details</button>
                                </div>
                            </td>
                        </tr>
                     @empty
                         <tr><td colspan="3" style="text-align:center; color:#6b7b5e;">No plants found.</td></tr>
                     @endforelse
                    </tbody>
                </table>
            </div>
            <div class="table-footer">
                <div>Showing 1 to 2 of 2 results</div>
            </div>
            <!-- Add New Plant Modal -->
            <div id="addPlantModal" class="modal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100vw; height:100vh; background:rgba(38,58,41,0.18); align-items:center; justify-content:center;">
                <div style="background:#fff; border-radius:12px; max-width:480px; width:95vw; padding:32px 28px; box-shadow:0 4px 32px rgba(44,62,80,0.10); position:relative; max-height:90vh; overflow-y:auto;">
                    <div style="font-size:1.3rem; font-weight:700; color:#263a29; margin-bottom:18px;">Add New Plant</div>
                    <form id="addPlantForm" enctype="multipart/form-data">
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Common Name</label><br>
                            <input type="text" name="common_name" required style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Scientific Name</label><br>
                            <input type="text" name="scientific_name" required style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Category</label><br>
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
                            </div>
                         </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Description</label><br>
                            <textarea name="description" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Documented Uses</label><br>
                            <textarea name="documented_uses" rows="2" placeholder="Comma separated" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Preparation Methods (General)</label><br>
                            <textarea name="preparation_methods" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Preparation Methods - Tagakaulo Tribe</label><br>
                            <textarea name="preparation_methods_tagakaulo" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Preparation Methods - Bagobo Tribe</label><br>
                            <textarea name="preparation_methods_bagobo" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Habitat</label><br>
                            <input type="text" name="habitat" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Image</label><br>
                            <input type="file" name="image" id="plantImageInput" accept="image/*" style="width:100%; padding:10px 0;">
                            <div id="plantImagePreview" style="margin-top:8px;"></div>
                        </div>
                        <div style="display:flex; gap:12px; justify-content:flex-end; margin-top:24px;">
                            <button type="button" id="cancelAddPlant" style="background:#e3e7df; color:#263a29; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Cancel</button>
                            <button type="submit" style="background:#23a36d; color:#fff; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Save</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Edit Plant Modal -->
            <div id="editPlantModal" class="modal" style="display:none; position:fixed; z-index:2500; left:0; top:0; width:100vw; height:100vh; background:rgba(38,58,41,0.18); align-items:center; justify-content:center; backdrop-filter: blur(4px);">
                <div class="edit-plant-modal-wrapper">
                    <div class="edit-plant-modal-header">
                        <div class="edit-plant-modal-title">Edit Plant</div>
                        <button type="button" class="edit-plant-modal-close" id="closeEditPlantModal">&times;</button>
                    </div>
                    <div class="edit-plant-modal-content">
                        <form id="editPlantForm">
                        <input type="hidden" id="editPlantId" name="id">
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Common Name</label><br>
                            <input type="text" id="editCommonName" name="common_name" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Scientific Name</label><br>
                            <input type="text" id="editScientificName" name="scientific_name" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Category</label><br>
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
                            </div>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Description</label><br>
                            <textarea id="editDescription" name="description" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Documented Uses</label><br>
                            <textarea id="editDocumentedUses" name="documented_uses" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Preparation Methods (General)</label><br>
                            <textarea id="editPreparationMethods" name="preparation_methods" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Preparation Methods - Tagakaulo Tribe</label><br>
                            <textarea id="editPreparationMethodsTagakaulo" name="preparation_methods_tagakaulo" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Preparation Methods - Bagobo Tribe</label><br>
                            <textarea id="editPreparationMethodsBagobo" name="preparation_methods_bagobo" rows="2" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></textarea>
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Habitat</label><br>
                            <input type="text" id="editHabitat" name="habitat" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;">
                        </div>
                        <div style="margin-bottom:16px;">
                            <label style="font-weight:600; color:#295024;">Image</label><br>
                            <input type="file" name="image" id="editPlantImageInput" accept="image/*" style="width:100%; padding:10px 0;">
                            <div id="editPlantImagePreview" style="margin-top:8px;"></div>
                        </div>
                        </form>
                    </div>
                    <div class="edit-plant-modal-footer">
                        <button type="button" id="cancelEditPlant" style="background:#e3e7df; color:#263a29; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Cancel</button>
                        <button type="button" id="saveEditPlantBtn" form="editPlantForm" style="background:#23a36d; color:#fff; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Save</button>
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
            <div class="delete-modal" id="deletePlantModal">
                <div class="delete-modal-content">
                    <div class="delete-modal-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><path d="M12 9v2m0 4h.01"/></div>
                    <div class="delete-modal-title">Confirm Deletion</div>
                    <div class="delete-modal-message">Are you sure you want to delete this plant? This action cannot be undone.</div>
                    <div class="delete-modal-actions">
                        <button class="delete-btn-cancel" id="cancelDeletePlant">Cancel</button>
                        <button class="delete-btn-confirm" id="confirmDeletePlant">Delete</button>
                    </div>
                </div>
            </div>
            <!-- Custom Informational Dialog -->
            <div id="infoDialog" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:3000;background:rgba(44,62,80,0.18);align-items:center;justify-content:center;">
                <div style="background:#fff;border-radius:14px;box-shadow:0 4px 32px rgba(44,62,80,0.10);padding:36px 32px;max-width:350px;width:90vw;text-align:center;position:relative;">
                    <button onclick="document.getElementById('infoDialog').style.display='none'" style="position:absolute;top:12px;right:12px;background:none;border:none;font-size:1.5rem;color:#2d5a27;cursor:pointer;">&times;</button>
                    <div style="font-size:1.25rem;font-weight:700;color:#2d5a27;margin-bottom:12px;">Success!</div>
                    <div id="infoDialogMsg" style="color:#295024;font-size:1.08rem;">Your data has been added successfully.</div>
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
                    document.getElementById('addPlantModal').style.display = 'flex';
                };
                document.getElementById('cancelAddPlant').onclick = function() {
                    var form = document.getElementById('addPlantForm');
                    form.reset();
                    document.getElementById('plantImagePreview').innerHTML = '';
                    document.getElementById('addPlantModal').style.display = 'none';
                };
                document.getElementById('plantImageInput').onchange = function(e) {
                    var preview = document.getElementById('plantImagePreview');
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
                document.getElementById('addPlantForm').onsubmit = function(e) {
                    e.preventDefault();
                    var form = e.target;
                    var saveBtn = form.querySelector('button[type="submit"]');
                    saveBtn.disabled = true;
                    saveBtn.textContent = 'Saving...';
                    var formData = new FormData(form);
                    // collect checked categories and append as comma-separated string
                    var checkedAdd = Array.from(document.querySelectorAll('#addCategoryOptions input[name="category"]:checked')).map(function(i){ return i.value; });
                    formData.delete('category'); // remove any existing keys
                    formData.append('category', checkedAdd.join(','));
                    fetch('/admin/plants', {
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
                            document.getElementById('plantImagePreview').innerHTML = '';
                            // clear checkboxes after successful save
                            document.querySelectorAll('#addCategoryOptions input[name="category"]').forEach(function(c){ c.checked = false; });
                            document.getElementById('addPlantModal').style.display = 'none';
                            showCustomAlert('success', 'Success', 'Plant added successfully!', function() {
                                window.location.reload();
                            });
                        } else {
                            showCustomAlert('error', 'Error', 'Failed to add plant.');
                        }
                    })
                    .catch(() => {
                        saveBtn.disabled = false;
                        saveBtn.textContent = 'Save';
                        showCustomAlert('error', 'Error', 'Failed to add plant.');
                    });
                };
                // Reusable function to populate edit form (defined globally for reuse)
                function populateEditFormFields(plantData, rowData) {
                    try {
                        const plant = plantData || {};
                        const data = rowData || {};
                        const id = plant.id ?? data.id ?? '';
                        
                        // Verify required elements exist
                        const editPlantId = document.getElementById('editPlantId');
                        const editCommonName = document.getElementById('editCommonName');
                        const editScientificName = document.getElementById('editScientificName');
                        const editDescription = document.getElementById('editDescription');
                        const editDocumentedUses = document.getElementById('editDocumentedUses');
                        const editPreparationMethods = document.getElementById('editPreparationMethods');
                        const editPreparationMethodsTagakaulo = document.getElementById('editPreparationMethodsTagakaulo');
                        const editPreparationMethodsBagobo = document.getElementById('editPreparationMethodsBagobo');
                        const editHabitat = document.getElementById('editHabitat');
                        const editPlantModal = document.getElementById('editPlantModal');
                        
                        if (!editPlantId || !editCommonName || !editScientificName || !editPlantModal) {
                            console.error('Edit form elements not found');
                            showCustomAlert('error', 'Error', 'Edit form elements not found. Please refresh the page.');
                            return;
                        }
                        
                        // Set form fields
                        editPlantId.value = id;
                        editCommonName.value = plant.common_name ?? data.common_name ?? '';
                        editScientificName.value = plant.scientific_name ?? data.scientific_name ?? '';
                        if (editDescription) editDescription.value = plant.description ?? data.description ?? '';
                        if (editDocumentedUses) editDocumentedUses.value = plant.documented_uses ?? data.documented_uses ?? '';
                        if (editPreparationMethods) editPreparationMethods.value = plant.preparation_methods ?? data.preparation_methods ?? '';
                        if (editPreparationMethodsTagakaulo) editPreparationMethodsTagakaulo.value = plant.preparation_methods_tagakaulo ?? data.preparation_methods_tagakaulo ?? '';
                        if (editPreparationMethodsBagobo) editPreparationMethodsBagobo.value = plant.preparation_methods_bagobo ?? data.preparation_methods_bagobo ?? '';
                        if (editHabitat) editHabitat.value = plant.habitat ?? data.habitat ?? '';
                        
                        // Handle categories
                        const csv = plant.category ?? data.category ?? '';
                        const selected = csv ? csv.split(',').map(s => s.trim()).filter(s => s) : [];
                        const categoryCheckboxes = document.querySelectorAll('#editCategoryOptions input[name="category"]');
                        if (categoryCheckboxes.length > 0) {
                            categoryCheckboxes.forEach(function(ch){
                                ch.checked = selected.includes(ch.value);
                            });
                        }
                        
                        // Handle image preview
                        const preview = document.getElementById('editPlantImagePreview');
                        if (preview) {
                            preview.innerHTML = '';
                            const imageVal = plant.image_url ?? plant.image ?? data.image ?? '';
                            const imageUrl = imageVal ? (imageVal.startsWith('http') ? imageVal : (imageVal.startsWith('/storage') ? imageVal : '/storage/' + imageVal)) : '';
                            if (imageUrl) {
                                const img = document.createElement('img');
                                img.src = imageUrl;
                                img.style.maxWidth = '120px';
                                img.style.maxHeight = '120px';
                                img.style.borderRadius = '8px';
                                img.style.marginTop = '4px';
                                preview.appendChild(img);
                            }
                        }
                        
                        // Show modal - force it to be visible
                        editPlantModal.style.display = 'flex';
                        editPlantModal.style.zIndex = '2500';
                        editPlantModal.style.visibility = 'visible';
                        editPlantModal.style.opacity = '1';
                        
                        console.log('Edit form populated successfully for plant ID:', id);
                        console.log('Edit modal display:', editPlantModal.style.display);
                        console.log('Edit modal z-index:', editPlantModal.style.zIndex);
                        
                        // Force a reflow to ensure modal is rendered
                        void editPlantModal.offsetHeight;
                        
                        // Setup submit button handler after modal is shown
                        setTimeout(function() {
                            var editPlantSubmitBtn = document.getElementById('saveEditPlantBtn') || document.querySelector('button[form="editPlantForm"]');
                            if (editPlantSubmitBtn) {
                                console.log('Re-setting up submit button handler after modal open');
                                // Clone button to remove old listeners and attach new one
                                var newBtn = editPlantSubmitBtn.cloneNode(true);
                                editPlantSubmitBtn.parentNode.replaceChild(newBtn, editPlantSubmitBtn);
                                newBtn.id = 'saveEditPlantBtn';
                                newBtn.setAttribute('form', 'editPlantForm');
                                newBtn.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    e.stopPropagation();
                                    console.log('Submit button clicked (from modal)');
                                    if (window.submitEditPlantForm) {
                                        window.submitEditPlantForm();
                                    } else {
                                        console.error('submitEditPlantForm function not found');
                                        showCustomAlert('error', 'Error', 'Form submission function not found. Please refresh the page.');
                                    }
                                });
                            } else {
                                console.warn('Submit button not found after modal open');
                            }
                        }, 100);
                    } catch (error) {
                        console.error('Error populating edit form:', error);
                        showCustomAlert('error', 'Error', 'Failed to populate edit form. Please try again.');
                    }
                }
                
                document.addEventListener('DOMContentLoaded', function() {
                    // Delegated edit click: fetch fresh record from server (JSON) before opening modal.
                    document.addEventListener('click', function(e){
                        const editBtn = e.target.closest && e.target.closest('.edit-link');
                        if (!editBtn) return;
                        e.preventDefault();
        
                        const row = editBtn.closest('tr');
                        const id = row ? (row.dataset.id || (row.querySelector('td') && row.querySelector('td').innerText.trim())) : null;
                        if (!id) {
                            showCustomAlert('error', 'Error', 'Record id not found');
                            return;
                        }
        
                        // Try to fetch latest data from server. Controller should return JSON for AJAX requests.
                        fetch('/admin/plants/' + encodeURIComponent(id), {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Failed to fetch record');
                            return response.json();
                        })
                        .then(json => {
                            // server may return { plant: {...} } or the plant object directly
                            const plant = json.plant || json;
                            populateEditFormFields(plant, row.dataset);
                        })
                        .catch(err => {
                            console.error(err);
                            // Fallback: populate from dataset if fetch fails
                            populateEditFormFields(null, row.dataset);
                        });
                    });
                    
                    // Edit form image preview handler
                    document.getElementById('editPlantImageInput').onchange = function(e) {
                        var preview = document.getElementById('editPlantImagePreview');
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
                    
                    // Close edit modal handlers
                    document.addEventListener('click', function(e) {
                        if (e.target && (e.target.id === 'closeEditPlantModal' || e.target.closest('#closeEditPlantModal'))) {
                            e.preventDefault();
                            e.stopPropagation();
                            document.getElementById('editPlantForm').reset();
                            document.getElementById('editPlantImagePreview').innerHTML = '';
                            // Clear checkboxes
                            document.querySelectorAll('#editCategoryOptions input[name="category"]').forEach(function(ch){
                                ch.checked = false;
                            });
                            document.getElementById('editPlantModal').style.display = 'none';
                        }
                    });
                    
                    document.getElementById('cancelEditPlant').onclick = function() {
                        document.getElementById('editPlantForm').reset();
                        document.getElementById('editPlantImagePreview').innerHTML = '';
                        // Clear checkboxes
                        document.querySelectorAll('#editCategoryOptions input[name="category"]').forEach(function(ch){
                            ch.checked = false;
                        });
                        document.getElementById('editPlantModal').style.display = 'none';
                    };
                    
                    // Function to handle plant form submission - make it globally accessible
                    window.submitEditPlantForm = function(e) {
                        if (e) e.preventDefault();
                        console.log('submitEditPlantForm called');
                        var form = document.getElementById('editPlantForm');
                        if (!form) {
                            console.error('Edit form not found');
                            showCustomAlert('error', 'Error', 'Edit form not found.');
                            return;
                        }
                        var plantId = document.getElementById('editPlantId').value;
                        console.log('Plant ID:', plantId);
                        if (!plantId) {
                            showCustomAlert('error', 'Error', 'Plant ID not found.');
                            return;
                        }
                        var saveBtn = document.getElementById('saveEditPlantBtn') || document.querySelector('button[form="editPlantForm"]') || form.querySelector('button[type="submit"]');
                        if (saveBtn) {
                            saveBtn.disabled = true;
                            saveBtn.textContent = 'Saving...';
                        }
                        var formData = new FormData(form);
                        
                        // Collect checked categories and append as comma-separated string
                        var checkedCategories = Array.from(document.querySelectorAll('#editCategoryOptions input[name="category"]:checked')).map(function(i){ return i.value; });
                        console.log('Checked categories:', checkedCategories);
                        formData.delete('category'); // remove any existing keys
                        formData.append('category', checkedCategories.join(','));
                        
                        // Log form data for debugging
                        console.log('Submitting plant update:', {
                            plantId: plantId,
                            categories: checkedCategories.join(','),
                            common_name: formData.get('common_name'),
                            scientific_name: formData.get('scientific_name')
                        });
                        
                        fetch('/admin/plants/' + plantId, {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'X-HTTP-Method-Override': 'PUT',
                            },
                            body: formData
                        })
                        .then(response => {
                            console.log('Response status:', response.status);
                            if (!response.ok) {
                                return response.json().then(data => {
                                    console.error('Update failed:', data);
                                    throw new Error(data.error || 'Update failed');
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Update response:', data);
                            if (saveBtn) {
                                saveBtn.disabled = false;
                                saveBtn.textContent = 'Save';
                            }
                            if (data.success) {
                                form.reset();
                                document.getElementById('editPlantImagePreview').innerHTML = '';
                                // Clear checkboxes
                                document.querySelectorAll('#editCategoryOptions input[name="category"]').forEach(function(ch){
                                    ch.checked = false;
                                });
                                document.getElementById('editPlantModal').style.display = 'none';
                                showCustomAlert('success', 'Success', 'Plant updated successfully!', function() {
                                    window.location.reload();
                                });
                            } else {
                                showCustomAlert('error', 'Error', data.error || 'Failed to update plant.');
                            }
                        })
                        .catch((error) => {
                            console.error('Update error:', error);
                            if (saveBtn) {
                                saveBtn.disabled = false;
                                saveBtn.textContent = 'Save';
                            }
                            showCustomAlert('error', 'Error', error.message || 'Failed to update plant.');
                        });
                    };
                    
                    // Attach form submit handler
                    var editPlantForm = document.getElementById('editPlantForm');
                    if (editPlantForm) {
                        editPlantForm.addEventListener('submit', window.submitEditPlantForm);
                        console.log('Form submit handler attached');
                    }
                    
                    // Also attach click handler to submit button as fallback (set up when modal opens)
                    function setupEditPlantSubmitButton() {
                        var editPlantSubmitBtn = document.getElementById('saveEditPlantBtn') || document.querySelector('button[form="editPlantForm"]');
                        if (editPlantSubmitBtn) {
                            console.log('Setting up submit button handler');
                            // Remove any existing listeners by cloning
                            var newBtn = editPlantSubmitBtn.cloneNode(true);
                            editPlantSubmitBtn.parentNode.replaceChild(newBtn, editPlantSubmitBtn);
                            newBtn.id = 'saveEditPlantBtn';
                            newBtn.setAttribute('form', 'editPlantForm');
                            newBtn.addEventListener('click', function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                                console.log('Submit button clicked');
                                if (window.submitEditPlantForm) {
                                    window.submitEditPlantForm();
                                } else {
                                    console.error('submitEditPlantForm function not found');
                                    showCustomAlert('error', 'Error', 'Form submission function not found. Please refresh the page.');
                                }
                            });
                        } else {
                            console.warn('Submit button not found');
                        }
                    }
                    
                    // Setup button handler initially
                    setupEditPlantSubmitButton();
                    
                    // Also set up handler on the button by ID
                    var saveBtnById = document.getElementById('saveEditPlantBtn');
                    if (saveBtnById) {
                        saveBtnById.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            console.log('Save button clicked (by ID)');
                            if (window.submitEditPlantForm) {
                                window.submitEditPlantForm();
                            }
                        });
                    }
                    // Handle Delete button click
                    document.querySelectorAll('.delete-link').forEach(function(btn) {
                        btn.addEventListener('click', function(e) {
                            e.preventDefault();
                            var row = btn.closest('tr');
                            var plantId = row.querySelector('td').innerText.trim();
                            document.getElementById('deletePlantModal').style.display = 'flex';
                            document.getElementById('confirmDeletePlant').onclick = function() {
                                fetch('/admin/plants/' + plantId, {
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
                                        document.getElementById('deletePlantModal').style.display = 'none';
                                        showCustomAlert('success', 'Success', 'Plant deleted successfully!');
                                    } else {
                                        showCustomAlert('error', 'Error', 'Failed to delete plant.');
                                    }
                                })
                                .catch(() => {
                                    showCustomAlert('error', 'Error', 'Failed to delete plant.');
                                });
                            };
                            document.getElementById('cancelDeletePlant').onclick = function() {
                                document.getElementById('deletePlantModal').style.display = 'none';
                            };
                        });
                    });
                });
                // Plant Details Modal Functionality
                let currentPlantRow = null;
                let currentPlantId = null;

                function openPlantDetailsModal(plantId) {
                    const row = document.querySelector(`tr[data-id="${plantId}"]`);
                    if (!row) {
                        console.error('Row not found for plant ID:', plantId);
                        return;
                    }

                    // Set global variables for edit/delete buttons
                    currentPlantRow = row;
                    currentPlantId = plantId;
                    
                    console.log('Details modal opened for plant ID:', plantId);
                    console.log('Current plant row set:', currentPlantRow);
                    console.log('Current plant ID set:', currentPlantId);

                    // Populate modal with plant data
                    document.getElementById('plantDetailsId').textContent = row.dataset.id || '-';
                    document.getElementById('plantDetailsCommonName').textContent = row.dataset.common_name || 'N/A';
                    document.getElementById('plantDetailsScientificName').textContent = row.dataset.scientific_name || 'N/A';
                    document.getElementById('plantDetailsCategory').textContent = row.dataset.category || 'N/A';
                    
                    const description = row.dataset.description || '';
                    document.getElementById('plantDetailsDescription').textContent = description || 'N/A';
                    document.getElementById('plantDetailsDescription').className = description ? 'plant-details-value' : 'plant-details-value empty';
                    
                    const uses = row.dataset.documented_uses || '';
                    document.getElementById('plantDetailsUses').textContent = uses || 'N/A';
                    document.getElementById('plantDetailsUses').className = uses ? 'plant-details-value' : 'plant-details-value empty';
                    
                    const preparation = row.dataset.preparation_methods || '';
                    document.getElementById('plantDetailsPreparation').textContent = preparation || 'N/A';
                    document.getElementById('plantDetailsPreparation').className = preparation ? 'plant-details-value' : 'plant-details-value empty';
                    
                    const habitat = row.dataset.habitat || '';
                    document.getElementById('plantDetailsHabitat').textContent = habitat || 'N/A';
                    document.getElementById('plantDetailsHabitat').className = habitat ? 'plant-details-value' : 'plant-details-value empty';
                    
                    document.getElementById('plantDetailsCreatedAt').textContent = row.dataset.created_at || '-';
                    document.getElementById('plantDetailsUpdatedAt').textContent = row.dataset.updated_at || '-';

                    // Handle image
                    const imageUrl = row.dataset.image || '';
                    const imageEl = document.getElementById('plantDetailsImage');
                    const noImageEl = document.getElementById('plantDetailsNoImage');
                    
                    if (imageUrl) {
                        imageEl.src = imageUrl;
                        imageEl.style.display = 'block';
                        noImageEl.style.display = 'none';
                    } else {
                        imageEl.style.display = 'none';
                        noImageEl.style.display = 'flex';
                    }

                    // Show modal
                    document.getElementById('plantDetailsModal').style.display = 'flex';
                }

                function closePlantDetailsModal() {
                    const modal = document.getElementById('plantDetailsModal');
                    if (modal) {
                        modal.style.display = 'none';
                    }
                    currentPlantRow = null;
                    currentPlantId = null;
                }

                // Setup all modal button handlers
                function setupPlantDetailsModalHandlers() {
                    // Close button (X)
                    const closeBtn = document.getElementById('closePlantDetailsModal');
                    if (closeBtn) {
                        closeBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            closePlantDetailsModal();
                        });
                    }

                    // Close modal when clicking backdrop (but not modal content)
                    const modal = document.getElementById('plantDetailsModal');
                    const modalContent = document.querySelector('.plant-details-modal-content');
                    if (modal && modalContent) {
                        modal.addEventListener('click', function(e) {
                            // Only close if clicking the backdrop, not the content area
                            if (e.target === modal && !modalContent.contains(e.target)) {
                                closePlantDetailsModal();
                            }
                        });
                        // Prevent closing when clicking inside modal content
                        modalContent.addEventListener('click', function(e) {
                            e.stopPropagation();
                        });
                    }

                    // Edit button
                    const editBtn = document.getElementById('editPlantFromDetails');
                    if (editBtn) {
                        editBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            
                            console.log('=== EDIT BUTTON CLICKED (direct handler) ===');
                            console.log('Current plant ID:', currentPlantId);
                            console.log('Current plant row:', currentPlantRow);
                            
                            if (!currentPlantId || !currentPlantRow) {
                                console.error('ERROR: currentPlantId or currentPlantRow is null!');
                                showCustomAlert('error', 'Error', 'No plant selected. Please close and reopen the details modal.');
                                return;
                            }
                            
                            openEditFormFromDetails(currentPlantId, currentPlantRow);
                        });
                    }

                    // Delete button
                    const deleteBtn = document.getElementById('deletePlantFromDetails');
                    if (deleteBtn) {
                        deleteBtn.addEventListener('click', function(e) {
                            e.preventDefault();
                            e.stopPropagation();
                            if (currentPlantId && currentPlantRow) {
                                const plantIdToDelete = currentPlantId;
                                const rowToDelete = currentPlantRow;
                                closePlantDetailsModal();
                                
                                // Show delete confirmation modal
                                const deleteModal = document.getElementById('deletePlantModal');
                                if (deleteModal) {
                                    deleteModal.style.display = 'flex';
                                    
                                    // Remove any existing handlers
                                    const confirmDeleteBtn = document.getElementById('confirmDeletePlant');
                                    const cancelDeleteBtn = document.getElementById('cancelDeletePlant');
                                    
                                    // Clone buttons to remove old event listeners
                                    const newConfirmBtn = confirmDeleteBtn.cloneNode(true);
                                    const newCancelBtn = cancelDeleteBtn.cloneNode(true);
                                    confirmDeleteBtn.parentNode.replaceChild(newConfirmBtn, confirmDeleteBtn);
                                    cancelDeleteBtn.parentNode.replaceChild(newCancelBtn, cancelDeleteBtn);
                                    
                                    // Setup delete confirmation
                                    newConfirmBtn.onclick = function() {
                                        newConfirmBtn.disabled = true;
                                        newConfirmBtn.textContent = 'Deleting...';
                                        
                                        fetch('/admin/plants/' + plantIdToDelete, {
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
                                                showCustomAlert('success', 'Success', 'Plant deleted successfully!');
                                            } else {
                                                newConfirmBtn.disabled = false;
                                                newConfirmBtn.textContent = 'Delete';
                                                showCustomAlert('error', 'Error', data.error || 'Failed to delete plant.');
                                            }
                                        })
                                        .catch((error) => {
                                            console.error('Delete error:', error);
                                            newConfirmBtn.disabled = false;
                                            newConfirmBtn.textContent = 'Delete';
                                            showCustomAlert('error', 'Error', 'Failed to delete plant. Please try again.');
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

                // Details button click handlers (delegated for dynamic content)
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('details-btn')) {
                        e.preventDefault();
                        e.stopPropagation();
                        const plantId = e.target.getAttribute('data-plant-id');
                        if (plantId) {
                            openPlantDetailsModal(plantId);
                        }
                    }
                    
                });

                // Initialize modal handlers when DOM is ready
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', setupPlantDetailsModalHandlers);
                } else {
                    setupPlantDetailsModalHandlers();
                }
                
                // Edit button handler - direct and reliable
                function openEditFormFromDetails(plantIdToEdit, rowToEdit) {
                    if (!plantIdToEdit) {
                        console.error('No plant ID available');
                        showCustomAlert('error', 'Error', 'No plant selected for editing.');
                        return;
                    }
                    
                    console.log('=== openEditFormFromDetails CALLED ===');
                    console.log('Plant ID:', plantIdToEdit);
                    console.log('Row:', rowToEdit);
                    
                    // Close details modal first
                    closePlantDetailsModal();
                    
                    // Verify edit modal exists
                    const editModal = document.getElementById('editPlantModal');
                    if (!editModal) {
                        console.error('Edit modal element not found!');
                        showCustomAlert('error', 'Error', 'Edit modal not found. Please refresh the page.');
                        return;
                    }
                    
                    // Delay to ensure details modal is fully closed before opening edit modal
                    setTimeout(function() {
                        console.log('Timeout callback executing...');
                        console.log('Looking for row with ID:', plantIdToEdit);
                        const row = rowToEdit || document.querySelector(`tr[data-id="${plantIdToEdit}"]`);
                        console.log('Found row:', row);
                        
                        if (!row) {
                            console.error('Row not found for plant ID:', plantIdToEdit);
                            showCustomAlert('error', 'Error', 'Plant record not found.');
                            return;
                        }
                        
                        const id = row.dataset.id || plantIdToEdit;
                        console.log('Using plant ID:', id);
                        console.log('Row dataset:', row.dataset);
                        
                        // Verify edit modal still exists before proceeding
                        const editModalCheck = document.getElementById('editPlantModal');
                        if (!editModalCheck) {
                            console.error('Edit modal disappeared!');
                            showCustomAlert('error', 'Error', 'Edit modal not available.');
                            return;
                        }
                        
                        // Try to fetch from server first, then populate form
                        fetch('/admin/plants/' + encodeURIComponent(id), {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => {
                            console.log('Fetch response status:', response.status);
                            if (!response.ok) {
                                throw new Error('Failed to fetch record: ' + response.status);
                            }
                            return response.json();
                        })
                        .then(json => {
                            console.log('Received JSON:', json);
                            const plant = json.plant || json;
                            if (!plant) {
                                throw new Error('No plant data received');
                            }
                            console.log('Fetched plant data:', plant);
                            
                            // Final check before showing modal
                            const finalModalCheck = document.getElementById('editPlantModal');
                            if (finalModalCheck) {
                                populateEditFormFields(plant, row.dataset);
                            } else {
                                console.error('Edit modal missing when trying to populate!');
                                showCustomAlert('error', 'Error', 'Cannot open edit modal. Please refresh the page.');
                            }
                        })
                        .catch(err => {
                            console.warn('Failed to fetch from server, using row data:', err);
                            // Fallback to row dataset
                            if (row && row.dataset) {
                                console.log('Using fallback: row dataset');
                                const finalModalCheck = document.getElementById('editPlantModal');
                                if (finalModalCheck) {
                                    populateEditFormFields(null, row.dataset);
                                } else {
                                    console.error('Edit modal missing during fallback!');
                                    showCustomAlert('error', 'Error', 'Cannot open edit modal. Please refresh the page.');
                                }
                            } else {
                                showCustomAlert('error', 'Error', 'Failed to load plant data for editing.');
                            }
                        });
                    }, 300);
                }
                
                // Backup event delegation for edit button (in case direct handler doesn't work)
                document.addEventListener('click', function(e) {
                    let target = e.target;
                    let editButton = null;
                    
                    // Check if target is the button itself or inside it
                    if (target && (target.id === 'editPlantFromDetails' || target.closest('#editPlantFromDetails'))) {
                        editButton = target.id === 'editPlantFromDetails' ? target : target.closest('#editPlantFromDetails');
                        
                        // Only handle if not already handled by direct listener
                        if (editButton && currentPlantId && currentPlantRow) {
                            e.preventDefault();
                            e.stopPropagation();
                            
                            console.log('=== EDIT BUTTON CLICKED (delegated handler) ===');
                            openEditFormFromDetails(currentPlantId, currentPlantRow);
                        }
                    }
                });

                document.getElementById('searchInput').addEventListener('input', function() {
                    const filter = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#plantsTable tbody tr');
                    rows.forEach(row => {
                        const text = row.textContent.toLowerCase();
                        row.style.display = text.includes(filter) ? '' : 'none';
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

                // See more/less functionality for plant details
                function initializePlantSeeMoreButtons() {
                    const wrappers = document.querySelectorAll('.details-wrapper');
                    
                    wrappers.forEach((wrapper) => {
                        const detailsText = wrapper.querySelector('.plant-details-text');
                        const seeMoreBtn = wrapper.querySelector('.see-more-btn-plants');
                        
                        if (detailsText && seeMoreBtn) {
                            // Check if details text is truncated
                            const lineHeight = parseFloat(getComputedStyle(detailsText).lineHeight);
                            const maxHeight = lineHeight * 2; // 2 lines
                            
                            setTimeout(() => {
                                if (detailsText.scrollHeight > maxHeight + 5) {
                                    seeMoreBtn.style.display = 'inline-block';
                                }
                            }, 100);
                            
                            // Toggle details
                            seeMoreBtn.addEventListener('click', function(e) {
                                e.preventDefault();
                                e.stopPropagation();
                                
                                if (detailsText.classList.contains('expanded')) {
                                    detailsText.classList.remove('expanded');
                                    seeMoreBtn.textContent = 'See more';
                                } else {
                                    detailsText.classList.add('expanded');
                                    seeMoreBtn.textContent = 'See less';
                                }
                            });
                        }
                    });
                }
                
                // Initialize on page load
                document.addEventListener('DOMContentLoaded', initializePlantSeeMoreButtons);
            </script>
        </div>
    </div>
</div>
@include('admin.partials.logout_modal')
<script>document.addEventListener('DOMContentLoaded', function(){});</script>
<!-- Plant Details Modal -->
<div class="plant-details-modal" id="plantDetailsModal">
    <div class="plant-details-modal-content">
        <div class="plant-details-modal-header">
            <div class="plant-details-modal-title">Plant Details</div>
            <button type="button" class="plant-details-close-btn" id="closePlantDetailsModal">&times;</button>
        </div>
        <div class="plant-details-modal-body">
            <div class="plant-details-image-section" id="plantDetailsImageSection">
                <img id="plantDetailsImage" class="plant-details-image" src="" alt="Plant Image" style="display:none;">
                <div id="plantDetailsNoImage" style="display:none; width:300px; height:300px; background:#e3e7df; border-radius:12px; margin:0 auto; align-items:center; justify-content:center; color:#b2c7b0; font-size:1.1rem;">No image available</div>
            </div>
            <div class="plant-details-info" id="plantDetailsInfo">
            <div class="plant-details-row" style="display: none;">
                <div class="plant-details-label">ID</div>
                <div class="plant-details-value" id="plantDetailsId">-</div>
            </div>
            <div class="plant-details-row">
                <div class="plant-details-label">Common Name</div>
                <div class="plant-details-value" id="plantDetailsCommonName">-</div>
            </div>
            <div class="plant-details-row">
                <div class="plant-details-label">Scientific Name</div>
                <div class="plant-details-value" id="plantDetailsScientificName">-</div>
            </div>
            <div class="plant-details-row">
                <div class="plant-details-label">Category</div>
                <div class="plant-details-value" id="plantDetailsCategory">-</div>
            </div>
            <div class="plant-details-row">
                <div class="plant-details-label">Description</div>
                <div class="plant-details-value" id="plantDetailsDescription">-</div>
            </div>
            <div class="plant-details-row">
                <div class="plant-details-label">Documented Uses</div>
                <div class="plant-details-value" id="plantDetailsUses">-</div>
            </div>
            <div class="plant-details-row">
                <div class="plant-details-label">Preparation Methods</div>
                <div class="plant-details-value" id="plantDetailsPreparation">-</div>
            </div>
            <div class="plant-details-row">
                <div class="plant-details-label">Habitat</div>
                <div class="plant-details-value" id="plantDetailsHabitat">-</div>
            </div>
            <div class="plant-details-row" style="display: none;">
                <div class="plant-details-label">Created At</div>
                <div class="plant-details-value" id="plantDetailsCreatedAt">-</div>
            </div>
            <div class="plant-details-row" style="display: none;">
                <div class="plant-details-label">Updated At</div>
                <div class="plant-details-value" id="plantDetailsUpdatedAt">-</div>
            </div>
        </div>
        </div>
        <div class="plant-details-actions">
            <button type="button" class="plant-details-btn plant-details-btn-edit" id="editPlantFromDetails">Edit</button>
            <button type="button" class="plant-details-btn plant-details-btn-delete" id="deletePlantFromDetails">Delete</button>
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