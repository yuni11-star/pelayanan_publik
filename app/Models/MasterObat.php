<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterObat extends Model
{
    protected $table = 'obat';
    protected $primaryKey = 'id_obat';
    public $timestamps = true;

    protected $fillable = [
        'zat_aktif',
        'jenis_sediaan',
        'bentuk_sediaan',
        'harga_total',
    ];

    public function parameters(): HasMany
    {
        return $this->hasMany(ParameterUji::class, 'id_obat');
    }
}
