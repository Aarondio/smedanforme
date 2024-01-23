@extends('layouts.app')

@section('content')
    <style>
        /* *{
                                    border: 1px solid red;
                                } */
    </style>
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('asset/img/photos/bg4.jpg') }}">


        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xxl-8 text-center">
                        <h1 class="display-2 mb-1 text-white text-capitalize">Business information</h1>
                        <p class="text-capitalize">Fill out the form below</p>
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
                                        <li><a class="nav-link  my-1 fw-normal active text-decoration-underline"
                                                href="{{ route('business') }}">Business
                                                Info</a></li>
                                        <li><a class="nav-link fw-normal" href="{{ route('nanoplan') }}">Business
                                                Description</a></li>
                                        <li><a class="nav-link fw-normal " href="{{ route('swot') }}">Swot
                                                Analysis</a></li>
                                        <li><a class="nav-link fw-normal my-1" href="{{ route('product') }}">Add
                                                Products/Services</a></li>
                                        <li><a class="nav-link fw-normal" href="{{ route('finance') }}">Expenses Records</a>
                                        </li>

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
                <div class="col-lg-10 col-md-12 card shadow-lg">
                    <div class="card-body">

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

                        <h2 class="text-capitalize">Business information</h2>
                        <form action="{{ route('updatebusiness') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $businessinfo->id }}" hidden>
                            <div class="row text-dark">
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="business_name" class="mb-3">Business name</label>
                                        <input id="business_name"
                                            value="{{ old('business_name') ?: $businessinfo->business_name ?? '' }}"
                                            name="business_name" type="text"
                                            class="form-control @error('business_name') is-invalid @enderror"
                                            placeholder="Business name">
                                        {{-- @error('business_name')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <div class="form-select-wrapper mb-4">
                                            <label for="is_registered" class="mb-3">Is your business registered?</label>
                                            <select class="form-select @error('is_registered') is-invalid @enderror"
                                                name="is_registered" id="is_registered" aria-label="is_registered">
                                                <option disabled
                                                    {{ old('is_registered', $businessinfo->is_registered) == '' ? 'selected' : '' }}>
                                                    Is your business registered?</option>
                                                <option value="Yes"
                                                    {{ old('is_registered', $businessinfo->is_registered) == 'Yes' ? 'selected' : '' }}>
                                                    Yes</option>
                                                <option value="No"
                                                    {{ old('is_registered', $businessinfo->is_registered) == 'No' ? 'selected' : '' }}>
                                                    No</option>
                                            </select>

                                            {{-- @error('is_registered')
                                                <p class="small text-danger"> {{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <div class="form-select-wrapper mb-4">
                                            <label for="register_type" class="mb-3">Type of Registration</label>
                                            <select class="form-select @error('register_type') is-invalid @enderror"
                                                name="register_type" id="register_type" aria-label="register_type">
                                                <option disabled
                                                    {{ old('register_type', $businessinfo->register_type) == '' ? 'selected' : '' }}>
                                                    Select Register Type</option>
                                                <option value="Business Name"
                                                    {{ old('register_type', $businessinfo->register_type) == 'Business Name' ? 'selected' : '' }}>
                                                    Business Name</option>
                                                <option value="Limited Liability Company"
                                                    {{ old('register_type', $businessinfo->register_type) == 'Limited Liability Company' ? 'selected' : '' }}>
                                                    Limited Liability Company</option>
                                                <option value="Cooperative Society"
                                                    {{ old('register_type', $businessinfo->register_type) == 'Cooperative Society' ? 'selected' : '' }}>
                                                    Cooperative Society</option>
                                            </select>

                                            {{-- @error('business_type')
                                                <p class="small text-danger"> {{ $message }}</p>
                                            @enderror --}}
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="suin" class="mb-3">SMEDAN Unique Identification
                                            Number(SUIN)</label>
                                        <input id="suin" name="suin"
                                            value="{{ old('suin') ?: $businessinfo->suin ?? 'SUIN' }}" type="text"
                                            class="form-control @error('suin') is-invalid @enderror" placeholder="SUIN">
                                        {{-- @error('suin')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="business_age" class="mb-3">How old is your business?</label>
                                        <input id="business_age" name="business_age"
                                            value="{{ old('business_age') ?: $businessinfo->business_age ?? '' }}"
                                            type="number" class="form-control @error('business_age') is-invalid @enderror"
                                            placeholder="E.g 3">
                                        {{-- @error('suin')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="sector" class="mb-3">Business Sector</label>
                                        <select class="form-select @error('sector') is-invalid @enderror" name="sector"
                                            id="sector" aria-label="sector">
                                            <option disabled
                                                {{ old('sector', $businessinfo->sector) == '' ? 'selected' : '' }}>Select
                                                business sector</option>
                                            <option value="Agriculture"
                                                {{ old('sector', $businessinfo->sector) == 'Agriculture' ? 'selected' : '' }}>
                                                Agriculture</option>
                                            <option value="Manufacturing"
                                                {{ old('sector', $businessinfo->sector) == 'Manufacturing' ? 'selected' : '' }}>
                                                Manufacturing</option>
                                            <option value="Technology"
                                                {{ old('sector', $businessinfo->sector) == 'Technology' ? 'selected' : '' }}>
                                                Technology</option>
                                            <option value="FMCG"
                                                {{ old('sector', $businessinfo->sector) == 'FMCG' ? 'selected' : '' }}>FMCG
                                            </option>
                                            <option value="Entertainment"
                                                {{ old('sector', $businessinfo->sector) == 'Entertainment' ? 'selected' : '' }}>
                                                Entertainment</option>
                                            <option value="Hospitality"
                                                {{ old('sector', $businessinfo->sector) == 'Hospitality' ? 'selected' : '' }}>
                                                Hospitality</option>
                                            <option value="Mininig"
                                                {{ old('sector', $businessinfo->sector) == 'Mininig' ? 'selected' : '' }}>
                                                Mininig</option>
                                            <option value="Others"
                                                {{ old('sector', $businessinfo->sector) == 'Others' ? 'selected' : '' }}>
                                                Others</option>
                                        </select>


                                        {{-- @error('sector')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="sector" class="mb-3">Loan Amount</label>
                                        <select name="loan_amount" id="loan_amount"
                                            class="form-select text-dark @error('loan_amount') is-invalid @enderror">
                                            <option value=""
                                                @if (old('loan_amount', $businessinfo->loan_amount) == '') disabled selected @endif>Select loan
                                                amount</option>
                                            <option value="250000" @if (old('loan_amount', $businessinfo->loan_amount) == '250000') selected @endif>
                                                250,000</option>
                                            <option value="500000" @if (old('loan_amount', $businessinfo->loan_amount) == '500000') selected @endif>
                                                500,000</option>
                                            <option value="1000000" @if (old('loan_amount', $businessinfo->loan_amount) == '1000000') selected @endif>
                                                1,000,000</option>
                                            <option value="1500000" @if (old('loan_amount', $businessinfo->loan_amount) == '1500000') selected @endif>
                                                1,500,000</option>
                                            <option value="2000000" @if (old('loan_amount', $businessinfo->loan_amount) == '2000000') selected @endif>
                                                2,000,000</option>
                                            <option value="2500000" @if (old('loan_amount', $businessinfo->loan_amount) == '2500000') selected @endif>
                                                2,500,000</option>
                                        </select>


                                        {{-- @error('sector')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="website" class="mb-3">Website (Optional)</label>
                                        <input id="website"
                                            value="{{ old('business_name') ?: $businessinfo->website ?? '' }}"
                                            name="website" type="text"
                                            class="form-control @error('business_name') is-invalid @enderror"
                                            placeholder="www.hkfenterprise.com">
                                        {{-- @error('business_name')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <div class="form-select-wrapper mb-4">
                                            <label for="no_emp" class="">Number of Employees</label>
                                            <select class="form-select @error('emp_no') is-invalid @enderror"
                                                name="emp_no" id="emp_no" aria-label="emp_no">
                                                <option value=""
                                                    {{ (old('emp_no') ?? $businessinfo->emp_no) == '' ? 'selected' : '' }}>
                                                    Select numbers of Employee
                                                </option>
                                                <option value="0-5"
                                                    {{ (old('emp_no') ?? $businessinfo->emp_no) === '0-5' ? 'selected' : '' }}>
                                                    0-5
                                                </option>
                                                <option value="6-10"
                                                    {{ (old('emp_no') ?? $businessinfo->emp_no) === '6-10' ? 'selected' : '' }}>
                                                    6-10
                                                </option>
                                                <option value="11-15"
                                                    {{ (old('emp_no') ?? $businessinfo->emp_no) === '11-15' ? 'selected' : '' }}>
                                                    11-15
                                                </option>
                                                <option value="16-20"
                                                    {{ (old('emp_no') ?? $businessinfo->emp_no) === '16-20' ? 'selected' : '' }}>
                                                    16-20
                                                </option>
                                                <option value="Above 20"
                                                    {{ (old('emp_no') ?? $businessinfo->emp_no) === 'Above 20' ? 'selected' : '' }}>
                                                    Above 20
                                                </option>
                                            </select>



                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="address">Business Locations/Address (with landmarks)</label>
                                        <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Business Address">{{ old('address', $businessinfo->address) }}</textarea>

                                        {{-- @error('address')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-grape" style="width:200px" type="submit">Save</button>

                            <!-- /.form-floating -->
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
    </section>
    <script>
        $(document).ready(function() {
            // Function to limit word count for an input element
            function limitWordCount(inputElement, wordLimit, counter) {
                inputElement.on('input', function() {
                    var content = $(this).val();
                    var words = content.match(/\S+/g) || [];
                    var wordCount = words.length;
                    counter.text(wordCount);

                    if (wordCount > wordLimit) {
                        var truncatedContent = words.slice(0, wordLimit).join(' ');
                        $(this).val(truncatedContent);
                    }
                });
            }

            // Apply the word count limit to specific elements
            limitWordCount($('#audience'), 100, $('#counter'));
            limitWordCount($('#income'), 100, $('#counter1'));
            limitWordCount($('#target'), 100, $('#counter2'));
            limitWordCount($('#competition_ad'), 100, $('#counter3'));
            limitWordCount($('#management_team'), 100, $('#counter4'));
            limitWordCount($('#loan_reason'), 100, $('#counter5'));
            // Add more elements if needed, e.g., limitWordCount($('#otherInput'), 50);
        });


        // $(document).ready(function() {
        //     $('#suin').on('input', function() {
        //         const suinRegex = /^SUIN\d{8}$/;
        //         const inputText = $(this).val();
        //         const validationMessage = $('#validationMessage');

        //         if (suinRegex.test(inputText)) {
        //             $(this).css('border', '1px solid green');
        //             validationMessage.text('SUIN format is valid').css('color', 'green');
        //         } else {
        //             $(this).css('border', '1px solid red');
        //             validationMessage.text('Please enter a valid SUIN (e.g., SUIN78365209)').css('color',
        //                 'red');
        //         }
        //     });
        // });
    </script>
@endsection
