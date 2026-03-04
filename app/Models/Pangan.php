<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pangan extends Model
{
    protected $table = 'pangan';
    protected $primaryKey = 'id_pangan';
    public $timestamps = false;

    protected $fillable = [
        'bahan_produk',
        'waktu',
    ];

    /**
     * Get the parameter uji for this pangan category
     */
    public function parameterUjiPangan()
    {
        return $this->hasMany(ParameterUjiPangan::class, 'id_pangan', 'id_pangan');
    }
}
