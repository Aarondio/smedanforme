@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 py-10">
                <div class="card py-5">
                    {{-- <div class="card-header">{{ __('Verify Your Email Address') }}</div> --}}

                    <div class="card-body text-center">
                        @if (session('resent'))
                            <p> <img src="{{ asset('asset/img/email.gif') }}" alt=""></p>
                            <div class="alert alert-success" role="alert">

                                {{ __('A new verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        @if (empty(session('resent')))
                            <p> <img src="{{ asset('asset/img/email.gif') }}" alt=""></p>
                            {{ __('A verification link has been sent to your email') }}
                        @endif
                        <p class="text-grape"> {{ Auth::user()->email }}</p>
                       <p> {{ __('If you did not receive the email') }}</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-grape ">{{ __('click here to request ') }}</button>.
                        </form>

                        <p class="m-0 small p-0 mt-5 text-danger">You can check the spam folder if response is delayed</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
