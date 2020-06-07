@extends('layouts.app', ['title' => __('Daftar Pembayaran')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Daftar Pembayaran')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Pesanan Pembayaran Belum Lunas') }}</h3>
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
                                <th scope="col">{{ __('Nomor Telepon') }}</th>
                                <th scope="col" class="text-center">{{ __('Status') }}</th>
                                <th scope="col" class="text-center">{{ __('Aksi') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($blmLunas as $blm)
                                <tr>
                                    <td>{{ $blm->invoice }}</td>
                                    <td>{{ $blm->nama }}</td>
                                    <td>{{ $blm->telepon }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-danger" href="javascript:void0">{{ __('Belum Lunas') }}</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="btn btn-warning" href="{{ url('administrator/pesanpaket/'.$blm->kodeBayar.'/history') }}">{{ __('Lihat') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Belum ada Pesanan yang Lunas</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="pull-center">{{ $blmLunas->links() }}</div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
