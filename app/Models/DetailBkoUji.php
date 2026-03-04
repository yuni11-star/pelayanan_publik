<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailBkoUji extends Model
{
    protected $table = 'detail_bko_uji';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'produk_klaim_id',
        'metode_analisis_id',
        'nama_bko', // Asumsi nama kolom untuk parameter/BKO
        'harga'
    ];

    public function metode(): BelongsTo
    {
        return $this->belongsTo(MetodeAnalisis::class, 'metode_analisis_id');
    }
}