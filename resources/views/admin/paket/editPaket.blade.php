@extends('layouts.app', ['title' => __('Perbarui Paket Perjalanan')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Perbarui Paket Perjalanan')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Perbarui Paket Perjalanan') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('paket.show', $data->id) }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('paket.update', $data->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Informasi Paket Perjalanan') }}</h6>
                            <div class="pl-lg-4">
                                {{-- Nama Paket --}}
                                <div class="form-group{{ $errors->has('namaPaket') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-namaPaket">{{ __('Nama Paket') }}</label>
                                    <input type="text" name="namaPaket" id="input-namaPaket" class="form-control form-control-alternative{{ $errors->has('namaPaket') ? ' is-invalid' : '' }}" value="{{ $data->namaPaket }}" required autofocus>
                                    {{-- Error Nama Paket --}}
                                    @if ($errors->has('namaPaket'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('namaPaket') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                {{-- Durasi Paket --}}
                                <div class="form-group{{ $errors->has('durasiPaket') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-durasiPaket">{{ __('Durasi Paket') }}</label>
                                    <input type="text" name="durasiPaket" id="input-durasiPaket" class="form-control form-control-alternative{{ $errors->has('durasiPaket') ? ' is-invalid' : '' }}" value="{{ $data->durasiPaket }}" required autofocus>
                                    {{-- Error Durasi Paket --}}
                                    @if ($errors->has('durasiPaket'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('durasiPaket') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                {{-- Destinasi Paket --}}
                                <div class="form-group{{ $errors->has('destinasiPaket') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-destinasiPaket">{{ __('Destinasi Paket') }}</label>
                                    <input type="text" name="destinasiPaket" id="input-destinasiPaket" class="form-control form-control-alternative{{ $errors->has('destinasiPaket') ? ' is-invalid' : '' }}" value="{{ $data->destinasiPaket }}" required autofocus>
                                    {{-- Error Destinasi Paket --}}
                                    @if ($errors->has('destinasiPaket'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('destinasiPaket') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                {{-- Destinasi Paket --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="input-descPaket">{{ __('Deskripsi Paket') }}</label>
                                    <textarea class="form-control" name="descPaket" id="input-descPaket" rows="3" placeholder="Tulis deskripsi tentang paket disini ..." required></textarea>
                                </div>

                                {{-- Destinasi Paket --}}
                                <div class="form-group{{ $errors->has('hargaPaket') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-hargaPaket">{{ __('Harga Paket') }}</label>
                                    <div class="input-group input-group-alternative mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i>Rp</i></span>
                                        </div>
                                        <input type="number" name="hargaPaket" id="input-hargaPaket" class="form-control form-control-alternative{{ $errors->has('hargaPaket') ? ' is-invalid' : '' }}" value="{{ $data->hargaPaket }}" required autofocus>
                                    </div>
                                    {{-- Error Destinasi Paket --}}
                                    @if ($errors->has('hargaPaket'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('hargaPaket') }}</strong>
                                        </span>
                                    @endif
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
