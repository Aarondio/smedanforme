@extends('smedan.layout.app')

@section('content')
    <!--I am here-->


    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row g-4">
                    <div class="col-12">
                        <div class="mb-4">
                            <h4 class="fs-24 text-dark">Settings</h4>
                            <p>Data center settings, before making any changes make sure you understand the effect on the
                                system</p>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row mt-4">
                                <div class="col-md-3 col-lg-2">
                                    <div class="input-group">
                                        <form method="POST" action="{{ route('enablelogin') }}" class="border-0 m-0">
                                            @csrf
                                            <button type="submit"
                                                class="btn rounded-0 {{ $settings->staff_login ? 'btn-primary ' : 'border' }}">ON</button>

                                        </form>
                                        <form method="POST" action="{{ route('disablelogin') }}" class="border-0 m-0">
                                            @csrf

                                            <button
                                                class="btn rounded-0 {{ $settings->staff_login ? 'border ' : 'btn-primary' }} ">OFF</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-8 mt-lg-0 mt-2  align-self-center">
                                    <span class="fw-bold fs-20">
                                        {{ $settings->staff_login ? 'Disable staff login  ' : 'Enable staff login ' }}
                                    </span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-3 col-lg-2">
                                    <div class="input-group">
                                        <form method="POST" action="{{ route('enableregistration') }}"
                                            class="border-0 m-0">
                                            @csrf
                                            <button type="submit"
                                                class="btn rounded-0 {{ $settings->staff_registration ? 'btn-primary ' : 'border' }}">ON</button>

                                        </form>
                                        <form method="POST" action="{{ route('disableregistration') }}"
                                            class="border-0 m-0">
                                            @csrf

                                            <button
                                                class="btn rounded-0 {{ $settings->staff_registration ? 'border ' : 'btn-primary' }} ">OFF</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-7 col-lg-8 mt-lg-0 mt-2  align-self-center">
                                    <span class="fw-bold fs-20">
                                        {{ $settings->staff_registration ? 'Disable staff registration  ' : 'Enable staff registration  ' }}
                                    </span>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-3 col-lg-2">
                                    <div class="input-group">
                                        <form method="POST" action="{{ route('enablereview') }}" class="border-0 m-0">
                                            @csrf
                                            <button type="submit"
                                                class="btn rounded-0 {{ $settings->plan_approval ? 'btn-primary ' : 'border' }}">ON</button>

                                        </form>
                                        <form method="POST" action="{{ route('disablereview') }}" class="border-0 m-0">
                                            @csrf

                                            <button
                                                class="btn rounded-0 {{ $settings->plan_approval ? 'border ' : 'btn-primary' }} ">OFF</button>
                                        </form>
                                    </div>

                                </div>
                                <div class="col-md-7 col-lg-8 mt-lg-0 mt-2  align-self-center">
                                    <span class="fw-bold fs-20">
                                        {{ $settings->plan_approval ? 'Disable Business plan review   ' : 'Enable Business plan review ' }}
                                    </span>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-3 col-lg-2">
                                    <div class="input-group">
                                        <form method="POST" action="{{ route('enablevisitation') }}" class="border-0 m-0">
                                            @csrf
                                            <button type="submit"
                                                class="btn rounded-0 {{ $settings->allow_visitation ? 'btn-primary ' : 'border' }}">ON</button>

                                        </form>
                                        <form method="POST" action="{{ route('disablevisitation') }}" class="border-0 m-0">
                                            @csrf

                                            <button
                                                class="btn rounded-0 {{ $settings->allow_visitation ? 'border ' : 'btn-primary' }} ">OFF</button>
                                        </form>
                                    </div>
                                </div>

                                <div class="col-md-7 col-lg-8 mt-lg-0 mt-2  align-self-center">
                                    <span class="fw-bold fs-20">
                                        {{ $settings->staff_login ? 'Disable Business visitation review' : 'Enable Business visitation review' }}
                                    </span>
                                </div>
                            </div>

                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div> <!-- end row-->

            </div>
        </div>
    </div>
@endsection
