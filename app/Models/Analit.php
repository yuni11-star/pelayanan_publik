<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analit extends Model
{
    protected $table = 'analit';
    protected $fillable = ['nama_analit', 'kategori_indikasi_id'];

    public function kategoriIndikasi()
    {
        return $this->belongsTo(KategoriIndikasi::class);
    }

    public function metodeAnalisis()
    {
        return $this->hasMany(MetodeAnalisis::class);
    }
}
