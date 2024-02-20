@extends('layouts.app')

@section('content')
    <style>
        /* *{
                                                            border: 1px solid red;
                                                        } */
    </style>
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('asset/img/photos/bg4.jpg') }}">
        {{-- <section class="wrapper image-wrapper bg-image bg-overlay text-white" data-image-src="{{asset('assets/img/photos/bg4.jpg')}}"> --}}

        <div class="wrapper ">
            <div class="container py-10 py-md-12">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-xxl-8 text-center">
                        <h1 class="display-2 mb-1 text-white">SWOT Analysis</h1>
                        <p>Fill out the form below</p>
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /.wrapper -->
    </section>
    <section class="wrapper bg-gray py-10 py-md-12">
        <div class="container">
            @if (session('success'))
                <center>
                    <div class="alert alert-success mb-5 col-md-10">
                        {{ session('success') }}
                    </div>
                </center>
            @endif
            <div class="row justify-content-center ">
                <aside class="col-lg-2 sidebar sticky-sidebar mt-md-0  d-none d-xl-block">
                    <div class="widget">
                        {{-- <h6 class="widget-title fs-17 mb-2 ps-xl-5">On this page</h6> --}}

                        <div class="card bg-transparent">
                            <div class="card-body p-3 m-0">
                                <nav class="" id="sidebar-nav">
                                    <ul class="list-unstyled fs-sm lh-sm text-reset fw-light">
                                        <li><a class="nav-link  fw-normal" href="{{ route('personal') }}">Personal Info</a>
                                        </li>
                                        <li><a class="nav-link  my-1 fw-normal " href="{{ route('business') }}">Business
                                                Info</a></li>
                                        <li><a class="nav-link fw-normal " href="{{ route('nanoplan') }}">Business
                                                Description</a></li>
                                        <li><a class="nav-link fw-normal active text-decoration-underline"
                                                href="{{ route('swot') }}">Swot
                                                Analysis</a></li>

                                        <li><a class="nav-link fw-normal my-1" href="{{ route('product') }}">Add
                                                Products/Services</a></li>
                                        <li><a class="nav-link fw-normal" href="{{ route('finance') }}">Expenses Records</a>
                                        </li>

                                        <li><a class="nav-link fw-normal " href="{{ route('preview') }}">Preview
                                                submission</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </aside>
                <div class="col-lg-10 col-md-12 card shadow-lg">

                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div id="form-0" class="wrapper">
                                {{-- <input type="text" name="plan_type" value="1"> --}}
                                <h4 class="">Strengths</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="strength" name="strength" class="form-control rounded-0" placeholder="Describe your business strength"
                                            style="height: 150px" required>{{ $businessinfo->strength ?? '' }}</textarea>
                                        {{-- <label for="aumission">State your mission statement</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-00">View sample</a>
                                    </div>
                                    <div id="collapse-00"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5 ">
                                                Our business prides itself on offering premium-quality rice and beans,
                                                distinguishing us in the market and appealing to customers who prioritize
                                                freshness and taste. Complementing this, our commitment to ethical and
                                                sustainable sourcing practices not only enhances our brand image but also
                                                resonates with environmentally conscious consumers. We prioritize a
                                                customer-centric approach, focusing on understanding and meeting the diverse
                                                needs of our clientele, fostering a loyal customer base and generating
                                                positive word-of-mouth. Furthermore, the collective experience of our
                                                management team ensures not only effective day-to-day operations but also
                                                strategic decision-making to drive the success and growth of our business.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{-- <p id="aud" class=" text-muted">Saved</p> --}}
                                    <p class="text-end fs-14 text-muted"> <span id="counter0">0</span>/100</p>
                                </div>
                            </div>
                            <div id="form-01" class="wrapper">
                                {{-- <input type="text" name="plan_type" value="1"> --}}
                                <h4 class="">Weakness</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="weakness" name="weakness" class="form-control rounded-0"
                                            placeholder="Describe some of your business weaknesses" style="height: 150px" required>{{ $businessinfo->weakness ?? '' }}</textarea>
                                        {{-- <label for="aumission">State your mission statement</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-0">View sample</a>
                                    </div>
                                    <div id="collapse-0"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5 ">
                                                An area for improvement is our limited product range. Expanding offers a
                                                chance to attract a broader customer base. Also, dependence on a few
                                                suppliers poses a risk to our supply chain. To mitigate, establishing ties
                                                with alternative suppliers is crucial.In a competitive market, standing out
                                                is vital. Developing unique selling
                                                propositions and targeted marketing differentiates us, capturing our
                                                audience's attention. This proactive approach not only navigates competition
                                                but also strengthens our brand presence, ensuring sustained success.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{-- <p id="aud" class=" text-muted">Saved</p> --}}
                                    <p class="text-end fs-14 text-muted"> <span id="counter1">0</span>/100</p>
                                </div>
                            </div>
                            <div id="form-011" class="wrapper">
                                {{-- <input type="text" name="plan_type" value="1"> --}}
                                <h4 class="">Opportunity</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="opportunity" name="opportunity" class="form-control rounded-0" placeholder="Opportunity"
                                            style="height: 150px" required>{{ $businessinfo->opportunity ?? '' }}</textarea>
                                        {{-- <label for="aumission">State your mission statement</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-01">View sample</a>
                                    </div>
                                    <div id="collapse-01"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5 ">
                                                Expanding into the online market aligns with the trend of online shopping,
                                                offering a significant opportunity to tap into a wider customer base. This
                                                move enhances convenience and accessibility, catering to a broader audience.
                                                Collaborating with local businesses, including restaurants and catering
                                                services, provides a strategic avenue for creating new revenue streams and
                                                elevating brand visibility within the community. Aligning marketing efforts
                                                with health and wellness trends capitalizes on the increasing number of
                                                health-conscious consumers, emphasizing the nutritional benefits of our rice
                                                and beans. This strategic positioning not only aligns with current
                                                preferences but also positions our products as a healthy and wholesome
                                                choice.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{-- <p id="aud" class=" text-muted">Saved</p> --}}
                                    <p class="text-end fs-14 text-muted"> <span id="counter2">0</span>/100</p>
                                </div>
                            </div>
                            <div id="form-1" class="wrapper">
                                {{-- <input type="text" name="plan_type" value="1"> --}}
                                <h4 class="">Threats</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="threats" name="threats" class="form-control rounded-0"
                                            placeholder="Threats" style="height: 150px" required>{{ $businessinfo->threats ?? '' }}</textarea>
                                        {{-- <label for="audenience">Describe target audience needs</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-1">View sample</a>
                                    </div>
                                    <div id="collapse-1"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5">
                                                Market fluctuations, like economic downturns or commodity price changes,
                                                pose a potential impact on profitability. Unforeseen events such as natural
                                                disasters, political instability, could disrupt our supply chain, affecting
                                                product availability. Moreover, the evolving consumer preferences or market
                                                trends necessitate continuous adaptation to remain relevant. These
                                                challenges highlight the importance of a robust strategy and flexibility in
                                                our operations to navigate external uncertainties and ensure the resilience
                                                and adaptability of our business in a dynamic market.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{-- <p id="aud" class=" text-muted">Saved</p> --}}
                                    <p class="text-end fs-14 text-muted"> <span id="counter3">0</span>/100</p>
                                </div>
                            </div>





                            {{-- <div id="form-7" class="wrapper">
                                <h4 class="">Loan Amount </h4>
                                <select name="loan_amount" id="loan_amount" class="form-select text-dark">
                                    <option value="" @if ($businessinfo->loan_amount == '') disabled selected @endif>Select loan amount</option>
                                    <option value="250000" @if ($businessinfo->loan_amount == '250000') selected @endif>250,000</option>
                                    <option value="500000" @if ($businessinfo->loan_amount == '500000') selected @endif>500,000</option>
                                    <option value="1000000" @if ($businessinfo->loan_amount == '1000000') selected @endif>1,000,000</option>
                                    <option value="1500000" @if ($businessinfo->loan_amount == '1500000') selected @endif>1,500,000</option>
                                    <option value="2000000" @if ($businessinfo->loan_amount == '2000000') selected @endif>2,000,000</option>
                                    <option value="2500000" @if ($businessinfo->loan_amount == '2500000') selected @endif>2,500,000</option>
                                </select>
                        
                                <p class="text-end fs-14 text-muted"> <span id="counter7">0</span>/1</p>
                            </div> --}}
                        </form>
                        {{-- <div class="card rounded-0">
                                    <div class="form-floating">
                                        <input type="number" id="loan_amount"
                                            value="{{ $businessinfo->loan_amount ?? '' }}" name="loan_amount"
                                            class="form-control rounded-0"
                                            placeholder="Outline the reason why you need the funding" required>
                                        <label for="loan_amount">E.g 2,500,000</label>
                                    </div>


                                </div> --}}
                    </div>
                    <div class="card-footer">
                        <div class="justify-content-between d-flex">
                            <div class="col-md-6">
                                <a href="{{ route('nanoplan') }}" class="btn btn-outline-danger btn-sm">Back</a>
                            </div>
                            <div class="col-md-6">
                                {{-- <form action="{{ route('product') }}" class="float-end"> --}}
                                {{-- <input type="text" name="id" value="{{ $businessinfo->id }}" hidden> --}}
                                <a href="{{ route('product') }}" type="submit"
                                    class="btn btn-sm btn-outline-primary float-end">Next</a>
                                {{-- </form> --}}
                                {{-- <a href="{{ route('finance',$businessinfo->id) }}"
                                    class="float-end btn btn-outline-primary btn-sm">Next</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {

            function limitWordCount(element, wordLimit, counter, saveRoute, input, plan) {
                element.on('input', function() {
                    var content = $(this).val();
                    var words = content.match(/\S+/g) || [];
                    var wordCount = words.length;
                    counter.text(wordCount);

                    if (wordCount > wordLimit) {
                        var truncatedContent = words.slice(0, wordLimit).join(' ');
                        $(this).val(truncatedContent);
                    }
                });

                element.on('blur', function() {
                    var content = $(this).val();
                    $.ajax({
                        url: saveRoute,
                        method: 'POST',
                        data: {
                            [input]: content,
                            [plan]: 1
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            console.log('Data saved successfully!', response);
                        },
                        error: function(xhr, status, error) {
                            console.log('Error:', error);
                        }
                    });
                });
            }

            limitWordCount($('#strength'), 100, $('#counter0'), '{{ route('strength') }}', 'strength', 'plan');
            limitWordCount($('#weakness'), 100, $('#counter1'), '{{ route('weakness') }}', 'weakness', 'plan');
            limitWordCount($('#opportunity'), 100, $('#counter2'), '{{ route('opportunity') }}', 'opportunity',
                'plan');
            limitWordCount($('#threats'), 100, $('#counter3'), '{{ route('threats') }}', 'threats', 'plan');

            document.addEventListener('copy', (event) => {
                const targetElement = event.target;
                if (targetElement.classList.contains('')) {
                    event.preventDefault();
                    alert('Copying is disabled for this element.');
                }
            });

        });
    </script>
@endsection
