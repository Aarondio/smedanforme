@extends('layouts.app')

@section('content')
    <div class="container my-10">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    {{-- <div class="card-header text-dark">{{ __('Welcome back,') . Auth::user()->firstname }}</div> --}}
                    <div class="card-header text-dark">
                        <h4>Welcome,
                            {{ Auth::user()->firstname . ' ' . Auth::user()->surname  }}</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- <p>{{ __('You are logged in!') }}</p> --}}
                        {{-- <p>Click on the button to continue your application</p> --}}
                        
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mt-3">
                                <div class="pricing card text-center" style="height: 250px">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/img/sterlingbank.png') }}" height="70"
                                            height="180" alt="" />
                                        <h4 class="card-title mt-5">Sterling Bank Loan</h4>
                                        <a href="{{route('personalinfo')}}" class="btn btn-grape">Apply now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mt-3">
                                <div class="pricing card text-center" style="height: 250px">
                                    <div class="card-body">
                                        <img src="{{ asset('assets/img/smedan_logo.png') }}" class="" height="70"
                                            alt="" />
                                        <h4 class="card-title mt-5">Matching funds</h4>
                                        @if (empty($paystack->user_id))
                                            <a href="{{ route('purchasenbp') }}" class="btn btn-grape ">Apply now</a>
                                        @else
                                            <a href="{{ route('personal') }}" class="btn btn-grape ">Continue now</a>
                                        @endif
                                        {{-- <a href="#" class="btn btn-grape">Apply now</a> --}}
                                    </div>
                                    <!--/.card-body -->
                                </div>
                                <!--/.pricing -->
                            </div>
                        </div>

                        {{-- <a href="{{ route('personal') }}" class="btn btn-grape mt-15">Start now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection