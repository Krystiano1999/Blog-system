<div class="sidebar">
    <div class="sidebar-sticky">
        <!-- Logo -->
        <div class="logo text-center py-3">
            <img src="{{ asset('images/admin/svg/logo-no-background.svg') }}" alt="Logo" class="logo-sidebar">
        </div>
        <hr/>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('panel-admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home me-2"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('panel-admin/articles') ? 'active' : '' }}" href="{{ route('admin.articles') }}">
                    <i class="fas fa-file-alt me-2"></i> <span>Artykuły</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('panel-admin/categories') ? 'active' : '' }}" href="{{ route('admin.categories') }}">
                    <i class="fas fa-folder me-2"></i> <span>Kategorie</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('panel-admin/comments') ? 'active' : '' }}" href="{{ route('admin.comments') }}">
                    <i class="fas fa-comments me-2"></i> <span>Komentarze</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('panel-admin/users') ? 'active' : '' }}" href="{{ route('admin.users') }}">
                    <i class="fas fa-users me-2"></i> <span>Użytkownicy</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('settings*') ? 'active' : '' }}" href="#">
                    <i class="fas fa-cogs me-2"></i> <span>Ustawienia</span>
                </a>
            </li>
        </ul>
    </div>
</div>
