<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PesanSisaBayarController extends Controller
{
    public function historyBayar($kodeBayar)
    {
        $data = DB::table('pesan_sisa_bayars')
            ->join('pesan_pakets', 'pesan_sisa_bayars.idPesanPaket', '=','pesan_pakets.id')
            ->join('pesan_costumers', 'pesan_sisa_bayars.kodeBayar', '=', 'pesan_costumers.kodeBayar')
            ->select('pesan_sisa_bayars.kodeBayar', 'pesan_sisa_bayars.invoice', 'pesan_sisa_bayars.totalHarga', 'pesan_sisa_bayars.sisaBayar',
                'pesan_pakets.tanggalPesan',
                'pesan_costumers.nama', 'pesan_costumers.telepon', 'pesan_costumers.email')
            ->where('pesan_sisa_bayars.kodeBayar', '=', $kodeBayar)
            ->first();

        $dataBayar = DB::table('konfirmasis')
            ->join('users', 'konfirmasis.konfBy', '=', 'users.id')
            ->select('konfirmasis.tanggalTF', 'konfirmasis.jumlahTF', 'konfirmasis.tujuanTF', 'konfirmasis.namaRek', 'users.name')
            ->where('kodeBayar', '=', $kodeBayar)
            ->get();


        return view('admin.pesanPaket.historyBayarPesan', compact('data', 'dataBayar'));
    }
}
