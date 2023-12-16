@extends('layouts.app')

@section('content')
    <style>
        .text-justify {
            text-align: justify;
        }
    </style>
    <section class="wrapper bg-light my-10">
        <div class="container">
            <div class="d-flex  justify-content-between">
                <div class="">
                    @if ($businessinfo->status == 'Completed')
                        <a href="{{ route('home') }}" class=" btn btn-outline-danger btn-sm">Back</a>
                    @else
                        <a href="{{ route('personalinfo') }}" class=" btn btn-outline-danger btn-sm">Back</a>
                    @endif
                </div>
                <div class="">
                    @if ($businessinfo->status == 'Completed')
                        <a href="{{ route('pdf', $businessinfo->business_no) }}" class=" btn btn-grape btn-sm">Download</a>
                    @endif
                </div>
            </div>
    </section>
    @if ($businessinfo->status == 'Completed')
        <section class=" bg-light">
            <div class="container">
                <div class="row  justify-content-center">
                    <div class="col-md-12 col-lg-10">

                        <div class="text-center mb-8">
                            {!! QrCode::size(200)->generate(asset('applications/' . $businessinfo->business_no)) !!}
                        </div>
                        <h3 class="text-center">Application number: {{ $businessinfo->business_no }}</h3>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="wrapper image-wrapper bg-image bg-overlay text-white"
            data-image-src="{{ asset('assets/img/photos/bg20.png') }}">
            <div class="wrapper py-10">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-lg-12 col-xxl-12 text-center">
                            <h1 class="display-2 mb-1 text-white">Preview your application before submission</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="wrapper bg-light pb-5 pb-md-5">
        <div class="container">

            <div class="row  gy-6 mt-2 justify-content-center">

                <div class="col-md-12 col-lg-10">

                    <div class="card">
                        <div class="card-body">


                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <h3>Personal Information</h3>
                                    <table class="table table-borderless table-striped">
                                        <tr class="">
                                            <td><span class="text-muted">First name</span></td>
                                            <td><span class="text-dark float-end">{{ $user->firstname ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Middle name</span></td>
                                            <td><span class="text-dark float-end">{{ $user->middlename ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Surnamee</span></td>
                                            <td><span class="text-dark float-end">{{ $user->surname ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">State</span></td>
                                            <td><span class="text-dark float-end">{{ $user->state ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Local gov.</span></td>
                                            <td><span class="text-dark float-end">{{ $user->lga ?? '' }}</span></td>
                                        </tr>

                                        <tr class="">
                                            <td><span class="text-muted">Phone</span></td>
                                            <td><span class="text-dark float-end">{{ $user->phone ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Email</span></td>
                                            <td><span class="text-dark float-end">{{ $user->email ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Marital status</span></td>
                                            <td><span class="text-dark float-end">{{ $user->marital_status ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Gender</span></td>
                                            <td><span class="text-dark float-end">{{ $user->gender ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Country</span></td>
                                            <td><span class="text-dark float-end">{{ $user->nationality ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Address</span></td>
                                            <td><span class="text-dark float-end">{{ $user->address ?? '' }}</span></td>
                                        </tr>
                                    </table>

                                </div>
                                <div class="col-md-6">
                                    <h3>Business Information</h3>
                                    <table class="table table-borderless table-striped">
                                        <tr class="">
                                            <td><span class="text-muted">Business name</span></td>
                                            <td><span
                                                    class="text-dark float-end">{{ $businessinfo->business_name ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Registration Type</span></td>
                                            <td><span
                                                    class="text-dark float-end">{{ $businessinfo->register_type ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">SUIN</span></td>
                                            <td><span class="text-dark float-end">{{ $businessinfo->suin ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Business sector</span></td>
                                            <td><span class="text-dark float-end">{{ $businessinfo->sector ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">No. of Employees</span></td>
                                            <td><span class=" text-dark float-end">{{ $businessinfo->emp_no ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Business Age</span></td>
                                            <td><span
                                                    class="text-dark float-end">{{ $businessinfo->business_age ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr class="">
                                            <td><span class="text-muted">Biz Registered?</span></td>
                                            <td><span
                                                    class="text-dark float-end">{{ $businessinfo->is_registered ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Loan Amount</span></td>
                                            <td><span
                                                    class="text-dark float-end">{{ $businessinfo->loan_amount ?? '' }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Business Address</span></td>
                                            <td><span class="text-dark float-end">{{ $businessinfo->address ?? '' }}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="card mt-8">
                        <div class="card-body">
                            {{-- <h1>Personal information</h1> --}}

                            <h3>Executive Summary</h3>
                            {{-- <h3>Problem & Solution</h3> --}}
                            <h3 class="fw-light">Problem Worth Solving</h3>
                            <p class="text-dark text-justify">{{ $businessinfo->audience_need }}</p>
                            <h3 class="fw-light">Our Advantages</h3>
                            <p class="text-dark text-justify">{{ $businessinfo->competition_ad }}</p>
                            <h3 class="fw-light">Target Market</h3>
                            <p class="text-dark text-justify">{{ $businessinfo->target_market }}</p>
                            <h3 class="fw-light">Management Team</h3>
                            <p class="text-dark text-justify">{{ $businessinfo->management_team }}</p>
                            <h3 class="fw-light">Loan Reason</h3>
                            <p class="text-dark text-justify">{{ $businessinfo->loan_reason }}</p>
                            <h3 class="fw-light">Profit Generation</h3>
                            <p class="text-dark text-justify">{{ $businessinfo->business_model }}</p>


                        </div>

                    </div>


                    <div class="card mt-8">
                        <div class="card-body">
                            <h5>Guide</h5>
                            <div class="d-flex text-dark">
                                <p>U.Cost = Unit cost</p>
                                <p class="mx-6">Q.Sold = Quantity sold</p>
                                <p>U.cost = Unit cost</p>
                            </div>

                            @foreach ($salesforcasts as $salesforcast)
                                @if ($salesforcast->jan_price != null && $salesforcast->jan_cost != null && $salesforcast->jan_qty != null)
                                    <div class="table-responsive">
                                        <h3 class="my-5"> Sales forcast for {{ $salesforcast->product->name }}</h3>
                                        <table class="table table-small-font  table-bordered ">

                                            <thead>
                                                <tr class="fs-14 text-center">
                                                    <th scope="col" class="m-0 p-0">#</th>
                                                    <th scope="col" class="m-0 p-0">JAN</th>
                                                    <th scope="col" class="m-0 p-0">FEB</th>
                                                    <th scope="col" class="m-0 p-0">MAR</th>
                                                    <th scope="col" class="m-0 p-0">APR</th>
                                                    <th scope="col" class="m-0 p-0">MAY</th>
                                                    <th scope="col" class="m-0 p-0">JUN</th>
                                                    <th scope="col" class="m-0 p-0">JUL</th>
                                                    <th scope="col" class="m-0 p-0">AUG</th>
                                                    <th scope="col" class="m-0 p-0">SEP</th>
                                                    <th scope="col" class="m-0 p-0">OCT</th>
                                                    <th scope="col" class="m-0 p-0">NOV</th>
                                                    <th scope="col" class="m-0 p-0">DEC</th>
                                                    <th scope="col" class="m-0 p-0">TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php

                                                    $product = $salesforcast->product;
                                                @endphp
                                                <tr class="fs-14 text-center">
                                                    <th scope="row" class="m-0 p-0">{{ 'Q.Sold' }}</th>
                                                    <td class="m-0 p-0">{{ $salesforcast->jan_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->feb_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->mar_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->apr_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->may_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->jun_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->jul_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->aug_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->sep_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->oct_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->nov_qty }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->dec_qty }}</td>
                                                    <td class="m-0 p-0">{{ $totalqty = $salesforcast->jan_qty + $salesforcast->feb_qty + $salesforcast->mar_qty + $salesforcast->apr_qty + $salesforcast->may_qty + $salesforcast->jun_qty + $salesforcast->jul_qty + $salesforcast->aug_qty + $salesforcast->sep_qty + $salesforcast->oct_qty + $salesforcast->nov_qty + $salesforcast->dec_qty }}
                                                    </td>


                                                </tr>
                                                <tr class="fs-14 text-center">
                                                    <th scope="row" class="m-0 p-0">{{ 'U.Price' }}</th>
                                                    <td class="m-0 p-0">{{ $salesforcast->jan_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->feb_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->mar_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->apr_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->may_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->jun_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->jul_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->aug_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->sep_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->oct_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->nov_price }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->dec_price }}</td>
                                                    <td class="m-0 p-0">
                                                        {{ $totalPrice = $salesforcast->jan_price + $salesforcast->feb_price + $salesforcast->mar_price + $salesforcast->apr_price + $salesforcast->may_price + $salesforcast->jun_price + $salesforcast->jul_price + $salesforcast->aug_price + $salesforcast->sep_price + $salesforcast->oct_price + $salesforcast->nov_price + $salesforcast->dec_price }}
                                                    </td>


                                                </tr>



                                                <tr class="fs-14 text-center">
                                                    <th scope="row" class="m-0 p-0">U.Cost</th>
                                                    <td class="m-0 p-0">{{ $salesforcast->jan_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->feb_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->mar_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->apr_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->may_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->jun_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->jul_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->aug_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->sep_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->oct_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->nov_cost }}</td>
                                                    <td class="m-0 p-0">{{ $salesforcast->dec_cost }}</td>
                                                    <td class="m-0 p-0">
                                                        {{ $sumCost =
                                                            $salesforcast->jan_cost +
                                                            $salesforcast->feb_cost +
                                                            $salesforcast->mar_cost +
                                                            $salesforcast->apr_cost +
                                                            $salesforcast->may_cost +
                                                            $salesforcast->jun_cost +
                                                            $salesforcast->jul_cost +
                                                            $salesforcast->aug_cost +
                                                            $salesforcast->sep_cost +
                                                            $salesforcast->oct_cost +
                                                            $salesforcast->nov_cost +
                                                            $salesforcast->dec_cost }}
                                                    </td>


                                                </tr>
                                                <tr class="fs-14 text-center">
                                                    <th scope="row" class="m-0 p-0">Sales</th>
                                                    <td class="m-0 p-0">{{ $jan_sales = $salesforcast->jan_price * $salesforcast->jan_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $feb_sales = $salesforcast->feb_price * $salesforcast->feb_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $mar_sales = $salesforcast->mar_price * $salesforcast->mar_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $apr_sales = $salesforcast->apr_price * $salesforcast->apr_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $may_sales = $salesforcast->may_price * $salesforcast->may_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $jun_sales = $salesforcast->jun_price * $salesforcast->jun_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $jul_sales = $salesforcast->jul_price * $salesforcast->jul_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $aug_sales = $salesforcast->aug_price * $salesforcast->aug_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $sep_sales = $salesforcast->sep_price * $salesforcast->sep_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $oct_sales = $salesforcast->oct_price * $salesforcast->oct_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $nov_sales = $salesforcast->nov_price * $salesforcast->nov_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $dec_sales = $salesforcast->dec_price * $salesforcast->dec_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">
                                                        {{ $totalSales =
                                                            $jan_sales +
                                                            $feb_sales +
                                                            $mar_sales +
                                                            $apr_sales +
                                                            $may_sales +
                                                            $jun_sales +
                                                            $jul_sales +
                                                            $aug_sales +
                                                            $sep_sales +
                                                            $oct_sales +
                                                            $nov_sales +
                                                            $dec_sales }}
                                                    </td>


                                                </tr>
                                                <tr class="fs-14 text-center">
                                                    <th scope="row" class="m-0 p-0">Cost</th>
                                                    <td class="m-0 p-0">{{ $jan_cost = $salesforcast->jan_cost * $salesforcast->jan_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $feb_cost = $salesforcast->feb_cost * $salesforcast->feb_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $mar_cost = $salesforcast->mar_cost * $salesforcast->mar_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $apr_cost = $salesforcast->apr_cost * $salesforcast->apr_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $may_cost = $salesforcast->may_cost * $salesforcast->may_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $jun_cost = $salesforcast->jun_cost * $salesforcast->jun_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $jul_cost = $salesforcast->jul_cost * $salesforcast->jul_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $aug_cost = $salesforcast->aug_cost * $salesforcast->aug_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $sep_cost = $salesforcast->sep_cost * $salesforcast->sep_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $oct_cost = $salesforcast->oct_cost * $salesforcast->oct_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $nov_cost = $salesforcast->nov_cost * $salesforcast->nov_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">{{ $dec_cost = $salesforcast->dec_cost * $salesforcast->dec_qty }}
                                                    </td>
                                                    <td class="m-0 p-0">
                                                        {{ $totalCost =
                                                            $jan_cost +
                                                            $feb_cost +
                                                            $mar_cost +
                                                            $apr_cost +
                                                            $may_cost +
                                                            $jun_cost +
                                                            $jul_cost +
                                                            $aug_cost +
                                                            $sep_cost +
                                                            $oct_cost +
                                                            $nov_cost +
                                                            $dec_cost }}
                                                    </td>
                                                </tr>
                                                <tr class="fs-14 text-center">
                                                    <th scope="row" class="m-0 p-0">Profit</th>

                                                    <td class="m-0 p-0">{{ $jan_sales - $jan_cost }}</td>
                                                    <td class="m-0 p-0">{{ $feb_sales - $feb_cost }}</td>
                                                    <td class="m-0 p-0">{{ $mar_sales - $mar_cost }}</td>
                                                    <td class="m-0 p-0">{{ $apr_sales - $apr_cost }}</td>
                                                    <td class="m-0 p-0">{{ $may_sales - $may_cost }}</td>
                                                    <td class="m-0 p-0">{{ $jun_sales - $jun_cost }}</td>
                                                    <td class="m-0 p-0">{{ $jul_sales - $jul_cost }}</td>
                                                    <td class="m-0 p-0">{{ $aug_sales - $aug_cost }}</td>
                                                    <td class="m-0 p-0">{{ $sep_sales - $sep_cost }}</td>
                                                    <td class="m-0 p-0">{{ $oct_sales - $oct_cost }}</td>
                                                    <td class="m-0 p-0">{{ $nov_sales - $nov_cost }}</td>
                                                    <td class="m-0 p-0">{{ $dec_sales - $dec_cost }}</td>

                                                    <td 
                                                        @if ($totalSales - $totalCost > 0) class="text-success fw-bold m-0 p-0" @else class="text-danger fw-bold" @endif>
                                                        {{ $totalSales - $totalCost }}</td>




                                                </tr>




                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            @endforeach

                            <div class="float-end mt-8">
                                <form action="{{ route('finalsubmission') }}" method="post">
                                    @csrf
                                    <input type="text" name="id" value="{{ $businessinfo->id }}" hidden>
                                    @if ($businessinfo->status == 'Completed')
                                        <h4>Your application was Submitted</h4>
                                    @else
                                        <button class="btn btn-grape btn-lg">Submit Application</button>
                                    @endif
                                </form>

                            </div>
                        </div>

                    </div>


                </div>

            </div>

        </div>
        </div>
    </section>
@endsection
