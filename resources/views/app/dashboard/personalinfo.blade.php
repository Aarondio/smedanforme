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
                        <h1 class="display-2 mb-1 text-white">Personal information </h1>
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
            <center>
                <div class="col-md-10">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <h3 class="text-success"> {{ session('success') }} </h3>
                        </div>
                    @endif
                </div>

                {{-- <div class="row gx-lg-8 gx-xl-12 gy-6  process-wrapper ">
                    <a class="col-3 col-lg-3"> <span
                            class="icon btn btn-sm btn-circle btn-lg btn-primary pe-none mb-1"><span
                                class="number">1</span></span>
                        <p class="mb-1">Personal</p>

                    </a>
                    <a href="{{ route('business') }}" class="col-3 col-lg-3"> <span
                            class="icon btn btn-sm btn-circle btn-lg btn-soft-primary pe-none mb-1"><span
                                class="number">2</span></span>
                        <p class="mb-1 text-muted">Business</p>

                    </a>

                    <div class="col-3 col-lg-3"> <span
                            class="icon btn btn-sm btn-circle btn-lg btn-soft-primary pe-none mb-1"><span
                                class="number">3</span></span>
                        <p class="mb-1">Retouch</p>

                    </div>

                    <div class="col-3 col-lg-3"> <span
                            class="icon btn btn-sm btn-circle btn-lg btn-soft-primary pe-none mb-1"><span
                                class="number">4</span></span>
                        <p class="mb-1">Finalize</p>

                    </div>

                </div> --}}
                <p class="text-danger">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                </p>
            </center>
            <!-- /section -->
            <div class="row justify-content-center ">
                <div class="col-md-10 card shadow-lg">
                    <div class="card-body">
                        <h2>Personal information (Sterling Bank Loan)</h2>
                        <form action="{{ route('updatepersonalinfo') }}" method="POST">
                            @csrf
                            <input type="text" name="id" value="{{ $user->id }}" hidden>
                            <div class="row text-dark">
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="firstname" class="mb-3">First name</label>
                                        <input id="firstname" name="firstname" type="text"
                                            value="{{ $user->firstname ?? '' }}" class="form-control"
                                            placeholder="Firstname">
                                        @error('firstname')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="surname" class="mb-3">Surname</label>
                                        <input id="surname" name="surname" type="text"
                                            value="{{ $user->surname ?? '' }}" class="form-control" placeholder="Surname">
                                        @error('surname')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="middlename" class="mb-3">Middle name <span
                                                class="text-secondary">(Optional)</span></label>
                                        <input id="middlename" name="middlename" value="{{ $user->middlename ?? '' }}"
                                            type="text" class="form-control" placeholder="Middle name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="email" class="mb-3">Email</label>
                                        <input id="email" name="email" value="{{ $user->email ?? '' }}"
                                            type="text" class="form-control" placeholder="Email" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="phone" class="mb-3">Phone number</label>
                                        <input id="phone" name="phone" type="text"
                                            value="{{ $user->phone ?? '' }}" class="form-control"
                                            placeholder="Phone number">
                                        @error('phone')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <div class="form-select-wrapper mb-4">
                                            <label for="gender" class="mb-3">Gender</label>
                                            <select class="form-select" name="gender" id="gender" aria-label="gender">
                                                <option disabled @if ($user->gender == '') selected @endif>Select
                                                    Gender</option>
                                                <option value="Male" @if ($user->gender === 'Male') selected @endif>
                                                    Male</option>
                                                <option value="Female" @if ($user->gender === 'Female') selected @endif>
                                                    Female</option>
                                            </select>
                                            @error('gender')
                                                <p class="small text-danger"> {{ $message }}</p>
                                            @enderror
                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <div class="form-select-wrapper mb-4">
                                            <label for="gender" class="mb-3">Marital Status</label>
                                            <select class="form-select" name="marital_status" id="marital_status" aria-label="marital_status">
                                                <option disabled @if ($user->marital_status == '') selected @endif>Select
                                                    Marital Status</option>
                                                <option value="Single" @if ($user->marital_status === 'Single') selected @endif>
                                                    Single</option>
                                                <option value="Married" @if ($user->marital_status === 'Married') selected @endif>
                                                    Married</option>
                                                <option value="Divorced" @if ($user->marital_status === 'Divorced') selected @endif>
                                                    Divorced</option>
                                                <option value="Widowed" @if ($user->marital_status === 'Widowed') selected @endif>
                                                    Widowed</option>
                                            </select>
                                            @error('gender')
                                                <p class="small text-danger"> {{ $message }}</p>
                                            @enderror
                                       
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="nationality" class="mb-3">Nationality</label>
                                        <input id="nationality" name="nationality" value="{{ $user->nationality ?? '' }}"
                                            type="text" class="form-control" placeholder="Nationality">
                                        @error('nationality')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="state" class="mb-3">State</label>
                                        <input id="state" name="state" value="{{ $user->state ?? '' }}"
                                            type="text" class="form-control" placeholder="State/Province/Region">
                                        @error('state')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                             
                                <div class="col-md-6 ">
                                    <div class=" mb-4">
                                        <label for="lga" class="mb-3">Local Government</label>
                                        <input id="lga" name="lga" type="text"
                                            value="{{ $user->lga ?? '' }}" class="form-control"
                                            placeholder="Local government">
                                        @error('lga')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4">
                                        <label for="address" class="mb-3">Address (with landmarks)</label>
                                        <textarea id="address" name="address" class="form-control " rows="5" placeholder="Address (with landmarks)"
                                            required>{{ $user->address ?? '' }}</textarea>
                                        @error('address')
                                            <p class="small text-danger"> {{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-grape" type="submit">Update</button>
                            <!-- /.form-floating -->
                        </form>

                    </div>
                    <div class="card-footer">
                        <div class="justify-content-between d-flex">
                            <div class="col-md-6">
                                <a href="" class="btn btn-secondary btn-sm disabled">Back</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('businessinfo') }}"
                                    class="float-end btn btn-outline-grape btn-sm ">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <script>
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
    </script> --}}
@endsection
