<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kosmetiks extends Model
{
    protected $table = 'kosmetiks';
    protected $primaryKey = 'id_kos';
    public $timestamps = false;
    
    protected $fillable = [
        'tipe_produk',
    ];

    public function kategoriKos()
    {
        return $this->hasMany(KategoriKos::class, 'id_kos', 'id_kos');
    }
}
