@extends('layouts.app')
@section('content')
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('asset/img/photos/bg4.jpg') }}">

        <div class="wrapper py-10">
            <div class="container p-0">
                <div class="row">
                    <div class="col-lg-12 col-xxl-12 text-center">
                        <h1 class="display-4 mb-1 text-white">Suin Verification Center</h1>
                        {{-- <p>Tools you can start using for free, and upgrade as you grow.</p> --}}
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>
    <section class="wrapper  ">

        <div class="container py-8 py-md-9">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-success">
                                <p class="mb-0 text-center">Your SUIN has been verified successfully</p>
                            </div>
                            <form action="{{ route('activatesuin') }}" method="POST">
                                @csrf
                                <input type="text" name="id" value="{{ $businessinfo->id }}" hidden>
                                <div class="mb-3">
                                    <label for="phone_number">Smedan Unique identification number</label>
                                    <input type="text" class="form-control" name="suin" id="smedan_number"
                                        value="{{ $response['data']['smedan_number'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="business_name">Business Name:</label>
                                    <input type="text" id="business_name" name="business_name" class="form-control"
                                        value="{{ $response['data']['business_name'] }}" readonly>
                                </div>


                                <div class="mb-3">
                                    <label for="phone_number">Phone Number:</label>
                                    <input type="text" class="form-control" name="phone" id="phone_number"
                                        value="{{ $response['data']['phone_number'] }}" readonly>
                                </div>

                             
                                <div class="mb-3">
                                    <label for="phone_number">Business email:</label>
                                    <input type="text" class="form-control" name="email" id="business_email"
                                        value="{{ $response['data']['business_email'] }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="business_address">Business Address:</label>
                                    <textarea name="address" class="form-control" id="address" rows="4" readonly>{{ $response['data']['business_address'] }}</textarea>

                                </div>
                                <div class="mb-3 d-grid">
                                    <button type="submit" class="btn btn-grape">Proceed</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Add more input fields as needed -->
@endsection
