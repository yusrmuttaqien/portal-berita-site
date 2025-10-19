@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-header', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Artikel</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalArtikel ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-file-earmark-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Artikel Terbit</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $artikelTerbit ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Artikel Draft</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $artikelDraft ?? 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-pencil-square fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Artikel Terbaru</h6>
                </div>
                <div class="card-body">
                    <p class="mb-0">Daftar artikel yang baru saja dibuat atau diperbarui akan muncul di sini.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
