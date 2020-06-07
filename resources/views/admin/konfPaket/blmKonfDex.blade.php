@extends('layouts.app', ['title' => __('Belum di Konfirmasi')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Pesanan Belum di Konfirmasi')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Daftar Konfirmasi Pembayaran') }}</h3>
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
                                <th scope="col">{{ __('Invoice') }}</th>
                                <th scope="col">{{ __('Atas Nama') }}</th>
                                <th scope="col">{{ __('Tanggal Transfer') }}</th>
                                <th scope="col" class="text-center">{{ __('Aksi') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data as $konf)
                                <tr>
                                    <td>{{ $konf->invoice }}</td>
                                    <td>{{ $konf->namaRek }}</td>
                                    <td>{{ $konf->created_at }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" href="{{ url('administrator/konfirmasi/'.$konf->id.'/lihat/'.$konf->kodeBayar) }}">{{ __('Lihat') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Belum ada Konfirmasi Pembayaran terbaru</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-center">{{ $data->links() }}</div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
