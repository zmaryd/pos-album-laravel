@include('layout.header')

<div class="container-fluid mt-4">
    <div class="container-fluid mt-4">
        <h2 class="text-black text-center">Stock Album</h2>
    </div>
    

    <div class="d-flex justify-content-between mb-2">
        <a href="{{ route('albums.create') }}" class="btn-album-custom">+ Tambah Album</a>
    
        <button id="toggleMenu" class="btn-custom-transaksi">
            <!-- SVG Icon Cart -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="90" height="90" fill="currentColor">
                <g> 
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path d="M7 8V6a5 5 0 1 1 10 0v2h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h3zm0 2H5v10h14V10h-2v2h-2v-2H9v2H7v-2zm2-2h6V6a3 3 0 0 0-6 0v2z"/>
                </g>
            </svg>
            <span>Lihat Transaksi</span>
        </button>
    </div>
    
    

    

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="layout-wrapper d-flex transition" id="layoutWrapper">
        <div class="content-album flex-grow-1 pe-3">
            <div class="row" style="gap: 30px; justify-content: center;">
                @forelse ($albums as $album)
                <div class="card-wrapper" style="box-shadow:0 7px 15px 0 rgba(0, 0, 0, 0.2);">
                    <div class="card h-100 shadow-lg" style="background-color: #111; color: #ffffff; border-radius: 12px;">
                        @if($album->image)
                        <div class="image-container" style="width: 100%; aspect-ratio: 1 / 1; position: relative;">
                            <img src="{{ asset('images/' . $album->image) }}" class="card-img-top" alt="Gambar Album"
                                style="width: 100%; height: 100%; object-fit: cover; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                            <button class="btn-tambah-album"
                                data-album="{{ $album->id }}"
                                data-nama="{{ $album->judul_album }}"
                                data-harga="{{ $album->harga }}"
                                data-img="{{ asset('images/' . $album->image) }}">
                                +
                            </button>
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
                        <div class="card-footer d-flex justify-content-between" style="background-color: #00000000; border-top: 1px solid #333; gap: 0.5rem;">
                            <a href="{{ route('albums.show', $album->id) }}" class="button text-decoration-none">
                                <div class="text">Detail</div>
                            </a>
                            <a href="{{ route('albums.edit', $album->id) }}" class="button-edit text-decoration-none">
                                <div class="text">Edit</div>
                            </a>
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

        <div class="menu-transaksi-wrapper" id="menuTransaksi">
            <div class="card shadow p-3 h-100" style="background-color: #111; border-radius: 12px; color: white;">
                <h5>Transaksi Kasir</h5>
                <hr style="border-color: #555;">
                <ul class="list-unstyled mb-3" id="transaksiList"></ul>
                <div class="mb-3">
                    <strong>Total: Rp <span id="totalPrice">0</span></strong>
                </div>
                <button class="btn btn-success w-100">🧾 Konfirmasi Pembelian</button>
            </div>
        </div>
    </div>
</div>

<style>
    .layout-wrapper {
        transition: all 0.4s ease;
        position: relative;
    }

    .menu-transaksi-wrapper {
        width: 0;
        overflow: hidden;
        transition: width 0.4s ease;
    }

    .layout-wrapper.show-menu .menu-transaksi-wrapper {
        width: 450px;
    }

    .transaksi-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        padding: 10px;
        background-color: #1a1a1a;
        border-radius: 8px;
    }

    .transaksi-item img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        margin-right: 10px;
    }

    .quantity-btn {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .quantity-btn button {
        background-color: #444;
        color: white;
        border: none;
        padding: 5px;
        cursor: pointer;
    }

    .image-container .btn-tambah-album {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: #fc0000;
        color: #000;
        padding: 10px 16px !important;
        font-weight: bold;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s ease;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.3);
        z-index: 10;
    }

    .image-container .btn-tambah-album:hover {
        background-color: #e0a800;
        color: #000;
    }
</style>

<script>
    document.getElementById('toggleMenu').addEventListener('click', function () {
        document.getElementById('layoutWrapper').classList.toggle('show-menu');
    });

    let totalHarga = 0;

    function addToTransaksi(albumId, albumNama, albumHarga, albumImg) {
        const transaksiList = document.getElementById('transaksiList');
        const totalPrice = document.getElementById('totalPrice');

        const listItem = document.createElement('li');
        listItem.classList.add('transaksi-item');
        listItem.setAttribute('data-album-id', albumId);

        listItem.innerHTML = `
            <div style="display: flex; align-items: center;">
                <img src="${albumImg}" alt="${albumNama}">
                <div>
                    <p style="margin: 0;">🎵 ${albumNama} - Rp${albumHarga.toLocaleString()}</p>
                    <div class="quantity-btn">
                        <button class="decrease-btn">-</button>
                        <span class="quantity">1</span>
                        <button class="increase-btn">+</button>
                    </div>
                </div>
            </div>
        `;
        transaksiList.appendChild(listItem);

        totalHarga += albumHarga;
        totalPrice.textContent = totalHarga.toLocaleString();

        const increaseBtn = listItem.querySelector('.increase-btn');
        const decreaseBtn = listItem.querySelector('.decrease-btn');
        const quantitySpan = listItem.querySelector('.quantity');

        increaseBtn.addEventListener('click', function () {
            const quantity = parseInt(quantitySpan.textContent);
            quantitySpan.textContent = quantity + 1;
            updateTotalPrice(albumHarga);
        });

        decreaseBtn.addEventListener('click', function () {
            const quantity = parseInt(quantitySpan.textContent);
            if (quantity > 1) {
                quantitySpan.textContent = quantity - 1;
                updateTotalPrice(-albumHarga);
            }
        });
    }

    function updateTotalPrice(amount) {
        totalHarga += amount;
        document.getElementById('totalPrice').textContent = totalHarga.toLocaleString();
    }

    document.querySelectorAll('.btn-tambah-album').forEach(button => {
        button.addEventListener('click', function () {
            const albumId = this.getAttribute('data-album');
            const albumNama = this.getAttribute('data-nama');
            const albumHarga = parseInt(this.getAttribute('data-harga'));
            const albumImg = this.getAttribute('data-img');

            addToTransaksi(albumId, albumNama, albumHarga, albumImg);
            document.getElementById('layoutWrapper').classList.add('show-menu');
        });
    });
</script>

@include('layout.footer')
