<style>
    /* Topbar / avatar shared styles for all admin pages */
    .topbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        padding: 18px 24px;
        background: #355E2E;
    }
    .topbar .user-info { display:flex; align-items:center; gap:12px; }
    .topbar .user-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        flex: 0 0 48px;
    }
    .topbar .user-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 50%;
    }
    @media (max-width: 900px) {
        .topbar .user-avatar { width:40px; height:40px; flex:0 0 40px; }
    }
    .topbar .user-name { color:#fff; font-weight:600; }
</style>

@php $user = Auth::user(); $name = $user ? $user->name : 'Admin'; @endphp
<div class="topbar">
    <div class="topbar-left" style="display:flex;align-items:center;gap:8px;">
       
        <div style="color:#fff;font-weight:700;font-size:1rem;">IP Healers Academy</div>
    </div>

    <div class="topbar-right" style="display:flex;align-items:center;gap:18px;">
        <div class="user-info">
            <div class="user-avatar" id="adminAvatarWrap" title="Click to change">
                <form id="avatarForm" action="{{ route('admin.avatar.update') }}" method="POST" enctype="multipart/form-data" style="margin:0;">
                    @csrf
                    <input type="file" name="avatar" id="avatarInput" accept="image/*" style="display:none;">
                    @if(!empty($user->avatar) && file_exists(storage_path('app/public/'.$user->avatar)))
                        <img id="adminAvatarImg" src="{{ asset('storage/'.$user->avatar) }}" alt="Admin profile">
                    @elseif(file_exists(public_path('images/admin_profile.jpg')))
                        <img id="adminAvatarImg" src="{{ asset('images/admin_profile.jpg') }}" alt="Admin profile">
                    @else
                        <span id="adminAvatarInitials" style="font-weight:700;color:#2d5a27;">{{ collect(explode(' ', $name))->map(fn($w)=>strtoupper($w[0]))->join('') }}</span>
                    @endif
                </form>
            </div>

            <div class="user-name">{{ $name }}</div>
        </div>

        <!-- Logout trigger + hidden form -->
        <a href="#" id="logoutBtn" style="color:#fff;text-decoration:none;font-weight:600;padding:8px 12px;">Logout</a>
        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
    </div>
</div>

<!-- Logout Modal -->
<div id="logoutModal" class="logout-modal">
    <div class="logout-modal-content">
        <div class="logout-modal-title">Confirm Logout</div>
        <div style="margin-bottom:18px;">Are you sure you want to logout?</div>
        <div class="logout-modal-actions">
            <button type="button" class="logout-btn-cancel" id="cancelLogout">Cancel</button>
            <button type="button" class="logout-btn-confirm" id="confirmLogout">Logout</button>
        </div>
    </div>
</div>
<style>
.logout-modal {
    display: none;
    position: fixed;
    z-index: 2000;
    left: 0;
    top: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(38,58,41,0.18);
    align-items: center;
    justify-content: center;
}
.logout-modal-content {
    background: #fff;
    border-radius: 12px;
    max-width: 400px;
    width: 90vw;
    padding: 32px 24px;
    box-shadow: 0 4px 32px rgba(44,62,80,0.10);
    text-align: center;
}
.logout-modal-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: #263a29;
    margin-bottom: 8px;
}
.logout-modal-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
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
.logout-btn-cancel {
    background: #e3e7df;
    color: #263a29;
    border: none;
    border-radius: 6px;
    padding: 10px 24px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
}
.logout-btn-cancel:hover {
    background: #d1d9d1;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // avatar upload behavior (preview + auto-submit)
    const wrap = document.getElementById('adminAvatarWrap');
    const input = document.getElementById('avatarInput');
    const form = document.getElementById('avatarForm');
    const img = document.getElementById('adminAvatarImg');
    const initials = document.getElementById('adminAvatarInitials');

    if(wrap && input && form){
        wrap.style.cursor = 'pointer';
        wrap.addEventListener('click', () => input.click());
        input.addEventListener('change', () => {
            if (!input.files || !input.files[0]) return;
            const file = input.files[0];
            const reader = new FileReader();
            reader.onload = function(e){
                if(img){
                    img.src = e.target.result;
                } else {
                    const im = document.createElement('img');
                    im.id = 'adminAvatarImg';
                    im.src = e.target.result;
                    im.style.width = '100%';
                    im.style.height = '100%';
                    im.style.objectFit = 'cover';
                    im.style.borderRadius = '50%';
                    if(initials) initials.remove();
                    wrap.appendChild(im);
                }
            };
            reader.readAsDataURL(file);
            form.submit();
        });
    }

    // logout behavior: open confirmation modal if present, else submit
    const logoutBtn = document.getElementById('logoutBtn');
    const logoutModal = document.getElementById('logoutModal');
    const logoutForm = document.getElementById('logoutForm');
    if(logoutBtn){
        logoutBtn.addEventListener('click', function(e){
            e.preventDefault();
            if(logoutModal){
                logoutModal.style.display = 'flex';
            } else if(logoutForm){
                logoutForm.submit();
            }
        });
    }

    // logout modal logic
    const cancelBtn = document.getElementById('cancelLogout');
    const confirmBtn = document.getElementById('confirmLogout');

    if (cancelBtn) {
        cancelBtn.onclick = function() {
            if (logoutModal) logoutModal.style.display = 'none';
        };
    }
    if (confirmBtn) {
        confirmBtn.onclick = function() {
            if (logoutForm) logoutForm.submit();
        };
    }
    if (logoutModal) {
        logoutModal.onclick = function(e) {
            if (e.target === logoutModal) logoutModal.style.display = 'none';
        };
    }
});
</script>