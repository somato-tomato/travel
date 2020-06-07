<?php

namespace App\Http\Controllers;

use App\PesanSisaBayar;
use App\Konfirmasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Image;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;


class KonfirmasiController extends Controller
{
    public $path;
    public $dimensions;
    public $currencies;
    public $numberFormatter;
    public $moneyFormatter;


    public function __construct()
    {
        $this->path = public_path('konf_images');
        $this->currencies= new ISOCurrencies();
        $this->numberFormatter = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
        $this->moneyFormatter = new IntlMoneyFormatter($this->numberFormatter, $this->currencies);
    }

    //FUNCTION UNTUK KONFIRMASI - BELUM BAYAR - LUNAS BAYAR (ADMINISTRATOR)
    public function index()
    {
        $data = DB::table('konfirmasis')
            ->select('id', 'kodeBayar', 'invoice', 'namaRek', 'created_at')
            ->where('konfirmasi' ,'=', 1)
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.konfPaket.konfDex', compact('data'));
    }

    public function indexBlmKonf()
    {
        $data = DB::table('konfirmasis')
            ->select('id', 'kodeBayar', 'invoice', 'namaRek', 'created_at')
            ->where('konfirmasi' ,'=', 0)
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.konfPaket.blmKonfDex', compact('data'));
    }

    public function indexBayar()
    {
        $blmLunas = DB::table('pesan_costumers')
            ->join('pesan_sisa_bayars', 'pesan_costumers.kodeBayar', '=', 'pesan_sisa_bayars.kodeBayar')
            ->select('pesan_sisa_bayars.kodeBayar', 'pesan_costumers.invoice','pesan_costumers.nama', 'pesan_costumers.telepon', 'pesan_sisa_bayars.sisaBayar')
            ->where('pesan_sisa_bayars.sisaBayar', '!=', 0)
            ->paginate(5);

        return view('admin.pesanPaket.listbayarPesan', compact('blmLunas'));
    }

    public function indexLunas()
    {
        $Lunas = DB::table('pesan_costumers')
            ->join('pesan_sisa_bayars', 'pesan_costumers.kodeBayar', '=', 'pesan_sisa_bayars.kodeBayar')
            ->select('pesan_sisa_bayars.kodeBayar', 'pesan_costumers.invoice','pesan_costumers.nama', 'pesan_costumers.telepon', 'pesan_sisa_bayars.sisaBayar')
            ->where('pesan_sisa_bayars.sisaBayar', '=', 0)
            ->paginate(5);

        return view('admin.pesanPaket.listlunasPesan', compact('Lunas'));
    }

    public function konfirmasiData($id)
    {
        $data = DB::table('pesan_pakets')
            ->join('pesan_costumers', 'pesan_pakets.id', '=', 'pesan_costumers.idPesanPaket')
            ->join('pakets', 'pesan_pakets.idPaket', '=', 'pakets.id')
            ->join('pesan_sisa_bayars', 'pesan_pakets.id', '=', 'pesan_sisa_bayars.idPesanPaket')
            ->select('pesan_pakets.invoice',
                'pesan_pakets.tanggalPesan', 'pesan_pakets.tanggalBerangkat', 'pesan_pakets.jumlahDewasa', 'pesan_pakets.jumlahAnak',
                'pesan_costumers.kodeBayar' ,'pesan_costumers.nama', 'pesan_costumers.email', 'pesan_costumers.telepon', 'pesan_costumers.alamatLengkap', 'pesan_costumers.kodePos', 'pesan_costumers.jnsBayar',
                'pesan_sisa_bayars.totalHarga', 'pesan_sisa_bayars.sisaBayar',
                'pakets.namaPaket', 'pakets.destinasiPaket', 'pakets.durasiPaket', 'pakets.cover')
            ->where('pesan_pakets.id', '=', $id)->first();

        $hargaTotal = new Money($data->totalHarga.'00', new Currency('IDR'));

        if ($data->sisaBayar === 0)
        {
            $viewTotal = $this->moneyFormatter->format($hargaTotal);
            $viewBayar = 'Lunas';

            return view('admin.pesanPaket.infoPesan', compact('data', 'viewBayar', 'viewTotal'));
        } else {
            $hargaBayar = new Money($data->sisaBayar.'00', new Currency('IDR'));
            $viewTotal = $this->moneyFormatter->format($hargaTotal);
            $viewBayar = $this->moneyFormatter->format($hargaBayar);

            return view('admin.pesanPaket.infoPesan', compact('data', 'viewBayar','viewTotal'));
        }
    }

    public function lihatKonf($id, $kodeBayar)
    {
        $data = DB::table('konfirmasis')
            ->join('pesan_sisa_bayars', 'konfirmasis.kodeBayar', '=', 'pesan_sisa_bayars.kodeBayar')
            ->select('pesan_sisa_bayars.sisaBayar', 'pesan_sisa_bayars.kodeBayar',
                'konfirmasis.invoice', 'konfirmasis.id', 'konfirmasis.namaLengkap', 'konfirmasis.telepon', 'konfirmasis.email', 'konfirmasis.konfirmasi',
                'konfirmasis.namaRek', 'konfirmasis.asalTF',
                'konfirmasis.tanggalTF', 'konfirmasis.tujuanTF',
                'konfirmasis.buktiTF', 'konfirmasis.jumlahTF' )
            ->where(['konfirmasis.id' => $id], ['konfirmasis.kodeBayar' => $kodeBayar])
            ->first();

        $jumlahTF = new Money($data->jumlahTF.'00', new Currency('IDR'));
        if ($data->sisaBayar === 0)
        {
            $viewTotal = $this->moneyFormatter->format($jumlahTF);
            $viewBayar = 'Lunas';

            return view('admin.konfPaket.konfInfo', compact('data', 'viewTotal', 'viewBayar'));
        } else {
            $hargaBayar = new Money($data->sisaBayar.'00', new Currency('IDR'));
            $viewTotal = $this->moneyFormatter->format($jumlahTF);
            $viewBayar = $this->moneyFormatter->format($hargaBayar);

            return view('admin.konfPaket.konfInfo', compact('data', 'viewTotal', 'viewBayar'));
        }
    }

    public function updateKonf(Request $request, $id, $kodeBayar)
    {
        $byKonf = Auth::user()->getAuthIdentifier();

        $data = DB::table('pesan_sisa_bayars')
            ->select('sisaBayar')
            ->where('kodeBayar', '=', $kodeBayar)
            ->get();

        foreach ($data as $datum)
        {
            $sisa = $datum->sisaBayar;
        }

        $request->validate([
            'sisaBayar'         =>  'required'
        ]);

        $kurang = $sisa - $request->sisaBayar;

        $form_data = array(
            'konfirmasi'    =>  '1',
            'konfBy'        =>  $byKonf
        );

        Konfirmasi::whereId($id)->update($form_data);

        PesanSisaBayar::where('kodeBayar', $kodeBayar)
            ->update(['sisaBayar' => $kurang]);

        return redirect('administrator/konfirmasi/all')->with('message', 'Telah terkonfirmasi!');
    }

    //FUNCTION UNTUK KONFIRMASI (PELANGGAN)

    public function buat($kodeBayar)
    {
        $kodeBayar = DB::table('pesan_costumers')
            ->join('pesan_sisa_bayars', 'pesan_costumers.kodeBayar', '=', 'pesan_sisa_bayars.kodeBayar')
            ->select('pesan_costumers.nama', 'pesan_costumers.email', 'pesan_costumers.telepon', 'pesan_costumers.kodeBayar', 'pesan_costumers.invoice', 'pesan_sisa_bayars.sisaBayar')
            ->where('pesan_costumers.kodeBayar','=', $kodeBayar)
            ->first();

        $sisa = new Money($kodeBayar->sisaBayar.'00', new Currency('IDR'));
        $showSisa = $this->moneyFormatter->format($sisa);

        return view('pesan.konfBayarPaket',compact('kodeBayar', 'showSisa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'invoice'       =>  'required',
            'tanggalTF'     =>  'required',
            'jumlahTF'      =>  'required',
            'asalTF'        =>  'required',
            'tujuanTF'      =>  'required',
            'buktiTF'       =>  'required|image',
            'namaRek'       =>  'required',
            'namaLengkap'   =>  'required',
            'telepon'       =>  'required',
            'email'         =>  'required'
        ]);

        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }

        $file = $request->file('buktiTF');
        $fileName = uniqid() . '.png';
        Image::make($file)->save($this->path . '/' . $fileName);

//        foreach ($this->dimensions as $row) {
//            $canvas = Image::canvas($row, $row);
//            $resizeImage = Image::make($file)->resize($row, $row, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//
//            if (!File::isDirectory($this->path . '/' . $row)) {
//                File::makeDirectory($this->path . '/' . $row);
//            }
//
//            $canvas->insert($resizeImage, 'center');
//            $canvas->save($this->path . '/' . $row . '/' . $fileName);
//        }

        $form_data = array(
            'kodeBayar'     =>   $request->kodeBayar,
            'invoice'       =>   $request->invoice,
            'tanggalTF'     =>   $request->tanggalTF,
            'jumlahTF'      =>   $request->jumlahTF,
            'tujuanTF'      =>   $request->tujuanTF,
            'asalTF'        =>   $request->asalTF,
            'buktiTF'       =>   $fileName,
            'namaRek'       =>   $request->namaRek,
            'namaLengkap'   =>   $request->namaLengkap,
            'telepon'       =>   $request->telepon,
            'email'         =>   $request->email
        );

        Konfirmasi::create($form_data);

        return view('pesan.konfSuccess');
    }

    public function cariKonf(Request $request)
    {
        $q = $request->cari;

        $kodeBayars = DB::table('pesan_sisa_bayars')
            ->select('kodeBayar', 'sisaBayar')
            ->where('kodeBayar','LIKE BINARY', $q)
            ->first();

        //ddd($kodeBayars->sisaBayar == 0);


        if ($kodeBayars === null || $kodeBayars->sisaBayar === 0) {
           return redirect(url('/konfirmasi'))->with('message', 'Kode Pembayaran tidak ditemukan. silahkan cek kembali Kode Pembayaran');
        }  else {
            return redirect('konfirmasi/'.$kodeBayars->kodeBayar.'/data');
        }
    }
}
