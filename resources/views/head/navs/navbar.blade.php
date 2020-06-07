<nav class="navbar navbar-expand-lg fixed-top bg-secondary">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="https://demos.creative-tim.com/blk-design-system/index.html" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
                <span>Basmallah •</span> <i>Tour and Travel</i>
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
                            Basmallah •
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
                @foreach($sos as $media)
                    @if($media->socmed == 'facebook')
                        <li class="nav-item p-0">
                            <a class="nav-link" rel="tooltip" title="Follow us on facebook" data-placement="bottom" href="#" target="_blank">
                                <i class="fab fa-facebook"></i>
                                <p class="d-lg-none d-xl-none">{{ $media->socmed }}</p>
                            </a>
                        </li>
                    @endif
                    @if($media->socmed == 'twitter')
                         <li class="nav-item p-0">
                            <a class="nav-link" rel="tooltip" title="Follow us on instgram" data-placement="bottom" href="#" target="_blank">
                               <i class="fab fa-twitter"></i>
                                <p class="d-lg-none d-xl-none">{{ $media->socmed }}</p>
                            </a>
                         </li>
                    @endif
                    @if($media->socmed == 'whatsapp')
                         <li class="nav-item p-0">
                             <a class="nav-link" rel="tooltip" title="Follow us on instgram" data-placement="bottom" href="#" target="_blank">
                                <i class="fab fa-whatsapp-square"></i>
                                <p class="d-lg-none d-xl-none">{{ $media->socmed }}</p>
                             </a>
                         </li>
                    @endif
                    @if($media->socmed == 'instagram')
                         <li class="nav-item p-0">
                             <a class="nav-link" rel="tooltip" title="Follow us on instgram" data-placement="bottom" href="#" target="_blank">
                                 <i class="fab fa-instagram"></i>
                                 <p class="d-lg-none d-xl-none">{{ $media->socmed }}</p>
                             </a>
                         </li>
                    @endif
                    @if($media->socmed == 'telegram')
                         <li class="nav-item p-0">
                             <a class="nav-link" rel="tooltip" title="Follow us on instgram" data-placement="bottom" href="#" target="_blank">
                                 <i class="fab fa-telegram"></i>
                                 <p class="d-lg-none d-xl-none">{{ $media->socmed }}</p>
                             </a>
                         </li>
                    @endif
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="/">Kembali ke Halaman Awal</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
