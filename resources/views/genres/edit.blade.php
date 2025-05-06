@include('layout.header')
<div class="content-wrapper container mt-5">
    <h2>Edit Genre</h2>

    <form action="{{ route('genres.update', $genre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_genre" class="form-label">Nama Genre</label>
            <input type="text" class="form-control @error('nama_genre') is-invalid @enderror" name="nama_genre" value="{{ old('nama_genre', $genre->nama_genre) }}">
            @error('nama_genre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@include('layout.footer')
