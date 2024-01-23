

@extends('smedan.layout.app')
@section('content')
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <meta http-equiv="refresh" content="60">
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                             

                                <div class="page-title-box">                                    
                                    <div class="page-title-right">
                                        <form class="d-flex">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="dash-daterange" disabled>
                                                <span class="input-group-text bg-primary border-primary text-white">
                                                    <i class="ri-calendar-todo-fill fs-13"></i>
                                                </span>
                                            </div>
                                            <a href="" onclick=" window.reload()" class="btn btn-primary ms-2">
                                                <i class="ri-refresh-line"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Dashboard</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row">
        
                            <div class="col-sm-6 col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Unverified Users</h5>
                                                <h3 class="my-1 py-1"> {{ $unverified }}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="ri-arrow-right-line"></i>Unverified Emails (Users)</span>
                                                </p>
                                            </div>
                                           
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
        
                            <div class="col-sm-6 col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="New Leads">Verified Users</h5>
                                                <h3 class="my-1 py-1"> {{ $verified }}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="ri-arrow-right-line"></i>Verified Emails</span>
                                                </p>
                                            </div>
                                          
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->

                            <div class="col-sm-6 col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="Deals">Paid User</h5>
                                                <h3 class="my-1 py-1"> {{ $paid }}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="ri-arrow-right-line"></i>Number of payment made</span>
                                                </p>
                                            </div>
                                        
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->

                            <div class="col-sm-6 col-xxl-3">
                                <div class="card text-bg-primary border-primary">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h5 class="text-white text-opacity-75 fw-normal mt-0 text-truncate" title="Booked Revenue">Total Earning</h5>
                                                <h3 class="my-1 py-1"> {{  number_format($paid * 5000) }}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-white text-opacity-75 me-2"><i class="ri-arrow-right-line"></i>Total earnings in naira</span>
                                                </p>
                                            </div>
                                            
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->

                            <div class="col-sm-6 col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Completed Application</h5>
                                                <h3 class="my-1 py-1"> {{ $completed }}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="ri-arrow-right-line"></i>All completed application</span>
                                                </p>
                                            </div>
                                           
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->

                            <div class="col-sm-6 col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Ongoing</h5>
                                                <h3 class="my-1 py-1"> {{ $ongoing }}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="ri-arrow-right-line"></i>All ongoing application</span>
                                                </p>
                                            </div>
                                           
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                            <div class="col-sm-6 col-xxl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Matching Fund</h5>
                                                <h3 class="my-1 py-1 "> {{ '2023' }}</h3>
                                                <p class="mb-0 text-muted ">
                                                    <span class="text-success me-2">Closing: May 5th 2024</span>
                                                </p>
                                            </div>
                                           
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                            
                            <div class="col-sm-6 col-xxl-3">
                                <div class="card bg-success-subtle">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h5 class="text-muted fw-normal mt-0 text-truncate" title="Campaign Sent">Registered Staff</h5>
                                                <h3 class="my-1 py-1"> {{ $staff }}</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="ri-arrow-right-line"></i>All registered staff</span>
                                                </p>
                                            </div>
                                            
                                        </div> <!-- end row-->
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        

                            
                        

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © Edufame Data limited
                            </div>
                         
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <script>
            setTimeout(function(){
                location.reload();
            }, 60000); 
        </script>
        <!-- END wrapper -->

       @endsection      
   