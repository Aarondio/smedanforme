@extends('layouts.app')

@section('content')
    <section class="wrapper bg-light py-10 py-md-12">

        <div class="container">
            <h4>Welcome, {{ Auth::user()->firstname . ' ' . Auth::user()->surname.' ('.Auth::user()->email.')'}}</h4>
            <div class="row  gy-6 mt-2 justify-content-center">

                <!--/column -->
                <div class="col-md-6 col-lg-6 text-dark">
                    <div class="pricing card ">
                        <div class="card-body shadow-lg">
                            <div class="">

                                <h3 class="card-title text-uppercase">Nano business plan</h3>
                                <p class="fs-16 fw-bold">Evaluate the feasibility and sustainability of micro businesses.</p>

                            </div>

                            <!--/.prices -->
                            <ul class="icon-list bullet-bg bullet-grape mt-3 mb-8 text-left">
                                <li class="mt-5 fs-14"><i class="uil uil-check"></i><span> Start evaluating the feasibility
                                        and sustainability of your business</span></li>
                                <li class="mt-5 fs-14"><i class="uil uil-check"></i><span>Increase access of micro and small
                                        enterprises to professional business development services at low costs.</span></li>
                                <li class="mt-5 fs-14"><i class="uil uil-check"></i><span>Easily evaluate the feasibility of
                                        your business ideas or ventures.</span></li>
                                <li class="mt-5 fs-14"><i class="uil uil-check"></i><span> Structure your operations,
                                        marketing and pricing appropriately towards sustainability and growth.</span></li>

                            </ul>
                            @if (empty($paystack->user_id))
                                <a href="{{ route('purchasenbp') }}" class="btn btn-grape btn-sm">Get Started</a>
                            @else
                                <p class="text-success fw-bold">You have paid for a nano business plan</p>
                                <a href="{{ route('personal') }}" class="btn btn-grape btn-sm">Continue now</a>
                            @endif
                        </div>
                        <!--/.card-body -->
                    </div>
                    <!--/.pricing -->
                </div>
                <div class="col-md-6 col-lg-6 text-dark">
                    <div class="pricing card ">
                        <div class="card-body shadow-lg">
                            <div class="">

                                <h3 class="card-title text-uppercase">Macro business plan</h3>
                                <p class="fs-16 fw-bold">Dig deeper into the feasibility and sustainability of your business
                                </p>

                            </div>

                            <!--/.prices -->
                            <ul class="icon-list bullet-bg bullet-grape mt-3 mb-8 text-left">
                                <li class="mt-5 fs-14"><i class="uil uil-check"></i><span> Start evaluating the feasibility
                                        and sustainability of your business</span></li>
                                <li class="mt-5 fs-14"><i class="uil uil-check"></i><span>Increase access of micro and small
                                        enterprises to professional business development services at low costs.</span></li>
                                <li class="mt-5 fs-14"><i class="uil uil-check"></i><span>Easily evaluate the feasibility of
                                        your business ideas or ventures.</span></li>
                                <li class="mt-5 fs-14"><i class="uil uil-check"></i><span> Structure your operations,
                                        marketing and pricing appropriately towards sustainability and growth.</span></li>

                            </ul>
                            <p class="text-danger fw-bold">We currently do not have any opportunity that requires MBP</p>
                            <a href="{{ route('purchasembp') }}" class="btn btn-grape btn-sm disabled">Get Started</a>
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
