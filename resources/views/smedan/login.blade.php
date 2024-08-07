<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Smedan Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Smedan Admin Dashboard" name="description" />
    <meta content="Aaron Iliya Dikko" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body class="authentication-bg position-relative">
    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5 position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-lg-5">
                    <div class="position-relative rounded-3 overflow-hidden"
                        style="background-image: url(assets/images/flowers/img-3.png); background-position: top right; background-repeat: no-repeat;">
                        <div class="card bg-transparent mb-0">
                            <!-- Logo-->
                            <div class="auth-brand">
                                <a href="{{ route('staff.login') }}" class="logo-light">
                                    {{-- <img src="assets/images/logo.png" alt="logo" height="22"> --}}
                                    <h4 class="text-uppercase">Smedan</h4>
                                </a>
                                <a href="{{ route('staff.login') }}" class="logo-dark">
                                    <h4 class="text-uppercase">Smedan</h4>
                                    {{-- <img src="assets/images/logo-dark.png" alt="dark logo" height="22"> --}}
                                </a>
                            </div>

                            <div class="card-body p-4">
                                <div class="w-50">
                                    <h4 class="pb-0 fw-bold">Sign In</h4>
                                    <p class="fw-semibold mb-4">Enter your email address and password</p>
                                </div>

                                <form action="{{ route('slogin') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>
                                        <input class="form-control @error('email')  is-invalid @enderror" type="email" name="email" id="emailaddress"
                                            required="" placeholder="Enter your email" value="{{ old('email') }}">
                                        <p class="text-danger">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </p>
                                    </div>

                                    <div class="mb-3">
                                        <a href="auth-recoverpw.html" class="float-end fs-12">Forgot your password?</a>
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" name="password" id="password" class="form-control @error('email')  is-invalid @enderror"
                                                placeholder="Enter your password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin"
                                                checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary w-100" type="submit"> Log In </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>

                    {{-- <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted bg-body">Don't have an account? <a href="auth-register.html" class="text-muted ms-1 link-offset-3 text-decoration-underline"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div> --}}
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt fw-medium">
        <span class="bg-body">
            <script>
                document.write(new Date().getFullYear())
            </script> © Powered by Edufame Data
        </span>
    </footer>
    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>
