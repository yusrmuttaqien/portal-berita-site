@extends('layouts.front')

@section('title', 'Artikel Terbaru')

@section('hero')
    <section class="hero">
        <div class="container">
            <h1 class="display-5 fw-bold">Berita & Artikel Terbaru</h1>
            <p class="lead">Update informasi hangat dari berbagai kategori setiap hari</p>
        </div>
    </section>
@endsection

@section('content')
    <div class="row g-4">
        @foreach ($artikel as $a)
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ $a->foto ? asset('storage/' . $a->foto) : 'https://picsum.photos/seed/' . $a->id_artikel . '/600/300' }}"
                        class="card-img-top" alt="{{ $a->judul }}">

                    <div class="card-body d-flex flex-column">
                        <div class="mb-2 text-muted small">
                            {{ $a->kategori ?? 'Umum' }} • {{ $a->tanggal_terbit?->format('d M Y') }}
                        </div>
                        <h5 class="card-title">{{ Str::limit($a->judul, 60) }}</h5>
                        <p class="card-text text-secondary mb-3">{{ Str::limit($a->ringkasan, 100) }}</p>
                        <a href="{{ route('front.show', $a->slug) }}" class="btn btn-outline-primary mt-auto">Baca
                            Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $artikel->links('pagination::bootstrap-5') }}
    </div>
@endsection
