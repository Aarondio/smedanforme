<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paystack;
use Illuminate\Support\Facades\Auth;
class PaystackController extends Controller
{
    //
    public function store(Request $request, Paystack $paystack)
    {
        $reference = $request->input('reference');
        $user = Auth::user();
        $paystack->reference = $reference;
        $paystack->user_id = $user->id; 
        $paystack->plan_type = 1;
        $paystack->save();

        return redirect()->route('personal')->withSuccess('Congratulations your payment was successful');
    }

    public function sbpayment(Request $request, Paystack $paystack)
    {
        $reference = $request->input('reference');
        $user = Auth::user();
        $paystack->reference = $reference;
        $paystack->user_id = $user->id; 
        $paystack->plan_type = 2;
        $paystack->save();

        return redirect()->route('personalinfo')->withSuccess('Congratulations your payment was successful');
    }
}
