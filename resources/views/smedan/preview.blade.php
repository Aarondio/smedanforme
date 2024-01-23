@extends('smedan.layout.app')

@section('content')
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid border-1">
                <div class="row pt-3">
                    <h3 class="mb-3 text-dark">Applicant Screening</h3>
                    @if ($businessinfo->approval == 'Approved' || $businessinfo->approval == 'Declined')
                        <p>This business plan has been reviewed</p>
                    @else
                        <p>This business plan is pending review</p>
                    @endif

                    <div class="col-md-1 ">

                        @if ($businessinfo->approval == 'Approved' || $businessinfo->approval == 'Declined')
                            @if(Auth::guard('staff')->user()->staff_type == 2)
                            <div class="">
                                <form action="{{ route('appeal') }}" method="POST" >
                                    @csrf
                                    <input type="text" name="id" value="{{ $businessinfo->id }}" hidden>
                                    <button type="submit" class="btn btn-success w-100 ">Appeal</button>
                                </form>
                            </div>
                            @endif
                        @else
                            <div>
                                <div>
                                    <form action="{{ route('approve') }}" method="POST">
                                        @csrf
                                        <input type="text" name="id" value="{{ $businessinfo->id }}" hidden>
                                        <button type="submit" class="btn btn-success w-100">Approve</button>
                                    </form>
                                </div>
                                <div>
                                    <form action="{{ route('decline') }}" method="POST">
                                        @csrf
                                        <input type="text" name="id" value="{{ $businessinfo->id }}" hidden>
                                        <button type="submit" class="btn btn-danger mt-2 w-100">Decline</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-11 ">
                        <iframe src="http://127.0.0.1:8000/smedan/businessplan/{{ $businessinfo->id }}" width="100%"
                            height="1000" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
