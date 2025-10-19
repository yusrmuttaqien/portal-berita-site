{{-- Form Artikel dengan Preview Gambar Otomatis --}}
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-12 mb-3">
            <label class="form-label fw-semibold">Foto / Gambar Artikel</label>

            {{-- Jika sudah ada gambar --}}
            @if (isset($artikel) && $artikel->foto)
                <div class="mb-2">
                    <img id="preview" src="{{ asset('storage/' . $artikel->foto) }}"
                        class="img-thumbnail rounded shadow-sm" style="max-height:200px; object-fit:cover;">
                </div>
            @else
                <img id="preview" src="https://via.placeholder.com/300x150?text=Preview+Gambar"
                    class="img-thumbnail mb-2 rounded shadow-sm" style="max-height:200px; object-fit:cover;">
            @endif

            <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            <small class="text-muted">Pilih gambar (jpg, jpeg, png, max 2MB)</small>
        </div>

        <div class="col-md-8">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Artikel</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                    name="judul" value="{{ old('judul', $artikel->judul ?? '') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ringkasan" class="form-label">Ringkasan</label>
                <textarea class="form-control @error('ringkasan') is-invalid @enderror" id="ringkasan" name="ringkasan" rows="3"
                    required>{{ old('ringkasan', $artikel->ringkasan ?? '') }}</textarea>
                @error('ringkasan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="isi" class="form-label">Isi Artikel Lengkap</label>
                <textarea class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" rows="15" required>{{ old('isi', $artikel->isi ?? '') }}</textarea>
                @error('isi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light fw-semibold">Publikasi</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                            id="kategori" name="kategori" value="{{ old('kategori', $artikel->kategori ?? '') }}"
                            required>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis"
                            name="penulis" value="{{ old('penulis', $artikel->penulis ?? '') }}" required>
                        @error('penulis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status"
                            required>
                            <option value="draft"
                                {{ old('status', $artikel->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="terbit"
                                {{ old('status', $artikel->status ?? '') == 'terbit' ? 'selected' : '' }}>Terbit
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                        <input type="date" class="form-control @error('tanggal_terbit') is-invalid @enderror"
                            id="tanggal_terbit" name="tanggal_terbit"
                            value="{{ old('tanggal_terbit', $artikel->tanggal_terbit ? $artikel->tanggal_terbit->format('Y-m-d') : '') }}">
                        <div class="form-text">Kosongkan jika ingin langsung terbit.</div>
                        @error('tanggal_terbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary"> Simpan Artikel</button>
                        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputFoto = document.getElementById('foto');
            const preview = document.getElementById('preview');

            if (inputFoto) {
                inputFoto.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = event => preview.src = event.target.result;
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    </script>
@endpush
