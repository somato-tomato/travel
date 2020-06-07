<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    protected $fillable = [
        'kodeBayar', 'invoice', 'tanggalTF', 'jumlahTF', 'tujuanTF', 'asalTF', 'buktiTF', 'namaRek', 'namaLengkap', 'telepon', 'email', 'konfBy'
    ];
}
