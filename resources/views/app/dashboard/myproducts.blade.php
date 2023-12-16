@extends('layouts.app')

@section('content')
    <section class="wrapper bg-light py-5 py-md-10">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <h1 class="text-left text-capitalize">Products and services</h1>
                    <div class="alert alert-info border-success">
                        <p class="text-dark">All the products and service you add will be available here. You can click on the button below to
                            add new records</p>
                         <div class="d-flex justify-content-between flex-column flex-lg-row">
                            <a class="btn btn-info btn-sm text-white text-capitalize mt-2" href="{{ route('product') }}">Add new
                                Product/Service</a>
                            <a class="btn btn-outline-warning btn-sm  text-capitalize mt-2" href="{{ route('preview') }}">Preview Application</a>
                         </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            <p class="text-dark m-0 p-0">{{ session('success') }}</p>
                        </div>
                    @endif

                </div>
            </div>
            <div class="row justify-content-center">

                {{-- @if (empty($products))
                    <div class="col-md-8 col-lg-8">

                        <div class="card mt-3 shadow-lg ">
                            <h3>You have not added any products yet!</h3>
                        </div>
                    </div>
                @else --}}
                @php
                    $sn = 1;
                @endphp
                @if ($products->isNotEmpty())
                    @foreach ($products as $product)
                        <div class="col-md-8 col-lg-8">

                            <div class="card mt-3 shadow-lg ">
                                <div class="card-body py-2 px-4">
                                    <div class="row justify-content-between">
                                        <div class="col-md-8 col-lg-6">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="text-muted p-0 m-0">Product Name</p>
                                                    <p class="p-0 m-0"> {{ $sn++ . '. ' . $product->name }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-muted p-0 m-0">Product cost</p>
                                                    <p class="p-0 m-0"> {{ $product->cost }}</p>
                                                </div>
                                                <div>
                                                    <p class="text-muted p-0 m-0">Product Price</p>
                                                    <p class="p-0 m-0"> {{ $product->price }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-6 align-self-center">
                                            <div class="d-flex justify-content-end">
                                                <form action="{{ route('fixedprojection') }}" method="GET">
                                                    <input type="text" name="id" value="{{ $product->id }}" hidden>
                                                    <button class="btn btn-dark btn-sm text-white">Fixed projection</button>
                                                </form>
                                                <form action="{{ route('extrainfo') }}" method="GET">
                                                    <input type="text" name="id" value="{{ $product->id }}" hidden>
                                                    <button class="btn ms-3 btn-success btn-sm text-white">Add More
                                                        info</button>
                                                </form>
                                                {{-- <a class="btn btn-success btn-sm text-white" href="{{ route('extrainfo') }}">Add
                                                More info</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-8">

                        <div class=" alert alert-danger">
                            <p class="m-0">You have not added a product</p>
                        </div>

                    </div>
                @endif
                {{-- @endif --}}
            </div>

            <center>


            </center>
        </div>
    </section>
@endsection
