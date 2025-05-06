<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('pembeli', 'detailTransaksi.album')->latest()->get();

        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $albums = Album::all(); // agar user bisa pilih album saat buat transaksi
        return view('transaksi.create', compact('albums'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pembeli' => 'required|string',
            'kontak' => 'nullable|string',
            'items' => 'required|array',
            'items.*.id_album' => 'required|exists:album,id',
            'items.*.jumlah_beli' => 'required|integer|min:1',
            'items.*.subtotal' => 'required|numeric',
        ]);

        DB::beginTransaction();

        try {
            $pembeli = Pembeli::firstOrCreate(
                ['nama_pembeli' => $request->nama_pembeli],
                ['kontak' => $request->kontak]
            );

            $total = collect($request->items)->sum('subtotal');

            $transaksi = Transaksi::create([
                'tanggal' => now(),
                'id_pembeli' => $pembeli->id,
                'total_harga' => $total,
            ]);

            foreach ($request->items as $item) {
                DetailTransaksi::create([
                    'id_transaksi' => $transaksi->id,
                    'id_album' => $item['id_album'],
                    'jumlah_beli' => $item['jumlah_beli'],
                    'subtotal' => $item['subtotal'],
                ]);
            }

            DB::commit();

            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan transaksi: ' . $e->getMessage());
        }
    }
}
