<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
//Rute Socmed
    Route::post('socmed/simpan', 'SocialMediaController@upcre');
    Route::get('socmed/create', 'SocialMediaController@create');
    Route::get('socmed', 'SocialMediaController@index');
//Rute Konfirmasi
    Route::get('pembayaran/lunas', 'KonfirmasiController@indexLunas');
    Route::get('pembayaran/bayar', 'KonfirmasiController@indexBayar');
    Route::get('konfirmasi/{id}/lihat/{kodeBayar}', 'KonfirmasiController@lihatKonf');
    Route::put('konfirmasi/{id}/update/{kodeBayar}', 'KonfirmasiController@updateKonf');
    Route::get('konfimrasi/belum/all', 'KonfirmasiController@indexBlmKonf');
    Route::get('konfirmasi/all', 'KonfirmasiController@index');
//Rute Galeri
    Route::resource('galeri', 'GaleriController');
//Rute Testimoni
    Route::resource('testimoni', 'TestimoniController');
//Rute Info Pesan Packet
    Route::get('pesanpaket/{kodebayar}/history', 'PesanSisaBayarController@historyBayar');
    Route::get('pesanpaket/{id}/pesanan', 'KonfirmasiController@konfirmasiData');
    Route::delete('pesanpaket/{id}/batal','PesanCostumerController@batal');
//Rute Pesan Paket
    Route::get('pesanpaket', 'PesanPaketController@index');
//Rute Syarat & Ket
    Route::get('paket/sarket/{uuid}/download', 'SarketController@download')->name('sarket.download');
    Route::post('paket/sarket/simpan', 'SarketController@save');
    Route::get('paket/sarket/{id}', 'SarketController@create');
//Rute Itinerary
    Route::get('paket/itinerary/{uuid}/download', 'ItineraryController@download')->name('itinerary.download');
    Route::post('paket/itinerary/simpan', 'ItineraryController@save');
    Route::get('paket/itinerary/{id}', 'ItineraryController@create');
//Rute Photo
    Route::post('paket/photo/simpan', 'PaketGaleriController@save');
    Route::get('paket/photo/{id}', 'PaketGaleriController@create');
//Resource Paket
    Route::put('paket/{id}/deactivate', 'PaketController@deactivate');
    Route::put('paket/{id}/activate', 'PaketController@activate');
    Route::resource('paket', 'PaketController');
    Route::get('/home', 'HomeController@index')->name('home');
});

