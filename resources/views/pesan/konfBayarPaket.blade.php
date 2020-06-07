@extends('head.head', ['class' => 'register-page'])

@section('content')
    @include('head.navs.navbarfour')
    <div class="wrapper">
        <div class="section section-lg">
            <div class="content">
                <div class="container">
                    <br/>
                    <h2 style="text-align: center">KONFIRMASI PEMBAYARAN</h2>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                            <div class="card card-register">
                                <br/>
                                <h2 class="card-title" style="text-align: center">Nomor Rekening</h2>
                                <div class="card-body" style="text-align: center">
                                    <h4>Bank Mandiri</h4>
                                    <p>No. Rek : 0060006969293</p>
                                    <p>a/n Khalifa International Bussiness</p>
                                    <h4>Bank BCA</h4>
                                    <p>No. Rek : 5530357271</p>
                                    <p>a/n Meriawati S</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 offset-lg-0 offset-md-3">
                            <div class="card card-register">
                                <div class="card-body">
                                    <form method="post" action="{{ url('konfirmasi/simpan') }}" autocomplete="off" enctype="multipart/form-data">
                                        @csrf
                                        <p>Informasi Pemesan</p>
                                        <div class="form-row">
                                            <div class="input-group col-md-">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-single-02"></i>
                                                    </div>
                                                </div>
                                                <input type="text" style="color: white" class="form-control" name="namaLengkap" value="{{ $kodeBayar->nama }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="input-group col-md-6">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-email-85"></i>
                                                    </div>
                                                </div>
                                                <input type="text" style="color: white" value="{{ $kodeBayar->email }}" name="email" class="form-control" readonly>
                                            </div>
                                            <div class="input-group col-md-6">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-tablet-2"></i>
                                                    </div>
                                                </div>
                                                <input type="number" style="color: white" value="{{ $kodeBayar->telepon }}" name="telepon" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <p>Informasi Pembayaran</p>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="invoice">Kode Bayar</label>
                                                <input type="text" class="form-control" id="kodeBayar" name="kodeBayar" style="color: white" value="{{ $kodeBayar->kodeBayar }}" readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="invoice">Invoice</label>
                                                <input type="text" class="form-control" id="invoice" name="invoice" style="color: white" value="{{ $kodeBayar->invoice }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="namaRek">Nama Rekening Pengirim</label>
                                                <input type="text" class="form-control" id="namaRek" name="namaRek" placeholder="Atas Nama">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="form-group">
                                                    <label for="asalTF">Nomor Rekening Pengirim</label>
                                                    <input type="number" class="form-control" id="asalTF" name="asalTF" placeholder="Nomor Rek">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="tanggalTF">Tanggal Transfer</label>
                                                <input data-provide="datepicker" id="tanggalTF" data-date-format="yyyy-mm-dd" class="form-control datepicker" placeholder="Pilih Tanggal Transfer" name="tanggalTF" type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="tujuanTF">Pembayaran ke </label>
                                                <select style="color: black" id="tujuanTF" name="tujuanTF" class="form-control">
                                                    <option selected>---Pilih Pembayaran---</option>
                                                    <option value="bankmandiri">Bank Mandiri</option>
                                                    <option value="bankbca">Bank BCA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="jumlahTF">Jumlah Transfer</label>
                                                <input type="number" class="form-control" id="jumlahTF" name="jumlahTF" placeholder="Jumlah Transfer">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="jumlahTF">Jumlah sisa pembayaran</label>
                                                <input class="form-control" id="sisaBayar" name="sisaBayar" style="color: white" value="{{ $showSisa }}" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Bukti Transfer</label>
                                            <div class="form-group">
                                                <input type="file" class="form-control" id="buktiTF" name="buktiTF">
                                                <label class="form-control" for="buktiTF">Pilih Bukti Transfer</label>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button onclick="return confirm('Apakah data yang anda isi sudah benar dan valid ?')" type="submit" class="btn btn-success mt-4">{{ __('KIRIM!') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
