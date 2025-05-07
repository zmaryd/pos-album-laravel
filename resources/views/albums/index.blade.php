@include('layout.header')

<div class="container mt-4">
    <h2 class="text-black">Stock Album</h2>
    
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('albums.create') }}" class="btn-album-custom">+ Tambah Album</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row" style="gap: 15px ; justify-content: center;">
        @forelse ($albums as $album)    
        <div class="card-wrapper" style="box-shadow:0 7px 15px 0 rgba(0, 0, 0, 0.2);">
            <div class="card h-100 shadow-lg" style="background-color: #111; color: #ffffff; border-radius: 12px;">
                @if($album->image)
                    <div style="width: 100%; aspect-ratio: 1 / 1;">
                        <img src="{{ asset('images/' . $album->image) }}" class="card-img-top" alt="Gambar Album"
                             style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @endif
                <div class="card-body card-body-inner-shadow">
                    <h5 class="card-title text-white">{{ $album->judul_album }}</h5>
                    <p class="card-text">
                        <strong>Artis:</strong> {{ $album->artis }}<br>
                        <strong>Genre:</strong> {{ $album->genre->nama_genre }}<br>
                        <strong>Tahun Terbit:</strong> {{ $album->release_date }}<br>
                        <strong>Harga:</strong> Rp{{ number_format($album->harga, 0, ',', '.') }}<br>
                        <strong>Stok:</strong> {{ $album->stok }}
                    </p>
                </div>
                
                <div class="card-footer d-flex justify-content-between" style="background-color: #1a1a1a; border-top: 1px solid #333; gap: 0.5rem;">
                    <!-- Tombol Detail -->
                    <a href="{{ route('albums.show', $album->id) }}" class="button text-decoration-none">
                        <div class="text">Detail</div>
                    </a>
                
                    <!-- Tombol Edit -->
                    <!-- Tombol Edit -->
                    <a href="{{ route('albums.edit', $album->id) }}" class="button-edit text-decoration-none">
                        <div class="text">Edit</div>
                    </a>

                
                    <!-- Tombol Hapus -->
                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button-red">
                            <div class="text">Hapus</div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        @empty
            <p class="text-muted">Belum ada album yang ditambahkan.</p>
        @endforelse
    </div>
</div>

@include('layout.footer')
