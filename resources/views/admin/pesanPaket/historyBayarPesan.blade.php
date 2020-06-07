@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-2 text-white">Invoice : {{ $data->invoice }}</h1>
                    <p class="text-white mt-0 mb-5">Kode Bayar : {{ $data->kodeBayar }}</p>
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
{{--                                <a href="{{ route('paket.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali ke Daftar') }}</a>--}}
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
                            </div>
                        </form>
                    </div>
                </div>
                <br/>
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('History Transfer') }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Nama Rek') }}</th>
                                    <th scope="col">{{ __('Bank Tujuan') }}</th>
                                    <th scope="col">{{ __('Jumlah Transfer') }}</th>
                                    <th scope="col">{{ __('Tanggal Transfer') }}</th>
                                    <th scope="col">{{ __('Konfirmasi Oleh') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($dataBayar as $dby)
                                    <tr>
                                        <td>{{ $dby->namaRek }}</td>
                                        <td>{{ $dby->tujuanTF }}</td>
                                        <td>Rp. {{ number_format($dby->jumlahTF, 2) }}</td>
                                        <td>{{ $dby->tanggalTF }}</td>
                                        <td>{{ $dby->name }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">Belum ada Pesanan Paket</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
