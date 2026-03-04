<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterKos extends Model
{
    protected $table = 'parameter_kos';
    protected $primaryKey = 'id_parameter';
    public $timestamps = false;
    
    protected $fillable = [
        'id_kategori',
        'puk',
        'pustaka',
        'teknik_analisis',
        'metode',
        'sampel_min',
        'satuan',
        'harga',
        'waktu',
    ];

    public function kategoriKos()
    {
        return $this->belongsTo(KategoriKos::class, 'id_kategori', 'id_kategori');
    }
}
