<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesanCostumer extends Model
{
    protected $fillable = [
        'kodeBayar', 'idPesanPaket', 'invoice', 'nama', 'email', 'telepon', 'alamatLengkap', 'kota', 'kodePos', 'jnsBayar'
    ];
}
