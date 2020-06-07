@extends('head.head', ['class' => 'landing-page'])

@section('content')
    @include('head.navs.navbartwo')
    <!-- End Navbar -->
    <div class="wrapper">
        <br><br><br>
        <div class="section">
            <div class="container align-items-center">
                <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="row justify-content-between align-items-center">
                                <div class="owl-one owl-carousel owl-theme">
                                    @foreach($photo as $photos)
                                    <div><img src="{{asset('pr_images/'.$photos->photo)}}"></div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 ml-auto mr-auto">
                            <div class="card card-coin card-plain">
                                <div class="card-body">
                                    <h6 class="text-on-back" style="font-size: 30px; text-align: center">{{$data->namaPaket}}</h6>
                                    <h6 style="text-align: center">{{$data->destinasiPaket}} </h6>
                                    <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                                        <li class="nav-item">
                                            <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="bottom" data-content="{{$data->durasiPaket}}">
                                                Durasi Perjalanan
                                            </button>
                                        </li>
                                        &nbsp;&nbsp;
                                        <li class="nav-item">
                                            <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="top"
                                                    data-content="{{$data->descPaket}}"
                                            >
                                                Deskripsi Tujuan
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="tab-content tab-subcategories">
                                                <div class="tab-pane active">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead class=" text-primary">
                                                            <tr>
                                                                <th>
                                                                    Harga per
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    Dewasa
                                                                </td>
                                                                <td>
                                                                    {{$viewDewasa}}
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="tab-content tab-subcategories">
                                                <div class="tab-pane active">
                                                    <div class="table-responsive">
                                                        <table class="table tablesorter">
                                                            <thead class=" text-primary">
                                                            <tr>
                                                                <th>
                                                                    Harga per
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    Anak-anak
                                                                </td>
                                                                <td>
                                                                    {{ $viewAnak }}
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <div class="col-2">
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm">Informasi Tambahan</button>

                                            <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Informasi Tambahan </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        @if($cekIti === 0 || $cekSar === 0)
                                                            <div class="modal-body">
                                                                <h2 class="text-dark text-center">Mohon Maaf!</h2>
                                                                <h2 class="text-dark text-center">Kami belum mengunggah Itinerary dan S&K untuk Paket ini</h2>
                                                                <h2 class="text-dark text-center">Silahkan hubungi Admin untuk informasi lebih lanjut!</h2>
                                                            </div>
                                                        @else
                                                            <div class="modal-body">
                                                                <h2 class="text-dark text-center">Itinerary</h2>
                                                                <h5 class="text-center"><a href="{{ route('iti.download', $iti->uuid) }}" class="btn tooltip-test" title="Tooltip">Unduh Itinerary</a></h5>
                                                                <h2 class="text-dark text-center">Syarat & Keterangan</h2>
                                                                <h4 class="text-center"><a href="{{ route('sar.download', $sar->uuid) }}" class="btn tooltip-test" title="Tooltip">Unduh S & K</a></h4>
                                                            </div>
                                                        @endif
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary flex-fill" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <button type="button" class="btn btn-success" style="float: right" data-toggle="modal" data-target="#myModal2">Pesan Sekarang!</button>
                                    <!-- Form Modal -->
                                    <div class="modal fade modal-black" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header justify-content-center">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                        <i class="tim-icons icon-simple-remove text-white"></i>
                                                    </button>
                                                    <div class="text-muted text-center ml-auto mr-auto">
                                                        <h3 class="mb-0">Pilih Tanggal Berangkat!</h3>
                                                    </div>
                                                </div>
                                                <div class="modal-body">
                                                    <form role="form" method="post" action="{{ url('pesanpaket/paket/simpan') }}" autocomplete="off" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label hidden for="idPaket"><strong>ID Paket</strong></label>
                                                            <input type="number" class="form-control" id="idPaket" name="idPaket" value="{{ $data->id }}" required hidden readonly>
                                                        </div>

                                                        {{-- Tanggal Berangkat --}}
                                                        <div class="form-group">
                                                            <label for="idPaket"><strong>Pilih Tanggal Keberangkatan</strong></label>
                                                            <div class="input-group input-group-alternative date">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                                </div>
                                                                <input data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control datepicker" placeholder="Pilih Tanggal Keberangkatan" name="tanggalBerangkat" type="text">
                                                            </div>
                                                        </div>

                                                        <div class="form-row" style="padding-bottom: 12px" >
                                                            <div class="form-group {{ $errors->has('jumlahDewasa') ? ' has-danger' : '' }} col-md-6">
                                                                <label for="jumlahDewasa"><strong>Jumlah Orang Dewasa</strong></label>
                                                                <input type="number" class="form-control{{ $errors->has('jumlahDewasa') ? ' is-invalid' : '' }}" id="jumlahDewasa" name="jumlahDewasa" placeholder="Masukan Jumlah Orang Dewasa" required>
                                                                @if ($errors->has('jumlahDewasa'))
                                                                    <span id="jumlahDewasa-error" class="error text-danger" for="jumlahDewasa">{{ $errors->first('jumlahDewasa') }}</span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group {{ $errors->has('jumlahAnak') ? ' has-danger' : '' }} col-md-6">
                                                                <label for="jumlahAnak"><strong>Jumlah Anak-anak</strong></label>
                                                                <input type="number" class="form-control {{ $errors->has('jumlahAnak') ? ' is-invalid' : '' }}" id="jumlahAnak" name="jumlahAnak" placeholder="Masukan Jumlah Anak-anak" required>
                                                                @if ($errors->has('jumlahAnak'))
                                                                    <span id="jumlahAnak-error" class="error text-danger" for="telp">{{ $errors->first('jumlahAnak') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="text-center">
                                                            <button onclick="return confirm('Sudah yakin dengan tanggal dan jumlah orangnya ?')" type="submit" class="btn btn-success mt-4">{{ __('Pesan') }}</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  End Modal -->
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h1 class="title">BLK•</h1>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Landing
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Register
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link">
                                    Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="https://creative-tim.com/contact-us" class="nav-link">
                                    Contact Us
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://creative-tim.com/about-us" class="nav-link">
                                    About Us
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://creative-tim.com/blog" class="nav-link">
                                    Blog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://opensource.org/licenses/MIT" class="nav-link">
                                    License
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h3 class="title">Follow us:</h3>
                        <div class="btn-wrapper profile">
                            <a target="_blank" href="https://twitter.com/creativetim" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a target="_blank" href="https://www.facebook.com/creativetim" class="btn btn-icon btn-neutral btn-round btn-simple" data-toggle="tooltip" data-original-title="Like us">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a target="_blank" href="https://dribbble.com/creativetim" class="btn btn-icon btn-neutral  btn-round btn-simple" data-toggle="tooltip" data-original-title="Follow us">
                                <i class="fab fa-dribbble"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
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
