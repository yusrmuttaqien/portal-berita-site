<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="{{ route('admin.dashboard') }}">
        <i class="bi bi-newspaper"></i> Portal Berita
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            {{-- Menggunakan form untuk logout (metode POST) --}}
            <form method="GET" action="{{ route('logout') }}">
                @csrf
                {{--
                  Button ini diberi style agar terlihat seperti link.
                  'bg-dark' dan 'border-0' ditambahkan untuk
                  menghilangkan style default tombol browser.
                --}}
                <button type="submit" class="nav-link px-3 bg-dark border-0">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </div>
</nav>
