@extends('layouts.app')

@section('content')
    <style>
        /* *{
                            border: 1px solid red;
                        } */
    </style>
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('assets/img/photos/bg20.png') }}">
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
                <div class="col-lg-10 col-md-12 card shadow-lg">

                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div id="form-1" class="wrapper">
                                {{-- <input type="text" name="plan_type" value="1"> --}}
                                <h4 class="">Describe the need of your target audience</h4>
                                <div class="card rounded-0">
                                    <div class="form-floating">
                                        <textarea id="audience" name="audience_need" class="form-control rounded-0"
                                            placeholder="Describe the need of your target audience" style="height: 150px" required>{{ $businessinfo->audience_need ?? '' }}</textarea>
                                        <label for="audenience">Describe target audience needs</label>
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-1">View sample</a>
                                    </div>
                                    <div id="collapse-1"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class="code-wrapper-inner px-10 py-5">
                                                We plan to rent motorboats and yachts to individuals looking for either
                                                relaxation or pure fun while at sea. Our motorboats aim to provide an
                                                unforgettable trip and allow for many recreational activities such as
                                                wakeboarding and water-skiing
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                                <p class="text-end fs-14 text-muted"> <span id="counter">0</span>/100</p>
                            </div>
                            <div id="form-2" class="wrapper">
                                <h4 class="">Describes how the business plans to generate income</h4>
                                <div class="card rounded-0">
                                    <div class="form-floating">
                                        <textarea id="business_model" name="business_model" class="form-control rounded-0"
                                            placeholder="Describes how the business plans to generate income" style="height: 150px" required>{{ $businessinfo->business_model ?? '' }}</textarea>
                                        <label for="business_model">Outline income generation plans</label>
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-2">View sample</a>
                                    </div>
                                    <div id="collapse-2"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class="code-wrapper-inner px-10 py-5">
                                                Most of our profit comes from the direct sales of renting motorboats and
                                                yachts to local and international tourists. But we can also offer
                                                recreational activities like deep-sea diving at an additional cost. We plan
                                                to advertise our rental motorboats and yachts online through social media
                                                and a website.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end fs-14 text-muted"> <span id="counter1">0</span>/100</p>
                            </div>
                            <div id="form-3" class="wrapper">
                                <h4 class="">Outlines the target audience</h4>
                                <div class="card rounded-0">
                                    <div class="form-floating">
                                        <textarea id="target_market" name="target_market" class="form-control rounded-0"
                                            placeholder="Outlines the target audience" style="height: 150px" required>{{ $businessinfo->target_market ?? '' }}</textarea>
                                        <label for="target_market">Outlines the target audience</label>
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-3">View sample</a>
                                    </div>
                                    <div id="collapse-3"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class="code-wrapper-inner px-10 py-5">
                                                Our goal is to become part of the large and growing boat rental industry in
                                                the U.K. Our target market consists of local and international tourists
                                                visiting the pristine beaches in the sunny town of Eastbourne. They're
                                                moderate-income people, aged 30 to 50, who want to explore the sea and
                                                unspoiled landscapes, but at an affordable price.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end fs-14 text-muted"> <span id="counter2">0</span>/100</p>
                            </div>
                            <div id="form-4" class="wrapper">
                                <h4 class="">Outlines your competitors</h4>
                                <div class="card rounded-0">
                                    <div class="form-floating">
                                        <textarea id="competition_ad" name="competition_ad" class="form-control rounded-0"
                                            placeholder="Outlines the target audience" style="height: 150px" required>{{ $businessinfo->competition_ad ?? '' }}</textarea>
                                        <label for="competition_ad">Outlines how you can set yourself apart</label>
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-4">View sample</a>
                                    </div>
                                    <div id="collapse-4"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class="code-wrapper-inner px-10 py-5">
                                                Our primary competitors are other boat rental companies in the region. These
                                                companies rent well-equipped motorboats and yachts but at a premium price.
                                                What sets us apart is our ability to rent boats in all price ranges,
                                                allowing our customers to hire motorboat rentals that suit their budget
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end fs-14 text-muted"> <span id="counter3">0</span>/100</p>
                            </div>
                            <div id="form-5" class="wrapper">
                                <h4 class="">Management team</h4>
                                <div class="card rounded-0">
                                    <div class="form-floating">
                                        <textarea id="management_team" name="management_team" class="form-control rounded-0"
                                            placeholder="Outlines the management structure of the business" style="height: 150px" required>{{ $businessinfo->management_team ?? '' }}</textarea>
                                        <label for="management_team">Outlines the management structure</label>
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-5">View sample</a>
                                    </div>
                                    <div id="collapse-5"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class="code-wrapper-inner px-10 py-5">
                                                Our team consists of three skilled individuals, Oliver, Jacob and Edith.
                                                Oliver is the HR manager, and they oversee the entire business, with Jacob
                                                and Edith conducting day-to-day operations such as boat scheduling and
                                                dealing with customers face-to-face.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end fs-14 text-muted"> <span id="counter4">0</span>/100</p>
                            </div>
                            <div id="form-6" class="wrapper">
                                <h4 class="">Explain why you need the funding</h4>
                                <div class="card rounded-0">
                                    <div class="form-floating">
                                        <textarea id="loan_reason" name="loan_reason" class="form-control rounded-0"
                                            placeholder="Outlines the reason why you need the funding" style="height: 150px" required>{{ $businessinfo->loan_reason ?? '' }}</textarea>
                                        <label for="loan_reason">Outlines the reasons</label>
                                    </div>
                                    <div class="card-footer position-relative p-0 px-4">
                                        <a class="collapse-link collapsed stretched-link fs-14" data-bs-toggle="collapse"
                                            href="#collapse-6">View sample</a>
                                    </div>
                                    <div id="collapse-6"
                                        class="card-footer bg-soft-grape p-0 accordion-collapse collapse rounded-0">
                                        <div class="code-wrapper">
                                            <div class="code-wrapper-inner px-10 py-5">
                                                We require a total of £10,000 in financing. Oliver is contributing £1500
                                                worth of personal savings and seeking an additional investment of £9500. Of
                                                the total £10,000, we'll use 75% to liaise with boat owners in the region to
                                                build a rental fleet of high-quality, carefully selected motorboats and
                                                yachts.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-end fs-14 text-muted"> <span id="counter5">0</span>/100</p>
                            </div>
                            <div id="form-7" class="wrapper">
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
                                {{-- <div class="card rounded-0">
                                    <div class="form-floating">
                                        <input type="number" id="loan_amount"
                                            value="{{ $businessinfo->loan_amount ?? '' }}" name="loan_amount"
                                            class="form-control rounded-0"
                                            placeholder="Outlines the reason why you need the funding" required>
                                        <label for="loan_amount">E.g 2,500,000</label>
                                    </div>


                                </div> --}}
                                <p class="text-end fs-14 text-muted"> <span id="counter7">0</span>/1</p>
                            </div>
                        </form>

                    </div>
                    <div class="card-footer">
                        <div class="justify-content-between d-flex">
                            <div class="col-md-6">
                                <a href="{{ route('businessinfo') }}" class="btn btn-outline-danger btn-sm">Back</a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('previewinfo') }}"
                                    class="float-end btn btn-grape btn-sm">Preview Application</a>
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
            function limitWordCount(element, wordLimit, counter, saveRoute, input) {
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
            limitWordCount($('#audience'), 100, $('#counter'), '{{ route('audience_need') }}', 'audience_need');
            limitWordCount($('#business_model'), 100, $('#counter1'), '{{ route('business_model') }}',
                'business_model');
            limitWordCount($('#target_market'), 100, $('#counter2'), '{{ route('target_market') }}',
                'target_market');
            limitWordCount($('#competition_ad'), 100, $('#counter3'), '{{ route('competition_ad') }}',
                'competition_ad');
            limitWordCount($('#management_team'), 100, $('#counter4'), '{{ route('management_team') }}',
                'management_team');
            limitWordCount($('#loan_reason'), 100, $('#counter6'), '{{ route('loan_reason') }}', 'loan_reason');
            limitWordCount($('#loan_amount'), 1, $('#counter7'), '{{ route('loan_amount') }}', 'loan_amount');

            // limitWordCount($('#competition_ad'), 100, $('#counter3'));
            // limitWordCount($('#management_team'), 100, $('#counter4'));
            // limitWordCount($('#loan_reason'), 100, $('#counter5'));
            // Add more elements if needed, e.g., limitWordCount($('#otherInput'), 50);
        });
    </script>
@endsection
