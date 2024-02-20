@extends('layouts.app')
@section('content')
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('asset/img/photos/bg4.jpg') }}">

        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xxl-8 text-center">
                        <h1 class="display-2 mb-1 text-white">Business Records</h1>
                        <p>Fill out the form below</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper bg-gray py-10 py-md-12">
        <div class="container">
            <div class="row justify-content-center ">
                <aside class="col-lg-2 sidebar sticky-sidebar mt-md-0  d-none d-xl-block">
                    <div class="widget">
                        {{-- <h6 class="widget-title fs-17 mb-2 ps-xl-5">On this page</h6> --}}

                        <div class="card bg-transparent">
                            <div class="card-body p-3 m-0">
                                <nav class="" id="sidebar-nav">
                                    <ul class="list-unstyled fs-sm lh-sm text-reset fw-light">
                                        <li><a class="nav-link  fw-normal" href="{{ route('personal') }}">Personal Info</a>
                                        </li>
                                        @if (empty($businessinfo->suin))
                                            <li><a class="nav-link  fw-normal" href="{{ route('suin') }}">SUIN
                                                    Verification</a>
                                        @endif
                                        </li>
                                        <li><a class="nav-link  my-1 fw-normal " href="{{ route('business') }}">Business
                                                Info</a></li>
                                        <li><a class="nav-link fw-normal" href="{{ route('nanoplan') }}">Business
                                                Description</a></li>
                                        <li><a class="nav-link fw-normal " href="{{ route('swot') }}">Swot
                                                Analysis</a></li>
                                        <li><a class="nav-link fw-normal my-1" href="{{ route('product') }}">Add
                                                Products/Services</a></li>

                                        <li><a class="nav-link fw-normal" href="{{ route('finance') }}">Expenses Records</a>
                                        </li>
                                        <li><a class="nav-link fw-normal my-1 active text-decoration-underline"
                                                href="{{ route('balance') }}">
                                                Business Records</a></li>
                                        {{-- <li><a class="nav-link fw-normal " href="{{ route('preview') }}">Preview finance</a> --}}
                                        </li>
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
                <div class="col-lg-10 col-md-12 ">
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h4 class="m-0">Business records</h4>
                        </div>
                        <div class="card-body mt-0 pt-0">

                            <p class="text-danger">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </p>

                            @if ($errors->any())
                                <div class="alert alert-danger py-1">
                                    <ul class="m-0 p-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- <h2 class="text-capitalize">Business information</h2> --}}
                            <form action="{{ route('updatesheet') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="id" value="{{ $businessinfo->id }}" hidden>
                                        <div class="mb-3">
                                            <label for="capital">What is the initial capital invested in this
                                                business?</label>
                                            <input type="text" name="capital" placeholder="Initial Capital"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->capital) ?? old('capital') }}">
                                        </div>
                                        <!-- start Liabilities -->
                                        <div class="mb-3">
                                            <label for="capital">How much does the business currently owe?</label>
                                            <input type="text" name="debt" placeholder="Debt amount"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->debt) ?? old('debt') }}">
                                        </div>
           
                                        <div class="mb-3">
                                            <label for="capital">How much do customers currently owe your business?</label>
                                            <input type="text" name="cashown" placeholder="Cash at hand and in Bank"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->cashown) ?? old('cashown') }}">
                                        </div>
                                        <div class="mb-3">

                                            <label for="capital">Does your business have a long-term loan? If yes, please
                                                specify
                                                the amount.</label>
                                            <input type="text" name="loan" placeholder="Enter loan amount"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->loan) ?? old('loan') }}">
                                        </div>
                                        <div class="mb-3">

                                            <label for="capital">Does your business have any unpaid tax? If yes, please
                                                specify
                                                the amount.</label>
                                            <input type="text" name="tax" placeholder="Enter loan amount"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->tax) ?? old('tax') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="capital" class="">What is the current value of inventory or unsold goods you have in stock?</label>
                                            <input type="text" name="inventory" placeholder="Current value of inventories"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->inventory) ?? old('inventory') }}">
                                        </div>
                                        <!-- end Liabilities -->
                                    </div>

                                    <!-- Start Asset -->
                                    <div class="col-md-6">
                                        {{-- <div class="mb-3">
                                            <label for="capital" class="fs-15">What is the value of the equipment
                                                currently in use by the
                                                business?</label>

                                            <input type="text" name="equipment"
                                                placeholder="E.g Computers, Office equipment" class="form-control number-format"
                                                type="number" value="{{ number_format($businessinfo->debt) ?? old('debt') }}">
                                        </div> --}}
                                        <div class="mb-3">
                                            <label for="capital">Does your business owned a land? if yes what is the value?</label>
                                            <input type="text" name="lands" placeholder="Land value"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->lands) ?? old('lands') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="capital">Does your business owned any intangible asset? if yes what is the value?</label>
                                            <input type="text" name="intangible" placeholder="Value of intangible asset"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->intangible) ?? old('intangible') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="capital">What is the value of the plant and Machineries owned by the
                                                business?</label>
                                            <input type="text" name="plants" placeholder="Plants E.g Land, Vehicle"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->plants) ?? old('plants') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="capital" class="">What is the current depreciation value for your business assets?</label>
                                            <input type="text" name="depreciation" placeholder="Cash at hand and in Bank"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->depreciation) ?? old('depreciation') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="capital" class="">How much does your business currently
                                                have
                                                in the bank and on
                                                hand?</label>
                                            <input type="text" name="cash" placeholder="Cash at hand and in Bank"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->cash) ?? old('cash') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="capital" class="">What was the monetary value of the raw materials or goods in stock at the beginning of the year?</label>
                                            <input type="text" name="raw_start" placeholder="price of raw material"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->raw_start) ?? old('raw_start') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="capital" class="">What was the monetary value of the raw materials or goods in stock at the end of the year?</label>
                                            <input type="text" name="raw_end" placeholder="price of raw material"
                                                class="form-control number-format" type="number" value="{{ number_format($businessinfo->raw_end) ?? old('raw_end') }}">
                                        </div>
                                       

                                    </div>
                                    <!-- end Asset -->
                                </div>
                                <button class="btn btn-grape">Submit record</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="justify-content-between d-flex">
                                <div class="col-md-6">
                                    <a href="{{ route('personal') }}" class="btn btn-outline-danger btn-sm">Back</a>
                                </div>
                                <div class="col-md-6">
                                    <a href="nanoplan" class="float-end btn btn-outline-primary btn-sm">Next</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
    <script>
        $('.number-format').on('input', function(event) {
            let value = $(this).val().replace(/[^0-9]/g, '');
            let formattedValue = addCommas(value);
            $(this).val(formattedValue);
        });

        function addCommas(value) {
            let parts = value.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }


        $('form').on('submit', function(event) {
            $('.number-format').each(function() {
                let fieldValue = $(this).val().replace(/,/g, '');
                $(this).val(fieldValue);
            });
        });

        $('.number-format').on('keypress', function(event) {
            var keyCode = event.which ? event.which : event.keyCode;
            if (keyCode > 31 && (keyCode < 48 || keyCode > 57)) {
                event.preventDefault();
            }
        });
    </script>
@endsection
