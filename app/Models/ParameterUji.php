<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParameterUji extends Model
{
    protected $table = 'parameter_uji';
    protected $primaryKey = 'id_parameter';
    public $timestamps = false;

    protected $fillable = [
        'id_obat',
        'parameter_uji',
        'metode_uji',
        'jumlah_minimal',
        'satuan',
        'harga',
        'nama_parameter',
    ];

    public function obat(): BelongsTo
    {
        return $this->belongsTo(MasterObat::class, 'id_obat');
    }
}
