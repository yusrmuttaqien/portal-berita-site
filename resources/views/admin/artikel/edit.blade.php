@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('page-header', 'Edit Artikel')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Edit Artikel: {{ $artikel->judul }}</h6>
        </div>
        <div class="card-body">
            @include('admin.artikel.form', [
                'action' => route('admin.artikel.update', $artikel),
                'method' => 'PUT',
                'artikel' => $artikel,
            ])
        </div>
    </div>
@endsection
