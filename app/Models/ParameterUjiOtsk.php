<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterUjiOtsk extends Model
{
    protected $table = 'parameter_uji_otsk';
    protected $primaryKey = 'id_uji';
    protected $fillable = ['id_klaim', 'parameter_uji'];

    public function produkKlaim()
    {
        return $this->belongsTo(ProdukKlaim::class, 'id_klaim', 'id_klaim');
    }

    public function metodeUjiOtsk()
    {
        return $this->hasMany(MetodeUjiOtsk::class, 'id_uji', 'id_uji');
    }
}
