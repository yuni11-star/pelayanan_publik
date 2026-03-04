<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeProduk extends Model
{
    protected $table = 'tipe_produk';
    protected $primaryKey = 'id_produk'; // Pastikan ini sesuai database
    protected $fillable = ['nama_tipe'];

    public function produkKlaims()
    {
        return $this->hasMany(ProdukKlaim::class, 'id_produk', 'id_produk');
    }
}
