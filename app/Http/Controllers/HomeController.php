<?php

namespace App\Http\Controllers;

use App\PesanPaket;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $paketAktif = DB::table('pakets')
            ->select('id')
            ->where('aktifPaket', '=', 1)
            ->count();
        $paketDeAktif = DB::table('pakets')
            ->select('id')
            ->where('aktifPaket', '=', 0)
            ->count();
        $jumlahPaket = DB::table('pakets')
            ->count();

        $date = \Carbon\Carbon::now();
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('yy');
        $lastMonth =  $date->subMonth()->format('m'); // 11

        $pesanPaket = DB::table('pesan_costumers')
            ->whereMonth('created_at', '=', $month)
            ->count();
        $pesanPaketY = DB::table('pesan_costumers')
            ->whereYear('created_at', '=', $year)
            ->count();
        $pesanPaketP = DB::table('pesan_costumers')
            ->whereMonth('created_at', '=', $lastMonth)
            ->count();

        $konf = DB::table('konfirmasis')
            ->where('konfirmasi', '=', 1)
            ->where(function ($query){
                $query->whereMonth('created_at', '=', Carbon::now()->format('m'));
            })
            ->count();
        $konfB = DB::table('konfirmasis')
            ->where('konfirmasi', '=', 0)
            ->count();

        return view('dashboard', compact('paketAktif',
            'paketDeAktif', 'jumlahPaket', 'pesanPaket', 'pesanPaketY', 'pesanPaketP',
        'konf', 'konfB'));
    }
}
