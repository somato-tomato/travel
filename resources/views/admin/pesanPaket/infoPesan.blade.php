@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url({{asset('cvr_images/'. $data->cover)}}); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-2 text-white">Paket : {{ $data->namaPaket }}</h1>
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
                                <a href="{{ route('paket.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali ke Daftar') }}</a>
{{--                                <a href="{{ route('paket.edit', $data->id) }}" class="btn btn-sm btn-default">{{ __('Perbarui Paket Perjalanan') }}</a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#" autocomplete="off">
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="namaLengkap">{{ __('Nama Pemesanan') }}</label>
                                    <input type="text" name="namaLengkap" id="namaLengkap" class="form-control form-control-alternative" value="{{ $data->nama }}" readonly>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="email">{{ __('Email') }}</label>
                                        <input type="text" name="email" id="email" class="form-control form-control-alternative" value="{{ $data->email }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="Nomor Telepon">{{ __('Nomor Telepon') }}</label>
                                        <input type="text" name="Nomor Telepon" id="Nomor Telepon" class="form-control form-control-alternative" value="{{ $data->telepon }}" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        <label class="form-control-label" for="alamatLengkap">{{ __('Alamat Lengkap') }}</label>
                                        <input type="text" name="alamatLengkap" id="alamatLengkap" class="form-control form-control-alternative" value="{{ $data->alamatLengkap }}" readonly>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="form-control-label" for="kodePos">{{ __('Kode Pos') }}</label>
                                        <input type="text" name="kodePos" id="kodePos" class="form-control form-control-alternative" value="{{ $data->kodePos }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Data Pesanan') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#" autocomplete="off">
                            <div class="row">
                                <div class="col-6">
                                    <h3>Tanggal Berangkat : {{ $data->tanggalBerangkat }}</h3>
                                </div>
                                <div class="col-6">
                                    <h3 style="float: right">Tanggal Pesan : {{ $data->tanggalPesan }}</h3>
                                </div>
                            </div>
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="namaPaket">{{ __('Nama Paket') }}</label>
                                    <input type="text" name="namaPaket" id="namaPaket" class="form-control form-control-alternative" value="{{ $data->namaPaket }}" readonly>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="destinasiPaket">{{ __('Destinasi Paket') }}</label>
                                        <input type="text" name="destinasiPaket" id="destinasiPaket" class="form-control form-control-alternative" value="{{ $data->destinasiPaket }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="durasiPaket">{{ __('Durasi Paket') }}</label>
                                        <input type="text" name="durasiPaket" id="durasiPaket" class="form-control form-control-alternative" value="{{ $data->durasiPaket }}" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="jumlahDewasa">{{ __('Jumlah Dewasa') }}</label>
                                        <input type="text" name="jumlahDewasa" id="jumlahDewasa" class="form-control form-control-alternative" value="{{ $data->jumlahDewasa }} Orang" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="jumlahAnak">{{ __('Jumlah Anak-anak') }}</label>
                                        <input type="text" name="jumlahAnak" id="jumlahAnak" class="form-control form-control-alternative" value="{{ $data->jumlahAnak }} Orang" readonly>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Data Pembayaran') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#" autocomplete="off">
                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" for="jnsBayar">{{ __('Nama Paket') }}</label>
                                    <input type="text" name="jnsBayar" id="jnsBayar" class="form-control form-control-alternative" value="{{ $data->jnsBayar }}" readonly>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="totalHarga">{{ __('Total Harga') }}</label>
                                        <input name="totalHarga" id="totalHarga" class="form-control form-control-alternative" value="{{ $viewTotal }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="sisaBayar">{{ __('Sisa Bayar') }}</label>
                                        <input name="sisaBayar" id="sisaBayar" class="form-control form-control-alternative" value="{{ $viewBayar }}" readonly>
                                    </div>
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
