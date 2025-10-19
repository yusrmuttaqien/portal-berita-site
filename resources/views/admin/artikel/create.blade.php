@extends('layouts.app')

@section('title', 'Buat Artikel Baru')

@section('page-header', 'Buat Artikel Baru')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Form Artikel</h6>
        </div>
        <div class="card-body">
            @include('admin.artikel.form', ['action' => route('admin.artikel.store'), 'method' => 'POST'])
        </div>
    </div>
@endsection
