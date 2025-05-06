@include('layout.header')
<div class="container mt-4">
    <h2>Tambah Album</h2>

    <form action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul_album" class="form-label">Judul Album</label>
            <input type="text" name="judul_album" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="artis" class="form-label">Artis</label>
            <input type="text" name="artis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_genre" class="form-label">Genre</label>
            <select name="id_genre" class="form-select" required>
                <option value="">-- Pilih Genre --</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->nama_genre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Tahun Terbit</label>
            <input type="date" name="release_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar Album</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
            <img id="preview" src="#" alt="Preview Gambar" class="mt-2" style="max-width: 200px; display: none;">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
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
