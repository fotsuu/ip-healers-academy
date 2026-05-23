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
<script>
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