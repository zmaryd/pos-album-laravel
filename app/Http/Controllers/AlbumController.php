<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Genre;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    // Menampilkan daftar album
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    // Menampilkan form untuk tambah album
    public function create()
    {
        $genres = Genre::all();
        return view('albums.create', compact('genres'));
    }

    // Simpan album baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'judul_album' => 'required|string|max:255',
            'artis' => 'required|string|max:255',
            'id_genre' => 'required|integer',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'release_date' => 'required|date',
        ]);

        $data = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $name);
            $data['image'] = $name;
        }

        Album::create($data);

        return redirect()->route('albums.index')->with('success', 'Album berhasil ditambahkan.');
    }

    // Menampilkan detail satu album
    public function show(string $id)
    {
        $album = Album::findOrFail($id);
        return view('albums.show', compact('album'));
    }

    // Menampilkan form edit album
    public function edit(string $id)
{
    $album = Album::findOrFail($id);
    $genres = Genre::all();
    return view('albums.edit', compact('album', 'genres'));
}

    // Update data album
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul_album' => 'required|string|max:255',
            'artis' => 'required|string|max:255',
            'id_genre' => 'required|integer',
            'harga' => 'required|numeric',  
            'stok' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'release_date' => 'required|date',
        ]);

        $data = $request->all();

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $name);
            $data['image'] = $name;
        }

        $album = Album::findOrFail($id);
        $album->update($data);

        return redirect()->route('albums.index')->with('success', 'Album berhasil diupdate.');
    }

    // Hapus album
    public function destroy(string $id)
    {
        $album = Album::findOrFail($id);
        $album->delete();

        return redirect()->route('albums.index')->with('success', 'Album berhasil dihapus.');
    }
}
