<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $albums = Album::with(['detailTransaksi' => function ($query) {
            $query->with('transaksi');
        }])->get();

        return view('laporan.album', compact('albums'));
    }
}
