<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesanPaket extends Model
{
    protected $fillable = [
        'kodeBayar', 'invoice', 'idPaket', 'tanggalPesan', 'tanggalBerangkat', 'jumlahDewasa', 'jumlahAnak'
    ];
}
