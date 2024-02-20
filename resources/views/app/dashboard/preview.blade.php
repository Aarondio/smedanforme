@extends('layouts.app')

@section('content')
    <style>
        .text-justify {
            text-align: justify;
        }

        * {
            /* border: 1px solid red; */
        }
    </style>

    @if ($businessinfo->status == 'Completed')
        <section class=" bg-light mt-10">
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
            data-image-src="{{ asset('asset/img/photos/bg4.jpg') }}">
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

    <section class="wrapper bg-light my-3">
        <div class="container">
            <div class="d-flex  justify-content-between">

                @if ($businessinfo->status == 'Completed')
                    <a href="{{ route('home') }}" class=" btn btn-outline-danger btn-sm">Back</a>
                @else
                    <a href="#" onclick="history.back()" class=" btn btn-outline-danger btn-sm">Back</a>
                @endif


                @if ($businessinfo->status == 'Completed')
                    <a href="{{ asset('/pdf') }}" class=" btn btn-grape btn-sm">Download</a>
                @endif

            </div>
    </section>
    <section class="wrapper bg-light py-5 pb-md-5">
        <div class="container">

            <div class="row   justify-content-center">
                @if ($businessinfo->status == 'Completed')
                @else
                    <aside class="col-lg-2 sidebar sticky-sidebar mt-md-0  d-none d-xl-block">
                        <div class="widget">
                            {{-- <h6 class="widget-title fs-17 mb-2 ps-xl-5">On this page</h6> --}}

                            <div class="card bg-transparent">
                                <div class="card-body p-3 m-0">
                                    <nav class="" id="sidebar-nav">
                                        <ul class="list-unstyled fs-sm lh-sm text-reset fw-light">
                                            <li><a class="nav-link  fw-normal" href="{{ route('personal') }}">Personal
                                                    Info</a>
                                            </li>
                                            <li><a class="nav-link  my-1 fw-normal" href="{{ route('business') }}">Business
                                                    Info</a></li>
                                            <li><a class="nav-link fw-normal" href="{{ route('nanoplan') }}">Business
                                                    Description</a></li>
                                            <li><a class="nav-link fw-normal " href="{{ route('swot') }}">Swot
                                                    Analysis</a></li>
                                            <li><a class="nav-link fw-normal my-1 " href="{{ route('product') }}">Add
                                                    Products/Services</a></li>
                                            <li><a class="nav-link fw-normal" href="{{ route('finance') }}">Expenses
                                                    Records</a>
                                            </li>

                                            <li><a class="nav-link fw-normal active text-decoration-underline"
                                                    href="{{ route('preview') }}">Preview submission</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>

                        </div>
                    </aside>
                @endif
                <div class="  @if ($businessinfo->status == 'Completed') col-lg-12 @else  col-lg-10 @endif">

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
                                            <td><span class="text-muted">Middlename</span></td>
                                            <td><span class="text-dark float-end">{{ $user->middlename ?? '' }}</span></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-muted">Surname</span></td>
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
                            <p class="text-dark text-justify ">
                                {{ $businessinfo->audience_need ?? 'No information was provided' }}</p>
                            <h3 class="fw-light">Our Advantages</h3>
                            <p class="text-dark text-justify">
                                {{ $businessinfo->competition_ad ?? 'No information was provided' }}</p>
                            <h3 class="fw-light">Target Market</h3>
                            <p class="text-dark text-justify">
                                {{ $businessinfo->target_market ?? 'No information was provided' }}</p>
                            <h3 class="fw-light">Management Team</h3>
                            <p class="text-dark text-justify">
                                {{ $businessinfo->management_team ?? 'No information was provided' }}</p>
                            <h3 class="fw-light">Loan Reason</h3>
                            <p class="text-dark text-justify">
                                {{ $businessinfo->loan_reason ?? 'No information was provided' }}</p>
                            <h3 class="fw-light">Profit Generation</h3>
                            <p class="text-dark text-justify">
                                {{ $businessinfo->business_model ?? 'No information was provided' }}</p>

                            <h3 class="mt-12">S.W.O.T Analysis</h3>
                            <h3 class="fw-light">Strength</h3>
                            <p class="text-dark text-justify">
                                {{ $businessinfo->strength ?? 'No information was provided' }}</p>
                            <h3 class="fw-light">Weakness</h3>
                            <p class="text-dark text-justify">
                                {{ $businessinfo->weakness ?? 'No information was provided' }}</p>
                            <h3 class="fw-light">Opportunity</h3>
                            <p class="text-dark text-justify">
                                {{ $businessinfo->opportunity ?? 'No information was provided' }}</p>
                            <h3 class="fw-light">Threats</h3>
                            <p class="text-dark text-justify">
                                {{ $businessinfo->threats ?? 'No information was provided' }}</p>


                            @if ($products->isNotEmpty())
                                <h3 class="mt-12">Revenue from products and services</h3>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr class="bg-dark ">
                                            <td colspan="2" class="text-white fw-bold m-0 p-1">Income statement</td>
                                        </tr>
                                        <tr class="">
                                            <td colspan="2" class=" fw-bold m-0 p-1 text-dark">Revenues</td>
                                        </tr>


                                        @php $total  = 0; @endphp

                                        @foreach ($products as $product)
                                            @php

                                                $total += ($product->quantity * $product->price) - ($product->quantity - $product->cost);

                                            @endphp
                                            <tr>
                                                <td class="text-dark  p-1">
                                                    {{ 'Revenue from ' . $product->name }}
                                                </td>
                                                <td class="text-dark text-end p-1">
                                                    {{ '₦' . number_format($product->quantity * $product->price - ($product->quantity - $product->cost)) }}
                                                </td>
                                            </tr>
                                        @endforeach


                                        <tr class="bg-soft-primary">
                                            <td class="text-dark text-capitalize p-1 fw-bold">Total Revenues</td>
                                            <td class="text-dark text-end p-1 fw-bold">
                                                {{ '₦' . number_format($total) }}
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>

                                <h3 class="mt-12">Expenses</h3>
                                <table class="table table-bordered ">
                                    <tbody>
                                        <tr class="bg-dark text-white ">
                                            <td colspan="2" class=" fw-bold m-0 p-1 text-white">Expenses </td>
                                        </tr>
                                        <tr>
                                            @php
                                                $revyear = $expenses->year;
                                            @endphp
                                            <td class="text-dark p-1">Rent</td>
                                            <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->rent) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark p-1">Utilities</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->utilities) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark text-capitalize p-1">salary</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->salary) }}</td>
                                        </tr>
                                        {{-- <tr>
                                            <td class="text-dark text-capitalize p-1">Social securities</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->securities) }}
                                            </td>
                                        </tr> --}}
                                        <tr>
                                            <td class="text-dark text-capitalize p-1">website / Softwares</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->website) }}</td>
                                        </tr>

                                        <tr>
                                            <td class="text-dark text-capitalize p-1">admin expenses</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->adminexpenses) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark text-capitalize p-1">marketing </td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->marketing) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark text-capitalize p-1">supplies and other purchases</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->supplies) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark text-capitalize p-1">licenses</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->licences) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark text-capitalize p-1">internet & Telephone</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->internet) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark text-capitalize p-1">legal fees</td>
                                            <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->legal) }}
                                            </td>
                                        </tr>


                                        <tr>
                                            <td class="text-dark text-capitalize p-1">Consultants</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->consultation) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark text-capitalize p-1">miscellaneous</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->miscell) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-dark text-capitalize p-1">insurance</td>
                                            <td class="text-dark text-end p-1">
                                                {{ '₦' . number_format($expenses->insurance) }}</td>
                                        </tr>
                                        <tr class="">
                                            <td class="text-dark text-capitalize p-1 fw-bold">Total Expenses</td>
                                            <td class="text-dark text-end p-1">
                                                <strong>{{ '₦' .
                                                    number_format(
                                                        $totalexp =
                                                            $expenses->rent +
                                                            $expenses->utilities +
                                                            // $expenses->depreciation +
                                                            $expenses->salary +
                                                            $expenses->securities +
                                                            $expenses->website +
                                                            $expenses->adminexpenses +
                                                            $expenses->marketing +
                                                            $expenses->supplies +
                                                            $expenses->licences +
                                                            $expenses->internet +
                                                            $expenses->legal +
                                                            $expenses->consultation +
                                                            $expenses->miscell +
                                                            $expenses->insurance,
                                                    ) }}</strong>
                                            </td>
                                        </tr>
                                        <tr class="bg-soft-primary">
                                            <td class="text-dark text-capitalize p-1 fw-bold">Operating profit</td>
                                            <td class="text-dark text-end p-1 fw-bold">
                                                @php
                                                    $result = $total - $totalexp;
                                                    $formattedResult = number_format(abs($result), 2);
                                                    $currencySymbol = '₦';
                                                @endphp

                                                @if ($result < 0)
                                                    -{{ $currencySymbol }}{{ $formattedResult }}
                                                @else
                                                    {{ $currencySymbol }}{{ $formattedResult }}
                                                @endif

                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <h3 class="mt-12">Financial Projections</h3>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="bg-soft-primary text-white">
                                            <th class="text-dark text-capitalize p-1 text-center fw-bold">Year</th>
                                            <th class="text-dark text-capitalize p-1 text-center fw-bold">Projected Revenue
                                            </th>
                                            <th class="text-dark text-capitalize p-1 text-center fw-bold">Projected
                                                Expenses</th>
                                            <th class="text-dark text-capitalize p-1 text-center fw-bold">Projected Profit
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $currentYear = date('Y');
                                            $initialRevenue = $total; //initial revenue here;
                                            $initialExpenses = $totalexp; // initial expenses here;
                                            $growthRate = 0.3; // growth rate here;
                                            $expenseGrowthRate = 0.19; //expense growth rate here;

                                            $revenue = $initialRevenue;
                                            $expenses = $initialExpenses;
                                        @endphp
                                        <tr class="bg-soft-orange">
                                            <td class="text-dark text-center p-1">{{ $revyear }}</td>
                                            <td class="text-dark text-center p-1">{{ '₦' . number_format($total) }}</td>
                                            <td class="text-dark text-center p-1">{{ '₦' . number_format($totalexp) }}
                                            </td>
                                            <td class="text-dark text-center p-1">
                                                {{ '₦' . number_format($total - $totalexp) }}</td>
                                        </tr>
                                        @for ($i = 1; $i < 4; $i++)
                                            @php
                                                // $year = $currentYear + $i;
                                                $year = $revyear + $i;

                                                // Adjust the growth rates based on certain conditions or factors
                                                if ($year == 2024) {
                                                    $growthRate = 0.51;
                                                    $expenseGrowthRate = 0.25;
                                                } elseif ($year == 2025) {
                                                    $growthRate = 0.61;
                                                    $expenseGrowthRate = 0.35;
                                                }

                                                // Calculate projected revenue for the next year based on growth rate
                                                $revenue *= 1 + $growthRate;

                                                // Projected expenses (assuming variable expenses growth rate)
                                                $expenses *= 1 + $expenseGrowthRate;

                                                // Calculate projected profit
                                                $projectedProfit = $revenue - $expenses;
                                            @endphp

                                            <tr>
                                                <td class="text-dark text-center p-1">{{ $year }}</td>
                                                <td class="text-dark text-center p-1">{{ '₦' . number_format($revenue) }}
                                                </td>
                                                <td class="text-dark text-center p-1">{{ '₦' . number_format($expenses) }}
                                                </td>
                                                <td class="text-dark text-center p-1">
                                                    {{ '₦' . number_format($projectedProfit) }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                                <h3 class="mt-12">Balance sheet</h3>
                                <table class="table table-bordered ">
                                    <thead class="bg-success">
                                        <th class="text-dark px-2 py-1 border-0">Asset</th>
                                        <th class="text-dark px-2 py-1 text-end border-0">{{ $revyear }}</th>
                                    </thead>
                                    <tbody>
                                        <tr class="border-0">
                                            <td class="fw-bold text-black border-0 px-2 py-1" colspan="2">Curent Asset
                                            </td>
                                            {{-- <td>Machineries: {{number_format($businessinfo->equipment) ?? 'Not specified'}}</td> --}}
                                        </tr>
                                        <tr class="border-0">
                                            <td class="border-0 px-2 py-1">Cash and cash Equivalent </td>
                                            <td class="text-end border-0 px-2 py-1">
                                                {{ number_format($businessinfo->cash) ?? 'Not specified' }}</td>
                                        </tr>
                                        <tr class="border-0 ">
                                            <td class="border-0 px-2 py-1">Account Recievable </td>
                                            <td class="text-end border-0 px-2 py-1">
                                                {{ number_format($businessinfo->cashown) ?? 'Not specified' }}</td>
                                        </tr>
                                        <tr class="border-0">
                                            <td class="border-0 px-2 py-1">Inventories </td>
                                            <td class="text-end border-0 px-2 py-1">
                                                {{ number_format($businessinfo->inventory) ?? 'Not specified' }}</td>
                                        </tr>
                                        <tr class="border-bottom-0">
                                            <td class="fw-bold px-2 py-1 border-0">Total Current Asset </td>
                                            <td class="fw-bold px-2 py-1 border-0"><span
                                                  @php   
                                                   $totalCurrentAsset = $businessinfo->cash + $businessinfo->cashown + $businessinfo->inventory;
                                                  @endphp
                                                    class="float-end">{{  number_format($totalCurrentAsset) }}
                                                </span> </td>

                                        </tr>
                                        @php
                                            $totalCurrent = $businessinfo->cash + $businessinfo->cashown + $businessinfo->inventory;
                                        @endphp
                                        <tr class="border-0">
                                            <td class="border-0 py-2"></td>
                                        </tr>
                                        <tr class="border-0">
                                            <td class="fw-bold border-0 px-2 py-1" colspan="2">Fixed Asset</td>
                                            {{-- <td>Machineries: {{number_format($businessinfo->equipment) ?? 'Not specified'}}</td> --}}
                                        </tr>
                                        <tr class="border-0">
                                            <td class="px-2 py-1 border-0">Plants and Machineries </td>
                                            <td class="text-end px-2 py-1 border-0">
                                                {{ number_format($businessinfo->plants) ?? 'Not specified' }}</td>
                                        </tr>
                                        <tr class="border-0">
                                            <td class="px-2 py-1 border-0">Lands</td>
                                            <td class="text-end px-2 py-1 border-0">
                                                {{ number_format($businessinfo->lands) ?? 'Not specified' }}</td>
                                        </tr>
                                        {{-- <tr class="border-0">
                                            <td  class="px-2 py-1 border-0">Depreciation</td>
                                             <td class="text-end px-2 py-1 border-0">{{number_format($businessinfo->cashown) ?? 'Not specified'}}</td>
                                        </tr> --}}
                                        <tr class="border-0">
                                            <td class="px-2 py-1 border-0">Intangible Asset</td>
                                            <td class="text-end px-2 py-1 border-0">
                                                {{ number_format($businessinfo->intangible) ?? 'Not specified' }}</td>
                                        </tr>
                                        <tr class="bg-soft-primary border-0">
                                            @php
                                                $totalFixedAsset = ($businessinfo->plants + $businessinfo->lands + $businessinfo->intangible + $totalCurrent) - ($businessinfo->depreciation)
                                            @endphp
                                            <td class="fw-bold border-0 px-2 py-1" colspan="2">Total Assets<span
                                                    class="float-end">{{ number_format($totalFixedAsset) }}
                                                </span> </td>


                                        </tr>
                                        @php
                                            $totalAsset = $totalCurrentAsset + $totalFixedAsset;
                                        @endphp
                                        <tr class="border-0">
                                            <td class="border-0 py-2"></td>
                                        </tr>
                                        <tr class="border-0 px-2 py-1">
                                            <td class=" border-0 px-2 py-1 fw-bold">Liabilities and Capitals</td>

                                        </tr>
                                        <tr class="border-0 px-2 py-1">
                                            <td class="border-0 px-2 py-1">Account Payable</td>
                                            <td class="border-0 px-2 py-1"> <span
                                                    class="float-end">{{ number_format($businessinfo->debt) ?? 'Not specified' }}
                                                </span> </td>
                                        </tr>
                                        <tr class="border-0 px-2 py-1">
                                            <td class="border-0 px-2 py-1">Taxes payable </td>
                                            <td class="border-0 px-2 py-1"><span
                                                    class="float-end">{{ number_format($businessinfo->tax) ?? 'Not specified' }}
                                                </span> </td>
                                        </tr>
                                        <tr class="border-0 px-2 py-1">
                                            <td class="border-0 px-2 py-1">Long term Loans </td>
                                            <td class="border-0 px-2 py-1"><span
                                                    class="float-end">{{ number_format($businessinfo->loan) ?? 'Not specified' }}
                                                </span> </td>
                                        </tr>
                                        <tr class="border-bottom-0">
                                            @php
                                                $totalCurrentLiabilities = $businessinfo->debt + $businessinfo->tax + $businessinfo->loan;
                                            @endphp
                                            <td class="fw-bold px-2 py-1 border-0">Total Liabilities</td>
                                            <td class="fw-bold px-2 py-1 border-0 text-end">
                                                {{ number_format($totalCurrentLiabilities) }}</td>
                                        </tr>
                                        <tr class="border-0">
                                            <td class="border-0 py-2"></td>
                                        </tr>
                                        <tr class="border-0 px-2 py-1">
                                            <td class="border-0 px-2 py-1">Capital </td>
                                            <td class="border-0 px-2 py-1"><span
                                                    class="float-end">{{ number_format($businessinfo->capital) ?? 'Not specified' }}
                                                </span> </td>
                                        </tr>
                                        <td class="border-0 px-2 py-1">Net Profit </td>
                                        <td class="border-0 px-2 py-1"><span
                                                class="float-end">{{ number_format($result) ?? 'Not specified' }}
                                            </span> </td>
                                        </tr>
                                        <tr class="bg-soft-primary">
                                            @php $totalSharedEquity  = $totalCurrentLiabilities + $businessinfo->capital + $result;  @endphp
                                            <td class="fw-bold">Liabilities and shareholder Equities </td>
                                            <td class="fw-bold text-end">
                                                {{ number_format($totalSharedEquity) }}
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <div class="">
                                    @php
                                         $averageInventory = (($businessinfo->raw_start + $businessinfo->raw_end)*365)/2;
                                        
                                         $costOfGoodsSold = 0;
                                         foreach ($products as $product) {
                                            $costOfGoodsSold += $product->price * $product->quantity;
                                         }
                                         $costOfGoodsSold *= 365;
                                         $dio = ($averageInventory / $costOfGoodsSold);
                                         $quickratio = ($businessinfo->cash + $businessinfo->cashown)/$totalCurrentLiabilities;
                                         $dso = ((($businessinfo->cashown* 1.2)/2)/$total) * 365;
                                         $dpo = ((($businessinfo->debt* 1.2)/2)/$total) *365;
                                         $ccc = $dio + $dso -$dpo;
                                         $pp =  $businessinfo->capital / $result;
                                    @endphp
                                    <h4>Indicators</h4>
                                    <table class="table">
                                        <thead>
                                            <th class="px-2 py-1">Indicator</th>
                                            <th class="px-2 py-1">Value</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Quick Ration (QR)</td>
                                                <td>{{ number_format($quickratio,2) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Days Inventory Outstanding (DIO)</td>
                                                <td>{{ number_format($dio,2) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Days Sales Outstanding (DSO) </td>
                                                {{-- <td>{{ (($businessinfo->cashown/2)/$total) * 365 }}</td> --}}
                                                <td>{{ number_format($dso,2) }}</td>
                              
                                            </tr>
                                            <tr>
                                                <td>Days Payable Outstanding (DPO) </td>
                                                {{-- <td>{{ (($businessinfo->cashown/2)/$total) * 365 }}</td> --}}
                                                <td>{{ number_format($dpo,2) }}</td>
                              
                                            </tr>
                                            <tr>
                                                <td>Cash conversion cycle (CCC) </td>
                                                {{-- <td>{{ (($businessinfo->cashown/2)/$total) * 365 }}</td> --}}
                                                <td>{{ number_format($ccc,2) }}</td>
                              
                                            </tr>
                                            <tr>
                                                <td>Payback period </td>
                                                {{-- <td>{{ (($businessinfo->cashown/2)/$total) * 365 }}</td> --}}
                                                <td>{{ number_format($pp,2) }}</td>
                              
                                            </tr>
                                        </tbody>
                                    </table>
                                
                                </div>
                            @else
                                <div class="alert alert-danger my-5">
                                    <h3 class="text-danger m-0 p-0">You have not added your income information</h3>

                                </div>
                                <div class="d-flex">
                                    <a href="{{ route('product') }}" class="btn btn-grape btn-sm">Add Products</a>
                                    <button class="btn btn-outline-danger ms-4 btn-sm"
                                        onclick="history.back()">Back</button>
                                </div>
                            @endif
                        </div>

                    </div>



                    {{-- @if (!$salesforcasts->isEmpty())
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
                                                        <td class="m-0 p-0">
                                                            {{ $totalqty = $salesforcast->jan_qty + $salesforcast->feb_qty + $salesforcast->mar_qty + $salesforcast->apr_qty + $salesforcast->may_qty + $salesforcast->jun_qty + $salesforcast->jul_qty + $salesforcast->aug_qty + $salesforcast->sep_qty + $salesforcast->oct_qty + $salesforcast->nov_qty + $salesforcast->dec_qty }}
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
                                                        <td class="m-0 p-0">
                                                            {{ $jan_sales = $salesforcast->jan_price * $salesforcast->jan_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $feb_sales = $salesforcast->feb_price * $salesforcast->feb_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $mar_sales = $salesforcast->mar_price * $salesforcast->mar_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $apr_sales = $salesforcast->apr_price * $salesforcast->apr_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $may_sales = $salesforcast->may_price * $salesforcast->may_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $jun_sales = $salesforcast->jun_price * $salesforcast->jun_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $jul_sales = $salesforcast->jul_price * $salesforcast->jul_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $aug_sales = $salesforcast->aug_price * $salesforcast->aug_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $sep_sales = $salesforcast->sep_price * $salesforcast->sep_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $oct_sales = $salesforcast->oct_price * $salesforcast->oct_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $nov_sales = $salesforcast->nov_price * $salesforcast->nov_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $dec_sales = $salesforcast->dec_price * $salesforcast->dec_qty }}
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
                                                        <td class="m-0 p-0">
                                                            {{ $jan_cost = $salesforcast->jan_cost * $salesforcast->jan_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $feb_cost = $salesforcast->feb_cost * $salesforcast->feb_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $mar_cost = $salesforcast->mar_cost * $salesforcast->mar_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $apr_cost = $salesforcast->apr_cost * $salesforcast->apr_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $may_cost = $salesforcast->may_cost * $salesforcast->may_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $jun_cost = $salesforcast->jun_cost * $salesforcast->jun_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $jul_cost = $salesforcast->jul_cost * $salesforcast->jul_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $aug_cost = $salesforcast->aug_cost * $salesforcast->aug_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $sep_cost = $salesforcast->sep_cost * $salesforcast->sep_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $oct_cost = $salesforcast->oct_cost * $salesforcast->oct_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $nov_cost = $salesforcast->nov_cost * $salesforcast->nov_qty }}
                                                        </td>
                                                        <td class="m-0 p-0">
                                                            {{ $dec_cost = $salesforcast->dec_cost * $salesforcast->dec_qty }}
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


                            </div>

                        </div>
                    @endif --}}


                    @if (empty($businessinfo->audience_need) ||
                            empty($businessinfo->competition_ad) ||
                            empty($businessinfo->target_market) ||
                            empty($businessinfo->management_team) ||
                            empty($businessinfo->loan_reason))
                        <div class="float-end mt-8">
                            <button class="btn btn-grape btn-lg disabled">Submit Application</button>
                        </div>
                    @else
                        <div class="float-end mt-8">
                            <form action="{{ route('finalsubmission') }}" method="post">
                                @csrf
                                <input type="text" name="id" value="{{ $businessinfo->id }}" hidden>
                                @if ($businessinfo->status == 'Completed')
                                    <h4>Your application has been submitted</h4>
                                @else
                                    <button class="btn btn-grape btn-lg">Submit Application</button>
                                @endif
                            </form>

                        </div>
                    @endif
                </div>

            </div>

        </div>
        </div>
    </section>
@endsection
