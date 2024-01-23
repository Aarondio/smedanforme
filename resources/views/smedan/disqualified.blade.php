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
                            <h4 class="fs-24 text-dark">  Disqualified Business Plans</h4>
                            <p class="text-dark fs-16">
                                All business plans listed here have been reviewed and are not qualified for the next stage.
                            </p>
                          
                            
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Business name</th>
                                        <th>State</th>
                                        <th>Status</th>
                                        <th>Loan Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>



                                    @foreach ($users as $user)
                                       @php $businessInfo = $user->businessinfos->first(); @endphp
                                        <tr>
                                            <td>{{ $user->firstname . (empty($user->middlename) ? '' : ' ' . $user->middlename) . ' ' . $user->surname }}</td>
                                            <td>{{ $businessInfo->business_name }}</td>
                                            <td>{{ $user->state }}</td>
                                            <td>{{ $businessInfo->approval }}</td>
                                            <td>₦{{ number_format($businessInfo->loan_amount) }}</td>
                                            <td> <a href="{{ route('previews',$businessInfo->id) }}" class="btn btn-sm btn-primary"><i class="ri-eye-fill"></i></a>
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
