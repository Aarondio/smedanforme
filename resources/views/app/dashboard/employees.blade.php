@extends('layouts.app')

@section('content')
    <style>
        /* *{
                                    border: 1px solid red;
                                } */
    </style>
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('assets/img/photos/bg20.png') }}">
        {{-- <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('assets/img/photos/bg4.jpg')}}"> --}}

        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xxl-8 text-center">
                        <h1 class="display-2 mb-1 text-white">Employees Information</h1>
                        <p>Fill out the form below</p>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>
    <section class="wrapper bg-gray py-10 py-md-12">
        <div class="container">
            {{-- <p class="text-danger">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </p> --}}
            <center>
                <div id="error-msg" class="col-md-10">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                </div>
            </center>
            <!-- /section -->
            <div class="row justify-content-center ">
                <div class="col-md-10 card shadow-lg">
                    <div class="card-body">
                        <h2>Employees Information</h2>
                        <form action="{{ route('add_product') }}" id="productForm" method="POST">
                            @csrf
                            {{-- <input type="text" name="id" value="{{ $user->id }}" hidden> --}}
                            <div class="row text-dark">
                           
                                <div class="col-md-6">

                                    {{-- 
                                        
                                        'businessinfo_id',
                                    'ceo',
                                    'pro_manager',
                                    'workers',
                                    'marketers',
                                    'other_employees',
                                    
                                    --}}
                                    <div class=" mb-4">
                                        <label for="ceo" class="mb-3">Number of Chief Executive Office</label>
                                        <div class="input-group">
                                            {{-- <button class="btn btn-primary">Numbers  of C.E.O</button> --}}
                                            <input id="ceo" name="ceo" type="number" value=""
                                            class="form-control" placeholder="E.g 1" required>
                                        </div>
                                        @error('ceo')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="pro_manager" class="mb-3">Number of Production Manager</label>
                                        <div class="input-group">
                                            {{-- <button class="btn btn-primary">Numbers  of P.M</button> --}}
                                            <input id="pro_manager" name="pro_manager" type="number" value=""
                                            class="form-control" placeholder="E.g 1" required>
                                        </div>
                                        @error('pro_manager')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="workers" class="mb-3">Number of Workers</label>
                                        <div class="input-group">
                                            {{-- <button class="btn btn-dark">Numbers of Workers</button> --}}
                                            <input id="workers" name="workers" type="number" value=""
                                            class="form-control" placeholder="E.g 1" required>
                                        </div>
                                        @error('workers')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="marketers" class="mb-3">Numbers of Marketers</label>
                                        <div class="input-group">
                                            {{-- <button class="btn btn-primary">Numbers  of C.E.O</button> --}}
                                            <input id="marketers" name="marketers" type="number" value=""
                                            class="form-control" placeholder="E.g 1" required>
                                        </div>
                                        @error('marketers')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="other_employees" class="mb-3">Numbers of Other Types of Employee not listed</label>
                                        <div class="input-group">
                                            
                                            <input id="other_employees" name="other_employees" type="number" value=""
                                            class="form-control" placeholder="E.g 1" required>
                                        </div>
                                        @error('other_employees')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                              
                            
                                <div class="col-md-12">
                                    <button class="btn btn-grape" id="add" type="submit">Save Employees Record</button>

                                </div>
                                
                                <!-- /.form-floating -->
                        </form>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="justify-content-between d-flex">
                        <div class="col-md-6 align-self-start">
                            <a href="{{route('nanoplan')}}" class="btn btn-outline-danger btn-sm">Back</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('myproducts') }}" class="float-end btn btn-outline-primary btn-sm">View Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#add').click(function(e) {
                e.preventDefault();
                $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...');
    
                var formData = $('#productForm').serialize();
    
                $.ajax({
                    url: $('#productForm').attr('action'),
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        console.log('Product added successfully:', response);
                        window.location.href = "{{ route('myproducts') }}";
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to add product:', error);
                        $('#error-msg').html('<div class="alert alert-danger">' + xhr.responseJSON.error + '</div>');
                    },
                    complete: function() {
                        $('#add').html('Add product');
                    }
                });
            });
        });
    </script>
    
    
@endsection
