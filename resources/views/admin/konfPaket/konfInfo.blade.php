@extends('layouts.app', ['title' => __('Konfirmasi Pembayaran')])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-2 text-white">Konfirmasi Pembayaran</h1>
                    <p class="text-white mt-0 mb-5">Invoice : {{ $data->invoice }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Data Pemesan') }}</h3>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ url('administrator/konfirmasi/all') }}" class="btn btn-sm btn-primary">{{ __('Kembali ke Daftar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('administrator/konfirmasi/'.$data->id.'/update/'.$data->kodeBayar) }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <p>Informasi Pembayar</p>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="namaLengkap">{{ __('Nama Pemesanan') }}</label>
                                    <input type="text" name="namaLengkap" id="namaLengkap" class="form-control form-control-alternative" value="{{ $data->namaLengkap }}" readonly>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="email">{{ __('Email') }}</label>
                                        <input type="text" name="email" id="email" class="form-control form-control-alternative" value="{{ $data->email }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="telepon">{{ __('Nomor Telepon') }}</label>
                                        <input type="text" name="telepon" id="telepon" class="form-control form-control-alternative" value="{{ $data->telepon }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <p>Informasi Pembayaran</p>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="invoice">{{ __('Nomor Invoice') }}</label>
                                    <input type="text" name="invoice" id="invoice" class="form-control form-control-alternative" value="{{ $data->invoice }}" readonly>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="namaRek">{{ __('Atas Nama Rekening') }}</label>
                                        <input type="text" name="namaRek" id="namaRek" class="form-control form-control-alternative" value="{{ $data->namaRek }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="asalTF">{{ __('Nomor Rekening Pengirim') }}</label>
                                        <input type="text" name="asalTF" id="asalTF" class="form-control form-control-alternative" value="{{ $data->asalTF }}" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="tanggalTF">{{ __('Tanggal Transfer Pembayaran') }}</label>
                                        <input type="text" name="tanggalTF" id="tanggalTF" class="form-control form-control-alternative" value="{{ $data->tanggalTF }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="tujuanTF">{{ __('Tujuan Rekening Pembayaran') }}</label>
                                        <input type="text" name="tujuanTF" id="tujuanTF" class="form-control form-control-alternative" value="{{ $data->tujuanTF }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label" for="jumlahTF">{{ __('Jumlah Transfer Pembayaran') }}</label>
                                    <br/>
                                    <img src="{{asset('konf_images/'. $data->buktiTF)}}" data-action="zoom" style="width:100%;max-width:500px">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="jumlahTF">{{ __('Jumlah Transfer Pembayaran') }}</label>
                                        <input type="text" name="jumlahTF" id="jumlahTF" class="form-control form-control-alternative" value="{{ $viewTotal }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="sisaBayar">{{ __('Jumlah Sisa Pembayaran') }}</label>
                                        <input type="text" name="sisaBayar" id="sisaBayar" class="form-control form-control-alternative" value="{{ $viewBayar }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group">
                                        <label class="form-control-label" for="sisaBayar">{{ __('Konfirmasi Jumlah Transfer Pembayaran') }}</label>
                                        <input {{ $data->konfirmasi === 0 ? '' : 'disabled' }} type="number" name="sisaBayar" id="sisaBayar" class="form-control form-control-alternative" placeholder="Konfirmasi Jumlah Transfer Pembayaran">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
