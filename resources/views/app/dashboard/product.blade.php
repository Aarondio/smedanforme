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
                        <h1 class="display-2 mb-1 text-white">Income from products and services</h1>
                        {{-- <p>Fill out the form below</p> --}}
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
           
                {{-- @if (session('success'))
                    <div class="alert alert-success">
                        <p class="text-danger">{{ session('success') }}</p>
                    </div>
                @endif --}}
            
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
                        <h2 class="text-capitalize">Product or service information</h2>
                        <form action="{{ route('add_product') }}" id="productForm" method="POST">
                            @csrf
                            {{-- <input type="text" name="id" value="{{ $user->id }}" hidden> --}}
                            <div class="row text-dark">
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="name" class="mb-3 text-capitalize">Product or service name</label>
                                        <input id="name" name="name" type="text" value=""
                                            class="form-control " placeholder="e.g Barbing or Biscuit" required>
                                        @error('name')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="price" class="mb-3 text-capitalize">Income generated from <span
                                                id="pname"></span></label>
                                        <input id="price" name="price" type="text" value=""
                                            class="form-control " placeholder="Income generated" required>
                                        @error('price')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                {{-- <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="cost" class="mb-3">Cost of producing one product</label>
                                        <input id="cost" name="cost" type="number" value=""
                                            class="form-control" placeholder="Product cost" required>
                                        @error('cost')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div> --}}
                                {{-- <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="quantity" class="mb-3">Estimated quantity produced annually</label>
                                        <input id="quantity" name="quantity" type="number" value=""
                                            class="form-control" placeholder="Quanity produced in a year" required>
                                        @error('quantity')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div> --}}

                                <div class="col-md-6">
                                    <button class="btn btn-grape text-capitalize" id="add" type="submit">Add
                                        now</button>

                                </div>

                                <!-- /.form-floating -->
                        </form>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="justify-content-between d-flex">
                        <div class="col-md-6 align-self-start">
                            <a href="{{ route('nanoplan') }}" class="btn btn-outline-danger btn-sm">Back</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('myproducts') }}" class="float-end btn btn-outline-primary btn-sm">View
                                Products</a>
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
                $(this).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                );

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
                        $('#error-msg').html('<div class="alert alert-danger">' + xhr
                            .responseJSON.error + '</div>');
                    },
                    complete: function() {
                        $('#add').html('Add product');
                    }
                });
            });

            $('#name').on('input', function() {
                let productName = $(this).val();
                $('#pname').text(productName);
            });
        });


        $('.number-format').on('input', function(event) {
            let value = $(this).val().replace(/,/g, ''); // Remove commas for submission
            let formattedValue = addCommas(value); // Format with commas for display
            $(this).val(formattedValue);
        });

        function addCommas(value) {
            let parts = value.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }

        $('form').on('submit', function(event) {
            $('.number-format').each(function() {
                let fieldValue = $(this).val().replace(/,/g,
                ''); // Get the value without commas for submission
                $(this).attr('data-value', fieldValue); // Store the actual value without commas
            });
        });
    </script>
@endsection
