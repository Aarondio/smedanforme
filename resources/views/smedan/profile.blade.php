@extends('smedan.layout.app')
@section('content')

<div class="content-page">
    <div class="content">
        
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="bg-flower">
                        <img src="assets/images/flowers/img-3.png">
                    </div>

                    <div class="bg-flower-2">
                        <img src="assets/images/flowers/img-1.png">
                    </div>

                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Powerx</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Profile</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="{{ asset('assets/images/user.png') }}" class="rounded-circle avatar-lg img-thumbnail"
                            alt="profile-image">

                            <h4 class="mb-1 mt-2">{{ $staff->name }}</h4>
                            <p class="text-muted">{{ $staff->staff_type == 1? 'Staff' : 'ICT Head'  }}</p>
                            <button type="button" class="btn btn-danger btn-sm mb-2">Block Account</button>

                            <div class="text-start mt-3">
                               
                                <p class="text-muted mb-2"><strong>Full Name :</strong> <span class="ms-2">{{ $staff->name }}</span></p>
                                <p class="text-muted mb-2"><strong>Email :</strong> <span class="ms-2 ">{{ $staff->email  }}</span></p>

                            </div>

                            
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->

                    <!-- Messages-->
                   

                </div> <!-- end col-->

                <div class="col-xl-8 col-lg-7">
                    <!-- Chart-->
             

                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Staff History</h4>
                            <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                <li class="nav-item">
                                    <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-start rounded-0 active">
                                        Login History <span class="badge bg-danger">{{ $logincount }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                        Plan Approval <span class="badge bg-danger">{{ $approvalcount }}</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-end rounded-0">
                                        Plan Disqualification <span class="badge bg-danger">{{ $disapprovalcount }}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="aboutme">

                                   
                                    <div class="table-responsive">
                                        <table class="table table-sm table-centered table-hover table-borderless mb-0">
                                            <thead class="border-top border-bottom bg-light-subtle border-light">
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Description</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($logins as $login)
                                  
                                                <tr>
                                                   
                                                   <td>{{ $login->action }}</td>
                                                   <td>{{ $login->description }}</td>
                                                   <td>{{ $login->created_at->format('Y-m-d') }}</td>
                                                   <td>{{ \Carbon\Carbon::parse($login->created_at)->setTimezone('Africa/Lagos')->format('h:i A') }}</td>
        
                                                   
                                                   
                                                </tr>
                                            @endforeach
                                              
                                              

                                            </tbody>
                                        </table>
                                    </div>

                                 
                                    <!-- end timeline -->  

                                </div> <!-- end tab-pane -->
                                <!-- end about me section content -->

                                <div class="tab-pane" id="timeline">

                                    <div class="table-responsive">
                                        <table class="table table-sm table-centered table-hover table-borderless mb-0">
                                            <thead class="border-top border-bottom bg-light-subtle border-light">
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Description</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($approvals as $approval)
                                  
                                                <tr>
                                                   
                                                   <td>{{ $approval->action }}</td>
                                                   <td>{{ $approval->description }}</td>
                                                   <td>{{ $approval->created_at->format('Y-m-d') }}</td>
                                                   <td>{{ \Carbon\Carbon::parse($approval->created_at)->setTimezone('Africa/Lagos')->format('h:i A') }}</td>
        
                                                   
                                                   
                                                </tr>
                                            @endforeach
                                              
                                              

                                            </tbody>
                                        </table>
                                    </div>

                                  

                                    
                                    
                                    

                               

                                </div>
                                <!-- end timeline content-->

                                <div class="tab-pane" id="settings">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-centered table-hover table-borderless mb-0">
                                            <thead class="border-top border-bottom bg-light-subtle border-light">
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Description</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($disapprovals as $disapproval)
                                  
                                                <tr>
                                                   
                                                   <td>{{ $disapproval->action }}</td>
                                                   <td>{{ $disapproval->description }}</td>
                                                   <td>{{ $disapproval->created_at->format('Y-m-d') }}</td>
                                                   <td>{{ \Carbon\Carbon::parse($disapproval->created_at)->setTimezone('Africa/Lagos')->format('h:i A') }}</td>
        
                                                   
                                                   
                                                </tr>
                                            @endforeach
                                              
                                              

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end settings content-->

                            </div> <!-- end tab-content -->
                        </div> <!-- end card body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div>
        <!-- container -->

    </div>
    <!-- content -->


@endsection