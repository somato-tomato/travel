@extends('layouts.app', ['title' => __('Daftar Galeri')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Tambah Photo')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Photo') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('galeri.index') }}" class="btn btn-sm btn-primary">{{ __('Kembali ke Daftar') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('galeri.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Unggah Galeri') }}</h6>
                            <div class="pl-lg-4">

                                {{-- Nama Paket --}}
                                <div class="form-group{{ $errors->has('ketPhoto') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-ketPhoto">{{ __('Keterangan Photo') }}</label>
                                    <input type="text" name="ketPhoto" id="input-ketPhoto" class="form-control form-control-alternative{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Keterangan Photo') }}" value="{{ old('ketPhoto') }}" required autofocus>
                                    {{-- Error Nama Paket --}}
                                    @if ($errors->has('ketPhoto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('ketPhoto') }}</strong>
                                        </span>
                                    @endif
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
