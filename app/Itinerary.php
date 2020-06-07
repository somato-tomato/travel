<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $fillable = [
        'idPaket', 'namaItinerary', 'fileItinerary', 'uuid', 'slug'
    ];
}
