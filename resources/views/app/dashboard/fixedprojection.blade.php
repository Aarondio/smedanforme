@extends('layouts.app')

@section('content')
    <section class="wrapper bg-light py-5 py-md-10">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <h1 class="text-left">Fixed Projections</h1>
                    <div class="alert alert-success border-success">
                        <p>For a more detailed projection for "<strong>{{$product->name}}" </strong> click on the button below to add more information</p>
                        <form action="{{route('extrainfo')}}" method="GET">
                            <input type="text" name="id" value="{{$product->id}}" hidden>
                            <button class="btn btn-success btn-sm text-white">Add  More info</button>
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
                <div class="col-md-8">
                    <section id="snippet-4" class="wrapper">
                        <h2 class="mb-5">Year one</h2>
                        <div class="card">
                          <div class="card-body">
                            <table class="table table-bordered">
                                @php
                                    // $qtypermonth = $product->quantity / 12
                                    $qtypermonth = ceil($product->quantity / 12);
                                @endphp
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">JAN</th>
                                  <th scope="col">FEB</th>
                                  <th scope="col">MAR</th>
                                  <th scope="col">APR</th>
                                  <th scope="col">MAY</th>
                                  <th scope="col">JUN</th>
                                </tr>
                              </thead>
                              <tbody>
                                {{-- <tr>
                                    <th scope="row" colspan="6">Unit Sold</th>
                                  </tr> --}}
                                <tr>
                                    <th scope="row">{{'Unit Sold'}}</th>
                                    <td>{{$qtypermonth}}</td>
                                    <td>{{$qtypermonth}}</td>
                                    <td>{{$qtypermonth}}</td>
                                    <td>{{$qtypermonth}}</td>
                                    <td>{{$qtypermonth}}</td>
                                    <td>{{$qtypermonth}}</td>
                                   
                                    
                                  </tr>
                                {{-- <tr>
                                    <th scope="row" colspan="6">Unit Price</th>
                                  </tr> --}}
                                <tr>
                                  <th scope="row">{{"Unit Price"}}</th>
                                  <td>{{$product->price}}</td>
                                  <td>{{$product->price}}</td>
                                  <td>{{$product->price}}</td>
                                  <td>{{$product->price}}</td>
                                  <td>{{$product->price}}</td>
                                  <td>{{$product->price}}</td>
                                  
                                </tr>
                           
{{--                               
                                <tr>
                                  <th scope="row" colspan="6">Unit Cost</th>
                                </tr> --}}

                                <tr>
                                    <th scope="row">Unit Cost</th>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->cost}}</td>
                                    <td>{{$product->cost}}</td>
                                    
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
