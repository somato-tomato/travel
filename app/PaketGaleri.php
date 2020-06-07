<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketGaleri extends Model
{
    protected $fillable = [
        'idPaket', 'namaPhoto', 'photo', 'slug'
    ];
}
