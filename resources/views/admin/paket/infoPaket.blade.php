@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url({{asset('cvr_images/'. $data->cover)}}); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-2 text-white">{{ $data->namaPaket }}</h1>
                    <p class="text-white mt-0 mb-5">{{ $data->descPaket }}</p>
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
                                <h3 class="mb-0">{{ __('Paket Perjalanan') }}</h3>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('paket.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali ke Daftar') }}</a>
                                <a href="{{ route('paket.edit', $data->id) }}" class="btn btn-sm btn-default">{{ __('Perbarui Paket Perjalanan') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Informasi Paket Perjalanan') }}</h6>
                            <div class="pl-lg-4">
                                {{-- Durasi Paket --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="input-durasiPaket">{{ __('Durasi Paket') }}</label>
                                    <input type="text" name="durasiPaket" id="input-durasiPaket" class="form-control form-control-alternative" value="{{ $data->durasiPaket }}" readonly>
                                </div>

                                {{-- Destinasi Paket --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="input-destinasiPaket">{{ __('Destinasi Paket') }}</label>
                                    <input type="text" name="destinasiPaket" id="input-destinasiPaket" class="form-control form-control-alternative" value="{{ $data->destinasiPaket }}" readonly>
                                </div>

                                {{-- Harga Paket --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="input-hargaPaket">{{ __('Harga Paket') }}</label>
                                    <div class="input-group input-group-alternative mb-4">
                                        <input name="hargaPaket" id="input-hargaPaket" class="form-control form-control-alternative" value="{{ $viewDewasa }}" readonly>
                                    </div>
                                </div>

                                {{-- Harga Paket --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="input-hargaPaketAnak">{{ __('Harga Paket Anak') }}</label>
                                    <div class="input-group input-group-alternative mb-4">
                                        <input name="hargaPaketAnak" id="input-hargaPaketAnak" class="form-control form-control-alternative" value="{{ $viewAnak }}" readonly>
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
            <div class="col-12">
                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Photo Paket Perjalanan') }}</h3>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ url('administrator/paket/photo', $data->id) }}" class="btn btn-sm btn-default">{{ __('Tambah Photo Perjalanan Paket') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @forelse($photo as $photos)
                            <div class="col-md-4">
                                <a type="button" class="btn" data-toggle="modal" data-target="#modal-notification"><img class="card-img-top" src="{{asset('pr_images/1024/'. $photos->photo)}}" alt="Card image cap"></a>
                            </div>
                            @empty
                                <div class="col-md-12">
                                    <p style="text-align: center">Belum ada photo Paket Perjalanan</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-xl-6 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Berkas Itinerary') }}</h3>
                            </div>
                            <div class="col-6 text-right">
                                <button {{ ( $cekIti === 1 ) ?  'onclick' : 'this.disabled=true'}} onclick="window.location.href='{{ url('administrator/paket/itinerary', $data->id) }}'" class="btn btn-sm btn-default">Tambah Berkas Itinerary</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{{ __('Nama Itinerary') }}</th>
                                            <th scope="col">{{ __('Berkas Itinerary') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($itinerary as $iti)
                                            <tr>
                                                <td>{{ $iti->namaItinerary }}</td>
                                                <td>
                                                    <a href="{{ route('itinerary.download', $iti->uuid) }}">{{ $iti->fileItinerary }}</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="6">Belum mengunggah berkas itinerary</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Berkas S&K') }}</h3>
                            </div>
                            <div class="col-6 text-right">
                                <button {{ ( $cekSar === 1 ) ?  'onclick' : 'this.disabled=true'}} onclick="window.location.href='{{ url('administrator/paket/sarket', $data->id) }}'" class="btn btn-sm btn-default">Tambah Berkas Syarat & Ketentuan</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">{{ __('Nama S&K') }}</th>
                                            <th scope="col">{{ __('Berkas S&K') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($sarket as $skt)
                                            <tr>
                                                <td>{{ $skt->namaSarket }}</td>
                                                <td>
                                                    <a href="{{ route('sarket.download', $skt->uuid) }}">{{ $skt->fileSarket }}</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="6">Belum mengunggah berkas itinerary</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('layouts.footers.auth')
    </div>
@endsection
