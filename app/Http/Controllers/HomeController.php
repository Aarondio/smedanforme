<?php

namespace App\Http\Controllers;

use App\Models\Businessinfo;
use App\Models\Paystack;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if ($user) {
            $plan_one = Paystack::where('user_id', $user->id)->where('plan_type', 1)->first();
            $plan_two = Paystack::where('user_id', $user->id)->where('plan_type', 2)->first();
            $business_one = Businessinfo::where('user_id', $user->id)
                ->where('status', 'Completed')
                ->where('plan_type', 1)
                ->first();
            // $business_two = Businessinfo::where('user_id', $user->id)->where('status','Completed')->where('plan_type',2)->first();
            $business_two = Businessinfo::where('user_id', $user->id)
                ->where('status', 'Completed')
                ->where('plan_type', 2)
                ->first();
            $business_plans = Businessinfo::where('user_id', $user->id)
                ->where('status', 'Completed')
                ->get();
            return view('home', compact('user', 'plan_one', 'plan_two', 'business_one', 'business_two', 'business_plans'));
        }
        // return view('home');
    }
}
