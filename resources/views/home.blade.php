@extends('layouts.app')

@section('content')
    <div class="container my-10">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card">
                    {{-- <div class="card-header text-dark">{{ __('Welcome back,') . Auth::user()->firstname }}</div> --}}
                    <div class="card-header text-dark">
                        <h4>Welcome,
                            {{ Auth::user()->firstname . ' ' . Auth::user()->surname . ' (' . Auth::user()->email . ')' }}
                        </h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- <p>{{ __('You are logged in!') }}</p> --}}
                        {{-- <p>Click on the button to continue your application</p> --}}
                        <p class="m-0 fw-bold text-dark">Available loan</p>
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mt-3">
                                <div class="pricing card text-center" style="height: 250px">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/img/sterlingbank.png') }}" height="70" height="180"
                                            alt="" />
                                        <h4 class="card-title mt-5">Sterling Bank Loan</h4>
                                        @if (empty($plan_two->user_id))
                                            <a href="{{ route('purchasenbp') }}" class="btn btn-grape ">Apply now</a>
                                        @else
                                            @if ($business_two && $business_two->status == 'Completed')
                                                <a class="btn btn-grape disabled">Application Submitted</a>
                                            @else
                                                <a href="{{ route('personalinfo') }}" class="btn btn-grape ">Continue
                                                    now</a>
                                            @endif
                                        @endif
                                        {{-- <a href="{{ route('personalinfo') }}" class="btn btn-grape">Apply now</a> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mt-3">
                                <div class="pricing card text-center" style="height: 250px">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/img/smedan_logo.png') }}" class="" height="70"
                                            alt="" />
                                        <h4 class="card-title mt-5">Matching funds</h4>
                                        @if (empty($plan_one->user_id))
                                            <a href="{{ route('purchasenbp') }}" class="btn btn-grape ">Apply now</a>
                                        @else
                                            @if ($business_one && $business_one->status == 'Completed')
                                                <a class="btn btn-grape disabled">Application Submitted</a>
                                            @else
                                                <a href="{{ route('personal') }}" class="btn btn-grape ">Continue now</a>
                                            @endif
                                        @endif
                                        {{-- <a href="#" class="btn btn-grape">Apply now</a> --}}
                                    </div>
                                    <!--/.card-body -->
                                </div>
                                <!--/.pricing -->
                            </div>
                        </div>


                    </div>




                    {{-- <a href="{{ route('personal') }}" class="btn btn-grape mt-15">Start now</a> --}}
                </div>
            </div>

            {{-- <div class="row justify-content-center"> --}}
            @if ($business_plans->isNotEmpty())
                <div class="col-md-12 col-lg-10 mt-10">


                    <div class="card">
                        <div class="card-header text-dark">
                            <h4>Submitted Applications</h4>
                        </div>
                        <div class="card-body">


                            <div class="row">

                                @foreach ($business_plans as $business_plan)
                                    <div class="col-md-6 col-lg-4 mt-5">
                                        <div class=" card text-center card-border-start border-grape">
                                            <div class="card-body bg-pale-primary">

                                                <h4 class="card-title mt-5">
                                                    <p class="m-0 fs-16">You've applied for a</p>
                                                    @if ($business_plan->plan_type == 2)
                                                        <span class="text-grape"> {{ 'Sterling Bank Loan' }}</span>
                                                    @else
                                                        {{ 'Matching fund Loan' }}
                                                    @endif
                                                    For your company <span
                                                        class="text-grape">{{ $business_plan->business_name }}</span>
                                                </h4>
                                                <h5 class="text-primary">{{ $business_plan->business_no }}</h5>

                                                @if ($business_plan->plan_type == 2)
                                                    <a href="{{ route('previewinfo') }}" class="btn btn-grape">Preview</a>
                                                @else
                                                    <a href="{{ route('preview') }}" class="btn btn-grape">Preview</a>
                                                @endif

                                            </div>
                                            <!--/.card-body -->
                                        </div>
                                        <!--/.pricing -->
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- </div> --}}
        </div>
    </div>
    </div>
@endsection
