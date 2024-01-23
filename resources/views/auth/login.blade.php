@extends('layouts.app')

@section('content')
    <div class="container py-10">
        <div class="row justify-content-center">
            <div class="col-md-4">
                {{-- <h1 class="text-center">Account Signin</h1> --}}
                <div class="card">


                    <div class="card-body">
                        <h3 class="mb-4 text-center">Account Signin</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            {{-- <div class=" mb-4">
                                <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>

                                <div class="">
                                    <input id="email" placeholder="Email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Email" id="email" required
                                    autocomplete="email" autofocus>
                                <label for="email">Email</label>
                            </div>
                          
                               
                           

                            <div class="form-floating password-field mb-4">
                                <input type="password"
                                    class="form-control 
                                @error('password') is-invalid @enderror"
                                    placeholder="Password" name="password" id="password" required
                                    autocomplete="current-password">
                                <span class="password-toggle"><i class="uil uil-eye"></i></span>
                                <label for="password">Password</label>
                            </div>
                            <p> @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            @error('email')
                            <p class="small text-danger">
                               {{ $message }}
                           </p>
                           @enderror
                            {{-- <div class="">
                                <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>

                                <div class="">
                                    <input id="password" placeholder="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}






                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-grape">
                                    {{ __('Login') }}
                                </button>


                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <p class="text-center mt-4">Not yet registered? <a href="{{ route('register') }}">Sign up</a></p>
            </div>
        </div>
    </div>
@endsection
