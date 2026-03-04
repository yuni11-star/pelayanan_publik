<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TarifPengujianBbpom extends Model
{
    protected $table = 'tarif_pengujian_bbpom';
    protected $fillable = ['jenis_penerimaan', 'tarif'];
}
