<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodeAnalisis extends Model
{
    protected $table = 'metode_analisis';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['analit_id', 'sediaan', 'teknik_analisis', 'jumlah_sampel'];
}
