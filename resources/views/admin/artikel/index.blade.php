@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('page-header', 'Manajemen Artikel')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Artikel</h6>
            <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Artikel Baru
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Tanggal Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($artikels as $index => $artikel)
                            <tr>
                                <td>{{ $artikels->firstItem() + $index }}</td>
                                <td><img src="{{ asset('storage/' . $artikel->foto) }}" width="100px" alt=""
                                        srcset=""></td>
                                <td>{{ Str::limit($artikel->judul, 50) }}</td>
                                <td><span class="badge bg-info text-dark">{{ $artikel->kategori }}</span></td>
                                <td>{{ $artikel->penulis }}</td>
                                <td>
                                    @if ($artikel->status == 'terbit')
                                        <span class="badge bg-success">Terbit</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>{{ $artikel->tanggal_terbit ? $artikel->tanggal_terbit->format('d M Y') : '-' }}</td>
                                <td>
                                    <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.artikel.edit', $artikel) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada data artikel.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $artikels->links() }}
            </div>
        </div>
    </div>
@endsection
