@include('layout.header')

<div class="content-wrapper container mt-5">
    <h2>Detail Genre</h2>

    <div class="custom-genre-card">
        <div class="card-body">
            <h5 class="card-title">{{ $genre->nama_genre }}</h5>

            <a href="{{ route('genres.index') }}" class="custom-btn-back">Kembali</a>
        </div>
    </div>
</div>

@include('layout.footer')
