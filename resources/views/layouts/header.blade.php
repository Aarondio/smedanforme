<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Book appointment and submit proposal online">
    <meta name="keywords" content="Book, Appointment, Proposal, events booking">
    <meta name="author" content="elemis">
    <title>SME CREDITS</title>
    <link rel="shortcut icon" href="{{ asset('asset/img/logo/logo.svg') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <link rel="stylesheet" href="./assets/css/colors/navy.css"> -->
    <style>
        * {
            /* border: 1px solid red; */
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <header class="wrapper ">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                      @if (Auth::user() == null)
                        <a href="/" class="fs-26 text-grape fw-bold">Smecredits</a>
                        @else
                        <a href="{{route('home')}}" class="fs-26 text-grape fw-bold">Smecredits</a>
                        @endif
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <h3 class="text-white fs-30 mb-0">Smecredits</h3>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                  @if (Auth::user() == null)
                                  <a class="nav-link fw-normal" href="/">Home</a>
                                  @else
                                  <a class="nav-link fw-normal" href="{{route('home')}}">Dashboard</a>
                                  @endif
                                </li>
                                <li class="nav-item"><a class="nav-link fw-normal" href="/calculator">Loan
                                        calculator</a></li>
                                <li class="nav-item"><a class="nav-link fw-normal" href="/nbp">Nano business plan</a>
                                </li>
                                {{-- <li class="nav-item"><a class="nav-link" href="/about">Micro buisness plan</a></li> --}}
                                <li class="nav-item"><a class="nav-link fw-normal" href="/mbp">Micro business
                                        plan</a></li>
                                <li class="nav-item"><a class="nav-link fw-normal" href="/learn">Learning hub</a></li>
                                <li class="nav-item"><a class="nav-link fw-normal" href="/contact">Contact us</a></li>
                                {{-- <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Services</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="dropdown-item" href="/book">Appointment Booking</a></li>
                  <li class="nav-item"><a class="dropdown-item" href="/proposal">Proposal Submission</a></li>
                  <li class="nav-item"><a class="dropdown-item" href="/event">Event invites</a></li>
                  <li class="nav-item"><a class="dropdown-item" href="/kyc">KYC verification</a></li>
                </ul>
              </li> --}}

                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="offcanvas-footer d-lg-none">
                                <div>
                                    <a href="mailto:info@smecredits.com.ng"
                                        class="link-inverse">info@smecredits.com.ng</a>
                                    <br /> 08101013370 <br />
                                    <nav class="nav social social-white mt-4">
                                        <a href="#"><i class="uil uil-twitter"></i></a>
                                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                                        <a href="#"><i class="uil uil-dribbble"></i></a>
                                        <a href="#"><i class="uil uil-instagram"></i></a>
                                        <a href="#"><i class="uil uil-youtube"></i></a>
                                    </nav>
                                    <!-- /.social -->
                                </div>
                            </div>
                            <!-- /.offcanvas-footer -->
                        </div>
                        <!-- /.offcanvas-body -->
                    </div>
                    <!-- /.navbar-collapse -->
                    <div class="navbar-other w-100 d-flex ms-auto">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item">
                                @if (Auth::user() == null)
                                    <a href="{{ route('login') }}" class="nav-link fw-normal">Sign In</a>
                                @else
                                    <a href="{{ route('logout') }}" class="nav-link fw-normal ">Logout</a>
                                @endif
                                {{-- <a href="#" class="nav-link fw-normal" data-bs-toggle="modal" data-bs-target="#modal-signin">Sign In</a> --}}
                            </li>
                            @if (Auth::user() == null)
                                <li class="nav-item d-none d-md-block">
                                    <a href="{{ route('register') }}"
                                        class="btn btn-sm btn-grape rounded fw-normal">Sign Up</a>
                                    {{-- <a href="#" class="btn btn-sm btn-grape rounded fw-normal" data-bs-toggle="modal" data-bs-target="#modal-signup">Sign Up</a> --}}
                                </li>
                            @endif
                            <li class="nav-item d-lg-none">
                                <button class="hamburger offcanvas-nav-btn"><span></span></button>
                            </li>
                        </ul>
                        <!-- /.navbar-nav -->
                    </div>
                    <!-- /.navbar-other -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->
            {{-- <div class="modal fade" id="modal-signin" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content text-center">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h2 class="mb-3 text-start">Welcome Back</h2>
            <p class="lead mb-6 text-start">Fill your email and password to sign in.</p>
            <form class="text-start mb-3">
              <div class="form-floating mb-4">
                <input type="email" class="form-control" placeholder="Email" id="loginEmail">
                <label for="loginEmail">Email</label>
              </div>
              <div class="form-floating password-field mb-4">
                <input type="password" class="form-control" placeholder="Password" id="loginPassword">
                <span class="password-toggle"><i class="uil uil-eye"></i></span>
                <label for="loginPassword">Password</label>
              </div>
              <a class="btn btn-grape rounded-pill btn-login w-100 mb-2">Sign In</a>
            </form>
            <!-- /form -->
            <p class="mb-1"><a href="#" class="hover">Forgot Password?</a></p>
          
            <!--/.social -->
          </div>
          <!--/.modal-content -->
        </div>
        <!--/.modal-body -->
      </div>
      <!--/.modal-dialog -->
    </div> --}}
            <!--/.modal -->
            {{-- <div class="modal fade" id="modal-signup" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content text-center">
          <div class="modal-body">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h2 class="mb-3 text-start">Sign up to Smecredits</h2>
            <p class="lead mb-6 text-start">Registration takes less than a minute.</p>
            <form class="text-start mb-3">
              <div class="form-floating mb-4">
                <input type="text" class="form-control" placeholder="Name" id="loginName">
                <label for="loginName">Name</label>
              </div>
              <div class="form-floating mb-4">
                <input type="email" class="form-control" placeholder="Email" id="loginEmail">
                <label for="loginEmail">Email</label>
              </div>
              <div class="form-floating password-field mb-4">
                <input type="password" class="form-control" placeholder="Password" id="loginPassword">
                <span class="password-toggle"><i class="uil uil-eye"></i></span>
                <label for="loginPassword">Password</label>
              </div>
              <div class="form-floating password-field mb-4">
                <input type="password" class="form-control" placeholder="Confirm Password" id="loginPasswordConfirm">
                <span class="password-toggle"><i class="uil uil-eye"></i></span>
                <label for="loginPasswordConfirm">Confirm Password</label>
              </div>
              <a class="btn btn-grape rounded-pill btn-login w-100 mb-2">Sign Up</a>
            </form>
            <!-- /form -->
            <p class="mb-0">Already have an account? <a href="#" data-bs-target="#modal-signin" data-bs-toggle="modal" data-bs-dismiss="modal" class="hover">Sign in</a></p>
           
            <!--/.social -->
          </div>
          <!--/.modal-content -->
        </div>
        <!--/.modal-body -->
      </div>
      <!--/.modal-dialog -->
    </div> --}}
            <!--/.modal -->
        </header>
