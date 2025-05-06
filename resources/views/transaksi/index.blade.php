@include('layout.header')
<div class="content-wrapper">
    <div class="container mt-4">
        <h2>Daftar Transaksi</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Pembeli</th>
                    <th>Kontak</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transaksis as $transaksi)
                    <tr>
                        <td>{{ $transaksi->tanggal }}</td>
                        <td>{{ $transaksi->pembeli->nama_pembeli }}</td>
                        <td>{{ $transaksi->pembeli->kontak }}</td>
                        <td>Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada transaksi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@include('layout.footer')
