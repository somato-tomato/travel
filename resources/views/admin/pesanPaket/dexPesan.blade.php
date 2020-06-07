@extends('layouts.app', ['title' => __('Daftar Pesanan Paket')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Daftar Pesanan Paket')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card sha    dow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Pesanan Paket Perjalanan') }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
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
                                <th scope="col">{{ __('Nama Pemesan') }}</th>
                                <th scope="col">{{ __('Tanggal Memesan') }}</th>
                                <th scope="col" class="text-center">{{ __('Aksi') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($pesanan as $pesan)
                                <tr>
                                    <td>{{ $pesan->invoice }}</td>
                                    <td>{{ $pesan->nama }}</td>
                                    <td>{{ $pesan->tanggalPesan }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" href="{{ url('administrator/pesanpaket/'.$pesan->id.'/pesanan') }}">{{ __('Lihat') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Belum ada Pesanan Paket</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-center">{{ $pesanan->links() }}</div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
