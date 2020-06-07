<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sarket extends Model
{
    protected $fillable =[
        'idPaket', 'namaSarket', 'fileSarket', 'uuid', 'slug'
    ];
}
