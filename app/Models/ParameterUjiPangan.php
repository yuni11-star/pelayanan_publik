<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterUjiPangan extends Model
{
    protected $table = 'parameter_uji_pangan';
    public $timestamps = false;
    public $incrementing = true;
    protected $primaryKey = 'id_uji';

    protected $fillable = [
        'id_pangan',
        'id_uji',
        'parameter_uji',
        'metode',
        'minimal_sampel',
        'satuan',
        'keterangan',
        'harga',
        'total',
    ];

    /**
     * Get the pangan category that owns this parameter
     */
    public function pangan()
    {
        return $this->belongsTo(Pangan::class, 'id_pangan', 'id_pangan');
    }

    /**
     * Any metode records associated with this parameter.
     * (Not strictly required for current UI but provides completeness.)
     */
    public function metodeUjiPangan()
    {
        return $this->hasMany(\App\Models\MetodeUjiPangan::class, 'id_uji', 'id_uji');
    }
}
