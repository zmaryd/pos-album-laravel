@include('layout.header')
<div class="container mt-4">
    <h2>Edit Album</h2>

    <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul_album" class="form-label">Judul Album</label>
            <input type="text" name="judul_album" class="form-control" value="{{ $album->judul_album }}" required>
        </div>

        <div class="mb-3">
            <label for="artis" class="form-label">Artis</label>
            <input type="text" name="artis" class="form-control" value="{{ $album->artis }}" required>
        </div>

        <div class="mb-3">
            <label for="id_genre" class="form-label">Genre</label>
            <select name="id_genre" class="form-select" required>
                <option value="">-- Pilih Genre --</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $album->id_genre == $genre->id ? 'selected' : '' }}>
                        {{ $genre->nama_genre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Tahun Terbit</label>
            <input type="date" name="release_date" class="form-control" value="{{ $album->release_date }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $album->harga }}" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ $album->stok }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Album</label><br>
            
            @if($album->image)
                <img src="{{ asset($album->image) }}" id="preview" alt="Gambar Lama" width="150" class="mb-2 d-block">
            @else
                <img id="preview" src="#" alt="Preview Gambar" style="display: none; max-width: 200px;" class="mb-2">
            @endif
        
            <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('albums.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

<script>
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];

        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }
</script>
@include('layout.footer')
