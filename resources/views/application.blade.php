@extends('layouts.app')

@section('content')
    <style>
        .text-justify {
            text-align: justify;
        }
    </style>


    <section class="wrapper bg-light pb-5 pb-md-5">
        <div class="container">
            <div class="mt-10 text-center">
                {!! QrCode::size(200)->generate(asset('application/'.$businessinfo->business_no)) !!}
                
            </div>
            <div class="row  gy-6 mt-2 justify-content-center">

                <div class="col-md-12 col-lg-10">

                    <div class="card my-5">
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
                                        <tr>
                                            <td><span class="text-muted">Address</span></td>
                                            <td><span class="text-dark float-end">{{ $user->address ?? '' }}</span></td>
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


                    <div class="card">
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
                </div>

            </div>

        </div>
        </div>
    </section>
@endsection
