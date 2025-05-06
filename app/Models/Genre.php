<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';
    protected $fillable = ['nama_genre'];

    public function album()
    {
        return $this->hasMany(Album::class, 'id_genre');
    }
}
