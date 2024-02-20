@extends('layouts.app')

@section('content')
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('assets/img/photos/bg20.png') }}">
        {{-- <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('assets/img/photos/bg4.jpg')}}"> --}}

        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xxl-8 text-center">
                        <h1 class="display-2 mb-1 text-white">Account statement</h1>
                        <p>Fill out the form below</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.wrapper -->
    </section>
    <section class="wrapper bg-gray py-10 py-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <form action="{{ url('/upload-pdf') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="pdf" accept=".pdf" required>
                        <button type="submit">Upload PDF</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
