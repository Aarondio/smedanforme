@extends('layouts.app')

@section('content')
    {{-- <section class="wrapper image-wrapper bg-image bg-overlay bg-overlay-300 text-white"
        data-image-src="./assets/img/photos/bg3.jpg"> --}}
        <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{ asset('asset/img/photos/bg4.jpg')}}">
        <div class="container pt-13 pb-15 pt-md-15 pb-md-16 text-center">
            <h1 class="display-3 text-white mb-10">Learning Hub</h1>
            <div class="row mb-11">
                <div class="col-md-3 col-lg-3 col-xxl-3 mx-auto mt-3" data-cues="zoomIn" data-group="page-title"
                    data-interval="-200">
                    <div class="card px-0">
                        <div class="card-body text-center px-0">
                            <img src="{{asset('asset/img/icons/lineal/paper.svg')}}"  class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                            <h3 class="py-5">Learning Activities (LA)</h3>
                            <a href="{{route('comingsoon')}}" class="hover-3 more">Learn</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xxl-3 mx-auto mt-3" data-cues="zoomIn" data-group="page-title"
                    data-interval="-200">
                    <div class="card px-0">
                        <div class="card-body text-center px-0">
                            <img src="{{asset('asset/img/icons/lineal/list.svg')}}" class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                            <h3 class="py-5">Learning Series (LS)</h3>
                            <a href="{{route('comingsoon')}}" class="hover-3 more">Learn</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xxl-3 mx-auto mt-3" data-cues="zoomIn" data-group="page-title"
                    data-interval="-200">
                    <div class="card px-0">
                        <div class="card-body text-center px-0">
                            <img src="{{asset('asset/img/icons/lineal/briefcase-2.svg')}}" class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                            <h3 class="py-5">Business Template (BT)</h3>
                            <a href="{{route('comingsoon')}}" class="hover-3 more">Learn</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xxl-3 mx-auto mt-3" data-cues="zoomIn" data-group="page-title"
                    data-interval="-200">
                    <div class="card px-0">
                        <div class="card-body text-center px-0">
                            <img src="{{asset('asset/img/icons/lineal/light-bulb.svg')}}" class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                            <h3 class="py-5">Facts</h3>
                            <a href="{{route('comingsoon')}}" class="hover-3 more">Learn</a>
                        </div>
                    </div>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- /section -->
@endsection
