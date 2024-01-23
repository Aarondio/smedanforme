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
                            <h4 class="fs-24 text-dark">Activity History</h4>
                            <p class="text-dark fs-16">
                               All your activities on the website is available here.
                            </p>
                          
                            
                            <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        
                                    </tr>
                                </thead>


                                <tbody>



                                    @foreach ($histories as $history)
                                  
                                        <tr>
                                           
                                           <td>{{ $history->action }}</td>
                                           <td>{{ $history->description }}</td>
                                           <td>{{ $history->created_at->format('Y-m-d') }}</td>
                                           <td>{{ \Carbon\Carbon::parse($history->created_at)->setTimezone('Africa/Lagos')->format('h:i A') }}</td>

                                           
                                           
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
