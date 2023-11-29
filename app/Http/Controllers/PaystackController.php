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
        $paystack->save();

        return redirect()->route('personal')->withSuccess('Congratulations your payment was successful');
    }
}
