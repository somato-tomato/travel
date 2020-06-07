<?php

namespace App\Http\Controllers;

use App\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Image;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money;
use NumberFormatter;


class PaketController extends Controller
{
    public $path;
    public $dimensions;
    public $currencies;
    public $numberFormatter;
    public $moneyFormatter;

    public function __construct()
    {
        $this->path = public_path('cvr_images');
        $this->dimensions = ['1024'];
        $this->currencies = $currencies = new ISOCurrencies();
        $this->numberFormatter = new NumberFormatter('id_ID', \NumberFormatter::CURRENCY);
        $this->moneyFormatter = new IntlMoneyFormatter($this->numberFormatter, $currencies);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = Paket::orderby('created_at', 'desc')->paginate(5);
        return view('admin.paket.dexPaket', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.paket.crePaket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaPaket'         =>  'required',
            'durasiPaket'       =>  'required',
            'destinasiPaket'    =>  'required',
            'descPaket'         =>  'required',
            'hargaPaket'        =>  'required',
            'hargaPaketAnak'    =>  'required',
            'cover'             => 'required|image|max:2048'
         ]);

        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }

        $file = $request->file('cover');
        $fileName = uniqid() . '.png';
        Image::make($file)->save($this->path . '/' . $fileName);

        foreach ($this->dimensions as $row) {
            $canvas = Image::canvas($row, $row);
            $resizeImage = Image::make($file)->resize($row, $row, function ($constraint) {
                $constraint->aspectRatio();
            });

            if (!File::isDirectory($this->path . '/' . $row)) {
                File::makeDirectory($this->path . '/' . $row);
            }

            $canvas->insert($resizeImage, 'center');
            $canvas->save($this->path . '/' . $row . '/' . $fileName);
        }

        $form_data = array(
            'namaPaket'         =>   $request->namaPaket,
            'durasiPaket'       =>   $request->durasiPaket,
            'destinasiPaket'    =>   $request->destinasiPaket,
            'descPaket'         =>   $request->descPaket,
            'hargaPaket'        =>   $request->hargaPaket,
            'hargaPaketAnak'    =>   $request->hargaPaketAnak,
            'slug'              =>   Str::slug($request->namaPaket, ('-')),
            'cover'             =>   $fileName
        );

        Paket::create($form_data);

        return redirect()->route('paket.index')->with('message', 'Paket baru berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Paket::findOrFail($id);
        $photo = DB::table('paket_galeris')
            ->select('id', 'photo')
            ->where('idPaket', '=', $id)
            ->get();
        $itinerary =  DB::table('itineraries')
            ->select('namaItinerary', 'fileItinerary', 'uuid')
            ->where('idPaket', '=',$id)
            ->get();
        $sarket = DB::table('sarkets')
            ->select('namaSarket', 'fileSarket', 'uuid')
            ->where('idPaket', '=', $id)
            ->get();
        $cekSar = DB::table('sarkets')->where('idPaket', $id)->count();
        $cekIti = DB::table('itineraries')->where('idPaket', $id)->count();

        $hargaDewasa = new Money($data->hargaPaket.'00', new Currency('IDR'));
        $hargaAnak = new Money($data->hargaPaketAnak.'00', new Currency('IDR'));
        $viewDewasa = $this->moneyFormatter->format($hargaDewasa);
        $viewAnak = $this->moneyFormatter->format($hargaAnak);

        return view('admin.paket.infoPaket', compact('data', 'photo', 'itinerary', 'sarket', 'cekIti', 'cekSar', 'viewDewasa', 'viewAnak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Paket::findOrFail($id);
        return view('admin.paket.editPaket', compact('data'));
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
        $request->validate([
            'namaPaket'         =>  'required',
            'durasiPaket'       =>  'required',
            'destinasiPaket'    =>  'required',
            'descPaket'         =>  'required',
            'hargaPaket'        =>  'required',
            'hargaPaketAnak'    =>  'required'
        ]);

        $form_data = array(
            'namaPaket'         =>   $request->namaPaket,
            'durasiPaket'       =>   $request->durasiPaket,
            'destinasiPaket'    =>   $request->destinasiPaket,
            'descPaket'         =>   $request->descPaket,
            'hargaPaket'        =>   $request->hargaPaket,
            'hargaPaketAnak'    =>   $request->hargaPaketAnak
        );

        Paket::whereId($id)->update($form_data);

        return redirect('administrator/paket')->with('success', 'Data Added successfully.');
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

    public function activate($id)
    {
        DB::table('pakets')
            ->where('id', '=', $id)
            ->update(['aktifPaket' => 1]);

        return redirect()->route('paket.index')->with('message', 'Paket Perjalanan telah di aktifkan');
    }

    public function deactivate($id)
    {
        DB::table('pakets')
            ->where('id', '=', $id)
            ->update(['aktifPaket' => 0]);

        return redirect()->route('paket.index')->with('message', 'Paket Perjalanan telah di non-aktifkan');
    }

    public function showPaket($slug)
    {
        $data = DB::table('pakets')
            ->where('slug', '=', $slug)
            ->first();
        $photo = DB::table('paket_galeris')
            ->select('photo')
            ->where('slug', '=', $slug)
            ->get();
        $iti = DB::table('itineraries')
            ->select('uuid')
            ->where('slug', '=', $slug)
            ->first();
        $sar = DB::table('sarkets')
            ->select('uuid')
            ->where('slug', '=', $slug)
            ->first();
        $cekSar = DB::table('sarkets')->where('slug', $slug)->count();
        $cekIti = DB::table('itineraries')->where('slug', $slug)->count();

        $hargaDewasa = new Money($data->hargaPaket.'00', new Currency('IDR'));
        $hargaAnak = new Money($data->hargaPaketAnak.'00', new Currency('IDR'));
        $viewDewasa = $this->moneyFormatter->format($hargaDewasa);
        $viewAnak = $this->moneyFormatter->format($hargaAnak);

        return view('pesan.infoPaket', compact('data', 'photo','iti','sar', 'cekSar', 'cekIti', 'viewDewasa', 'viewAnak'));
    }
}
