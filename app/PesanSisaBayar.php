<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesanSisaBayar extends Model
{
    protected $fillable=[
        'kodeBayar', 'idPesanPaket', 'invoice', 'totalHarga', 'sisaBayar'
    ];
}
