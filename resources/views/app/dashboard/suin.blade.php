@extends('layouts.app')
@section('content')
    <section class="wrapper  ">


        <div class="wrapper ">
            <div class="container py-12 py-md-14">
                {{-- <h1 class="text-center">SUIN Verification</h1> --}}

                <div class="row justify-content-center">
                    <div class="col-md-5 col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                @if (session('message'))
                                    <div class="alert alert-danger my-2">
                                        <p class="text-danger mb-0"> {{ session('message') }} <span><a href="http://www.smedanregister.ng/" target="_blank">Click to register a new SUIN</a></span></p>
                                    </div>
                                @endif
                                
                                <form action="{{ route('getSmedanUser') }}" method="post">
                                    @csrf
                                    <label for="smedan_number" class="fs-13">Enter SUIN Number: <span class="text-muted">E.g SUIN7580464</span></label>
                                    <input type="text" name="smedan_number" id="smedan_number" class="form-control"
                                        placeholder="SUIN7580464" value="SUIN" required>
                                    <div class="d-grid mt-3">
                                        <button class="btn btn-grape" type="submit">Verify Suin</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
