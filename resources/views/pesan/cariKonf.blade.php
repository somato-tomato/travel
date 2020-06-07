@extends('head.head', ['class' => 'register-page'])

@section('content')
    @include('head.navs.navbartwo')
    <div class="wrapper">
        <div class="section section-lg">
            <div class="content">
                <div class="container">
                    <br/>
                    <h2 style="text-align: center">KONFIRMASI PEMBAYARAN</h2>
                    <div class="row">
                        <div class="col-lg-3 col-md-6 offset-lg-0 offset-md-3">
                        </div>
                        <div class="col-lg-6 col-md-6 offset-lg-0 offset-md-3">
                            <div class="card card-register">
                                <div class="card-body">
                                    <form method="get" action="{{ url('konfirmasi/cari') }}">
                                        @csrf
                                        <h4 style="text-align: center">Masukan Kode Pembayaran</h4>
                                        <div class="form-row">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="cari"
                                                       placeholder="Kode Pembayaran">
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">{{ __('Cari') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @if(session()->has('message'))
                                <div class="alert alert-danger" style="color: white; text-align: center">{{ session('message') }}</div>
                            @endif
                        </div>
                        <div class="col-lg-3 col-md-6 offset-lg-0 offset-md-3"></div>
                    </div>
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
    <script>
        <!-- javascript for init -->
        $('.datepicker').datepicker({
            startDate: '-20d'
        });
    </script>
@endsection
