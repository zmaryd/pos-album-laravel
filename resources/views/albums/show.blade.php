@include('layout.header')

<div class="container mt-4">
    <h2 class="text-center mb-4">Detail Album</h2>

    <div class="album-card shadow-lg hover-effect custom-shadow">
        @if($album->image)
            <div class="album-image">
                <img src="{{ asset('images/' . $album->image) }}" alt="Gambar Album">
            </div>
        @endif

        <div class="album-info">
            <h5 class="album-title">{{ $album->judul_album }}</h5>
            <p><strong>Artis:</strong> {{ $album->artis }}</p>
            <p><strong>Genre:</strong> {{ $album->genre->nama_genre }}</p>
            <p><strong>Tahun Terbit:</strong> {{ $album->release_date }}</p>
            <p><strong>Harga:</strong> Rp{{ number_format($album->harga, 0, ',', '.') }}</p>
            <p><strong>Stok:</strong> {{ $album->stok }}</p>
        </div>
    </div>

    <a href="{{ route('albums.index') }}" class="btn btn-secondary mt-4">Kembali</a>
</div>

@include('layout.footer')
