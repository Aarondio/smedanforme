@extends('layouts.app')

@section('content')

    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('assets/img/photos/bg20.png') }}">
        {{-- <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('assets/img/photos/bg4.jpg')}}"> --}}

        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xxl-8 text-center">
                        <h1 class="display-2 mb-1 text-white">Additional Production information</h1>
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
            <p class="text-danger">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </p>
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
                        <h2>Product information for {{$product->name}}</h2>
                        <form action="{{ route('saveproductioncost') }}"  method="POST">
                            @csrf
                            {{-- <input type="text" name="id" value="{{ $user->id }}" hidden> --}}
                            <div class="row text-dark">
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="jan_price" class="mb-3">Product price in January</label>
                                        <input id="jan_price" name="jan_price" type="text" value=""
                                            class="form-control" placeholder="Price in january" required>
                                        @error('name')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" name="proprice" value="" id="proprice">
                                            <label class="form-check-label small" for="proprice" > Click on the check box if the price of product is the same from <b>January</b> to <b>December</b>. </label>
                                          </div>
                                    </div>

                                    <div class="position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-price">Other months</a>
                                    </div>
                                    <div id="collapse-price"
                                        class="card-footer border-0  p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" mb-2">
                                                <label for="feb_price" class="">price of producing in Febuary</label>
                                                <input id="feb_price" name="feb_price" type="number" value=""
                                                    class="form-control" placeholder="Febuary price" >
                                                @error('feb_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="mar_price" class="">price of producing in March</label>
                                                <input id="mar_price" name="mar_price" type="number" value=""
                                                    class="form-control" placeholder="March price" >
                                                @error('mar_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="apr_price" class="">price of producing in April</label>
                                                <input id="apr_price" name="apr_price" type="number" value=""
                                                    class="form-control" placeholder="April price" >
                                                @error('apr_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="may_price" class="">price of producing in May</label>
                                                <input id="may_price" name="may_price" type="number" value=""
                                                    class="form-control" placeholder="May price" >
                                                @error('may_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="jun_price" class="">price of producing in June</label>
                                                <input id="jun_price" name="jun_price" type="number" value=""
                                                    class="form-control" placeholder="June price" >
                                                @error('jun_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="jul_price" class="">price of producing in July</label>
                                                <input id="jul_price" name="jul_price" type="number" value=""
                                                    class="form-control" placeholder="July price" >
                                                @error('jul_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="aug_price" class="">price of producing in August</label>
                                                <input id="aug_price" name="aug_price" type="number" value=""
                                                    class="form-control" placeholder="August price" >
                                                @error('aug_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="sep_price" class="">price of producing in September</label>
                                                <input id="sep_price" name="sep_price" type="number" value=""
                                                    class="form-control" placeholder="September price" >
                                                @error('sep_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="oct_price" class="">price of producing in October</label>
                                                <input id="oct_price" name="oct_price" type="number" value=""
                                                    class="form-control" placeholder="October price" >
                                                @error('oct_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="nov_price" class="">price of producing in November</label>
                                                <input id="nov_price" name="nov_price" type="number" value=""
                                                    class="form-control" placeholder="November price" >
                                                @error('nov_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="dec_price" class="">price of producing in November</label>
                                                <input id="dec_price" name="dec_price" type="number" value=""
                                                    class="form-control" placeholder="December price" >
                                                @error('dec_price')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                          
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="jan_cost" class="mb-3">Cost of producing one product</label>
                                        <input id="jan_cost" name="jan_cost" type="number" value=""
                                            class="form-control" placeholder="January cost" >
                                        @error('jan_cost')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror

                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" name="procost" value="" id="procost">
                                            <label class="form-check-label small" for="procost" > Click on the check box if the cost of production is the same from <b>January</b> to <b>December</b>. </label>
                                          </div>
                                    </div>
                                    <div class="position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-cost">Other months</a>
                                    </div>
                                    <div id="collapse-cost"
                                        class="card-footer border-0  p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" mb-2">
                                                <label for="feb_cost" class="">Cost of producing in Febuary</label>
                                                <input id="feb_cost" name="feb_cost" type="number" value=""
                                                    class="form-control" placeholder="Febuary cost" >
                                                @error('feb_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="mar_cost" class="">Cost of producing in March</label>
                                                <input id="mar_cost" name="mar_cost" type="number" value=""
                                                    class="form-control" placeholder="March cost" >
                                                @error('mar_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="apr_cost" class="">Cost of producing in April</label>
                                                <input id="apr_cost" name="apr_cost" type="number" value=""
                                                    class="form-control" placeholder="April cost" >
                                                @error('apr_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="may_cost" class="">Cost of producing in May</label>
                                                <input id="may_cost" name="may_cost" type="number" value=""
                                                    class="form-control" placeholder="May cost" >
                                                @error('may_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="jun_cost" class="">Cost of producing in June</label>
                                                <input id="jun_cost" name="jun_cost" type="number" value=""
                                                    class="form-control" placeholder="June cost" >
                                                @error('jun_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="jul_cost" class="">Cost of producing in July</label>
                                                <input id="jul_cost" name="jul_cost" type="number" value=""
                                                    class="form-control" placeholder="July cost" >
                                                @error('jul_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="aug_cost" class="">Cost of producing in August</label>
                                                <input id="aug_cost" name="aug_cost" type="number" value=""
                                                    class="form-control" placeholder="August cost" >
                                                @error('aug_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="sep_cost" class="">Cost of producing in September</label>
                                                <input id="sep_cost" name="sep_cost" type="number" value=""
                                                    class="form-control" placeholder="September cost" >
                                                @error('sep_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="oct_cost" class="">Cost of producing in October</label>
                                                <input id="oct_cost" name="oct_cost" type="number" value=""
                                                    class="form-control" placeholder="October cost" >
                                                @error('oct_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="nov_cost" class="">Cost of producing in November</label>
                                                <input id="nov_cost" name="nov_cost" type="number" value=""
                                                    class="form-control" placeholder="November cost" >
                                                @error('nov_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="dec_cost" class="">Cost of producing in November</label>
                                                <input id="dec_cost" name="dec_cost" type="number" value=""
                                                    class="form-control" placeholder="December cost" >
                                                @error('dec_cost')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="jan_qty" class="mb-3">Quantity sold in january</label>
                                        <input id="jan_qty" name="jan_qty" type="number" value=""
                                            class="form-control" placeholder="January qty" required>
                                        @error('jan_qty')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-qty">Other months</a>
                                    </div>
                                    <div id="collapse-qty"
                                        class="card-footer border-0  p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" mb-2">
                                                <label for="feb_qty" class="">Quantity sold in Febuary</label>
                                                <input id="feb_qty" name="feb_qty" type="number" value=""
                                                    class="form-control" placeholder="Febuary qty" >
                                                @error('feb_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="mar_qty" class="">Quantity sold in  in March</label>
                                                <input id="mar_qty" name="mar_qty" type="number" value=""
                                                    class="form-control" placeholder="March qty" >
                                                @error('mar_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="apr_qty" class="">Quantity sold in  in April</label>
                                                <input id="apr_qty" name="apr_qty" type="number" value=""
                                                    class="form-control" placeholder="April qty" >
                                                @error('apr_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="may_qty" class="">Quantity sold in  in May</label>
                                                <input id="may_qty" name="may_qty" type="number" value=""
                                                    class="form-control" placeholder="May qty" >
                                                @error('may_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="jun_qty" class="">Quantity sold in  in June</label>
                                                <input id="jun_qty" name="jun_qty" type="number" value=""
                                                    class="form-control" placeholder="June qty" >
                                                @error('jun_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="jul_qty" class="">Quantity sold in  in July</label>
                                                <input id="jul_qty" name="jul_qty" type="number" value=""
                                                    class="form-control" placeholder="July qty" >
                                                @error('jul_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="aug_qty" class="">Quantity sold in  in August</label>
                                                <input id="aug_qty" name="aug_qty" type="number" value=""
                                                    class="form-control" placeholder="August qty" >
                                                @error('aug_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="sep_qty" class="">Quantity sold in  in September</label>
                                                <input id="sep_qty" name="sep_qty" type="number" value=""
                                                    class="form-control" placeholder="September qty" >
                                                @error('sep_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="oct_qty" class="">Quantity sold in  in October</label>
                                                <input id="oct_qty" name="oct_qty" type="number" value=""
                                                    class="form-control" placeholder="October qty" >
                                                @error('oct_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="nov_qty" class="">Quantity sold in  in November</label>
                                                <input id="nov_qty" name="nov_qty" type="number" value=""
                                                    class="form-control" placeholder="November qty" >
                                                @error('nov_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class=" mb-2">
                                                <label for="dec_qty" class="">Quantity sold in  in November</label>
                                                <input id="dec_qty" name="dec_qty" type="number" value=""
                                                    class="form-control" placeholder="December qty" >
                                                @error('dec_qty')
                                                    <p class="small text-danger"> {{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                              
                                <div class="col-md-6">
                                    <button class="btn btn-grape"  type="submit">Save information</button>

                                </div>
                                
                                <!-- /.form-floating -->
                        </form>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="justify-content-between d-flex">
                        <div class="col-md-6">
                            <a href="{{route('myproducts')}}" class="btn btn-outline-danger btn-sm">Back</a>
                        </div>
                        {{-- <div class="col-md-6">
                            <a href="{{ route('myproducts') }}" class="float-end btn btn-outline-primary btn-sm">View Products</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script>
        
    
@endsection
