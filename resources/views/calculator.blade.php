@extends('layouts.app')

@section('content')
<section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('asset/img/photos/bg4.jpg')}}">
        
        <div class="wrapper bg-graf">
            <div class="container py-10 py-md-12">
                <div class="row">
                    <div class="col-lg-10 col-xxl-8 ">
                        <h1 class="display-2 mb-1 text-white">Your Simple. Convenient. Reliable. Credible.
                            One-stop Credit Service.</h1>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
                <div class="text-center mt-10">
                    <a href="{{route('dashboard')}}" class="btn btn-white">Get Started <i
                            class="uil uil-arrow-right display-6"></i></a>
                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>

    <section class="bg-gray ">
        <div class="container  py-10 py-md-12 ">
            <div class="card shadow text-dark ">
                <div class="card-header bg-grape text-white fs-16 fw-bold rounded-0">Loan calculator</div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" mb-4">
                                <label for="textInputExampl">Funding Amount</label>
                                <input id="loanamount" min="0" value="1000000" type="number"
                                    class="form-control border-gray-800 loan" placeholder="Funding amount">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="textInputExample">Interest rate (%)</label>
                                        <input id="interest" min="1" value="10" type="number"
                                            class="form-control border-gray-800">
                                        <p class="fs-14 text-info">The default interest has been set to 10%</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="textInputExample">Loan Duration (years)</label>
                                        <input id="fundingperiod" min="1" value="5" type="number"
                                            class="form-control border-gray-800">
                                    </div>
                                </div>
                            </div>
                            <div class="form-select-wrapper mb-4">
                                <label for="textInputExample">Payment method</label>
                                <select class="form-select" aria-label="period" id="paymentperiod">
                                    <option value="1" data-plan="Annual" selected>Annual</option>
                                    <option value="2" data-plan="Semi annual">Semi annual</option>
                                    <option value="4" data-plan="Quarterly">Quarterly</option>
                                    <option value="12" data-plan="Monthly" selected>Monthly</option>
                                </select>
                            </div>

                            <div class=" mb-4">
                                <label for="textInputExample">Moratorium (Years)</label>
                                <input id="mora" type="number" min="0" class="form-control border-gray-800"
                                    placeholder="Moratorium">
                            </div>
                            <button class="btn btn-grape" id="calculateBtn" onclick="calculateLoan()">Calculate</button>
                        </div>

                        <div class="col-md-6">


                            <figure class="highcharts-figure">
                                <div id="container"></div>

                            </figure>
                            <div id="result" class="mb-4"></div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>


    {{-- <section class="bg-gray pb-10">
        <div class="container  pt-10 pt-md-12 ">
            <div class="card shadow text-dark ">
                <div class="card-header bg-grape text-white fs-16 fw-bold rounded-0">Mortage calculator</div>
                <div class="card-body ">
                    <div class="row">
                        <div class="col-md-6">
                            <div class=" mb-4">
                                <label for="textInputExampl">Funding Amount</label>
                                <input id="loanamount" min="0" value="1000000" type="number"
                                    class="form-control border-gray-800 loan" placeholder="Funding amount">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="textInputExample">Interest rate (%)</label>
                                        <input id="interest" min="1" value="10" type="number"
                                            class="form-control border-gray-800">
                                        <p class="fs-14 text-info">The default interest has been set to 10%</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="textInputExample">Loan Duration (years)</label>
                                        <input id="fundingperiod" min="1" value="5" type="number"
                                            class="form-control border-gray-800">
                                    </div>
                                </div>
                            </div>
                            <div class="form-select-wrapper mb-4">
                                <label for="textInputExample">Payment method</label>
                                <select class="form-select" aria-label="period" id="paymentperiod">
                                    <option value="1" data-plan="Annual" selected>Annual</option>
                                    <option value="2" data-plan="Semi annual">Semi annual</option>
                                    <option value="4" data-plan="Quarterly">Quarterly</option>
                                    <option value="12" data-plan="Monthly" selected>Monthly</option>
                                </select>
                            </div>

                            <div class=" mb-4">
                                <label for="textInputExample">Moratorium (Years)</label>
                                <input id="mora" type="number" min="0" class="form-control border-gray-800"
                                    placeholder="Moratorium">
                            </div>
                            <button class="btn btn-grape" id="calculateBtn" onclick="calculateLoan()">Calculate</button>
                        </div>

                        <div class="col-md-6">


                            <figure class="highcharts-figure">
                                <div id="container"></div>

                            </figure>
                            <div id="result" class="mb-4"></div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section> --}}

    {{-- <div class="formPage">
            <h1>Format Currency Sample</h1>
            
            <div class="sample">
                <h3>Formatting Using Button Click</h3>
                <input type="textbox" id="currencyField" value="$1,220.00" />
                <input type="button" id="currencyButton" value="Convert" />
                
                <div>
                    Formatting Currency to an Html Span tag.
                    <span class="currencyLabel">$1,220.00</span>
                </div>
            </div>
            
            <div class="sample">
                <h3>Formatting Using Blur (Lost Focus)</h3>
                
                <input type="textbox" id="currencyField" class='currency' value="$1,220.00" />
            </div>
            
        </div> --}}

    <script>
        $(document).ready(function() {
            $('#currencyButton').click(function() {
                $('#currencyField').formatCurrency();
                $('#currencyField').formatCurrency('.currencyLabel');
            });
        });

        // // Sample 2
        $(document).ready(function() {
            $('.currency').blur(function() {
                $('.currency').formatCurrency();
            });


        });

        $(document).ready(function() {
            $('#calculateBtn').click(function() {
                calculateLoan();
            });

            // $('.loan').blur(function() {
            //     $('#loanamount').replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()
            // })
            // $('.loan').blur(function() {
            //     $('.loan').formatCurrency();
            // });
            // var interest = 100;
            function calculateLoan() {


                var loanAmount = parseFloat($('#loanamount').val());
                var interestRate = parseFloat($('#interest').val());
                var fundingPeriod = parseFloat($('#fundingperiod').val());
                var paymentPeriod = parseFloat($('#paymentperiod').val());
                var memorationPeriod = parseFloat($('#mora').val());

                // function groupNum(){

                // }

                if (memorationPeriod >= fundingPeriod) {
                    Swal.fire({
                        // title: 'Error!',
                        // position: "top-end",
                        // text: 'Memoration period must be less than loan term',
                        html: `<p class='fs-16'>Memoration period must be less than loan Duration</p> `,
                        icon: 'warning',
                        confirmButtonText: 'Ok',
                        width: '18em',
                        height: '16rem'
                    })
                } else {
                    console.log(memorationPeriod)
                    if (isNaN(memorationPeriod) || memorationPeriod === '') {
                        memorationPeriod = 0;
                        $('#mora').val(0);
                        console.log(memorationPeriod)
                    }

                    var monthlyInterestRate = interestRate / 100 / paymentPeriod;
                    numberOfPayments = (fundingPeriod - memorationPeriod) * paymentPeriod;

                    monthlyPayment = (loanAmount * monthlyInterestRate) /
                        (1 - Math.pow(1 + monthlyInterestRate, -numberOfPayments));

                    var totalRepayment = monthlyPayment * numberOfPayments;
                    interest = parseInt((totalRepayment - loanAmount).toFixed(0))
                    generateChart(loanAmount, interest)
                    var selectedOption = $('#paymentperiod option:selected');
                    var paymentPlan = selectedOption.data('plan')
                    $('#result').html(`
                        <p class=' p-0 m-0'>Your ${paymentPlan} repayment will be<b class='text-primary'> ${monthlyPayment.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()}</b></p>
                        <p class=' p-0 m-0'>Total of ${numberOfPayments} payments:<b>   ${totalRepayment.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()}</b></p>
                        <p class=' p-0 m-0'>The total Interest <b> ${interest.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()}</b></p>
                    `);
                }



            }

        });
        Highcharts.setOptions({
            colors: Highcharts.map(Highcharts.getOptions().colors, function(color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            })
        });

        function generateChart(loan, interest) {


            Highcharts.chart('container', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: '',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<span style="font-size: 1.2em"><b>{point.name}</b></span><br>' +
                                '<span style="opacity: 0.6">{point.percentage:.1f} %</span>',
                            connectorColor: 'rgba(128,128,128,0.5)'
                        }
                    }
                },
                series: [{
                    name: 'Share',
                    data: [{
                            name: 'Funding amount',
                            y: loan
                        },
                        {
                            name: 'Interest',
                            y: interest
                        },
                        // { name: 'Electricity', y: 325251 },
                        // { name: 'Other', y: 238751 }
                    ]
                }]
            });
        }
    </script>
@endsection
