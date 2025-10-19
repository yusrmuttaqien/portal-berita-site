@extends('layouts.front')

@section('title', $a->judul)

@section('hero')
    <section class="hero"
        style="background: linear-gradient(rgba(0,0,0,.6), rgba(0,0,0,.6)),
  url('{{ $a->foto ? asset('storage/' . $a->foto) : 'https://picsum.photos/seed/' . $a->id_artikel . '/1200/500' }}') center/cover;">

        <div class="container">
            <h1 class="fw-bold">{{ $a->judul }}</h1>
            <p class="lead">{{ $a->kategori }} • {{ $a->tanggal_terbit?->format('d M Y') }} •
                {{ $a->penulis ?? 'Redaksi' }}</p>
        </div>
    </section>
@endsection

@section('content')
    <article class="bg-white p-4 rounded shadow-sm">
        <p class="lead text-secondary">{{ $a->ringkasan }}</p>
        <div class="mt-3" style="line-height:1.8">{!! nl2br(e($a->isi)) !!}</div>
    </article>

    <div class="mt-4">
        <a href="{{ route('front.index') }}" class="btn btn-outline-secondary">← Kembali ke daftar</a>
    </div>
@endsection
