@extends('layouts.app')

@section('content')
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <center><img src="{{ asset('asset/img/success.gif') }}" class="text-center" width="100"
                                    alt=""></center>
                            <h1 class="text-center text-success mt-5">Application was submitted successfully</h1>
                            <p class="text-center">Application number</p>
                            <h4 class="text-center">{{$businessinfo->business_no}}</h4>

                            <center class="my-4"><a href="{{route('home')}}" class="btn btn-grape text-center">My Dashboard</a></center>
                            <p class="text-center ">All submitted application will be available on your dashboard and a copy has been sent to your email.</p>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
@endsection
