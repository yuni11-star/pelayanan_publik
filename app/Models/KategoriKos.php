<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriKos extends Model
{
    protected $table = 'kategori_kos';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;
    
    protected $fillable = [
        'id_kos',
        'kategori_kos',
    ];

    public function kosmetiks()
    {
        return $this->belongsTo(Kosmetiks::class, 'id_kos', 'id_kos');
    }

    public function parameterKos()
    {
        return $this->hasMany(ParameterKos::class, 'id_kategori', 'id_kategori');
    }
}
