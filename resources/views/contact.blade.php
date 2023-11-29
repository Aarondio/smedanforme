@extends('layouts.app')

@section('content')
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('assets/img/photos/bg4.jpg') }}">
        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <h1 class="display-2 mb-1 text-white text-center">Contact us</h1>
            </div>
        </div>
    </section>

    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
          <div class="row">
            <div class="col-xl-10 mx-auto">
              <div class="card">
                <div class="row gx-0">
                  <div class="col-lg-6 align-self-stretch">
                    <div class="map map-full rounded-top rounded-lg-start">
                        <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=520&amp;height=400&amp;hl=en&amp;q=Garki%20area%2011%20gimbiya%20street%20abuja%20nigeria%20Abuja+(Edufame%20Data%20Limited)&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href='https://maps-generator.com/'>Maps Generator</a>

                    </div>
                    <!-- /.map -->
                  </div>
                  <!--/column -->
                  <div class="col-lg-6">
                    <div class="p-10 p-md-11 p-lg-14">
                      <div class="d-flex flex-row">
                        <div>
                          <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                        </div>
                        <div class="align-self-start justify-content-start">
                          <h5 class="mb-1">Address</h5>
                          <address>Garki Area 11, Gimbiya street area 11 Abuja, Nigeria</address>
                        </div>
                      </div>
                      <!--/div -->
                      <div class="d-flex flex-row">
                        <div>
                          <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                        </div>
                        <div>
                          <h5 class="mb-1">Phone</h5>
                          <p>+234 810 101 3370 <br class="d-none d-md-block" />+234 803 344 8732</p>
                        </div>
                      </div>
                      <!--/div -->
                      <div class="d-flex flex-row">
                        <div>
                          <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                        </div>
                        <div>
                          <h5 class="mb-1">E-mail</h5>
                          <p class="mb-0"><a href="mailto:hello@smecredits.com.ng" class="link-body">hello@smecredits.com.ng</a></p>
                          <p class="mb-0"><a href="mailto:hello@smecredits.com.ng" class="link-body">enquiries@smecredits.com.ng</a></p>
                        </div>
                      </div>
                      <!--/div -->
                    </div>
                    <!--/div -->
                  </div>
                  <!--/column -->
                </div>
                <!--/.row -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->
    
@endsection
