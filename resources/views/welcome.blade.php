@extends('layouts.app')

@section('content')
    {{-- <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-300 text-white"
        data-image-src="./assets/img/photos/bg3.jpg"> --}}

    <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-400 bg-content text-white"
        data-image-src="./asset/img/photos/bg4.jpg">
        <div class="container pt-16 pb-12" style="z-index: 5; position:relative">
            <div class="row gx-0 gy-12 align-items-center">
                <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 content text-center text-lg-start"
                    data-cues="slideInDown" data-group="page-title" data-delay="600">
                    <h1 class="display-2 mb-5 text-white">We bring rapid solutions for your business</h1>
                    <p class="lead fs-lg lh-sm mb-7 pe-xl-10">Empower your small business dreams with SME Credits! We craft personalized business plans that speak to your vision and aspirations.</p>
                    <div class="d-flex justify-content-center justify-content-lg-start" data-cues="slideInDown"
                        data-group="page-title-buttons" data-delay="900">
                        <span><a href="{{ route('register') }}" class="btn btn-lg btn-white rounded-pill me-2">Get Started</a></span>
                        <span><a href="{{ route('contact') }}" class="btn btn-lg btn-outline-white rounded-pill">Contact Us</a></span>
                    </div>
                </div>
                <!--/column -->
                <div class="col-lg-5 offset-lg-1 d-none d-sm-block">
                          <img src="{{ asset('asset/img/business.jpg')}}" class="img-fluid rounded-4" alt="">
                    {{-- <div class="swiper-container dots-over shadow-lg" data-margin="5" data-nav="true" data-dots="true">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img src="./asset/img/photos/about21.jpg" height="200px" width="200px" class="rounded" alt="" /></div>
                      <div class="swiper-slide"><img src="./asset/img/photos/about23.jpg" height="200px" width="200px" class="rounded" alt="" /></div>
                            </div>
                            <!--/.swiper-wrapper -->
                        </div>
                        <!--/.swiper -->
                    </div> --}}

                    <!-- /.swiper-container -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

{{-- 
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('asset/img/photos/sme.jpg') }}">
        <div class="container pt-10 pb-19 pt-md-12 pb-md-13 text-center">
            <div class="row mb-11">
                <div class="col-md-9 col-lg-7 col-xxl-6 mx-auto" data-cues="zoomIn" data-group="page-title"
                    data-interval="-200">
                    <h2 class="h6 text-uppercase ls-xl text-white mb-5">Hello! welcome to smecredits</h2>
                    <h3 class="display-1 text-white mb-7">We bring rapid solutions for your business</h3>
                    <a href="./assets/media/movie.mp4" class="btn btn-circle btn-white btn-play ripple mx-auto mb-5"
                        data-glightbox><i class="icn-caret-right"></i></a>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section> --}}

    {{-- <section>
      <div class="container pt-9 pb-9 pt-md-9 pb-md-9 text-center">
        <h3>ALL IN ONE PLATFORM FOR BUSINESS EXPANSION</h3>
        <p>SME Credit offers dynamic tools for viability assessment, business planning, post-credit monitoring and financial management, with a free extensive credit compare service at its core.</p>
      </div>
    </section> --}}

    <section class="wrapper bg-light py-10 py-md-12">
        {{-- <div class="container py-14 py-md-16"> --}}
        <div class="text-center px-xl-20">
            <h3 class="text-uppercase">A platform designed to support business growth</h3>
            <p>SME Credit provides a range of dynamic tools. These tools cover viability assessment, business planning,
                post-credit monitoring, and financial management. At its core, SME Credit also offers a free and
                comprehensive service for comparing credits.</p>
        </div>
        {{-- </div> --}}
        {{-- <h2 class="display-5 mb-7 text-center">Our Pricing</h2> --}}
        <div class="pricing-wrapper">
            {{-- <div class="pricing-switcher-wrapper switcher">
            <p class="mb-0 pe-3">Monthly</p>
            <div class="pricing-switchers">
              <div class="pricing-switcher pricing-switcher-active"></div>
              <div class="pricing-switcher"></div>
              <div class="switcher-button bg-grape"></div>
            </div>
            <p class="mb-0 ps-3">Yearly <span class="text-red">(Save 30%)</span></p>
          </div> --}}
            <div class="row gx-0 gy-6 mt-2 justify-content-center">

                <!--/column -->
                <div class="col-md-6 col-lg-3">
                    <div class="pricing card shadow-lg">
                        <div class="card-body ">
                            <div class="text-center">
                                <div class="icon btn btn-circle btn-lg btn-grape pe-none"> <i
                                        class="uil uil-chart-line"></i> </div>
                                <h4 class="card-title">Nano business plan</h4>
                                <p class="fs-14">
                                    Assess the viability and endurance of micro-enterprises..</p>
                                <div class="text-secodn">
                                    <h3 class="fs-16">Features</h3>
                                </div>
                            </div>

                            <!--/.prices -->
                            <ul class="icon-list bullet-bg bullet-grape mt-3 mb-8 text-left">
                                <li><i class="uil uil-check"></i><span> Affordable assessment</span></li>
                                <li><i class="uil uil-check"></i><span>Rapid feasibility appraisal </span></li>
                                <li><i class="uil uil-check"></i><span>Sector analysis</span></li>
                                <li><i class="uil uil-check"></i><span> Financial forecasts</span></li>

                            </ul>
                            <a href="{{ route('nbp') }}" class="btn btn-grape rounded-pill btn-sm">Learn more</a>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.pricing -->
                </div>
                <div class="col-md-6 col-lg-3 mx-5">
                    <div class="pricing card shadow-lg">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="icon btn btn-circle btn-lg btn-grape pe-none"> <i
                                        class="uil uil-signal-alt-3"></i> </div>
                                <h4 class="card-title">Micro business plan</h4>
                                <p class="fs-14">Evaluate the feasibility and sustainability of micro businesses.</p>
                                <div class="text-secodn">
                                    <h3 class="fs-16">Features</h3>
                                </div>
                            </div>
                            <!--/.prices -->
                            <ul class="icon-list bullet-bg bullet-grape mt-3 mb-8 text-left">
                                <li><i class="uil uil-check"></i><span>
                                        Affordable business strategy</span></li>
                                <li><i class="uil uil-check"></i><span>Tailored formatting options</span></li>
                                <li><i class="uil uil-check"></i><span>Macro-level industry review</span></li>
                                <li><i class="uil uil-check"></i><span>Extensive financial forecasts</span></li>
                                {{-- <li><i class="uil uil-check"></i><span> 7/24 <strong>Support</strong></span></li> --}}
                            </ul>
                            <a href="{{ route('mbp') }}" class="btn btn-grape rounded-pill btn-sm">Learn more</a>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.pricing -->
                </div>
                <div class="col-md-6 col-lg-3 mx-5">
                    <div class="pricing card shadow-lg">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="icon btn btn-circle btn-lg btn-grape pe-none"> <i
                                        class="uil uil-briefcase-alt"></i> </div>
                                <h4 class="card-title">Macro business plan</h4>
                                <p class="fs-14">Evaluate the feasibility and sustainability of micro businesses.</p>
                                <div class="text-secodn">
                                    <h3 class="fs-16">Features</h3>
                                </div>
                            </div>
                            <!--/.prices -->
                            <ul class="icon-list bullet-bg bullet-grape mt-3 mb-8 text-left">
                                <li><i class="uil uil-check"></i><span>Affordable planning </span></li>
                                <li><i class="uil uil-check"></i><span>Customizable formatting </span></li>
                                <li><i class="uil uil-check"></i><span>Industry analysis</span></li>
                                <li><i class="uil uil-check"></i><span>financial projections</span></li>
                                {{-- <li><i class="uil uil-check"></i><span> 7/24 <strong>Support</strong></span></li> --}}
                            </ul>
                            <a href="{{ route('nbp') }}" class="btn btn-grape rounded-pill btn-sm">Learn more</a>
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.pricing -->
                </div>

                <!--/column -->

            </div>
            <!--/.row -->
        </div>
        <!--/.pricing-wrapper -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
@endsection
