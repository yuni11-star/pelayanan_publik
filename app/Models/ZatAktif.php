<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ZatAktif extends Model
{
    protected $fillable = [
        'nama_zat',
        'jenis_sediaan',
        'bentuk_sediaan',
    ];

    public function parameterUjis(): HasMany
    {
        return $this->hasMany(ParameterUji::class);
    }
}
