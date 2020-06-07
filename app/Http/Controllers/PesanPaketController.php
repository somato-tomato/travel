<?php

namespace App\Http\Controllers;

use App\Paket;
use App\PesanPaket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PesanPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = DB::table('pesan_pakets')
            ->join('pesan_costumers', 'pesan_pakets.id', '=', 'pesan_costumers.idPesanPaket')
            ->select('pesan_pakets.invoice', 'pesan_pakets.tanggalPesan', 'pesan_costumers.nama', 'pesan_pakets.id')
            ->paginate(5);

        return view('admin.pesanPaket.dexPesan', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $data = Paket::findOrFail($id);
//        return view('admin.pesanPaket.crePesan', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = PesanPaket::selectRaw('LPAD(CONVERT(COUNT("id") + 1, char(5)) , 5,"0") as invoice')->first();
        $code_invoice = date('Ym').'/INV/'.$invoice->invoice;

        $request->validate([
            'tanggalBerangkat'  =>  'required',
            'jumlahDewasa'      =>  'required',
            'jumlahAnak'        =>  'required'
        ]);

        $form_data = array(
            'kodeBayar'         =>   Str::random(4).Carbon::now()->format('m').Str::random(4),
            'invoice'           =>   $code_invoice,
            'idPaket'           =>   $request->idPaket,
            'tanggalBerangkat'  =>   $request->tanggalBerangkat,
            'tanggalPesan'      =>   Carbon::now()->format('Y-m-d'),
            'jumlahDewasa'      =>   $request->jumlahDewasa,
            'jumlahAnak'        =>   $request->jumlahAnak
        );
        //ddd($form_data);

        PesanPaket::create($form_data);

        $data = DB::table('pesan_pakets')
            ->where('invoice', '=', $code_invoice)
            ->first();

        //ddd($data);

        return redirect('pesanpaket/datadiri/'.$data->kodeBayar);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
