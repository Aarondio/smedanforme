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
                        <h1 class="display-2 mb-1 text-white">Startup Cost</h1>
                        <p>Fill out the form below</p>
                    </div>
                </div>
            </div>
        </div>
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
                        <h2>Financial Record</h2>
                        <div class="alert alert-success">
                             <p>This is a very sensitive section kindly fill out the correct information. If you do not have any information for a particular field you can leave it empty.</p>
                        </div>
                   
                        <form action="{{ route('add_product') }}" id="productForm" method="POST">
                            @csrf
                            {{-- <input type="text" name="id" value="{{ $user->id }}" hidden> --}}
                            <div class="row text-dark">
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="name" class="mb-1">Year</label>
                                         <select name="year" id="year" class="form-select">
                                             @for($i = 2020; $i < 2023; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                             @endfor
                                         </select>
                                        @error('name')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="salary" class="mb-1">Salaries</label>
                                        <input id="salary" name="salary" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('salary')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="securities" class="mb-1">Social securities</label>
                                        <input id="securities" name="securities" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('securities')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="rent" class="mb-1">Rent</label>
                                        <input id="rent" name="rent" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('rent')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                               
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="utilities" class="mb-1">Utilities</label>
                                        <input id="utilities" name="utilities" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('utilities')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="depreciation" class="mb-1">Depreciation</label>
                                        <input id="depreciation" name="depreciation" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('depreciation')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="adminexpenses" class="mb-1">  Admininstrative expenses</label>
                                        <input id="adminexpenses" name="adminexpenses" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('adminexpenses')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="marketing" class="mb-1"> Marketing</label>
                                        <input id="marketing" name="marketing" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('marketing')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="supplies" class="mb-1">Supplies and other purchases</label>
                                        <input id="supplies" name="supplies" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('supplies')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="licences" class="mb-1"> Licences</label>
                                        <input id="licencess" name="licences" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('licences')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="consultation" class="mb-1">Consultation</label>
                                        <input id="consultation" name="consultation" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('consultation')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                           
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="internet" class="mb-1">Internet and Telephone</label>
                                        <input id="internet" name="internet" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('internet')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="legal" class="mb-1">Legal Fees</label>
                                        <input id="legal" name="legal" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('legal')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="miscell" class="mb-1">Miscellaneous</label>
                                        <input id="miscell" name="miscell" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('miscell')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="insurance" class="mb-1">Insurance</label>
                                        <input id="insurance" name="insurance" type="number" value=""
                                            class="form-control" placeholder="E.g 300,000" required>
                                        @error('insurance')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                              
                     

                                <div class="col-md-6">
                                    <button class="btn btn-grape" id="add" type="submit">Add Record</button>

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
        });
    </script>
@endsection
