<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdukKlaim extends Model
{
    protected $table = 'produk_klaim';
    protected $primaryKey = 'id_klaim'; // Sesuaikan dengan kolom di database Anda
    public $timestamps = false;

    protected $fillable = ['nama_klaim', 'id_produk'];

    public function parameterUjiOtsk(): HasMany
    {
        return $this->hasMany(ParameterUjiOtsk::class, 'id_klaim', 'id_klaim');
    }

    public function tipeProduk(): BelongsTo
    {
        return $this->belongsTo(TipeProduk::class, 'id_produk', 'id_produk');
    }
}
