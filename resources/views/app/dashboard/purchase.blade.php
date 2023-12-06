@extends('layouts.app')

@section('content')
<section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('assets/img/photos/bg20.png')}}">
    {{-- <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('assets/img/photos/bg20.png"></section> --}}
        <div class="wrapper py-10">
            <div class="container p-0">
                <div class="row">
                    <div class="col-lg-12 col-xxl-12 text-center">
                        <h1 class="display-2 mb-1 text-white">Your all-in-one platform for Business</h1>
                        <p>Tools you can start using for free, and upgrade as you grow.</p>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
                <style>
                    *{
                        /* border: 1px solid red; */
                    }
                </style>
             
                  <!-- /.nav-tabs -->
              
                  <!-- /.tab-content -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>

    <section class="wrapper bg-light py-5 py-md-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-8">
                    <ul class="nav nav-tabs m-0 p-0  nav-tabs-bg nav-tabs-shadow-lg d-flex justify-content-center  flex-lg-row flex-column  ">
                        <li class="nav-item m-0 bg-gray  "> 
                          <a class="nav-link d-flex flex-row active rounded-0 justify-content-center" data-bs-toggle="tab" href="#tab2-1">

                            <div class="text-center">
                              <h5 class="mb-1">Credit Compare</h5>
                              <p class="fs-14">One stop credit service</p>
                            </div>
                          </a> 
                        </li>
                        <li class="nav-item  m-0 bg-gray "> 
                          <a class="nav-link d-flex flex-row rounded-0 justify-content-center" data-bs-toggle="tab" href="#tab2-2">
                    
                            <div class="text-center">
                              <h4 class="mb-1">Nano Business plan</h4>
                              <p>Description</p>
                            </div>
                          </a> 
                        </li>
                        <li class="nav-item  m-0 bg-gray "> 
                          <a class="nav-link d-flex flex-row rounded-0 justify-content-center" data-bs-toggle="tab" href="#tab2-3">
             
                            <div class="text-center">
                              <h4 class="mb-1">Macro business plan</h4>
                              <p>Description</p>
                            </div>
                          </a> 
                        </li>
                      </ul>
                </div>
            </div>
         
            <center>
               
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab2-1">
                        <div class="col-md-6 col-lg-3 mt-12">
                            <div class="pricing card text-center">
                              <div class="card-body">
                                <img src="{{asset('assets/img/icons/lineal/briefcase-2.svg')}}" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                                <h4 class="card-title">Credit Compare</h4>
                                <div class="prices text-dark my-8">
                                  <div class="price price-show"><span class="price-value display-4">Free</span> </div>
                                  <p class="text-danger">Unavailable</p>
                                </div>
                                <!--/.prices -->
                                <a href="#" class="btn btn-grape rounded-pill disabled">Compare</a>
                              </div>
                              <!--/.card-body -->
                            </div>
                            <!--/.pricing -->
                          </div>
                    </div>
                    <!--/.tab-pane -->
                    <div class="tab-pane fade" id="tab2-2">
                        <div class="col-md-6 col-lg-3 mt-12">
                            <div class="pricing card text-center">
                              <div class="card-body">
                                <img src="{{asset('assets/img/icons/lineal/briefcase-2.svg')}}" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                                <h4 class="card-title">Nano business plan</h4>
                                <div class="prices text-dark my-8">
                                  <div class="price price-show"><span class="price-currency display-4">₦</span><span class="price-value display-4">5,000</span> </div>
                                </div>
                                <!--/.prices -->
                               
                                
                                <a href="https://paystack.com/pay/smecreditsfee" class="btn btn-grape rounded-pill">Compare</a>
                              </div>
                              <!--/.card-body -->
                            </div>
                            <!--/.pricing -->
                          </div>
                    </div>
                    <div class="tab-pane fade" id="tab2-3">
                        <div class="col-md-6 col-lg-3 mt-12">
                            <div class="pricing card text-center">
                              <div class="card-body">
                                <img src="{{asset('assets/img/icons/lineal/briefcase-2.svg')}}" class="svg-inject icon-svg icon-svg-md text-primary mb-3" alt="" />
                                <h4 class="card-title">Macro business plan</h4>
                                <div class="prices text-dark my-8">
                                  <div class="price price-show"><span class="price-currency display-4">₦</span><span class="price-value display-4">10,000</span> </div>
                                  <p class="text-danger">Unavailable</p>
                                </div>
                                <!--/.prices -->
                               
                                <a href="#" class="btn btn-grape rounded-pill disabled">Pay now</a>
                              </div>
                              <!--/.card-body -->
                            </div>
                            <!--/.pricing -->
                          </div>
                    </div>
                    <!--/.tab-pane -->
                  </div>
               
            </center>
        </div>
    </section>


@endsection
