<?php

namespace App\Http\Controllers;

use App\Models\Businessinfo;
use App\Models\Paystack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Salesforcast;
use App\Models\State;
use Illuminate\Support\Facades\DB;
class SiteController extends Controller
{
    //
    public function nbp(Request $request)
    {

        return view('nbp');
    }
    public function mbp(Request $request)
    {
        return view('mbp');
    }

    public function applicants(Request $request, Businessinfo $businessinfos)
    {
        $businessinfos = Businessinfo::where('plan_type', 2)->get();
        $completed = Businessinfo::where('plan_type', 2)
            ->where('status', 'Completed')
            ->count();
        $incompleted = Businessinfo::where('plan_type', 2)
            ->where('status', 'Pending')
            ->count();
        $all = Businessinfo::where('plan_type', 2)
            ->count();
        return view('applicants', compact('businessinfos', 'completed','all','incompleted'));
    }
    public function success(Request $request)
    {
        return view('app.dashboard.success');
    }

    public function calculator(Request $request)
    {
        return view('calculator');
    }

    public function learn(Request $request)
    {
        return view('learn');
    }
    public function dashboard(Request $request, Paystack $paystack)
    {
        $user = Auth::user();
        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)->first();
            return view('app.dashboard.index', compact('user', 'paystack'));
        }
    }
    public function purchase(Request $request)
    {
        return view('app.dashboard.purchase');
    }
    public function contact(Request $request)
    {
        return view('contact');
    }
    public function comingsoon(Request $request)
    {
        return view('comingsoon');
    }

    public function purchasembp(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)
                ->where('plan_type', 1)
                ->first();
            if ($paystack) {
                return redirect()->route('home');
            } else {
                return view('app.dashboard.mbp');
            }
        } else {
            return redirect()->route('login');
        }
        // if ($user) {
        //     return view('app.dashboard.nbp');
        // } else {
        //     return redirect()->route('login');
        // }
    }

    public function fixedprojection(Request $request)
    {
        $id = $request->id;
        $user = Auth::user();

        if ($user) {
            $product = Product::where('id', $id)->first();
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', 1)
                ->first();
            if ($product) {
                if ($businessinfo->id == $product->businessinfo_id) {
                    return view('app.dashboard.fixedprojection', compact('product', 'user'));
                } else {
                    return view('app.dashboard.product');
                }
            } else {
                return view('app.dashboard.product');
            }
        }
    }

    // public function previewinfo(Request $request)
    // {
    //     $user = Auth::user();
    //     $businessinfo = Businessinfo::where('user_id', $user->id)->first();
    //     if ($user) {
    //         return view('app.dashboard.previewinfo', compact('businessinfo', 'user'));
    //     } else {
    //         return view('app.dashboard.nbp');
    //     }
    // }
    public function previewinfo(Request $request)
    {
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            return view('app.dashboard.nbp');
        }

        // User is authenticated, fetch business info
        $businessinfo = Businessinfo::where('user_id', $user->id)
            ->where('plan_type', 2)
            ->first();

        return view('app.dashboard.previewinfo', compact('businessinfo', 'user'));
    }
    public function preview(Request $request, Salesforcast $salesforcast)
    {
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            return view('app.dashboard.nbp');
        }


        $businessinfo = Businessinfo::where('user_id', $user->id)
            ->where('plan_type', 1)
            ->first();


        $salesforcasts = Salesforcast::where('businessinfo_id', $businessinfo->id)->get();

        return view('app.dashboard.preview', compact('businessinfo', 'user', 'salesforcasts'));
    }

    public function purchasenbp(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)
                ->where('plan_type', 1)
                ->first();
            if ($paystack) {
                return redirect()->route('home');
            } else {
                return view('app.dashboard.nbp');
            }
        } else {
            return redirect()->route('login');
        }
    }
    public function nanoplan(Request $request, Businessinfo $businessinfo)
    {
        $user = Auth::user();
        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)->first();
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', 1)
                ->first();
            if (empty($paystack->user_id)) {
                return view('app.dashboard.nbp');
            } else {
                return view('app.dashboard.nanoplan', compact('user', 'businessinfo', 'paystack'));
            }
        }
    }

    public function nanoplaninfo(Request $request, Businessinfo $businessinfo)
    {
        $user = Auth::user();
        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)->first();
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', 2)
                ->first();
            if (empty($paystack->user_id)) {
                return view('app.dashboard.nbp');
            } else {
                return view('app.dashboard.nanoplaninfo', compact('user', 'businessinfo', 'paystack'));
            }
        }
    }
    public function personal(Request $request)
    {
        $user = Auth::user();
        $states =  State::all();

        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)->first();
            if (empty($paystack->user_id)) {
                return view('app.dashboard.nbp');
            } else {
                return view('app.dashboard.personal', compact('user', 'paystack','states'));
            }
        }
    }
    public function personalinfo(Request $request)
    {
        // $user = Auth::user();
        // if ($user) {
        //      return view('app.dashboard.personalinfo', compact('user'));
        // }
        $user = Auth::user();
        $states =  State::all();
        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)->first();
            if (empty($paystack->user_id)) {
                return view('app.dashboard.nbp');
            } else {
                return view('app.dashboard.personalinfo', compact('user', 'paystack','states'));
            }
        }
    }

    public function loanamount(Request $request)
    {
        return view('app.dashboard.loanamount');
    }
    // public function business(Request $request, Businessinfo $businessinfo)
    // {
    //     $user = Auth::user();
    //     if ($user) {
    //         $businessinfo = Businessinfo::where('user_id', $user->id)->where('plan_type', 1)->first();
    //         if ($businessinfo->exists()) {
    //             return view('app.dashboard.business', compact('user', 'businessinfo'));
    //         }
    //     }
    // }
    public function business(Request $request, Businessinfo $businessinfo)
    {
        $user = Auth::user();

        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)->first();
            if (empty($paystack->user_id)) {
                return view('app.dashboard.nbp');
            } else {
                $businessinfo = Businessinfo::where('user_id', $user->id)->where('plan_type', 1)->first();
                if ($businessinfo && $businessinfo->exists()) {
                    return view('app.dashboard.business', compact('user', 'businessinfo', 'paystack'));
                } else {
                    return redirect()->back()->with('error', 'Business info not found.');
                }
            }
        } else {
            return redirect()->route('login')->with('error', 'Please log in to access.');
        }
    }
    public function businessinfo(Request $request, Businessinfo $businessinfo)
    {
        $user = Auth::user();
        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)->first();
            if (empty($paystack->user_id)) {
                return view('app.dashboard.nbp');
            } else {
                $businessinfo = Businessinfo::where('user_id', $user->id)->where('plan_type', 2)->first();
                if ($businessinfo && $businessinfo->exists()) {
                    return view('app.dashboard.businessinfo', compact('user', 'businessinfo', 'paystack'));
                } else {
                    return redirect()->back()->with('error', 'Business info not found.');
                }
            }
        } else {
            return redirect()->route('login')->with('error', 'Please log in to access.');
        }
    }
    public function product(Request $request, Businessinfo $businessinfo)
    {
        $user = Auth::user();

        if ($user) {
            $paystack = Paystack::where('user_id', $user->id)->first();
            if (empty($paystack->user_id)) {
                return view('app.dashboard.nbp');
            } else {
                $businessinfo = Businessinfo::where('user_id', $user->id)->where('plan_type', 1)->first();
                if ($businessinfo && $businessinfo->exists()) {
                    return view('app.dashboard.product', compact('user', 'businessinfo', 'paystack'));
                } else {
                    return redirect()->back()->with('error', 'Business info not found.');
                }
            }
        } else {
            return redirect()->route('login')->with('error', 'Please log in to access.');
        }
    }
}
