@extends('layouts.app')

@section('content')
    <div class="container my-10">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card">
                    <div class="card-header text-dark">
                        <h4>
                            Dashboard
                        </h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    
                        <div class="row">
                            <div class="col-md-6 col-lg-4 mt-3">
                                <div class="card shadow-none bg-danger text-white">
                                    <div class="card-body text-center">
                                        <h3 class="text-white">Total Applicants</h3>
                                        <h2 class="text-white">{{ $all }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mt-3">
                                <div class="card shadow-none bg-grape text-white">
                                    <div class="card-body text-center">
                                        <h3 class="text-white">Completed</h3>
                                        <h2 class="text-white">{{ $completed }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 mt-3">
                                <div class="card shadow-none bg-warning text-white">
                                    <div class="card-body text-center">
                                        <h3 class="text-white">Incompleted</h3>
                                        <h2 class="text-white">{{ $incompleted }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>


        </div>
    </div>
    </div>
@endsection
