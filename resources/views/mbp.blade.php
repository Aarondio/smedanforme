@extends('layouts.app')

@section('content')
<section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('asset/img/photos/bg4.jpg')}}">
        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row">
                    <div class="col-lg-10 col-xxl-8 ">
                        <h1 class="display-2 mb-1 text-white">An Enhanced view on the Feasibility and Sustainability of your business.</h1>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
                <div class="text-center mt-10">
                    <a href="{{route('purchasembp')}}" class="btn btn-white">Get Started <i
                        class="uil uil-arrow-right display-6"></i></a>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>

    <section>
        <div class="container  pt-10 pt-md-12">
            <h3 class="text-center">WHAT YOU GET</h3>
            <div class="row">
                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-5">
                                    <img src="{{ asset('asset/img/icons/lineal/search.svg')}}"
                                        class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                                </div>
                                <div>
                                    <h3>High Quality Research</h3>
                                    <p>Quality research on the macro economy and sector of focus</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-5">
                                    <img src="{{ asset('asset/img/icons/lineal/bar-chart.svg')}}"
                                        class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                                </div>
                                <div>
                                    <h3>Business Evaluation</h3>
                                    <p>Evaluation across operations, marketing and financing areas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-5">
                                    <img src="{{ asset('asset/img/icons/lineal/briefcase-2.svg')}}"
                                        class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                                </div>
                                <div>
                                    <h3>Assessment of viability</h3>
                                    <p>Evaluation across operations, marketing and financing areas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-5">
                                    <img src="{{ asset('asset/img/icons/lineal/clock-3.svg')}}"
                                        class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                                </div>
                                <div>
                                    <h3>Convenient, Real time access</h3>
                                    <p>Evaluation across operations, marketing and financing areas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="me-5">
                                    <img src="{{ asset('asset/img/icons/lineal/handshake.svg')}}"
                                        class="svg-inject icon-svg icon-svg-sm text-primary" alt="" />
                                </div>
                                <div>
                                    <h3>Professional Consulting Services</h3>
                                    <p>Evaluation across operations, marketing and financing areas</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container py-12 py-md-12">
            <h1 class="text-center">HOW IT WORKS</h1>
            <div class="row">
                <div class="col-md-4 mt-5">
                    <div class="card p-0">
                        <div class="card-header px-5 bg-purple text-white py-1">
                           <span class="display-6"> 1.</span> Get Started
                        </div>
                        <div class="card-body px-5 p-0 pt-2">
                            <p>Create a secure account</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card p-0">
                        <div class="card-header px-5 bg-purple text-white py-1">
                           <span class="display-6"> 2. </span> Answer Simple Questions
                        </div>
                        <div class="card-body px-5 p-0 pt-2">
                            <p>Create a secure account</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-5">
                    <div class="card p-0">
                        <div class="card-header px-5 bg-purple text-white py-1">
                           <span class="display-6">  3.</span> Receive your NBP Report
                        </div>
                        <div class="card-body px-5 p-0 pt-2">
                            <p>Create a secure account</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-10">
                <a href="#" class="btn btn-outline-grape">Get Started <i
                        class="uil uil-arrow-right display-6"></i></a>
            </div
        </div>
    </section>
@endsection
