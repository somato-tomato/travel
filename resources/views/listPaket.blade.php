@extends('head.head', ['class' => 'landing-page'])

@section('content')
    <!-- Navbar -->
    @include('head.navs.navbar')
    <!-- End Navbar -->
    <div class="wrapper">
        <section class="section section-lg" id="tour">
            <section class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <hr class="line-info">
                            <h2>Pilihan paket perjalanan
                                <span class="text-warning">yang dapat dipesan</span>
                            </h2>
                        </div>
                    </div>
                    <div class="row">
                        @foreach( $data as $paket)
                            @if( $paket->aktifPaket === 1)
                                <div class="col-md-4">
                                    <div class="card card-coin card-plain">

                                        <!-- Button trigger modal -->
                                        <div class="brightness">
                                            <img
                                                class="img-center img-fluid"
                                                style="width: 100%;"
                                                src="{{asset('cvr_images/'. $paket->cover)}}"
                                                alt="a">
                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <h2 class="text-uppercase">{{$paket->namaPaket}}</h2>
                                                    <h4 class="text-uppercase">{{$paket->durasiPaket}}</h4>
                                                    <div class="text-center">
                                                        <button class="btn btn-info btn-simple" data-container="body" data-toggle="popover" data-placement="bottom" data-content="{{ $paket->destinasiPaket }}">Destinasi</button>
                                                    </div>
                                                    <hr class="line-primary">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Rp. {{$paket->hargaPaket}} / Pack</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a href="{{url('infopaket/'.$paket->slug)}}" target="_blank" class="btn btn-primary btn-simple">Lihat Paket</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </section>
        </section>
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
                                <a href="../examples/profile-page.html" class="nav-link">
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
    <script src="{{asset('blk/assets/js/plugins/moment.min.js')}}"></script>
    <script src="{{asset('blk/assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
    <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('blk/assets/js/blk-design-system.min.js?v=1.0.0')}}" type="text/javascript"></script>
    <script src="{{asset('blk/assets/js/blk-design-system.min.js?v=1.0.0')}}" type="text/javascript"></script>
    <script src="{{asset('js/smooth/smooth-scroll.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.js')}}" type="text/javascript"></script>
    <script>
        const scroll = new SmoothScroll('a[href*="#"]');
    </script>
    <script>
        $('.owl-one').owlCarousel({
            items:3,
            loop:true,
            autoplay:true,
            autoplayTimeout:1000,
            autoplayHoverPause:true
        });

        $('.owl-two').owlCarousel({
            items:1,
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true
        });

        (function () {
            var options = {
                whatsapp: "+62812356789", // WhatsApp number
                call_to_action: "Message us", // Call to action
                position: "right", // Position may be 'right' or 'left'
            };
            var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
@endsection
