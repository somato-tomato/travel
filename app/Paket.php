<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Paket extends Model
{
    protected $fillable = [
        'namaPaket', 'durasiPaket', 'destinasiPaket', 'descPaket', 'hargaPaket', 'hargaPaketAnak', 'cover', 'slug'
    ];
}
