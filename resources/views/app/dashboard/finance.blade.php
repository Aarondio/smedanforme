@extends('layouts.app')

@section('content')
    <style>
        /* *{
                                                    border: 1px solid red;
                                                } */
    </style>
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('asset/img/photos/bg4.jpg') }}">
        {{-- <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('assets/img/photos/bg4.jpg')}}"> --}}

        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xxl-8 text-center">
                        <h1 class="display-2 mb-1 text-white">Expenses Records</h1>
                        <p>Fill out the form below</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper bg-gray py-10 py-md-12">
        <div class="container">
            {{-- <p class="text-danger">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </p> --}}
            <center>
                <div id="error-msg" class="col-md-10">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </center>
            <!-- /section -->
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
                                        <li><a class="nav-link  my-1 fw-normal " href="{{ route('business') }}">Business
                                                Info</a></li>
                                        <li><a class="nav-link fw-normal " href="{{ route('nanoplan') }}">Business
                                                Description</a></li>
                                        <li><a class="nav-link fw-normal " href="{{ route('swot') }}">Swot
                                                Analysis</a></li>
                                        
                                        <li><a class="nav-link fw-normal my-1" href="{{ route('product') }}">Add
                                                Products/Services</a></li>
                                                <li><a class="nav-link fw-normal active text-decoration-underline"
                                                    href="{{ route('finance') }}">Expenses Records</a>
                                            </li>
                                        {{-- <li><a class="nav-link fw-normal "
                                                href="{{ route('financial-record',$expenses->id) }}">Preview Finances</a>
                                        </li> --}}

                                        <li><a class="nav-link fw-normal " href="{{ route('preview') }}">Preview
                                                submission</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </aside>
                <div class="col-lg-10 card shadow-lg">
                    <div class="card-body">
                        <h2>Most Recent Annual Financial Expenses </h2>
                        <div class="alert alert-success">
                            <p>Kindly provide the most recent annual financial record of your business. This is a very
                                sensitive section kindly fill the information correctly. If you do not have any information
                                for a particular field you can leave it at Zero.</p>
                        </div>

                        <form action="{{ route('create-expenses') }}" method="POST">
                            @csrf

                            <div class="row text-dark">
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="name" class="mb-1">Year</label>
                                        <select name="year" id="year" class="form-select">
                                            @for ($i = 2022; $i < 2024; $i++)
                                                <option value="{{ $i }}"
                                                    @if (isset($expenses->year) && $expenses->year == $i) selected @endif>{{ $i }}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('year')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="mb-4">
                                        <label for="salary" class="mb-1">Salaries</label>
                                        <input id="salary" name="salary" type="text"
                                            value="{{ old('salary') ?: (isset($expenses->salary) ? number_format($expenses->salary) : 0) }}"
                                            class="form-control number-format @error('salary') is-invalid @enderror"
                                            placeholder="E.g. 100,000">
                                        @error('salary')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <input type="text" name="id" value="{{ $expenses->id }}" hidden>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="securities" class="mb-1">Social securities</label>
                                        <input id="securities" name="securities" type='text'
                                            value="{{ old('securities') ?: (isset($expenses->securities) ? number_format($expenses->securities) : 0) }}"
                                            class="form-control number-format @error('securities') is-invalid @enderror"
                                            placeholder="E.g 300,000">
                                        {{-- @error('securities')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="rent" class="mb-1">Rent</label>
                                        <input id="rent" name="rent" type='text'
                                            value="{{ old('rent') ?: (isset($expenses->rent) ? number_format($expenses->rent) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        {{-- @error('rent')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="utilities" class="mb-1">Utilities</label>
                                        <input id="utilities" name="utilities" type='text'
                                            value="{{ old('utilities') ?: (isset($expenses->utilities) ? number_format($expenses->utilities) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        {{-- @error('utilities')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="depreciation" class="mb-1">Depreciation</label>
                                        <input id="depreciation" name="depreciation" type='text'
                                            value="{{ old('depreciation') ?: (isset($expenses->depreciation) ? number_format($expenses->depreciation) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        @error('depreciation')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="adminexpenses" class="mb-1"> Admininstrative expenses</label>
                                        <input id="adminexpenses" name="adminexpenses" type='text'
                                            value="{{ old('adminexpenses') ?: (isset($expenses->adminexpenses) ? number_format($expenses->adminexpenses) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        {{-- @error('adminexpenses')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="marketing" class="mb-1"> Marketing</label>
                                        <input id="marketing" name="marketing" type='text'
                                            value="{{ old('marketing') ?: (isset($expenses->marketing) ? number_format($expenses->marketing) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        {{-- @error('marketing')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="supplies" class="mb-1">Supplies and other purchases</label>
                                        <input id="supplies" name="supplies" type='text'
                                            value="{{ old('supplies') ?: (isset($expenses->supplies) ? number_format($expenses->supplies) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        {{-- @error('supplies')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="licences" class="mb-1"> Licences</label>
                                        <input id="licences" name="licences" type='text'
                                            value="{{ old('licences') ?: (isset($expenses->licences) ? number_format($expenses->licences) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        {{-- @error('licences')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="consultation" class="mb-1">Consultation</label>
                                        <input id="consultation" name="consultation" type='text'
                                            value="{{ old('consultation') ?: (isset($expenses->consultation) ? number_format($expenses->consultation) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        {{-- @error('consultation')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="internet" class="mb-1">Internet and Telephone</label>
                                        <input id="internet" name="internet" type='text'
                                            value="{{ old('internet') ?: (isset($expenses->internet) ? number_format($expenses->internet) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        {{-- @error('internet')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="legal" class="mb-1">Legal Fees</label>
                                        <input id="legal" name="legal" type='text'
                                            value="{{ old('legal') ?: (isset($expenses->legal) ? number_format($expenses->legal) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        @error('legal')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="miscell" class="mb-1">Miscellaneous</label>
                                        <input id="miscell" name="miscell" type='text'
                                            value="{{ old('miscell') ?: (isset($expenses->miscell) ? number_format($expenses->miscell) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        @error('miscell')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="insurance" class="mb-1">Insurance</label>
                                        <input id="insurance" name="insurance" type='text'
                                            value="{{ old('insurance') ?: (isset($expenses->insurance) ? number_format($expenses->insurance) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        @error('insurance')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="insurance" class="mb-1">Website Dev./Maintenance</label>
                                        <input id="website" name="website" type='text'
                                            value="{{ old('website') ?: (isset($expenses->website) ? number_format($expenses->website) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        @error('website')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class=" mb-4">
                                        <label for="insurance" class="mb-1">Others</label>
                                        <input id="others" name="others" type='text'
                                            value="{{ old('others') ?: (isset($expenses->others) ? number_format($expenses->others) : 0) }}"
                                            class="form-control number-format " placeholder="E.g 300,000">
                                        @error('others')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-md-6">
                                    <button class="btn btn-grape" id="add" type="submit">Update Record</button>

                                </div>

                                <!-- /.form-floating -->
                        </form>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="justify-content-between d-flex">
                        <div class="col-md-6 align-self-start">
                            <a href="{{ route('nanoplan') }}" class="btn btn-outline-danger btn-sm">Back</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('product') }}" class="float-end btn btn-outline-primary btn-sm">Next</a>
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
