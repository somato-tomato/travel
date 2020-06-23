<?php

namespace App\Http\Controllers;

use App\PesanCostumer;
use App\PesanSisaBayar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\Invoices;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;

class PesanCostumerController extends Controller
{
    public $currencies;
    public $numberFormatter;
    public $moneyFormatter;

    public function __construct()
    {
        $this->currencies = $currencies = new ISOCurrencies();
        $this->numberFormatter = new NumberFormatter('id_ID', \NumberFormatter::CURRENCY);
        $this->moneyFormatter = new IntlMoneyFormatter($this->numberFormatter, $currencies);
    }

    public function pass($kodeBayar)
    {
        $data = DB::table('pesan_costumers')
            ->join('pesan_pakets', 'pesan_costumers.idPesanPaket', '=', 'pesan_pakets.id')
            ->select('pesan_costumers.*', 'pesan_pakets.*')
            ->where('pesan_pakets.kodeBayar', '=', $kodeBayar)
            ->first();

        return view('pesan.passPaket', compact('data'));
    }

    public function info($kodeBayar)
    {
        $data = DB::table('pesan_costumers')
            ->join('pesan_pakets', 'pesan_costumers.idPesanPaket', '=', 'pesan_pakets.id')
            ->join('pakets', 'pesan_pakets.idPaket', '=', 'pakets.id')
            ->select
            (
                'pakets.namaPaket', 'pakets.hargaPaket', 'pakets.hargaPaketAnak', 'pakets.durasiPaket',
                'pesan_pakets.id', 'pesan_pakets.invoice', 'pesan_pakets.jumlahAnak', 'pesan_pakets.jumlahDewasa', 'pesan_pakets.tanggalBerangkat',
                'pesan_costumers.nama', 'pesan_costumers.jnsBayar'
            )
            ->where('pesan_pakets.kodeBayar', '=', $kodeBayar)
            ->first();

        $hargaDewasa = DB::table('pesan_pakets')
            ->join('pakets', 'pesan_pakets.idPaket', '=', 'pakets.id')
            ->select(DB::raw('sum(pakets.hargaPaket * pesan_pakets.jumlahDewasa) as TotalDewasa'))
            ->where('pesan_pakets.kodeBayar', '=', $kodeBayar)
            ->first();

        $hargaAnak = DB::table('pesan_pakets')
            ->join('pakets', 'pesan_pakets.idPaket', '=', 'pakets.id')
            ->select(DB::raw('sum(pakets.hargaPaketAnak * pesan_pakets.jumlahAnak) as TotalAnak'))
            ->where('pesan_pakets.kodeBayar', '=', $kodeBayar)
            ->first();

        $jumlahHarga = $hargaDewasa->TotalDewasa + $hargaAnak->TotalAnak;

        $dp = $jumlahHarga * 0.3;

        $sisa = $jumlahHarga - $dp;

        $lunas = $jumlahHarga - $jumlahHarga;

        $Dewasa = new Money($hargaDewasa->TotalDewasa.'00', new Currency('IDR'));
        $Anak = new Money($hargaAnak->TotalAnak.'00', new Currency('IDR'));
        $Harga = new Money($jumlahHarga.'00', new Currency('IDR'));
        $Dp = new Money($dp.'00', new Currency('IDR'));
        $Sisa = new Money($sisa.'00', new Currency('IDR'));
        $Lunas = new Money($lunas.'00', new Currency('IDR'));
        $viewDewasa = $this->moneyFormatter->format($Dewasa);
        $viewAnak = $this->moneyFormatter->format($Anak);
        $viewHarga = $this->moneyFormatter->format($Harga);
        $viewDp = $this->moneyFormatter->format($Dp);
        $viewSisa = $this->moneyFormatter->format($Sisa);
        $viewLunas = $this->moneyFormatter->format($Lunas);


        return view('pesan.successPaket', compact('data', 'viewAnak', 'viewDewasa', 'viewSisa', 'viewHarga', 'viewDp', 'viewLunas'));
    }

    public function batal($id)
    {
        $batal = DB::table('pesan_customers')->where('idPesanPaket', '=', $id)->delete();

        return redirect('administrator/paket', compact('batal'));
    }

    public function isiData($kodeBayar)
    {
        $data = DB::table('pesan_pakets')
            ->where('kodeBayar', '=', $kodeBayar)
            ->first();

        $harga = DB::table('pakets')
            ->join('pesan_pakets', 'pakets.id', '=', 'pesan_pakets.idPaket')
            ->select('pakets.hargaPaket', 'pakets.hargaPaketAnak')
            ->where('pesan_pakets.kodeBayar', $kodeBayar)
            ->first();

        $hargaDewasa = DB::table('pesan_pakets')
            ->join('pakets', 'pesan_pakets.idPaket', '=', 'pakets.id')
            ->select(DB::raw('sum(pakets.hargaPaket * pesan_pakets.jumlahDewasa) as TotalDewasa'))
            ->where('pesan_pakets.kodeBayar', '=', $kodeBayar)
            ->first();

        $hargaAnak = DB::table('pesan_pakets')
            ->join('pakets', 'pesan_pakets.idPaket', '=', 'pakets.id')
            ->select(DB::raw('sum(pakets.hargaPaketAnak * pesan_pakets.jumlahAnak) as TotalAnak'))
            ->where('pesan_pakets.kodeBayar', '=', $kodeBayar)
            ->first();

        $jumlahHarga = $hargaDewasa->TotalDewasa + $hargaAnak->TotalAnak;

        $awalDewasa = new Money($harga->hargaPaket.'00', new Currency('IDR'));
        $awalAnak = new Money($harga->hargaPaketAnak.'00', new Currency('IDR'));

        $Dewasa = new Money($hargaDewasa->TotalDewasa.'00', new Currency('IDR'));
        $Anak = new Money($hargaAnak->TotalAnak.'00', new Currency('IDR'));
        $Harga = new Money($jumlahHarga.'00', new Currency('IDR'));
        $showDewasa = $this->moneyFormatter->format($awalDewasa);
        $showAnak = $this->moneyFormatter->format($awalAnak);
        $viewDewasa = $this->moneyFormatter->format($Dewasa);
        $viewAnak = $this->moneyFormatter->format($Anak);
        $viewHarga = $this->moneyFormatter->format($Harga);

        return view('pesan.pesanPaket', compact('data', 'harga', 'jumlahHarga', 'viewHarga', 'viewDewasa', 'viewAnak', 'showAnak', 'showDewasa'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'nama'          =>  'required',
            'email'         =>  'required',
            'telepon'       =>  'required',
            'alamatLengkap' =>  'required',
            'kota'          =>  'required',
            'kodePos'       =>  'required',
            'jnsBayar'      =>  'required',
            'totalHarga'    =>  'required',
            'sisaBayar'     =>  'required'
        ]);

        $form_data = PesanCostumer::create(
            request(['kodeBayar', 'idPesanPaket', 'invoice', 'nama', 'email', 'telepon', 'alamatLengkap', 'kota', 'kodePos', 'jnsBayar'])
        );

        //ddd($form_data);

        PesanSisaBayar::create(
            request(['kodeBayar', 'idPesanPaket', 'invoice', 'totalHarga', 'sisaBayar'])
        );

        \Mail::to($form_data->email)->send(new Invoices($form_data));

        $data = DB::table('pesan_costumers')
            ->where('invoice', '=', $request->invoice)
            ->first();

        return redirect('pesanpaket/'.$data->kodeBayar.'/success');
    }
}
