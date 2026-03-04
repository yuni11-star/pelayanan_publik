<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodeUjiPangan extends Model
{
    protected $table = 'metode_uji_pangan';
    public $timestamps = false;
    protected $primaryKey = 'id_metode';

    protected $fillable = [
        'id_uji',
        'metode',
        'sampel_minimal',
        'satuan',
        'keterangan',
    ];

    public function parameter()
    {
        return $this->belongsTo(ParameterUjiPangan::class, 'id_uji', 'id_uji');
    }
}
