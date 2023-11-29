<?php

namespace App\Http\Controllers;
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
            $paystack = Paystack::where('user_id', $user->id)->first();
            return view('home', compact('user', 'paystack'));
        }
        // return view('home');
    }
}
