@extends('head.head', ['class' => 'landing-page'])

@section('content')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top navbar-transparent" color-on-scroll="100">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="javascript:void(0)" rel="tooltip" title="OLAF OLAF OLAF OLAF OLAF OLAF" data-placement="bottom" target="_blank">
                    <span>Basmallah •</span> <i>Tour Travel</i>
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a>
                                • Basmallah •
                            </a>
                        </div>
                        <div class="col-6 collapse-close text-right">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('konfirmasi') }}" target="_blank">Konfirmasi</a>
                    </li>
                    <li class="dropdown nav-item">
                        <a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="fa fa-cogs d-lg-none d-xl-none"></i> Jasa
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="javascript:void(0)" class="dropdown-item">
                                <i class="tim-icons icon-paper"></i> Penyewaan Mobil
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#keuntungan">Keuntungan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tour">Tour</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimoni">Testimoni</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header">
            <div class="content-center">
                <div class="row row-grid justify-content-between align-items-center text-left">
                    <div class="col-lg-6 col-md-6">
                        <h1 class="text-white"><strong>Basmallah</strong>
                            <br/>
                            <span class="text-white">Tour and Travel</span>
                        </h1>
                        <p class="text-white mb-3">
                            Agen wisata <i>tour and travel</i> asli lokal yang ingin memperkenalkan daerah wisata yang eksotis di pangandaran.
                            Berdiri dan dikelola oleh putra daerah asli pangandaran. Memberikan pelayanan yang fleksibel serta pengalaman menyenangkan dan beredukasi.
                        </p>
                        <div class="btn-wrapper mb-3">
                            <p class="category text-success d-inline">Info Lebih Lanjut ...</p>
                            <a href="#blk" class="btn btn-success btn-link btn-sm"><i class="tim-icons icon-minimal-right"></i></a>
                        </div>
                        <div class="btn-wrapper">
                            <div class="button-container">
                                <button href="javascript:void(0)" class="btn btn-icon btn-simple btn-round btn-neutral">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button href="javascript:void(0)" class="btn btn-icon btn-simple btn-round btn-neutral">
                                    <i class="fab fa-dribbble"></i>
                                </button>
                                <button href="javascript:void(0)" class="btn btn-icon btn-simple btn-round btn-neutral">
                                    <i class="fab fa-facebook"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5">
                        <img src="{{asset('img/fdev.png')}}" alt="Circle image" class="img-fluid img-center rounded-circle shadow-lg">
                    </div>
                </div>
            </div>
        </div>
        <section class="section section-lg" id="keuntungan">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <hr class="line-info">
                        <h2>Keuntungan memilih Travel kami!</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('img/AKAS-5.png')}}" alt="Circle image" class="img-fluid img-center">
                        <h4 class="info-title">Keuntungan ke-1</h4>
                        <hr class="line-primary">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi egestas lacus porta pretium fermentum. In quis malesuada est. Sed efficitur interdum gravida. In non tellus quis arcu porta rhoncus. Nam diam ipsum, euismod in rutrum eu, sodales vitae massa. Etiam et metus mauris. Phasellus convallis scelerisque varius. Curabitur sollicitudin faucibus semper.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{asset('img/AKAS-10.png')}}" alt="Circle image" class="img-fluid img-center">
                        <h4 class="info-title">Keuntungan ke-2</h4>
                        <hr class="line-warning">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi egestas lacus porta pretium fermentum. In quis malesuada est. Sed efficitur interdum gravida. In non tellus quis arcu porta rhoncus. Nam diam ipsum, euismod in rutrum eu, sodales vitae massa. Etiam et metus mauris. Phasellus convallis scelerisque varius. Curabitur sollicitudin faucibus semper.</p>
                    </div>
                    <div class="col-lg-4">
                        <img src="{{asset('img/AKAS-17.png')}}" alt="Circle image" class="img-fluid img-center">
                        <h4 class="info-title">Keuntungan ke-3</h4>
                        <hr class="line-success">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi egestas lacus porta pretium fermentum. In quis malesuada est. Sed efficitur interdum gravida. In non tellus quis arcu porta rhoncus. Nam diam ipsum, euismod in rutrum eu, sodales vitae massa. Etiam et metus mauris. Phasellus convallis scelerisque varius. Curabitur sollicitudin faucibus semper.</p>
                    </div>
                </div>
            </div>
        </section>
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
                        <div class="col-md-8">
                            <br/><br/>
                            <h3>
                                <a href="{{ url('/listPaket') }}" target="_blank"> <span class="text-info float-md-right">Paket lainnya klik disini</span></a>
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        @foreach( $data->slice(0, 3) as $paket)
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
                                                    <li class="list-group-item">Rp. {{number_format($paket->hargaPaket, 0)}} / Pack</li>
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
        <section class="section section-lg" id="galeri">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <hr class="line-info">
                        <h1>Galeri Pekerjaan</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="owl-one owl-carousel owl-theme">
                    @foreach($dataGal as $gal)
                        <div><img src="{{asset('gl_images/'.$gal->photo)}}" alt="img"></div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="section section-lg" id="testimoni">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <hr class="line-info">
                        <h1>Testimoni Pelanggan</h1>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="owl-two owl-carousel owl-theme">
                    @foreach($dataTes as $testi)
                        <blockquote class="blockquote text-center">
                            <img src="{{asset('ts_images/500/'. $testi->photo)}}" class="img-center img-fluid rounded-circle mb-2" style="width: 150px;">
                            <p class="mb-0" style="font-size: 20px">{{ $testi->testimoni }}</p>
                            <footer class="blockquote-footer">{{ $testi->nama }} <cite title="Source Title">, {{ $testi->instansi }}</cite></footer>
                        </blockquote>
                    @endforeach
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1112.5034290397762!2d107.66047446819192!3d-7.005769643796629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x71ed35f547a65a00!2sKonveksi%20Al%20Fath!5e0!3m2!1sid!2sid!4v1572780320106!5m2!1sid!2sid" width="350" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    </div>
                    <div class="col-md-3">
                        <h3 class="title">Alamat Lengkap :</h3>
                        <div style="color: white" class="footer-info-content">
                            <span>Dusun Bojong Karekes RT/RW 03/15</span>
                            <br><span>Desa Babakan, Kab. Pangandaran, Pangandaran</span>
                            <br><span>Jawa Barat, 46396</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h4 class="title">Basmallah Tour :</h4>
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
                        <h4 class="title">BogorFreunDev :</h4>
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
                    <div class="col-md-3">
                        <h4 class="title">Creativ Tim :</h4>
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
                        <br/>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="https://creative-tim.com/contact-us" class="nav-link">
                                    Contact Us
                                </a>
                                <a href="https://creative-tim.com/about-us" class="nav-link">
                                    About Us
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="https://creative-tim.com/blog" class="nav-link">
                                    Blog
                                </a>
                                <a href="https://opensource.org/licenses/MIT" class="nav-link">
                                    License
                                </a>
                            </div>
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
            items:1,
            loop:true,
            autoplay:true,
            autoplayTimeout:5000,
            autoplayHoverPause:true,
            margin:10,
            autoHeight:true
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
