<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    $data = DB::table('pakets')->get();
    $dataTes = \App\Testimoni::all();
    $dataGal = \App\Galeri::all();
    return view('landing', compact('data', 'dataTes', 'dataGal'));
});

Route::get('/listPaket', function (){
    $data = \App\Paket::all();
    return view('listPaket', compact('data'));
});

Route::get('/konfirmasi', function (){
    return view('pesan.cariKonf');
});

//Route::get('mailable', function () {
//    $invoice = App\PesanCostumer::find(1);
//
//    return new App\Mail\Invoices($invoice);
//});

//Rute Blog
Route::get('/blog','PostController@index')->name('post.index');
Route::get('/{slug}', 'PostController@show');
Route::get('/tag/{slug}', 'PostController@getPostsByTag');
Route::get('/topic/{slug}', 'PostController@getPostsByTopic');
//Rute Konfirmasi
Route::post('konfirmasi/simpan', 'KonfirmasiController@store');
Route::get('konfirmasi/{kodeBayar}/data', 'KonfirmasiController@buat');
Route::get('konfirmasi/cari', 'KonfirmasiController@cariKonf');
Route::get('konfirmasi/kodebayar', 'PesanPaketController@konfirmasis');
//Rute Pesan Paket
Route::get('sarket/{uuid}/download', 'SarketController@download')->name('sar.download');
Route::get('itinerary/{uuid}/download', 'ItineraryController@download')->name('iti.download');
Route::post('pesanpaket/paket/simpan', 'PesanPaketController@store');
Route::get('pesanpaket/{kodebayar}/success', 'PesanCostumerController@pass');
Route::get('pesanpaket/info/{kodeBayar}', 'PesanCostumerController@info');
Route::post('pesanpaket/costumer/simpan', 'PesanCostumerController@save');
Route::get('pesanpaket/datadiri/{kodeBayar}', 'PesanCostumerController@isiData')->name('pesanpaket.datadiri')->middleware('signed');
Route::get('infopaket/{slug}', 'PaketController@showPaket');
