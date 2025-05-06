@include('layout.header')
<div class="content-wrapper">
    <div class="container mt-4">
        <h2>Tambah Transaksi</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                <input type="text" name="nama_pembeli" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" name="kontak" class="form-control">
            </div>

            <hr>
            <h5>Detail Transaksi</h5>
            <div id="items-container">
                <div class="item-row mb-3 border p-3 rounded">
                    <div class="mb-2">
                        <label>Album</label>
                        <select name="items[0][id_album]" class="form-control album-select" required>
                            <option value="">-- Pilih Album --</option>
                            @foreach($albums as $album)
                                <option value="{{ $album->id }}" data-harga="{{ $album->harga }}">{{ $album->judul_album }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-2">
                        <label>Jumlah Beli</label>
                        <input type="number" name="items[0][jumlah_beli]" class="form-control jumlah-input" min="1" required>
                    </div>

                    <div class="mb-2">
                        <label>Subtotal</label>
                        <input type="number" name="items[0][subtotal]" class="form-control subtotal-input" readonly>
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-sm btn-secondary mb-3" id="add-item">+ Tambah Item</button>

            <div>
                <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
            </div>
        </form>
    </div>
</div>

<script>
    let itemIndex = 1;

    function updateSubtotal(row) {
        const albumSelect = row.querySelector('.album-select');
        const jumlahInput = row.querySelector('.jumlah-input');
        const subtotalInput = row.querySelector('.subtotal-input');

        const harga = parseFloat(albumSelect.selectedOptions[0]?.dataset.harga || 0);
        const jumlah = parseInt(jumlahInput.value || 0);

        const subtotal = harga * jumlah;
        subtotalInput.value = isNaN(subtotal) ? '' : subtotal;
    }

    document.addEventListener('input', function (e) {
        if (e.target.classList.contains('jumlah-input') || e.target.classList.contains('album-select')) {
            const row = e.target.closest('.item-row');
            updateSubtotal(row);
        }
    });

    document.getElementById('add-item').addEventListener('click', function () {
        const container = document.getElementById('items-container');
        const newItem = document.querySelector('.item-row').cloneNode(true);

        newItem.querySelectorAll('input, select').forEach(input => {
            const name = input.getAttribute('name');
            if (name) {
                const newName = name.replace(/\d+/, itemIndex);
                input.setAttribute('name', newName);
                input.value = '';
            }
        });

        container.appendChild(newItem);
        itemIndex++;
    });
</script>

@include('layout.footer')
