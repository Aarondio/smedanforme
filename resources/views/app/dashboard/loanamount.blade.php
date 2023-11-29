@extends('layouts.app')

@section('content')
    <section class="wrapper bg-gray py-10 py-md-12">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-md-6 card shadow-lg">
                    <div class="card-body">
                        <h2>Loan amount</h2>
                        <form action="{{ route('add_product') }}" id="productForm" method="POST">
                            @csrf
                            <div class=" mb-4">
                                <label for="name" class="mb-3">How much are your applying for?</label>
                                <input id="loan_amount" name="loan_amount" type="number" onkeydown="checkAmount()" 
                                    class="form-control" placeholder="Loan amount"  required>
                                    {{-- <input type="text" id="amountInput" onkeypress="checkAmount()"> --}}
{{-- <p id="planType"></p> --}}

                                @error('loan_amount')
                                    <p class="small text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <p id="planType"></p>
                            {{-- <div class="alert alert-success" id="msgcontainer">
                                <p class="msg m-0">You will require a nano business plan for this amount</p>
                                <a class="btn btn-success btn-sm mt-3 text-white"
                                    href="{{ route('purchasenbp') }}">Continue</a>
                            </div> --}}

                        </form>

                    </div>
                    <div class="card-footer border-0">
                        <div class="justify-content-between d-flex">
                            <div class="col-md-6 align-self-start">
                                <a href="{{ route('nanoplan') }}" class="btn btn-outline-danger btn-sm">Back</a>
                            </div>
                            {{-- <div class="col-md-6">
                                <a href="{{ route('myproducts') }}" class="float-end btn btn-outline-primary btn-sm">View Products</a>
                            </div> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
    <script>
        function checkAmount() {
            var amount = document.getElementById("loan_amount").value;

            if (amount < 100000) {
                document.getElementById("planType").innerText = "The amount must be at least 100,000.";
                return;
            }

            // Make an AJAX call to fetch the business plan type based on the amount
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var planType = xhr.responseText;
                        document.getElementById("planType").innerText = planType;
                    } else {
                        document.getElementById("planType").innerText = "Error fetching plan type.";
                    }
                }
            };

            xhr.open("GET", "checkPlanType.php?amount=" + amount,
            true); // Replace 'checkPlanType.php' with your server-side script
            xhr.send();
        }
    </script>
@endsection
