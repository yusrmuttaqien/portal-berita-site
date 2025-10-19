<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-house-door"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                {{-- Perbaikan: Menggunakan routeIs() untuk wildcard nama route --}}
                <a class="nav-link {{ request()->routeIs('admin.artikel.*') ? 'active' : '' }}"
                    href="{{ route('admin.artikel.index') }}">
                    <i class="bi bi-file-text"></i>
                    Artikel
                </a>
            </li>
        </ul>
    </div>
</nav>
