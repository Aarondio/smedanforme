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
                            <h4 class="fs-24 text-dark">All Staff</h4>
                            <p class="text-dark fs-16">
                                List of staff members registered on the system
                            </p>

                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        
                                        
                                        <th>History</th>
                                    </tr>
                                </thead>


                                <tbody>



                                    @foreach ($staffs as $staff)
                                       {{-- @php $businessInfo = $user->businessinfos->first(); @endphp --}}
                                        <tr>
                                            <td>{{ $staff->name }}</td>
                                            <td>{{ $staff->email }}</td>
                                          
                                           
                                        
                                            <td> <a href="{{ route('profile',$staff->id) }}" class="btn btn-sm btn-primary"><i class="ri-eye-fill"></i></a>
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
