<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'album';

    protected $fillable = [
        'judul_album',
        'id_genre',
        'harga',
        'stok',
        'artis',
        'image',
        'release_date',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'id_genre');
    }
}
