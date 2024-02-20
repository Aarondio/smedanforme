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
                        <h1 class="display-2 mb-1 text-white">Business Description</h1>
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
                                        <li><a class="nav-link fw-normal active text-decoration-underline"
                                                href="{{ route('nanoplan') }}">Business
                                                Description</a></li>
                                        <li><a class="nav-link fw-normal " href="{{ route('swot') }}">Swot
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
                                <h4 class="">Tell us about your business</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="about" name="about" class="form-control rounded-0" placeholder="Tell us about your business"
                                            style="height: 150px" required>{{ $businessinfo->about ?? '' }}</textarea>
                                        {{-- <label for="aumission">State your mission statement</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-00">View sample</a>
                                    </div>
                                    <div id="collapse-00"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5 copy-disabled">
                                                Discover culinary excellence at Ebuka and sons farm. We specialize in
                                                premium-quality rice and beans, sourced ethically and sustainably. With a
                                                focus on customer satisfaction, we tailor our offerings to diverse
                                                preferences, fostering loyalty. Our dedicated management ensures seamless
                                                operations and strategic decisions. Beyond taste, we stand for ethical
                                                sourcing, resonating with environmentally conscious consumers. Join us in
                                                redefining your culinary experience with flavors that transcend,
                                                sustainability that matters, and a commitment to quality that sets us apart.
                                                Welcome to a place where every meal tells a story of passion, quality, and a
                                                harmonious blend of tradition and innovation.
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
                                <h4 class="">State your mission statement</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="mission" name="mission" class="form-control rounded-0" placeholder="State your mission statement"
                                            style="height: 150px" required>{{ $businessinfo->mission ?? '' }}</textarea>
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

                                                At Ebuka and sons farm Ltd, our mission is to redefine culinary
                                                satisfaction.
                                                We strive to elevate your dining experience by offering premium-quality,
                                                ethically sourced rice and beans. Committed to environmental responsibility,
                                                we go beyond taste, fostering sustainability and customer delight. With a
                                                diverse product range tailored to individual preferences, our goal is to
                                                exceed expectations, creating memorable moments in every meal. Through
                                                dedication to quality, ethical sourcing practices, and a customer-centric
                                                approach, we aim to leave a positive impact on both your plate and the
                                                broader community. Join us in savoring flavors, embracing sustainability,
                                                and redefining excellence in every bite.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{-- <p id="aud" class=" text-muted">Saved</p> --}}
                                    <p class="text-end fs-14 text-muted"> <span id="counter01">0</span>/100</p>
                                </div>
                            </div>
                            <div id="form-011" class="wrapper">
                                {{-- <input type="text" name="plan_type" value="1"> --}}
                                <h4 class="">State your business challenges and how you have over come them</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="journey" name="journey" class="form-control rounded-0" placeholder="Business challenges and solution"
                                            style="height: 150px" required>{{ $businessinfo->journey ?? '' }}</textarea>
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

                                                Navigating the rice and beans market presented challenges that fueled our
                                                evolution at Ebuka and sons Ltd. Adapting to market fluctuations, we
                                                diversified our product range, attracting a broader customer base.
                                                Overcoming dependence on limited suppliers, we forged ties with
                                                alternatives, fortifying our supply chain against potential disruptions. In
                                                the competitive arena, differentiation was key. We developed unique selling
                                                propositions and implemented targeted marketing, carving our niche and
                                                capturing our audience's attention. These challenges were not roadblocks but
                                                catalysts, propelling us towards innovation, resilience, and sustained
                                                success in the realm of premium-quality rice and beans.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{-- <p id="aud" class=" text-muted">Saved</p> --}}
                                    <p class="text-end fs-14 text-muted"> <span id="counter011">0</span>/100</p>
                                </div>
                            </div>
                            <div id="form-1" class="wrapper">
                                {{-- <input type="text" name="plan_type" value="1"> --}}
                                <h4 class="">Describe the need of your target customers</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="audience" name="audience_need" class="form-control rounded-0"
                                            placeholder="Describe the need of your target customers" style="height: 150px" required>{{ $businessinfo->audience_need ?? '' }}</textarea>
                                        {{-- <label for="audenience">Describe target audience needs</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-1">View sample</a>
                                    </div>
                                    <div id="collapse-1"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5 ">
                                                Our target customers, culinary enthusiasts and health-conscious individuals
                                                alike, seek more than just staples; they crave premium-quality rice and
                                                beans. Yearning for a diverse and ethically sourced selection, they desire
                                                flavors that transcend the ordinary. Our customers prioritize not only
                                                freshness and taste but also the assurance of ethical and sustainable
                                                practices. With a discerning palate, they demand a range that caters to
                                                diverse preferences. At Ebuka and sons, we understand this need and
                                                strive to meet it, offering a curated exp
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{-- <p id="aud" class=" text-muted">Saved</p> --}}
                                    <p class="text-end fs-14 text-muted"> <span id="counter">0</span>/100</p>
                                </div>
                            </div>
                            <div id="form-2" class="wrapper">
                                <h4 class="">Describe how the business intends to generate income</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="business_model" name="business_model" class="form-control rounded-0"
                                            placeholder="Describes how the business plans to generate income" style="height: 150px" required>{{ $businessinfo->business_model ?? '' }}</textarea>
                                        {{-- <label for="business_model">Outline income generation plans</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-2">View sample</a>
                                    </div>
                                    <div id="collapse-2"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5">
                                                Revenue will primarily be generated through direct sales to customers via
                                                our physical store and online platform. Additional revenue streams will be
                                                explored through partnerships with local restaurants, catering services, and
                                                participation in food events. The emphasis on quality and sustainability
                                                will attract customers willing to pay a premium for our premium products,
                                                contributing to the overall profitability of the business.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end fs-14 text-muted"> <span id="counter1">0</span>/100</p>
                            </div>
                            <div id="form-3" class="wrapper">
                                <h4 class="">Outline the target customers</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="target_market" name="target_market" class="form-control rounded-0"
                                            placeholder="Outline the target customers" style="height: 150px" required>{{ $businessinfo->target_market ?? '' }}</textarea>
                                        {{-- <label for="target_market">Outline the target audience</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-3">View sample</a>
                                    </div>
                                    <div id="collapse-3"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5">
                                                Our primary target market includes health-conscious individuals, food
                                                enthusiasts, and those who value premium-quality ingredients in their
                                                cooking. Additionally, we aim to cater to busy professionals and families
                                                seeking convenience without compromising on the nutritional value of their
                                                meals.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end fs-14 text-muted"> <span id="counter2">0</span>/100</p>
                            </div>
                            <div id="form-4" class="wrapper">
                                <h4 class="">Outline your competitors</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="competition_ad" name="competition_ad" class="form-control rounded-0"
                                            placeholder="Outline your competitive advantages" style="height: 150px" required>{{ $businessinfo->competition_ad ?? '' }}</textarea>
                                        {{-- <label for="competition_ad">Outline how you can set yourself apart</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-4">View sample</a>
                                    </div>
                                    <div id="collapse-4"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5">

                                                In the rice and beans market, we face competition from regional suppliers
                                                offering standard products at competitive prices. What sets us apart is our
                                                commitment to providing premium-quality options across diverse budgets.
                                                Unlike competitors focusing on specific price ranges, we take pride in
                                                offering accessibility without compromising quality. Our dedication to
                                                flexibility in pricing and maintaining high standards distinguishes us,
                                                ensuring customers can enjoy the finest rice and beans tailored to both
                                                their preferences and financial considerations.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end fs-14 text-muted"> <span id="counter3">0</span>/100</p>
                            </div>
                            <div id="form-5" class="wrapper">
                                <h4 class="">Management team</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="management_team" name="management_team" class="form-control rounded-0"
                                            placeholder="Outline the management structure of the business" style="height: 150px" required>{{ $businessinfo->management_team ?? '' }}</textarea>
                                        {{-- <label for="management_team">Outline the management structure</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-5">View sample</a>
                                    </div>
                                    <div id="collapse-5"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5">
                                                Led by Founder and CEO Umar Aliyu, our dynamic team includes Operations
                                                Manager Larry Maikasuwa and Marketing Specialist Hauwa James. Together, we
                                                bring a wealth of expertise, boasting a combined experience of 3 years in
                                                the food industry. Our collaboration is fueled by a shared passion for
                                                delivering culinary excellence, ensuring that every aspect of our business
                                                is guided by a commitment to quality, innovation, and customer satisfaction.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end fs-14 text-muted"> <span id="counter4">0</span>/100</p>
                            </div>
                            <div id="form-6" class="wrapper">
                                <h4 class="">Explain why you need the funding</h4>
                                <div class="card rounded-0">
                                    <div class="">
                                        <textarea id="loan_reason" name="loan_reason" class="form-control rounded-0"
                                            placeholder="Outline the reason why you need the funding" style="height: 150px" required>{{ $businessinfo->loan_reason ?? '' }}</textarea>
                                        {{-- <label for="loan_reason">Outline the reasons</label> --}}
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-6">View sample</a>
                                    </div>
                                    <div id="collapse-6"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class=" px-10 py-5">

                                                The requested loan will play a pivotal role in propelling our business
                                                forward. Specifically, it will be utilized to expand our inventory,
                                                introducing a more extensive variety of high-quality rice and beans to cater
                                                to diverse customer preferences. Additionally, funds will be allocated
                                                towards implementing an efficient and user-friendly online ordering system,
                                                enhancing the overall customer experience. To amplify our market reach,
                                                targeted marketing campaigns will be launched, ensuring a broader audience
                                                is engaged. Furthermore, the loan will support our commitment to
                                                sustainability by enabling investments in eco-friendly packaging options,
                                                aligning with our ethos of responsible and conscious business practices.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end fs-14 text-muted"> <span id="counter5">0</span>/100</p>
                            </div>
                        
                        </form>
    
                    </div>
                    <div class="card-footer">
                        <div class="justify-content-between d-flex">
                            <div class="col-md-6">
                                <a href="{{ route('business') }}" class="btn btn-outline-danger btn-sm">Back</a>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('swot') }}" class="float-end">
                                    <input type="text" name="id" value="{{ $businessinfo->id }}" hidden>
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Next</button>
                                </form>
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
            // Function to limit word count for an input element
            // function limitWordCount(element, wordLimit, counter) {
            //     element.on('input', function() {
            //         var content = $(this).val();
            //         var words = content.match(/\S+/g) || [];
            //         var wordCount = words.length;
            //         counter.text(wordCount);

            //         if (wordCount > wordLimit) {
            //             var truncatedContent = words.slice(0, wordLimit).join(' ');
            //             $(this).val(truncatedContent);
            //         }
            //     });
            // }
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

                    $(this).on('blur', function() {
                        // var fieldValue = $(this).val();
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
                });
            }


            // Apply the word count limit to specific elements
            limitWordCount($('#audience'), 100, $('#counter'), '{{ route('audience_need') }}', 'audience_need',
                'plan');
            limitWordCount($('#business_model'), 100, $('#counter1'), '{{ route('business_model') }}',
                'business_model', 'plan');
            limitWordCount($('#target_market'), 100, $('#counter2'), '{{ route('target_market') }}',
                'target_market', 'plan');
            limitWordCount($('#competition_ad'), 100, $('#counter3'), '{{ route('competition_ad') }}',
                'competition_ad', 'plan');
                
            limitWordCount($('#management_team'), 100, $('#counter4'), '{{ route('management_team') }}',
                'management_team', 'plan');

            limitWordCount($('#loan_reason'), 100, $('#counter5'), '{{ route('loan_reason') }}', 'loan_reason',
                'plan');
            limitWordCount($('#loan_amount'), 100, $('#counter7'), '{{ route('loan_amount') }}', 'loan_amount',
                'plan');
            limitWordCount($('#about'), 100, $('#counter0'), '{{ route('about') }}', 'about',
                'plan');
            limitWordCount($('#mission'), 100, $('#counter01'), '{{ route('mission') }}', 'mission',
                'plan');
            limitWordCount($('#journey'), 100, $('#counter011'), '{{ route('journey') }}', 'journey',
                'plan');


            document.addEventListener('copy', (event) => {
                const targetElement = event.target;
                if (targetElement.classList.contains('copy-disabled')) {
                    event.preventDefault();
                    alert('Copying is disabled for this element.');
                }
            });

            // limitWordCount($('#competition_ad'), 100, $('#counter3'));
            // limitWordCount($('#management_team'), 100, $('#counter4'));
            // limitWordCount($('#loan_reason'), 100, $('#counter5'));
            // Add more elements if needed, e.g., limitWordCount($('#otherInput'), 50);
        });
    </script>
@endsection
