@extends('layouts.app')

@section('content')
    <section class="wrapper bg-light py-5 py-md-10">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 ">
                    <div class="d-flex justify-content-between py-3">
                        <h1 class="text-left align-self-center">Financial Record for {{ $expenses->year }}</h1>
                        <a class="btn btn-grape btn-sm text-white" href="{{ route('product') }}">Edit Records</a>
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

                            @if ($products->isNotEmpty())
                                @php $total  = 0; @endphp
   
                                @foreach ($products as $product)
                                    @php $total +=$product->price @endphp
                                    <tr>
                                        <td class="text-dark  p-1">
                                            {{'Revenue from '. $product->name }}
                                        </td>
                                        <td class="text-dark text-end p-1">
                                            {{ '₦' . number_format($product->price) }}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <tr class="bg-soft-primary">
                                <td class="text-dark text-capitalize p-1 fw-bold">Total Revenues</td>
                                <td class="text-dark text-end p-1 fw-bold">
                                    {{ '₦' . number_format($total) }}
                                </td>
                            </tr>
                            <tr class="bg-white">
                                <td colspan="2" class=" fw-bold m-0 p-1 text-dark">Expenses</td>
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
                                <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->securities) }}</td>
                            </tr>
                            <tr>
                                <td class="text-dark text-capitalize p-1">website / Softwares</td>
                                <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->website) }}</td>
                            </tr>

                            <tr>
                                <td class="text-dark text-capitalize p-1">admin expenses</td>
                                <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->adminexpenses) }}</td>
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
                                <td class="text-dark text-end p-1">{{ '₦' . number_format($expenses->consultation) }}</td>
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

    <section class="wrapper bg-light py-5 py-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-left align-self-center">Financial Projection</h1>
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
                                <td class="text-dark text-center p-1">{{ '₦' . number_format($total-$totalexp) }}</td>
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
        </div>
    </section>
@endsection
