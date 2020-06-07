@extends('layouts.app', ['title' => __('Daftar Testimoni')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Daftar Testimoni')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Testimoni Pemesan') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('testimoni.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Testimoni    ') }}</a>
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
                                <th scope="col">{{ __('Nama Pemesan') }}</th>
                                <th scope="col">{{ __('Instansi') }}</th>
                                <th scope="col" class="text-center">{{ __('Aksi') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data as $testi)
                                <tr>
                                    <td>{{ $testi->nama }}</td>
                                    <td>{{ $testi->instansi }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('testimoni.destroy',$testi->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <a class="btn btn-info" href="{{ route('testimoni.show', $testi->id) }}">{{ __('Lihat') }}</a>
                                            <button onclick="return confirm('Apakah yakin akan menghapus testimoni ini?')" type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Belum ada Testimoni Pelanggan</td>
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
