@extends('layout.header')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-black">Transaksi Penjualan</h2>

    <form action="{{ route('transaksi.store') }}" method="POST" id="transaksiForm">
        @csrf

        <div class="card p-4 shadow-lg" style="border-radius: 12px; background-color: #111; color: white;">
            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                <input type="text" class="form-control" name="nama_pembeli" id="nama_pembeli" required>
            </div>

            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" name="kontak" id="kontak">
            </div>

            <hr>

            <h5>Tambah Item</h5>
            <div id="items-wrapper">
                <div class="item-row d-flex align-items-center gap-2 mb-2">
                    <select class="form-control" name="items[0][id_album]" required>
                        <option value="">-- Pilih Album --</option>
                        @foreach ($albums as $album)
                            <option value="{{ $album->id }}" data-harga="{{ $album->harga }}">
                                {{ $album->judul_album }} (Stok: {{ $album->stok }}) - Rp{{ number_format($album->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    <input type="number" name="items[0][jumlah_beli]" class="form-control jumlah-input" placeholder="Jumlah" min="1" required>
                    <input type="number" name="items[0][subtotal]" class="form-control subtotal-input" placeholder="Subtotal" readonly>
                    <button type="button" class="btn btn-danger btn-remove">×</button>
                </div>
            </div>

            <button type="button" class="btn btn-secondary my-3" id="addItemBtn">+ Tambah Item</button>

            <hr>

            <div class="d-flex justify-content-between align-items-center">
                <h4>Total: Rp<span id="total-display">0</span></h4>
                <input type="hidden" name="total" id="total-input">
                <button type="submit" class="btn btn-success">Konfirmasi Pembelian</button>
            </div>
        </div>
    </form>
</div>

<script>
    let index = 1;

    document.getElementById('addItemBtn').addEventListener('click', () => {
        const wrapper = document.getElementById('items-wrapper');
        const newRow = document.createElement('div');
        newRow.classList.add('item-row', 'd-flex', 'align-items-center', 'gap-2', 'mb-2');
        newRow.innerHTML = `
            <select class="form-control" name="items[${index}][id_album]" required>
                <option value="">-- Pilih Album --</option>
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}" data-harga="{{ $album->harga }}">
                        {{ $album->judul_album }} (Stok: {{ $album->stok }}) - Rp{{ number_format($album->harga, 0, ',', '.') }}
                    </option>
                @endforeach
            </select>
            <input type="number" name="items[${index}][jumlah_beli]" class="form-control jumlah-input" placeholder="Jumlah" min="1" required>
            <input type="number" name="items[${index}][subtotal]" class="form-control subtotal-input" placeholder="Subtotal" readonly>
            <button type="button" class="btn btn-danger btn-remove">×</button>
        `;
        wrapper.appendChild(newRow);
        index++;
    });

    document.addEventListener('input', (e) => {
        if (e.target.classList.contains('jumlah-input')) {
            const row = e.target.closest('.item-row');
            const select = row.querySelector('select');
            const harga = parseFloat(select.options[select.selectedIndex].getAttribute('data-harga')) || 0;
            const jumlah = parseInt(e.target.value) || 0;
            const subtotal = harga * jumlah;
            row.querySelector('.subtotal-input').value = subtotal;
            hitungTotal();
        }
    });

    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('btn-remove')) {
            e.target.closest('.item-row').remove();
            hitungTotal();
        }
    });

    function hitungTotal() {
        const subtotalInputs = document.querySelectorAll('.subtotal-input');
        let total = 0;
        subtotalInputs.forEach(input => {
            total += parseFloat(input.value) || 0;
        });
        document.getElementById('total-display').textContent = total.toLocaleString('id-ID');
        document.getElementById('total-input').value = total;
    }
</script>
@endsection
