@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Data Testimoni') }}</h3>
                            </div>
                            <div class="col-6 text-right">
                                <a href="{{ route('testimoni.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali ke Daftar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="#" autocomplete="off" enctype="multipart/form-data">
                            <p>Informasi Testimoni</p>
                            <div class="pl-lg-4">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <img class="img-center rounded-circle" src="{{ asset('ts_images/300/'.$data->photo) }}" alt="testiPhoto">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="nama">{{ __('Nama Pemesanan') }}</label>
                                            <input type="text" name="nama" id="nama" class="form-control form-control-alternative" value="{{ $data->nama }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="instansi">{{ __('Instansi') }}</label>
                                            <input type="text" name="instansi" id="instansi" class="form-control form-control-alternative" value="{{ $data->instansi }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label" for="testimoni">{{ __('Testimoni') }}</label>
                                            <textarea type="text" name="testimoni" id="testimoni" class="form-control form-control-alternative" readonly>{{ $data->testimoni }} </textarea>
                                        </div>
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
