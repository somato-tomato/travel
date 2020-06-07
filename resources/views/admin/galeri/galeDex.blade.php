@extends('layouts.app', ['title' => __('Daftar Galeri')])

@section('content')
    @include('admin.paket.partials.header', ['title' => __('Daftar Galeri')  ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Galeri') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('galeri.create') }}" class="btn btn-sm btn-primary">{{ __('Tambah Galeri') }}</a>
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
                                <th scope="col">{{ __('Keterangan') }}</th>
                                <th scope="col">{{ __('Photo') }}</th>
                                <th scope="col" class="text-center">{{ __('Aksi') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($data as $gal)
                                <tr>
                                    <td>{{ $gal->ketPhoto }}</td>
                                    <td><img class="img-thumbnail" style="height: 20%" src="{{ url('gl_images/'.$gal->photo) }}"  alt="img"></td>
                                    <td class="text-center">
                                        <form action="{{ route('galeri.destroy',$gal->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button onclick="return confirm('Apakah yakin akan menghapus photo ini?')" type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Belum ada Photo Galeri</td>
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

