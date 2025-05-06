@include('layout.header')

<div class="content-wrapper container mt-5">
    <h2 class="mb-4">Tambah Genre Baru</h2>

    <div class="card shadow-lg" style="border-radius: 12px; max-width: 600px; margin: 0 auto;">
        <div class="card-body">
            <form action="{{ route('genres.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_genre" class="form-label">Nama Genre</label>
                    <input type="text" class="form-control @error('nama_genre') is-invalid @enderror" name="nama_genre" value="{{ old('nama_genre') }}">
                    @error('nama_genre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <!-- Custom Button Simpan -->
                    <button type="submit" class="button d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                        </svg>
                        <div class="text">Simpan</div>
                    </button>

                    <!-- Tombol Batal biasa -->
                    <a href="{{ route('genres.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layout.footer')
