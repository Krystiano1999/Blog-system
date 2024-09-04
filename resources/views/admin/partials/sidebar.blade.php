<div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('panel-admin') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('articles*') ? 'active' : '' }}" href="#">
                    <i class="fas fa-file-alt"></i> Artykuły
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('categories*') ? 'active' : '' }}" href="#">
                    <i class="fas fa-folder"></i> Kategorie
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('comments*') ? 'active' : '' }}" href="#">
                    <i class="fas fa-comments"></i> Komentarze
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('users*') ? 'active' : '' }}" href="#">
                    <i class="fas fa-users"></i> Użytkownicy
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('settings*') ? 'active' : '' }}" href="#">
                    <i class="fas fa-cogs"></i> Ustawienia
                </a>
            </li>
        </ul>
    </div>
</div>
