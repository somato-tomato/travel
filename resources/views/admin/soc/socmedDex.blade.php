@extends('layouts.app', ['title' => __('Social Media')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Social Media')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Media Sosial') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ url('administrator/socmed/create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Media Sosial') }}</a>
                            </div>
                        </div>
                    </div>

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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Media Sosial') }}</th>
                                <th scope="col">{{ __('Link') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data as $sm)
                                <tr>
                                    <td>{{ $sm->socmed }}</td>
                                    <td>{{ $sm->link }}</td>
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

        @include('layouts.footers.auth')
    </div>
@endsection

