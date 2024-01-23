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
                            <h4 class="fs-24 text-dark">Awaiting Staff Approval</h4>
                            <p class="text-dark fs-16">
                                All business plans listed here are currently awaiting staff review and approval. Please note
                                that the ICT department must enable business plan approval before they can be approved by
                                staff
                            </p>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success fs-25">
                                    {{ session('success') }}
                                </div>
                            @endif


                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Business name</th>
                                        <th>Application No.</th>
                                        <th>Status</th>
                                        <th>Loan Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>



                                    @foreach ($users as $user)
                                        @php $businessInfo = $user->businessinfos->first(); @endphp
                                        <tr>
                                            <td>{{ $user->firstname . (empty($user->middlename) ? '' : ' ' . $user->middlename) . ' ' . $user->surname }}
                                            </td>
                                            <td>{{ $businessInfo->business_name }}</td>
                                            <td>{{ $businessInfo->business_no }}</td>
                                            <td>{{ $businessInfo->approval }}</td>
                                            <td>₦{{ number_format($businessInfo->loan_amount) }}</td>
                                            <td>
                                                <a href="{{ route('previews', $businessInfo->id) }}"
                                                    class="btn btn-sm btn-primary">

                                                    <i class="ri-eye-fill"></i>

                                                </a>

                                                {{-- <form action="{{ route('previews',$businessInfo->id) }}">
                                                    @csrf
                                                     <input type="text" name="id" value="{{ $businessInfo->id }}" hidden>
                                                    <button type="submit" class="btn btn-sm btn-primary"><i class="ri-eye-fill"></i></button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div> <!-- end row-->

            </div>
        </div>
    </div>
@endsection
