<style>
.sidebar .logo img {
    width: 40px;
    height: 40px;
    object-fit: contain;
    flex-shrink: 0;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}
</style>
<div class="sidebar">
    <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="IP Healers Academy Logo">
        <span>IP Healers Academy</span>
    </div>
    <nav class="sidebar-nav">
        <a href="/admin/dashboard" class="sidebar-link @if(\Illuminate\Support\Facades\Request::is('admin/dashboard')) active @endif">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="3" y="13" width="4" height="8"/><rect x="9" y="9" width="4" height="12"/><rect x="15" y="5" width="4" height="16"/>
            </svg>
            Dashboard
        </a>
        <a href="/admin/healers" class="sidebar-link @if(\Illuminate\Support\Facades\Request::is('admin/healers')) active @endif">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="12" cy="8" r="4"/><path d="M4 20v-2a8 8 0 0116 0v2"/>
            </svg>
            Healers
        </a>
        <a href="/admin/plants" class="sidebar-link @if(\Illuminate\Support\Facades\Request::is('admin/plants')) active @endif">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path d="M12 2C7 7 2 12 12 22C22 12 17 7 12 2Z"/><path d="M12 12v10"/><path d="M12 12l4-4"/><path d="M12 12l-4-4"/>
            </svg>
            Plants
        </a>
        <a href="/admin/healer-plant-relations" class="sidebar-link @if(\Illuminate\Support\Facades\Request::is('admin/healer-plant-relations')) active @endif">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="8" cy="12" r="3"/><circle cx="16" cy="12" r="3"/><path d="M11 12h2"/><path d="M8 15v2"/><path d="M16 15v2"/>
            </svg>
            Relations
        </a>
        <a href="/admin/tutorials" class="sidebar-link @if(\Illuminate\Support\Facades\Request::is('admin/tutorials')) active @endif">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <polygon points="8,5 19,12 8,19 8,5"/>
            </svg>
            Tutorials
        </a>
        <a href="/admin/feedback" class="sidebar-link @if(\Illuminate\Support\Facades\Request::is('admin/feedback')) active @endif">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <rect x="2" y="7" width="20" height="14" rx="2"/><path d="M7 10h.01M7 14h.01"/><path d="M12 17h4"/>
            </svg>
            Feedback
        </a>
        <a href="/admin/users" class="sidebar-link @if(\Illuminate\Support\Facades\Request::is('admin/users')) active @endif">
            <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="9" cy="7" r="4"/><circle cx="17" cy="17" r="3"/><path d="M2 21v-2a7 7 0 017-7h2a7 7 0 017 7v2"/>
            </svg>
            Users
        </a>
    </nav>
</div>