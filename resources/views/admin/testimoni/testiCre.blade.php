@extends('layouts.app', ['title' => __('Daftar Testimoni')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Tambah Testimoni')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Testimoni') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('testimoni.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali ke Daftar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('testimoni.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Informasi Paket Perjalanan') }}</h6>
                            <div class="pl-lg-4">

                                {{-- Nama Paket --}}
                                <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-nama">{{ __('Nama Pemesan') }}</label>
                                    <input type="text" name="nama" id="input-nama" class="form-control form-control-alternative{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Pemesan') }}" value="{{ old('nama') }}" required autofocus>
                                    {{-- Error Nama Paket --}}
                                    @if ($errors->has('nama'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                {{-- Nama Paket --}}
                                <div class="form-group{{ $errors->has('instansi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-instansi">{{ __('Nama Instansi') }}</label>
                                    <input type="text" name="instansi" id="input-instansi" class="form-control form-control-alternative{{ $errors->has('instansi') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Intansi') }}" value="{{ old('instansi') }}" required autofocus>
                                    {{-- Error Nama Paket --}}
                                    @if ($errors->has('instansi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('instansi') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                {{-- Destinasi Paket --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="input-testimoni">{{ __('Testimoni') }}</label>
                                    <textarea class="form-control" name="testimoni" id="input-testimoni" rows="3" placeholder="Tulis deskripsi tentang testimoni disini ..." required></textarea>
                                </div>


                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Upload Photo') }}</label>
                                    <input type="file" name="photo" class="form-control form-control-alternative">
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
