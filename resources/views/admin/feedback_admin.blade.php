<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Feedback - IP Healers Academy Admin</title>
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
        .feedback-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }
        /* Hide ID column */
        .feedback-table th:nth-child(1),
        .feedback-table td:nth-child(1) {
            display: none;
        }
        /* Hide User ID column */
        .feedback-table th:nth-child(2),
        .feedback-table td:nth-child(2) {
            display: none;
        }
        /* Hide Created At column */
        .feedback-table th:nth-child(11),
        .feedback-table td:nth-child(11) {
            display: none;
        }
        .feedback-table thead {
            position: sticky;
            top: 0;
            z-index: 10;
            background: linear-gradient(180deg, #f7f8f5 0%, #eef2eb 100%);
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.05);
        }
        .feedback-table thead th {
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
        .feedback-table th, .feedback-table td {
            padding: 16px 12px;
            text-align: left;
        }
        .feedback-table th {
            color: #6b7b5e;
            font-size: 1.05rem;
            font-weight: 600;
            background: #f7f8f5;
        }
        .feedback-table td {
            color: #263a29;
            font-size: 1.05rem;
            border-top: 1px solid #e3e7df;
        }
        .user-info {
            font-weight: 700;
            color: #263a29;
        }
        .user-meta {
            font-weight: 400;
            color: #6b7b5e;
            font-size: 0.98rem;
        }
        .rating-stars {
            color: #f7c948;
            font-size: 1.2rem;
            display: inline-block;
            vertical-align: middle;
        }
        .rating-value {
            color: #263a29;
            font-weight: 600;
            margin-left: 6px;
            font-size: 1.05rem;
        }
        .comment {
            color: #263a29;
            font-size: 1.01rem;
        }
        .feedback-dates {
            color: #6b7b5e;
            font-size: 0.98rem;
        }
        .action-links {
            display: flex;
            gap: 16px;
        }
        .view-link {
            color: #188a5a;
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.2s ease;
        }
        .view-link:hover {
            color: #0d6e3f;
            text-decoration: underline;
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
                    <div class="content-title">User Feedback</div>
                    <div class="content-desc">View and manage user feedback and ratings.</div>
                </div>
            </div>
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search user feedback...">
            </div>
            <div id="flash-message" style="display:none;position:fixed;top:18px;left:50%;transform:translateX(-50%);z-index:2000;min-width:320px;max-width:90vw;padding:16px 24px;border-radius:6px;font-size:1.08rem;font-weight:500;text-align:center;"></div>
            <div class="table-scroll-wrapper">
                <table class="feedback-table" id="feedbackTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Subject</th>
                        <th>File</th>
                        <th>Privacy Agreed</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($feedback as $item)
                    <tr data-id="{{ $item->id }}">
                        <td>{{ $item->id }}</td>
                        <td><div class="user-info">User ID: {{ $item->user_id }}</div></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->subject }}</td>
                        <td>
                            @if($item->file)
                                <a href="{{ asset('storage/' . $item->file) }}" target="_blank">View File</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $item->privacy_agreed ? 'Yes' : 'No' }}</td>
                        <td><span class="rating-value">{{ $item->rating }}</span></td>
                        <td class="comment">{{ $item->comment }}</td>
                        <td class="feedback-dates">{{ $item->created_at ? $item->created_at->format('n/j/Y') : '' }}</td>
                        <td>
                            <div class="action-links">
                                <a href="#" class="view-link" data-id="{{ $item->id }}">View</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="9" style="text-align:center; color:#6b7b5e;">No feedback found.</td></tr>
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
            <!-- Add New Feedback Modal -->
            <div id="addFeedbackModal" class="modal" style="display:none; position:fixed; z-index:1000; left:0; top:0; width:100vw; height:100vh; background:rgba(38,58,41,0.18); align-items:center; justify-content:center;">
                <div style="background:#fff; border-radius:12px; max-width:480px; width:95vw; padding:32px 28px; box-shadow:0 4px 32px rgba(44,62,80,0.10); position:relative;">
                    <div id="feedbackModalTitle" style="font-size:1.3rem; font-weight:700; color:#263a29; margin-bottom:18px;">Add New Feedback</div>
                    <form id="addFeedbackForm" enctype="multipart/form-data">
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">User Name</label><br><input type="text" name="name" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Email</label><br><input type="email" name="email" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Type</label><br><select name="type" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"><option value="">Select type</option><option value="suggestion">Suggestion</option><option value="issue">Issue</option><option value="question">Question</option><option value="other">Other</option></select></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Subject</label><br><input type="text" name="subject" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">File</label><br><input type="file" name="file" style="width:100%;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Privacy Agreed</label><br><input type="checkbox" name="privacy_agreed" value="1"> I agree to the privacy policy</div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Rating</label><br><input type="number" name="rating" min="1" max="5" step="0.5" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="margin-bottom:16px;"><label style="font-weight:600; color:#295024;">Comment</label><br><input type="text" name="comment" style="width:100%; padding:10px 12px; border:1.5px solid #e3e7df; border-radius:6px; font-size:1rem; background:#f7f8f5; color:#263a29;"></div>
                        <div style="display:flex; gap:12px; justify-content:flex-end; margin-top:24px;"><button type="button" id="cancelAddFeedback" style="background:#e3e7df; color:#263a29; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Cancel</button><button type="submit" style="background:#23a36d; color:#fff; border:none; border-radius:6px; padding:10px 24px; font-size:1rem; font-weight:600; cursor:pointer;">Save</button></div>
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
            <!-- View Feedback Modal -->
            <div class="view-modal" id="viewModal" style="display:none; position:fixed; z-index:2000; left:0; top:0; width:100vw; height:100vh; background:rgba(38,58,41,0.25); align-items:center; justify-content:center; backdrop-filter:blur(4px);">
                <div style="background:#fff; border-radius:16px; max-width:600px; width:90vw; padding:36px 28px; box-shadow:0 12px 48px rgba(44,62,80,0.20); position:relative; max-height:90vh; overflow-y:auto;">
                    <div style="font-size:1.35rem; font-weight:700; color:#263a29; margin-bottom:24px; display:flex; align-items:center; justify-content:space-between;">
                        <span>Feedback Details</span>
                        <button id="closeViewModal" style="background:none; border:none; font-size:1.5rem; color:#6b7b5e; cursor:pointer; padding:0; width:32px; height:32px; display:flex; align-items:center; justify-content:center; border-radius:50%; transition:all 0.2s;" onmouseover="this.style.background='#f7f8f5'; this.style.color='#263a29';" onmouseout="this.style.background='none'; this.style.color='#6b7b5e';">×</button>
                    </div>
                    <div id="viewModalContent" style="color:#263a29;">
                        <!-- Content will be populated by JavaScript -->
                    </div>
                    <div style="display:flex; gap:12px; justify-content:flex-end; margin-top:24px;">
                        <button id="closeViewModalBtn" style="background:#e3e7df; color:#263a29; border:none; border-radius:8px; padding:12px 24px; font-size:1rem; font-weight:600; cursor:pointer; transition:all 0.3s ease;">Close</button>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // View Feedback Logic
                    document.querySelectorAll('.view-link').forEach(function(btn) {
                        btn.addEventListener('click', function(e) {
                            e.preventDefault();
                            const row = btn.closest('tr');
                            const cells = row.querySelectorAll('td');
                            
                            // Extract feedback data from table row
                            // Note: cells[0] = ID (hidden), cells[1] = User ID (hidden)
                            const feedbackData = {
                                id: cells[0].innerText.trim(),
                                userId: cells[1].innerText.trim(),
                                name: cells[2].innerText.trim(),
                                email: cells[3].innerText.trim(),
                                type: cells[4].innerText.trim(),
                                subject: cells[5].innerText.trim(),
                                file: cells[6].innerHTML.trim(),
                                privacyAgreed: cells[7].innerText.trim(),
                                rating: cells[8].innerText.trim(),
                                comment: cells[9].innerText.trim(),
                                createdAt: cells[10].innerText.trim()
                            };
                            
                            // Populate view modal
                            const content = document.getElementById('viewModalContent');
                            content.innerHTML = `
                                <div style="display:grid; gap:16px;">
                                    <div style="display: none;"><strong style="color:#295024; display:inline-block; width:140px;">ID:</strong> <span>${feedbackData.id}</span></div>
                                    <div style="display: none;"><strong style="color:#295024; display:inline-block; width:140px;">User ID:</strong> <span>${feedbackData.userId}</span></div>
                                    <div><strong style="color:#295024; display:inline-block; width:140px;">Name:</strong> <span>${feedbackData.name}</span></div>
                                    <div><strong style="color:#295024; display:inline-block; width:140px;">Email:</strong> <span>${feedbackData.email}</span></div>
                                    <div><strong style="color:#295024; display:inline-block; width:140px;">Type:</strong> <span>${feedbackData.type}</span></div>
                                    <div><strong style="color:#295024; display:inline-block; width:140px;">Subject:</strong> <span>${feedbackData.subject}</span></div>
                                    <div><strong style="color:#295024; display:inline-block; width:140px;">File:</strong> <span>${feedbackData.file}</span></div>
                                    <div><strong style="color:#295024; display:inline-block; width:140px;">Privacy Agreed:</strong> <span>${feedbackData.privacyAgreed}</span></div>
                                    <div><strong style="color:#295024; display:inline-block; width:140px;">Rating:</strong> <span class="rating-stars">${'★'.repeat(Math.round(parseFloat(feedbackData.rating))) + '☆'.repeat(5 - Math.round(parseFloat(feedbackData.rating)))}</span> <span>${feedbackData.rating}</span></div>
                                    <div><strong style="color:#295024; display:inline-block; width:140px; vertical-align:top;">Comment:</strong> <span style="display:inline-block; max-width:400px;">${feedbackData.comment}</span></div>
                                    <div style="display: none;"><strong style="color:#295024; display:inline-block; width:140px;">Created At:</strong> <span>${feedbackData.createdAt}</span></div>
                                </div>
                            `;
                            
                            document.getElementById('viewModal').style.display = 'flex';
                        });
                    });
                    
                    // Close view modal
                    const closeViewModal = document.getElementById('closeViewModal');
                    const closeViewModalBtn = document.getElementById('closeViewModalBtn');
                    const viewModal = document.getElementById('viewModal');
                    
                    if (closeViewModal) {
                        closeViewModal.addEventListener('click', function() {
                            viewModal.style.display = 'none';
                        });
                    }
                    
                    if (closeViewModalBtn) {
                        closeViewModalBtn.addEventListener('click', function() {
                            viewModal.style.display = 'none';
                        });
                    }
                    
                    // Close modal when clicking outside
                    if (viewModal) {
                        viewModal.addEventListener('click', function(e) {
                            if (e.target === viewModal) {
                                viewModal.style.display = 'none';
                            }
                        });
                    }
                    
                    // Flash message helper
                    function showFlash(msg, success) {
                        const flash = document.getElementById('flash-message');
                        flash.textContent = msg;
                        flash.style.background = success ? '#e6f7e6' : '#fff3f3';
                        flash.style.color = success ? '#31703b' : '#b91c1c';
                        flash.style.display = 'block';
                        setTimeout(() => { flash.style.display = 'none'; }, 2500);
                    }
                });
                document.getElementById('searchInput').addEventListener('input', function() {
                    const filter = this.value.toLowerCase();
                    const rows = document.querySelectorAll('#feedbackTable tbody tr');
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
            </script>
        </div>
    </div>
</div>
@include('admin.partials.logout_modal')
<script>document.addEventListener('DOMContentLoaded', function(){});</script>
</body>
</html>