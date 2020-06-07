@extends('head.head', ['class' => 'register-page'])

@push('meta')
    <meta name="description" content="{{ $data['meta']['meta_description'] }}">
    <meta name="og:title" content="{{ $data['meta']['og_title'] }}">
    <meta name="og:description" content="{{ $data['meta']['og_description'] }}">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="{{ $data['meta']['twitter_title'] }}">
    <meta name="twitter:description" content="{{ $data['meta']['twitter_description'] }}">

    @isset($data['meta']['canonical_link'])
        <link rel="canonical" href="{{ $data['meta']['canonical_link'] }}"/>
    @endisset

    @isset($data['post']->featured_image)
        <meta name="og:image" content="{{ url($data['post']->featured_image) }}">
        <meta name="twitter:image" content="{{ url($data['post']->featured_image) }}">
    @endisset
@endpush

@section('content')
    @include('head.navs.navbarthree')
    <div class="wrapper">
        <div class="section section-lg">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-6 offset-lg-0 offset-md-3"></div>
                        <div class="col-lg-8 col-md-6 offset-lg-0 offset-md-3 justify-content-md-center">
                            <h1 class="font-serif pt-5 mb-4 @unless($data['post']->summary) mb-4 @endif">{{ $data['post']->title }}</h1>

                            <div class="media py-1">
                                <img src="{{ $data['avatar'] }}"
                                     class="mr-3 rounded-circle shadow-sm"
                                     style="width: 50px"
                                     alt="{{ $data['author']->name }}">
                                <div class="media-body">
                                    <p class="mt-0 mb-1 font-weight-bold">{{ $data['author']->name }}</p>
                                    <span class="text-muted">{{ \Carbon\Carbon::parse($data['post']->published_at)->formatLocalized('%b %d') }} — {{ $data['post']->read_time }}</span>
                                </div>
                            </div>
                            @isset($data['post']->featured_image)
                                <img src="{{ $data['post']->featured_image }}" class="w-100 pt-4"
                                     @isset($data['post']->featured_image_caption) alt="{{ $data['post']->featured_image_caption }}"
                                     title="{{ $data['post']->featured_image_caption }}" @endisset>
                                @isset($data['post']->featured_image_caption)
                                    <p class="text-muted text-center pt-3" style="font-size: 0.9rem">{!! $data['post']->featured_image_caption !!}</p>
                                @endisset
                            @endisset
                            <div class="post font-serif mt-4"  style="font-size: 20px">{!! $data['post']->body !!}</div>
                            <br/><br/>
                            <div>
                                <h4>Tags for this Post</h4>
                                @if ($data['post']->tags->count() > 0)
                                    <div>
                                        @foreach ($data['post']->tags as $tag)
                                            <a class="btn btn-sm btn-info" href="{{ url('/tag', $tag->slug) }}">{{ $tag->name }}</a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="border-top my-3"></div>
                            <div id="fb-root"></div>
                            <script
                                async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=325202681460372&autoLogAppEvents=1">
                            </script>
                            <div class="media py-1">
                                <img src="{{ $data['avatar'] }}"
                                     class="mr-3 rounded-circle shadow-sm"
                                     style="width: 80px"
                                     alt="{{ $data['author']->name }}">
                                <div class="media-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>WRITTEN BY</p>
                                            <p class="mt-0 mb-1 font-weight-bold" style="font-size: 20px">{{ $data['author']->name }}</p>
                                            <p>{{ $data['summary'] }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fb-share-button" style="float:right;" data-href="http://127.0.0.1:8000/pesona-pantai-barat-pangandaran" data-layout="button" data-size="large">
                                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2Fpesona-pantai-barat-pangandaran&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
                                            </div>
                                            <div style="float: right">
                                                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                                            </div>
                                            <div style="float: right">
                                                <a class="twitter-share-button"
                                                   href="https://twitter.com/intent/tweet?text=Hello%20world"
                                                   data-size="large">
                                                    Tweet</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-top my-3"></div>
                        </div>
                        <div class="col-lg-2 col-md-6 offset-lg-0 offset-md-3"></div>
                    </div>
                    <br/>
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
    <script>window.twttr = (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function(f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));
    </script>
@endsection
