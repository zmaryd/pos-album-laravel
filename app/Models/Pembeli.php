<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembeli extends Model
{
    use HasFactory;

    protected $table = 'pembeli';

    protected $fillable = ['nama_pembeli', 'kontak'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id_pembeli');
    }
}
