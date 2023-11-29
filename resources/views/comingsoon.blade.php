@extends('layouts.app')

@section('content')
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('assets/img/photos/bg4.jpg') }}">
        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <h1 class="display-1 mb-1 text-white text-center">COMING SOON</h1>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
          <center>
            <figure><img class="w-50" src="{{asset('assets/img/illustrations/i14.png')}}" srcset="{{asset('assets/img/illustrations/i14@2x.png 2x')}}" alt="" />
          </center>
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->
    
@endsection
