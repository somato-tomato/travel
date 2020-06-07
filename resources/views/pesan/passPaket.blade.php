@extends('head.head', ['class' => 'register-page'])

@section('content')
    @include('head.navs.navbartwo')
    <div class="wrapper">
        <div class="page-header">
            <div class="page-header-image"></div>
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 offset-lg-0 offset-md-3"></div>
                            <div class="col-lg-8 col-md-6 offset-lg-0 offset-md-3">
                                <div id="square7" class="square square-7"></div>
                                <div id="square8" class="square square-8"></div>
                                <div class="card card-register">
                                    <div class="card-body">
                                        <h2  style="text-align: center">Terima Kasih !</h2>
                                        <h3  style="text-align: center">Berikut adalah kode untuk konfirmasi pembayaran</h3>
                                        <h2  style="text-align: center"><strong>{{ $data->kodeBayar }}</strong>
                                        <br/><br/> --------------------------------------------------- </h2>
                                        <h2 style="text-align: center">Detail pesanan sudah di kirim ke {{ $data->email }}</h2>

                                        <h4 style="text-align: center">Pembayaran dapat dilakukan melalui transfer ke rekening</h4>
                                        <div class="row">
                                            <div class="col-md-6" style="text-align: center">
                                                <h4>Bank Mandiri</h4>
                                                <p>A/N Abigail Olaf Naolaf
                                                    <br/>No Rek : 32043209069800004
                                                </p>
                                            </div>
                                            <div class="col-md-6" style="text-align: center">
                                                <h4>Bank BRI</h4>
                                                <p>A/N Meslamtaea Kur Ki Gal Irkalla
                                                    <br/>No Rek : 40000896090234023
                                                </p>
                                            </div>
                                        </div>
                                        <div style="justify-content: center; display: flex">
                                            <a type="button" href="javascript:void(0)" class="btn btn-info btn-lg btn-round">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 offset-lg-0 offset-md-3">
                            </div>
                        </div>
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
