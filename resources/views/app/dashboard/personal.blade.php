@extends('layouts.app')

@section('content')
    <style>
        /* *{
                                                                                    border: 1px solid red;
                                                                                } */
    </style>
    <section class="wrapper bg-gradient-blue image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('asset/img/photos/bg4.jpg') }}">
        {{-- <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('assets/img/photos/bg4.jpg')}}"> --}}

        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xxl-8 text-center">
                        <h1 class="display-2 mb-1 text-white">Personal Information</h1>
                        <p class="text-capitalize">Fill out the form below</p>
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

            <!-- /section -->
            <div class="row justify-content-center ">
                <aside class="col-lg-2 sidebar sticky-sidebar mt-md-0  d-none d-xl-block">

                    <div class="widget">
                        {{-- <h6 class="widget-title fs-17 mb-2 ps-xl-5">On this page</h6> --}}

                        <div class="card bg-transparent">
                            <div class="card-body p-3 m-0">
                                <nav class="" id="sidebar-nav">
                                    <ul class="list-unstyled fs-sm lh-sm text-reset fw-light">
                                        <li><a class="nav-link  fw-normal active text-decoration-underline"
                                                href="{{ route('personal') }}">Personal Info</a>
                                        </li>
                                        @if (empty($businessinfo->suin))
                                        <li><a class="nav-link  fw-normal" href="{{ route('suin') }}">SUIN
                                            Verification</a>
                                        @else
                                           
                                            <li><a class="nav-link  my-1 fw-normal " href="{{ route('business') }}">Business
                                                    Info</a></li>

                                            <li><a class="nav-link fw-normal " href="{{ route('nanoplan') }}">Business
                                                    Description</a></li>
                                            <li><a class="nav-link fw-normal " href="{{ route('swot') }}">Swot
                                                    Analysis</a></li>

                                            <li><a class="nav-link fw-normal my-1" href="{{ route('product') }}">Add
                                                    Products/Services</a></li>
                                            <li><a class="nav-link fw-normal " href="{{ route('finance') }}">Expenses
                                                    Records</a>
                                            </li>


                                            @if ($businessinfo->id != null)
                                                <li><a class="nav-link fw-normal " href="{{ route('preview') }}">Preview
                                                        submission</a></li>
                                            @endif
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </aside>
                <div class="col-lg-10 col-md-12  card shadow-lg">
                    <center>
                        <p class="text-success">
                            @if (session('success'))
                                
                                    <h3 class="text-success"> {{ session('success') }} </h3>
                               
                            @endif
                        </p>

                        <p class="text-danger">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </p>
                    </center>
                    <div class="card-body">
                        <h2 class="text-capitalize">Personal information (Matching funds)</h2>
                        <form action="{{ route('updateinfo') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $user->id }}" hidden>
                            <div class="row text-dark">
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="firstname" class="mb-3">First name</label>
                                        <input id="firstname" name="firstname" type="text"
                                            value="{{ old('firstname') ?: $user->firstname ?? '' }}"
                                            class="form-control @error('firstname') is-invalid @enderror"
                                            placeholder="Firstname">
                                        {{-- @error('firstname')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="surname" class="mb-3">Surname</label>
                                        <input id="surname" name="surname" type="text"
                                            value="{{ old('surname') ?: $user->surname ?? '' }}"
                                            class="form-control @error('surname') is-invalid @enderror"
                                            placeholder="Surname">
                                        {{-- @error('surname')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="middlename" class="mb-3">Middle name <span
                                                class="text-secondary">(Optional)</span></label>
                                        <input id="middlename" name="middlename"
                                            value="{{ old('middlename') ?: $user->middlename ?? '' }}" type="text"
                                            class="form-control @error('middlename') is-invalid @enderror"
                                            placeholder="Middle name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="email" class="mb-3">Email</label>
                                        <input id="email" name="email"
                                            value="{{ old('email') ?: $user->email ?? '' }}" type="text"
                                            class="form-control" placeholder="Email" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
                                        <label for="phone" class="mb-3">Phone number</label>
                                        <input id="phone" name="phone" type="text"
                                            value="{{ old('phone') ?: $user->phone ?? '' }}"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Phone number">
                                        {{-- @error('phone')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror --}}
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <div class="form-select-wrapper mb-4">
                                            <label for="gender" class="mb-3">Gender</label>
                                            <select class="form-select @error('gender') is-invalid @enderror"
                                                name="gender" id="gender" aria-label="gender">
                                                <option disabled {{ old('gender', $user->gender) ? '' : 'selected' }}>
                                                    Select Gender</option>
                                                <option value="Male"
                                                    {{ old('gender', $user->gender) === 'Male' ? 'selected' : '' }}>Male
                                                </option>
                                                <option value="Female"
                                                    {{ old('gender', $user->gender) === 'Female' ? 'selected' : '' }}>
                                                    Female</option>
                                            </select>

                                            {{-- @error('gender')
                                                <p class="small text-danger"> {{ $message }}</p>
                                            @enderror --}}

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <div class="form-select-wrapper mb-4">
                                            <label for="gender" class="mb-3">Marital Status</label>
                                            <select class="form-select @error('marital_status') is-invalid @enderror"
                                                name="marital_status" id="marital_status" aria-label="marital_status">
                                                <option disabled
                                                    {{ old('marital_status', $user->marital_status) ? '' : 'selected' }}>
                                                    Select Marital Status</option>
                                                <option value="Single"
                                                    {{ old('marital_status', $user->marital_status) === 'Single' ? 'selected' : '' }}>
                                                    Single</option>
                                                <option value="Married"
                                                    {{ old('marital_status', $user->marital_status) === 'Married' ? 'selected' : '' }}>
                                                    Married</option>
                                                <option value="Divorced"
                                                    {{ old('marital_status', $user->marital_status) === 'Divorced' ? 'selected' : '' }}>
                                                    Divorced</option>
                                                <option value="Widowed"
                                                    {{ old('marital_status', $user->marital_status) === 'Widowed' ? 'selected' : '' }}>
                                                    Widowed</option>
                                            </select>
                                            @error('marital_status')
                                                <p class="small text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="nationality" class="mb-3">Nationality</label>
                                        <input id="nationality" name="nationality"
                                            value="{{ old('nationality') ?: $user->nationality ?? '' }}" type="text"
                                            class="form-control @error('nationality') is-invalid @enderror"
                                            placeholder="Nationality">
                                        {{-- @error('nationality')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="state" class="mb-3">State</label>


                                        {{-- <input id="state" name="state" value="{{ $user->state ?? '' }}"
                                            type="text" class="form-control" placeholder="State/Province/Region"> --}}

                                        <select name="state" id="state"
                                            class="form-select @error('state') is-invalid @enderror">
                                            <option disabled @if ($user->state == '') selected @endif>Select
                                                State</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    @if ($user->state == $state->id) selected @endif> {{ $state->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        {{-- @error('state')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class=" mb-4">
                                        <label for="lga" class="mb-3">Local Government</label>
                                        <select name="lga" id="lga"
                                            class="form-select @error('lga') is-invalid @enderror">
                                            <!-- Options will be populated dynamically using JavaScript -->
                                        </select>
                                        {{-- @error('lga')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}

                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="address" class="mb-3">Address (with landmarks)</label>
                                        <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror" rows="5"
                                            placeholder="Address (with landmarks)">{{ old('address') ?: $user->address ?? '' }}</textarea>
                                        {{-- @error('address')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror --}}
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-grape" type="submit">Update</button>
                            <!-- /.form-floating -->
                        </form>

                    </div>
                    <div class="card-footer">
                        <div class="justify-content-end d-flex">
                            {{-- <div class="col-md-6">
                                <a href="" class="btn btn-secondary btn-sm disabled">Back</a>
                            </div> --}}
                            <div class="col-md-6">
                                <a href="{{ route('business') }}"
                                    class="float-end btn btn-outline-primary btn-sm  @if ($user->address == '') disabled @endif"
                                    id="updateButton">Next</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#state').on('change', function() {
                var stateId = $(this).val();
                if (stateId) {
                    $.ajax({
                        url: '/get-lgas/' + stateId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data);
                            var lgaSelect = $('#lga');
                            lgaSelect.empty();
                            lgaSelect.append(
                                '<option value="">Select Local Government</option>');
                            $.each(data, function(key, value) {
                                var option = $('<option></option>').attr('value', value
                                    .name).text(value.name);
                                if ('{{ $user->lga }}' === value
                                    .name) { // Check if user lga matches current option
                                    option.prop('selected', true);
                                }
                                lgaSelect.append(option);
                            });
                        }
                    });
                } else {
                    $('#lga').empty();
                }
            });

            // Trigger change event on page load if $user->lga is not empty
            var userLga = '{{ $user->lga ?? '' }}';
            if (userLga !== '') {
                $('#state').trigger('change');
            }
        });
    </script>
@endsection
