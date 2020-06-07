@extends('layouts.app', ['title' => __('Daftar Paket Perjalanan')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Daftar Paket Perjalanan')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Paket Perjalanan') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('paket.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Paket Perjalanan') }}</a>
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
                                <th scope="col">{{ __('Nama Paket') }}</th>
                                <th scope="col">{{ __('Durasi Paket') }}</th>
                                <th scope="col">{{ __('Terakhir Diperbarui') }}</th>
                                <th scope="col" class="text-center">{{ __('Aksi') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($paket as $packet)
                                <tr>
                                    <td>{{ $packet->namaPaket }}</td>
                                    <td>{{ $packet->durasiPaket }}</td>
                                    <td>{{ $packet->updated_at->format('d/m/Y H:i') }}</td>
                                    <td class="text-center">
                                        @if($packet->aktifPaket === 0)
                                            <form action="{{ url('administrator/paket/'.$packet->id.'/activate') }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <a class="btn btn-danger" href="{{route('paket.show', $packet->id)}}">{{ __('Lihat') }}</a>
                                                <button onclick="return confirm('Aktifkan Paket Perjalanan ?')" type="submit" class="btn btn-info">Aktifkan</button>
                                            </form>
                                        @else
                                            <form action="{{ url('administrator/paket/'.$packet->id.'/deactivate') }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <a class="btn btn-danger" href="{{route('paket.show', $packet->id)}}">{{ __('Lihat') }}</a>
                                                <button onclick="return confirm('Nonaktifkan Paket Perjalanan ?')" type="submit" class="btn btn-warning">Nonaktifkan</button>
                                            </form>
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Belum ada Paket Perjalanan</td>
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
