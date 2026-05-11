<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaTotalPangan extends Model
{
    protected $table = 'harga_total_pangan';
    protected $primaryKey = 'id_harga';
    public $timestamps = false;

    protected $fillable = [
        'id_uji',
        'harga_total',
        'keterangan',
    ];

    public function parameter()
    {
        return $this->belongsTo(ParameterUjiPangan::class, 'id_uji', 'id_uji');
    }
}
