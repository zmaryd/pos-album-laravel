@include('layout.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    input[type="date"] {
        color: white;
        background-color: #111;
        border: 1px solid #666;
        padding: 10px;
        border-radius: 8px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1);
    }

    .card-container {
        background-color: #111;
        color: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.4);
        outline: 2px solid #8B0000;
        max-width: 500px;
        width: 100%;
        min-height: 700px;
    }

    .form-input {
        width: 100%;
        background-color: #111;
        border: 1px solid #666;
        color: white;
        padding: 10px;
        border-radius: 8px;
    }

    .form-label {
        display: block;
        margin-bottom: 6px;
    }

    .form-button {
        background-color: transparent;
        border: 2px solid green;
        color: green;
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
    }

    .cancel-button {
        background-color: transparent;
        border: 2px solid rgb(104, 0, 0);
        color: rgb(104, 0, 0);
        padding: 10px 20px;
        border-radius: 8px;
        text-decoration: none;
    }

    .image-preview {
        max-width: 100%;
        margin-bottom: 10px;
        border-radius: 8px;
    }

    .image-label {
        display: inline-block;
        background-color: transparent;
        border: 2px solid rgb(255, 255, 255);
        color: rgb(255, 255, 255);
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        width: 100%;
        text-align: center;
        position: relative;
        font-size: 16px;
    }

    .image-label i {
        font-size: 24px;  /* Ukuran ikon lebih besar */
        margin-right: 8px; /* Sedikit jarak dengan teks */
    }

    body, html {
        background-color: #000 !important;
        color: white;
    }

    .main-panel, .page-body-wrapper, .container-scroller {
        background-color: #000 !important;
    }
</style>

<!-- Wrapper div yang sudah diperbaiki -->
<div style="
    background-color: #1a1a1a; 
    display: flex; 
    justify-content: center; 
    align-items: flex-start; 
    padding: 60px 20px 100px; 
    min-height: calc(100vh - 100px);
">
    <div class="card-container">
        <h3 style="text-align: center; margin-bottom: 30px;">Edit Album</h3>

        <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 20px;">
                <label for="judul_album" class="form-label">Judul Album</label>
                <input type="text" name="judul_album" value="{{ $album->judul_album }}" required class="form-input">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="artis" class="form-label">Artis</label>
                <input type="text" name="artis" value="{{ $album->artis }}" required class="form-input">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="id_genre" class="form-label">Genre</label>
                <select name="id_genre" required class="form-input">
                    <option value="">-- Pilih Genre --</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $album->id_genre == $genre->id ? 'selected' : '' }}>{{ $genre->nama_genre }}</option>
                    @endforeach
                </select>
            </div>

            <div style="margin-bottom: 20px;">
                <label for="release_date" class="form-label">Tahun Terbit</label>
                <input type="date" name="release_date" value="{{ $album->release_date }}" required class="form-input">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" value="{{ $album->harga }}" required class="form-input">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" value="{{ $album->stok }}" required class="form-input">
            </div>

            <div style="margin-bottom: 20px;">
                <label for="image" class="form-label">Gambar Album</label>
                @if($album->image)
                    <img src="{{ asset($album->image) }}" id="preview" alt="Gambar Lama" class="image-preview">
                @else
                    <img id="preview" src="#" alt="Preview Gambar" style="display: none;" class="image-preview">
                @endif
                <label for="image" class="image-label">
                    <i class="fas fa-image"></i> Pilih Gambar
                </label>
                <input type="file" name="image" id="image" accept="image/*" onchange="previewImage(event)" style="display: none;">
            </div>

            <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                <button type="submit" class="form-button">Update</button>
                <a href="{{ route('albums.index') }}" class="cancel-button">Batal</a>
            </div>
        </form>
    </div>
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
