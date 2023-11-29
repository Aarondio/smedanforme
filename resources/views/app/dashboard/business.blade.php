@extends('layouts.app')

@section('content')
    <style>
        /* *{
                        border: 1px solid red;
                    } */
    </style>
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('assets/img/photos/bg20.png') }}">
        {{-- <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('assets/img/photos/bg4.jpg')}}"> --}}

        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xxl-8 text-center">
                        <h1 class="display-2 mb-1 text-white">Business information</h1>
                        <p>Fill out the form below</p>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>
    <section class="wrapper bg-gray py-10 py-md-12">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-10 col-md-12 card shadow-lg">
                    <div class="card-body">

                        <p class="text-danger">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </p>
                        <h2 class="">Business information</h2>
                        <form action="{{ route('updatebusinessinfo') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $businessinfo->id }}" hidden>
                            <div class="row text-dark">
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="business_name" class="mb-3">Business name</label>
                                        <input id="business_name" value="{{ $businessinfo->business_name ?? '' }}"
                                            name="business_name" type="text" class="form-control"
                                            placeholder="Business name" required>
                                        @error('business_name')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <div class="form-select-wrapper mb-4">
                                            <label for="is_registered" class="mb-3">Is your business registered?</label>
                                            <select class="form-select" name="is_registered" id="is_registered"
                                                aria-label="is_registered" required>
                                                <option disabled @if ($businessinfo->is_registered == '') selected @endif>Is your
                                                    business registered?</option>
                                                <option value="Yes" @if ($businessinfo->is_registered == 'Yes') selected @endif>Yes
                                                </option>
                                                <option value="No" @if ($businessinfo->is_registered == 'No') selected @endif>No
                                                </option>

                                            </select>
                                            @error('is_registered')
                                                <p class="small text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <div class="form-select-wrapper mb-4">
                                            <label for="register_type" class="mb-3">Type of Registration</label>
                                            <select class="form-select" name="register_type" id="register_type"
                                                aria-label="register_type" required>
                                                <option disabled @if ($businessinfo->register_type == '') selected @endif>Is your
                                                    business registered?</option>
                                                <option value="Business Name"
                                                    @if ($businessinfo->register_type == 'Business Name') selected @endif>Business Name</option>
                                                <option value="Limited Liability Company"
                                                    @if ($businessinfo->register_type == 'Limited Liability Company') selected @endif>Limited Liability
                                                    Company</option>
                                                <option value="Cooperative Society"
                                                    @if ($businessinfo->register_type == 'Cooperative Society') selected @endif>Cooperative Society
                                                </option>

                                            </select>
                                            @error('business_type')
                                                <p class="small text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="business_type" class="mb-3">Type of Business:</label>
                                        <input id="business_type" value="{{ $businessinfo->business_type ?? '' }}"
                                            name="business_type" type="text" class="form-control"
                                            placeholder="E.g Farming" required>
                                        @error('business_type')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div> --}}


                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="suin" class="mb-3">SMEDAN Unique Identification
                                            Number(SUIN)</label>
                                        <input id="suin" name="suin" value="{{ $businessinfo->suin ?? '' }}"
                                            type="text" class="form-control" placeholder="SUIN" required>
                                        @error('suin')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="business_age" class="mb-3">How old is your business?</label>
                                        <input id="business_age" name="business_age"
                                            value="{{ $businessinfo->business_age ?? '' }}" type="number"
                                            class="form-control" placeholder="E.g 3" required>
                                        @error('suin')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="register_year" class="mb-3">When was the business registered?</label>
                                        <input id="register_year" name="register_year" type="date" class="form-control"
                                            placeholder="E.g 04/05/2020" value="{{ $businessinfo->register_year ?? '' }}"
                                            required>
                                        @error('register_year')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="sector" class="mb-3">Business Sector</label>
                                        <select class="form-select" name="sector" id="sector" aria-label="sector"
                                            required>
                                            <option disabled @if ($businessinfo->register_type == '') selected @endif>Select
                                                business sector</option>
                                            <option value="Agriculture" @if ($businessinfo->sector == 'Agriculture') selected @endif>
                                                Agriculture</option>
                                            <option value="Manufacturing"
                                                @if ($businessinfo->sector == 'Manufacturing') selected @endif>Manufacturing</option>
                                            <option value="Technology" @if ($businessinfo->sector == 'Technology') selected @endif>
                                                Technology</option>
                                            <option value="FMCG" @if ($businessinfo->sector == 'FMCG') selected @endif>FMCG
                                            </option>
                                            <option value="Entertainment"
                                                @if ($businessinfo->sector == 'Entertainment') selected @endif>Entertainment</option>
                                            <option value="Hospitality"
                                                @if ($businessinfo->sector == 'Hospitality') selected @endif>Hospitality</option>
                                            <option value="Mininig" @if ($businessinfo->sector == 'Mininig') selected @endif>
                                                Mininig</option>
                                            <option value="Others" @if ($businessinfo->sector == 'Others') selected @endif>
                                                Others</option>

                                        </select>
                                        {{-- <label for="sector" class="mb-3">Business Sector</label>
                                        <input id="sector" name="sector" value="{{$businessinfo->sector??''}}" type="text" class="form-control"
                                            placeholder="E.g Agriculture" required> --}}
                                        @error('sector')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="sector" class="mb-3">Loan Amount</label>
                                        <select name="loan_amount" id="loan_amount" class="form-select text-dark">
                                            <option value="" @if ($businessinfo->loan_amount == '') disabled selected @endif>Select loan amount</option>
                                            <option value="250000" @if ($businessinfo->loan_amount == '250000') selected @endif>250,000</option>
                                            <option value="500000" @if ($businessinfo->loan_amount == '500000') selected @endif>500,000</option>
                                            <option value="1000000" @if ($businessinfo->loan_amount == '1000000') selected @endif>1,000,000</option>
                                            <option value="1500000" @if ($businessinfo->loan_amount == '1500000') selected @endif>1,500,000</option>
                                            <option value="2000000" @if ($businessinfo->loan_amount == '2000000') selected @endif>2,000,000</option>
                                            <option value="2500000" @if ($businessinfo->loan_amount == '2500000') selected @endif>2,500,000</option>
                                        </select>
                                        {{-- <label for="sector" class="mb-3">Business Sector</label>
                                        <input id="sector" name="sector" value="{{$businessinfo->sector??''}}" type="text" class="form-control"
                                            placeholder="E.g Agriculture" required> --}}
                                        @error('sector')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="address">Business Locations/Address (with landmarks)</label>
                                        <textarea id="address" name="address" class="form-control " placeholder="Business Address" required>{{ $businessinfo->address ?? '' }}</textarea>
                                        @error('address')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <div class="form-select-wrapper mb-4">
                                            <label for="no_emp" class="">Number of Employees</label>
                                            <select class="form-select" name="emp_no" id="emp_no"
                                                aria-label="emp_no">
                                                <option disabled @if ($businessinfo->emp_no == '') selected @endif>Select
                                                    numbers of Employee</option>
                                                <option value="0-5" @if ($businessinfo->emp_no === '0-5') selected @endif>
                                                    0-5</option>
                                                <option value="6-10" @if ($businessinfo->emp_no === '6-10') selected @endif>
                                                    6-10</option>
                                                <option value="11-15" @if ($businessinfo->emp_no === '11-15') selected @endif>
                                                    11-15</option>
                                                <option value="16-20" @if ($businessinfo->emp_no === '16-20') selected @endif>
                                                    16-20</option>
                                                <option value="Above 20"
                                                    @if ($businessinfo->emp_no === 'Above 20') selected @endif>
                                                    Above 20</option>
                                            </select>
                                            @error('gender')
                                                <p class="small text-danger"> {{ $message }}</p>
                                            @enderror

                                        </div>
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
    </script>
@endsection
