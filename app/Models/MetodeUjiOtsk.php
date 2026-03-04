<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodeUjiOtsk extends Model
{
    protected $table = 'metode_uji_otsk';
    protected $primaryKey = 'id_sediaan';
    protected $fillable = ['id_uji', 'metode_uji', 'teknik_analisis', 'jumlah_sampel', 'satuan_sampel', 'pustaka', 'sediaan'];

    public function parameterUjiOtsk()
    {
        return $this->belongsTo(ParameterUjiOtsk::class, 'id_uji', 'id_uji');
    }
}
