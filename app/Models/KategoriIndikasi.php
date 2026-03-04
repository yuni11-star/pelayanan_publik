<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriIndikasi extends Model
{
    protected $table = 'kategori_indikasi';
    protected $fillable = ['nama_kategori'];
    public $timestamps = true;

    public function analits()
    {
        return $this->hasMany(Analit::class);
    }
}
