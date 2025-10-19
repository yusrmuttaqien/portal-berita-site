<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Portal Berita')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: .5px;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)),
                url('https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=1280&q=60') center/cover;
            color: #fff;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 2rem;
        }

        .card:hover {
            transform: translateY(-4px);
            transition: .2s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, .1);
        }

        footer {
            background: #111;
            color: #aaa;
            padding: 2rem 0;
            margin-top: 3rem;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('front.index') }}">📰 Portal Berita</a>
        </div>
    </nav>

    @hasSection('hero')
        @yield('hero')
    @endif

    <main class="container mb-5">
        @yield('content')
    </main>

    <footer class="text-center small">
        <div>© {{ date('Y') }} Portal Berita | Dibuat untuk studi Laravel</div>
    </footer>
</body>

</html>
