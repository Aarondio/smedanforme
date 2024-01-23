@extends('layouts.app')

@section('content')
    <section class="wrapper bg-light py-5 py-md-10">
        <div class="container">
            @if ($products->isNotEmpty())
                <div class="row justify-content-center">
                    <aside class="col-lg-2 sidebar sticky-sidebar mt-md-0  d-none d-xl-block">
                        <div class="widget">
                            {{-- <h6 class="widget-title fs-17 mb-2 ps-xl-5">On this page</h6> --}}
    
                            <div class="card bg-transparent">
                                <div class="card-body p-3 m-0">
                                    <nav class="" id="sidebar-nav">
                                        <ul class="list-unstyled fs-sm lh-sm text-reset fw-light">
                                            <li><a class="nav-link  fw-normal "
                                                    href="{{ route('personal') }}">Personal Info</a>
                                            </li>
                                            @if ($businessinfo->id != null)
                                                <li><a class="nav-link  my-1 fw-normal " href="{{ route('business') }}">Business
                                                        Info</a></li>
    
                                                <li><a class="nav-link fw-normal " href="{{ route('nanoplan') }}">Business
                                                        Description</a></li>
    
                                                <li><a class="nav-link fw-normal my-1" href="{{ route('product') }}">Add
                                                        Products/Services</a></li>
                                                <li><a class="nav-link fw-normal " href="{{ route('finance') }}">Expenses
                                                        Records</a>
                                                </li>
                                            @endif
                                            @if ($expenses->id != null)
                                                <li><a class="nav-link fw-normal active text-decoration-underline"
                                                        href="{{ route('financial-record', $expenses->id) }}">Preview
                                                        Finances</a>
                                                </li>
                                            @endif
                                            @if ($businessinfo->id != null)
                                                <li><a class="nav-link fw-normal " href="{{ route('preview') }}">Preview
                                                        submission</a></li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
    
                        </div>
                    </aside>
                    <div class="col-lg-10 col-md-12  card shadow-lg px-5">
                        <div class="d-flex justify-content-between py-3">
                            <h1 class="text-left align-self-center">Income Record for {{ $expenses->year }}</h1>
                            <a class="btn btn-grape btn-sm text-white" href="{{ route('myproducts') }}">Edit Products</a>
                        </div>

                        {{-- <div class="alert alert-success border-success">
                        <p>This is the list of your financial record for the year {{ $expenses->year }}</p>
                        <a class="btn btn-success btn-sm text-white" href="{{ route('product') }}">Edit Record</a>
                    </div> --}}

                        {{-- <div class="card">
                        <div class="card-body">
                            <h1>Hello world</h1>
                        </div>
                    </div> --}}
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

                                        $total += $product->quantity * $product->price - ($product->quantity - $product->cost);

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


                        <div class="d-flex justify-content-between py-3 mt-10">
                            <h1 class="text-left align-self-center">Expenses for the year {{ $expenses->year }} </h1>
                            <a class="btn btn-grape btn-sm text-white" href="{{ route('finance') }}">Edit Expenses</a>
                        </div>
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
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->rent) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark p-1">Utilities</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->utilities) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark text-capitalize p-1">salary</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->salary) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark text-capitalize p-1">Social securities</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->securities) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark text-capitalize p-1">website / Softwares</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->website) }}</td>
                                </tr>

                                <tr>
                                    <td class="text-dark text-capitalize p-1">admin expenses</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->adminexpenses) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark text-capitalize p-1">marketing </td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->marketing) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark text-capitalize p-1">supplies and other purchases</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->supplies) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark text-capitalize p-1">licenses</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->licences) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark text-capitalize p-1">internet & Telephone</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->internet) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark text-capitalize p-1">legal fees</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->legal) }}</td>
                                </tr>


                                <tr>
                                    <td class="text-dark text-capitalize p-1">Consultants</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->consultation) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-dark text-capitalize p-1">miscellaneous</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->miscell) }}</td>
                                </tr>
                                <tr>
                                    <td class="text-dark text-capitalize p-1">insurance</td>
                                    <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->insurance) }}</td>
                                </tr>
                                <tr class="">
                                    <td class="text-dark text-capitalize p-1 fw-bold">Total Expenses</td>
                                    <td class="text-dark text-end p-1">
                                        <strong>{{ '₦' .
                                            number_format(
                                                $totalexp =
                                                    $expenses->rent +
                                                    $expenses->utilities +
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
                    </div>


                </div>


        </div>
    </section>

    <section class="wrapper bg-light ">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-10 col-md-12  card shadow-lg py-5">
                    <h1 class="text-left ">Financial Projection</h1>
                    <!-- Table to display revenue and profit projections -->
                    <table class="table table-bordered">
                        <thead>
                            <tr class="bg-soft-primary text-white">
                                <th class="text-dark text-capitalize p-1 text-center fw-bold">Year</th>
                                <th class="text-dark text-capitalize p-1 text-center fw-bold">Projected Revenue</th>
                                <th class="text-dark text-capitalize p-1 text-center fw-bold">Projected Expenses</th>
                                <th class="text-dark text-capitalize p-1 text-center fw-bold">Projected Profit</th>
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
                                <td class="text-dark text-center p-1">{{ '₦' . number_format($totalexp) }}</td>
                                <td class="text-dark text-center p-1">{{ '₦' . number_format($total - $totalexp) }}</td>
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
                                    <td class="text-dark text-center p-1">{{ '₦' . number_format($revenue) }}</td>
                                    <td class="text-dark text-center p-1">{{ '₦' . number_format($expenses) }}</td>
                                    <td class="text-dark text-center p-1">{{ '₦' . number_format($projectedProfit) }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            @else 
            <div class="alert alert-danger my-5">
                <h3 class="text-danger m-0 p-0">You have not added your income information</h3>
                
            </div>
           <div class="d-flex">
            <a href="{{ route('product') }}" class="btn btn-grape btn-sm">Add Products</a>
            <button class="btn btn-outline-danger ms-4 btn-sm" onclick="history.back()">Back</button>
           </div>
            @endif
        </div>

    </section>
@endsection
