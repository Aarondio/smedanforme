@extends('layouts.app')

@section('content')
    <style>
        /* *{
                                                                                border: 1px solid red;
                                                                            } */
    </style>
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('asset/img/photos/bg4.jpg') }}">
        {{-- <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('assets/img/photos/bg4.jpg')}}"> --}}

        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xxl-8 text-center">
                        @if (request()->has('id') && request()->query('id') !== null)
                            <h1 class="display-2 mb-1 text-white">Editing {{ $product->name }}</h1>
                            <p>Fill out the form below</p>
                        @else
                            <h1 class="display-2 mb-1 text-white">Income from products and services</h1>
                            <p>Fill out the form below</p>
                        @endif

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
                <aside class="col-lg-2 sidebar sticky-sidebar mt-md-0  d-none d-xl-block">
                    <div class="widget">
                        {{-- <h6 class="widget-title fs-17 mb-2 ps-xl-5">On this page</h6> --}}

                        <div class="card bg-transparent">
                            <div class="card-body p-3 m-0">
                                <nav class="" id="sidebar-nav">
                                    <ul class="list-unstyled fs-sm lh-sm text-reset fw-light">
                                        <li><a class="nav-link  fw-normal" href="{{ route('personal') }}">Personal Info</a>
                                        </li>
                                        <li><a class="nav-link  my-1 fw-normal" href="{{ route('business') }}">Business
                                                Info</a></li>
                                        <li><a class="nav-link fw-normal" href="{{ route('nanoplan') }}">Business
                                                Description</a></li>
                                        <li><a class="nav-link fw-normal " href="{{ route('swot') }}">Swot
                                                Analysis</a></li>

                                        <li><a class="nav-link fw-normal my-1 active text-decoration-underline"
                                                href="{{ route('product') }}">Add
                                                Products/Services</a></li>
                                        <li><a class="nav-link fw-normal" href="{{ route('finance') }}">Expenses Records</a>
                                        </li>
                                        <li><a class="nav-link fw-normal " href="{{ route('preview') }}">Preview
                                                submission</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </aside>
                <div class="col-lg-10 card shadow-lg">
                    <div class="card-body">
                        @if (session('errors'))
                            <div class="alert alert-danger mt-3">
                                <p class="text-danger m-0 p-0">{{ session('errors') }}</p>
                            </div>
                        @endif
                        <h2 class="text-capitalize">Product or service information</h2>
                        <form action="{{ request()->has('id') ? route('update_product') : route('add_product') }}"
                            id="productForm" method="POST">
                            @csrf
                            {{-- <input type="text" name="id" value="{{ $user->id }}" hidden> --}}

                            @if (request()->has('id') && request()->query('id') !== null)
                                <input type="text" name="product_id" value="{{ $product->id }}" hidden>
                            @endif
                            <div class="row text-dark">
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="name" class="mb-3 text-capitalize">Product or service name</label>
                                        <input id="name" name="name" type="text"
                                            value="{{ request()->has('id') ? (old('name') ?: $product->name) : '' }}"
                                            class="form-control" placeholder="e.g Barbing or Biscuit" required>
                                        @error('name')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="price" class="mb-3 "> <span id="pname"></span> - Selling price per unit </label>
                                        <input id="price" name="price" type="text"
                                            value="{{ request()->has('id') ? $product->price : '' }}"
                                            class="form-control number-forma" placeholder="Price per unit" required>
                                        @error('price')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="cost" class="mb-3">Cost of producing a unit of <span
                                                id="pname1"></span></label>
                                        <input id="cost" name="cost" type="text"
                                            value="{{ request()->has('id') ? $product->cost : '' }}"
                                            class="form-control number-forma" placeholder="Cost per unit" required>
                                        @error('cost')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="quantity" class="mb-3">Estimated quantity produced annually</label>
                                        <input id="quantity" name="quantity" type="number"
                                            value="{{ request()->has('id') ? $product->quantity : '' }}"
                                            class="form-control" placeholder="Quanity produced in a year" required>
                                        @error('quantity')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    @if (request()->has('id') && request()->query('id') !== null)
                                        <button class="btn btn-grape text-capitalize" id="update" type="submit">Update
                                            record</button>
                                    @else
                                        <button class="btn btn-grape text-capitalize" id="add"
                                            type="submit">Save</button>
                                    @endif


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
                        window.location.href = "{{ route('myproducts') }}";
                        // $('#error-msg').html('<div class="alert alert-danger">' + xhr.responseJSON.error + '</div>');
                    },
                    complete: function() {
                        $('#add').html('Add product');
                    }
                });
            });

            $('#update').click(function(e) {
                e.preventDefault();
                $(this).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
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
                        console.log('Product updated successfully:', response);
                        window.location.href = "{{ route('myproducts') }}";
                    },
                    error: function(xhr, status, error) {
                        console.error('Failed to update product:', error);
                        $('#error-msg').html('<div class="alert alert-danger">' + xhr
                            .responseJSON.error + '</div>');
                    },
                    complete: function() {
                        $('#update').html('Update product');
                    }
                });
            });

            $('#name').on('input', function() {
                let productName = $(this).val();
                $('#pname').text(productName);
                $('#pname1').text(productName);
            });
        });



        $('form').on('submit', function(event) {
            $('.number-format').each(function() {
                let fieldValue = $(this).val().replace(/,/g, '');
                $(this).data('unformatted-value', fieldValue); // Store unformatted value
                $(this).val(addCommas(fieldValue)); // Set formatted value in input
            });
        });

        // Function to add commas while typing
        $('.number-format').on('input', function(event) {
            let value = $(this).val().replace(/[^0-9]/g, '');
            let formattedValue = addCommas(value);
            $(this).val(formattedValue);
        });

        // Function to prevent non-numeric input
        $('.number-format').on('keypress', function(event) {
            var keyCode = event.which ? event.which : event.keyCode;
            if (keyCode > 31 && (keyCode < 48 || keyCode > 57)) {
                event.preventDefault();
            }
        });

        function addCommas(value) {
            let parts = value.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }
    </script>
@endsection
