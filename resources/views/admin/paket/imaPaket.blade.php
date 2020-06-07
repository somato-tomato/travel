@extends('layouts.app', ['title' => __('Daftar Paket Perjalanan')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Unggah Photo Paket Perjalanan')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Photo Paket Perjalanan') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('paket.show', $data->id) }}" class="btn btn-sm btn-primary">{{ __('Kembali') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('administrator/paket/photo/simpan') }}" enctype="multipart/form-data">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Photo yang dapat di unggah hanya PNG, JPG, dan GIF') }}</h6>
                            <div class="pl-lg-4">

                                {{-- Nama Paket --}}
                                <div class="form-group">
                                    <label class="form-control-label" for="input-idPaket">{{ __('ID Paket') }}</label>
                                    <input type="text" name="idPaket" id="input-idPaket" class="form-control form-control-alternative" value="{{ $data->id }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-slug">{{ __('slug') }}</label>
                                    <input type="text" name="slug" id="input-slug" class="form-control form-control-alternative" value="{{ $data->slug }}" readonly>
                                </div>

                                {{-- Nama Paket --}}
                                <div class="form-group{{ $errors->has('namaPhoto') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-namaPhoto">{{ __('Nama Photo') }}</label>
                                    <input type="text" name="namaPhoto" id="input-namaPhoto" class="form-control form-control-alternative{{ $errors->has('namaPhoto') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama Photo') }}" value="{{ old('namaPhoto') }}" required autofocus>
                                    {{-- Error Nama Paket --}}
                                    @if ($errors->has('namaPhoto'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('namaPhoto') }}</strong>
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
