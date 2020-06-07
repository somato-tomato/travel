@extends('head.head', ['class' => 'register-page'])

@section('content')
    @include('head.navs.navbarfour')
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header">
            <div class="page-header-image"></div>
            <div class="content">
                <div class="container">
                    <form method="post" action="{{ url('pesanpaket/costumer/simpan') }}" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6 offset-lg-0 offset-md-3">
                            <div id="square7" class="square square-7"></div>
                            <div id="square8" class="square square-8"></div>
                            <div class="card card-register">
                                <div class="card-body">
                                    <h4 class="card-title">Invoice : {{ $data->invoice }}</h4>
                                    <div class="row">
                                        <h4 class="card-title col-md-6">Berangkat : {{ $data->tanggalBerangkat }}</h4>
                                        <h4 class="card-title col-md-6">Pesan : {{ $data->tanggalPesan }}</h4>
                                    </div>
                                    <div class="form-row" hidden>
                                        <div class="input-group col-md-">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tim-icons icon-single-02"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="idPesanPaket" value=" {{ $data->id }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row" hidden>
                                        <div class="input-group col-md-">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tim-icons icon-single-02"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="kodeBayar" value=" {{ $data->kodeBayar }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row" hidden>
                                        <div class="input-group col-md-">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tim-icons icon-single-02"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" name="invoice" value=" {{ $data->invoice }}" readonly>
                                        </div>
                                    </div>
{{--                                    Nama--}}
                                        <div class="form-row">
                                            <div class="input-group col-md-">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-single-02"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                                            </div>
                                        </div>
{{--                                    Email dan Telepon--}}
                                        <div class="form-row">
                                            <div class="input-group col-md-6">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-email-85"></i>
                                                    </div>
                                                </div>
                                                <input type="email" placeholder="Email" name="email" class="form-control" required>
                                            </div>
                                            <div class="input-group col-md-6">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-tablet-2"></i>
                                                    </div>
                                                </div>
                                                <input type="number" placeholder="Nomor Telepon" name="telepon" class="form-control" required>
                                            </div>
                                        </div>
{{--                                    Alamat--}}
                                        <div class="form-row">
                                            <div class="input-group col-md-">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-square-pin"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" name="alamatLengkap" placeholder="Alamat" required>
                                            </div>
                                        </div>
{{--                                    Kota dan Kode Pos--}}
                                        <div class="form-row">
                                            <div class="input-group col-md-8">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-square-pin"></i>
                                                    </div>
                                                </div>
                                                <input type="text" placeholder="Kota" name="kota" class="form-control" required>
                                            </div>
                                            <div class="input-group col-md-4">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-square-pin"></i>
                                                    </div>
                                                </div>
                                                <input type="text" placeholder="Kode Pos" name="kodePos" class="form-control" required>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 offset-lg-0 offset-md-3">
                            <div class="card card-register">
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Jumlah Orang</th>
                                            <th>Harga Paket</th>
                                            <th>Total Harga</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Dewasa : {{ $data->jumlahDewasa }} Orang</td>
                                            <td>{{ $showDewasa }}</td>
                                            <td>{{ $viewDewasa }}</td>
                                        </tr>
                                        <tr>
                                            <td>Anak-anak : {{ $data->jumlahAnak }} Orang</td>
                                            <td>{{ $showAnak }}</td>
                                            <td>{{ $viewAnak }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Total Harga</td>
                                            <td>{{ $viewHarga }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
{{--                                    jnsPembayaran--}}
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="jnsBayar">Jenis Pembayaran</label>
                                            <select style="color: black" class="form-control" id="jnsBayar" name="jnsBayar">
                                                <option value="lunas">Bayar Lunas</option>
                                                <option value="dp">Downpayment 50%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row" hidden>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tim-icons icon-single-02"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" name="totalHarga" value="{{ $jumlahHarga }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row" hidden>
                                        <div class="input-group col-md-">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="tim-icons icon-single-02"></i>
                                                </div>
                                            </div>
                                            <input type="number" class="form-control" name="sisaBayar" value="{{ $jumlahHarga }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button onclick="return confirm('Apakah data yang anda isi sudah benar dan valid ?')" type="submit" class="btn btn-success mt-4">{{ __('PESAN!') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div id="square1" class="square square-1"></div>
                    <div id="square2" class="square square-2"></div>
                    <div id="square3" class="square square-3"></div>
                    <div id="square4" class="square square-4"></div>
                    <div id="square5" class="square square-5"></div>
                    <div id="square6" class="square square-6"></div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{asset('blk/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('blk/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('blk/assets/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('blk/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{asset('blk/assets/js/plugins/bootstrap-switch.js')}}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('blk/assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>
    <!-- Chart JS -->
    <script src="{{asset('blk/assets/js/plugins/chartjs.min.js')}}"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{asset('blk/assets/js/plugins/moment.min.js')}}"></script>
    {{--    <script src="{{asset('blk/assets/js/plugins/bootstrap-datepicker.js')}}" type="text/javascript"></script>--}}
    <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('blk/assets/js/blk-design-system.min.js?v=1.0.0')}}" type="text/javascript"></script>
    <script src="{{asset('blk/assets/js/blk-design-system.min.js?v=1.0.0')}}" type="text/javascript"></script>
    <script src="{{asset('js/owl.carousel.js')}}" type="text/javascript"></script>
    <script>
        $('.owl-one').owlCarousel({
            items:1,
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            margin:10,
            autoHeight:true
        });
        <!-- javascript for init -->
        $('.datepicker').datepicker({
            startDate: '-0d'
        });
    </script>
@endsection
