@extends('layouts.app')

@section('content')
    <div class="container py-10">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                  

                    <div class="card-body">
                        <h3 class="mb-4 text-center">Create an account</h3>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- <div class=" mb-0">
                                <label for="firstname" class="col-md-4 col-form-label ">{{ __('First Name') }}</label>


                                <input id="firstname" placeholder="First name" type="text"
                                    class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                    value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div> --}}

                            <div class="form-floating mb-4">
                                <input id="firstname" type="text"
                                    class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                    value="{{ old('firstname') }}" placeholder="First name" required
                                    autocomplete="name" autofocus>
                                <label for="firstname">First Name</label>
                            </div>
                            <p>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>
                            <!-- /.form-floating -->
                            {{-- <div class="mb-0">
                                <label for="firstname" class="col-md-4 col-form-label ">{{ __('Surname') }}</label>


                                <input id="surname" placeholder="Surname" type="text"
                                    class="form-control @error('surname') is-invalid @enderror" name="surname"
                                    value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div> --}}
                            <div class="form-floating mb-4">
                                <input id="surname" type="text"
                                    class="form-control @error('surname') is-invalid @enderror" name="surname"
                                    value="{{ old('surname') }}" placeholder="Surname" required
                                    autocomplete="name" autofocus>
                                <label for="surname">Surname</label>
                            </div>
                            <p>
                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>

                            {{-- <div class="mb-0">
                                <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>


                                <input id="email" placeholder="Email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div> --}}

                            <div class="form-floating mb-4">
                                <input type="email" class="form-control @error('email') is-invalid @enderror""  name="email"  value="{{ old('email') }}" placeholder="Email" id="email" required autocomplete="email" autofocus>
                                <label for="email">Email</label>
                              </div>
                              <p> @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror</p>

                            {{-- <div class="mb-0">
                                <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>


                                <input id="password" placeholder="Password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div> --}}
                            <div class="form-floating password-field mb-4">
                                <input type="password" class="form-control 
                                @error('password') is-invalid @enderror" placeholder="Password" name="password" id="password" required
                                    autocomplete="current-password">
                                <span class="password-toggle"><i
                                    class="uil uil-eye"></i></span>
                                <label for="password">Password</label>
                            </div>
                            <p> @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>

                            {{-- <div class="mb-0">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label ">{{ __('Confirm Password') }}</label>


                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">

                            </div> --}}

                            <div class="form-floating password-field mb-4">
                                <input type="password" class="form-control" placeholder="Password" name="password_confirmation" id="password-confirm" required
                                    autocomplete="new-password">
                                <span class="password-toggle"><i
                                    class="uil uil-eye"></i></span>
                                <label for="password-confirm">Password</label>
                            </div>
                            <p> @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </p>

                            <div class="d-grid mt-5">

                                <button type="submit" class="btn btn-grape">
                                    {{ __('Register') }}
                                </button>

                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center mt-4">Already registered? <a href="{{route('login')}}">Sign in</a></p>
            </div>
        </div>
    </div>
@endsection
