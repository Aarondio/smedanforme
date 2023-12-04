@extends('layouts.app')

@section('content')
    <section class="wrapper bg-light py-5 py-md-10">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-10 ">
                    <h1 class="text-left">Fixed Projections for {{ $product->name }}</h1>
                    <div class="alert alert-success border-success">
                        <p>For a more detailed projection for "<strong>{{ $product->name }}" </strong> click on the button
                            below to add more information</p>
                        <form action="{{ route('extrainfo') }}" method="GET">
                            <input type="text" name="id" value="{{ $product->id }}" hidden>
                            <button class="btn btn-success btn-sm text-white">Add More info</button>
                        </form>
                    </div>
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

                {{-- @endif --}}
            </div>

            <div class="row justify-content-center">
                <div class="col-md-10">
                    <section id="snippet-4" class="wrapper">
                        <h2 class="mb-5">Year one</h2>
                        <div class="card">
                            <div class="card-body table-responsive">
                                <table class="table table-bordered">
                                    @php
                                        // $qtypermonth = $product->quantity / 12
                                        $qtypermonth = ceil($product->quantity / 12);
                                    @endphp
                                    <thead>
                                        <tr class="fs-14">
                                            <th scope="col">#</th>
                                            <th scope="col">JAN</th>
                                            <th scope="col">FEB</th>
                                            <th scope="col">MAR</th>
                                            <th scope="col">APR</th>
                                            <th scope="col">MAY</th>
                                            <th scope="col">JUN</th>
                                            <th scope="col">JUL</th>
                                            <th scope="col">AUG</th>
                                            <th scope="col">SEP</th>
                                            <th scope="col">OCT</th>
                                            <th scope="col">NOV</th>
                                            <th scope="col">DEC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                    <th scope="row" colspan="6">Unit Sold</th>
                                  </tr> --}}
                                        <tr class="fs-14">
                                            <th scope="row">{{ 'Q.Sold' }}</th>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                            <td>{{number_format( $qtypermonth, 0, '.', ',') }}</td>
                                         
                                        </tr>
                                        <tr class="fs-14">
                                            <th scope="row">{{ 'U.Price' }}</th>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->price, 0, '.', ',') }}</td>
                                            

                                        </tr>

                                        {{--                               
                                <tr>
                                  <th scope="row" colspan="6">Unit Cost</th>
                                </tr> --}}

                                        <tr class="fs-14">
                                            <th scope="row">U.Cost</th>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost, 0, '.', ',') }}</td>
                                

                                        </tr>
                                        <tr class="fs-14">
                                            <th scope="row">Sales</th>
                                           
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                            <td>₦{{ number_format($product->price * $qtypermonth, 0, '.', ',')}}</td>
                                         

                                        </tr>
                                        <tr class="fs-14">
                                            <th scope="row">Cost</th>
                                    
                                        
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                            <td>₦{{ number_format($product->cost * $qtypermonth, 0, '.', ',') }}</td>
                                           
                                         

                                        </tr>
                                        <tr class="fs-14">
                                            <th scope="row">Profit</th>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                            <td>₦{{ number_format(($product->price * $qtypermonth)-($product->cost * $qtypermonth), 0, '.', ',')}}</td>
                                        
                                          
                                           
                                         

                                        </tr>


                                        {{-- <tr>
                                    <th scope="row">Total Cost</th>
                                    <td>{{$product->cost * $product->quantity}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->cost}}</td>
                                    
                                  </tr> --}}

                                    </tbody>
                                </table>
                            </div>

                            <!--/.card-footer -->
                        </div>
                        <!--/.card -->
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
