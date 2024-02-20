<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
use App\Models\User;
use App\Models\history;
use App\Models\Businessinfo;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::guard('staff')->check()) {
            $verified = User::where('email_verified_at', '!=', null)->count();
            $unverified = User::where('email_verified_at', null)->count();

            $paid = User::where('email_verified_at', '!=', null)
                ->whereHas('paystack', function ($query) {
                    $query->where('year', '2023');
                })->count();

            $completed = User::where('email_verified_at', '!=', null)
                ->whereHas('businessinfos', function ($query) {
                    $query->where('status', 'Completed');
                })
                ->whereHas('paystack', function ($query) {
                    $query->where('year', '2023');
                })->count();

            $ongoing = User::where('email_verified_at', '!=', null)
                ->whereHas('businessinfos', function ($query) {
                    $query->where('status', 'Pending');
                })
                ->whereHas('paystack', function ($query) {
                    $query->where('year', '2023');
                })->count();

            $staff =  Staff::all()->count();

            return view('smedan.index', compact('verified', 'unverified', 'paid', 'completed', 'staff','ongoing'));
        } else {
            return redirect()->route('staff.login');
        }
    }

    public function pending()
    {

        if (Auth::guard('staff')->check()) {
            // $verified = User::where('email_verified_at', '!=', null)->count();
            // $unverified = User::where('email_verified_at', null)->count();
            $users = User::where('email_verified_at', '!=', null)
                ->whereHas('businessinfos', function ($query) {
                    $query->where('status', 'Completed');
                    $query->where('approval', 'Pending');
                })
                ->whereHas('paystack', function ($query) {
                    $query->where('year', '2023');
                })->get();

            // return view('smedan.index', compact('verified', 'unverified', 'paid'));
            return view('smedan.pending', compact('users'));
        } else {
            return redirect()->route('staff.login');
        }
    }
    public function reviewed()
    {

        if (Auth::guard('staff')->check()) {
            $users = User::where('email_verified_at', '!=', null)
                ->whereHas('businessinfos', function ($query) {
                    $query->where('status', 'Completed');
                    $query->where('approval', 'Approved');
                })
                ->whereHas('paystack', function ($query) {
                    $query->where('year', '2023');
                })->get();

            // return view('smedan.index', compact('verified', 'unverified', 'paid'));
            return view('smedan.reviewed', compact('users'));
        } else {
            return redirect()->route('staff.login');
        }
    }
    public function disqualified()
    {

        if (Auth::guard('staff')->check()) {
            $users = User::where('email_verified_at', '!=', null)
                ->whereHas('businessinfos', function ($query) {
                    $query->where('status', 'Completed');
                    $query->where('approval', 'Declined');
                })
                ->whereHas('paystack', function ($query) {
                    $query->where('year', '2023');
                })->get();

            // return view('smedan.index', compact('verified', 'unverified', 'paid'));
            return view('smedan.disqualified', compact('users'));
        } else {
            return redirect()->route('staff.login');
        }
    }

    public function staff()
    {
        $staffs =  Staff::all();

        return view('smedan.staff', compact('staffs'));
    }





    public function profile($id)
    {
        $staff = Staff::find($id);
        $history = History::where('staff_id', $id);

        $approvals = history::where('staff_id', $id)
            ->where('action', 'Business plan approval')
            ->take(10)
            ->latest()
            ->get();

        $approvalcount = history::where('staff_id', $id)
            ->where('action', 'Business plan approval')
            ->take(10)
            // ->latest()
            ->count();

        $disapprovals = history::where('staff_id', $id)
            ->where('action', 'Business plan disqualified')
            ->take(10)
            ->latest()
            ->get();
            
        $disapprovalcount = history::where('staff_id', $id)
            ->where('action', 'Business plan disqualified')
            // ->latest()
            ->count();

        $logins = history::where('staff_id', $id)
            ->where('action', 'Login')
            ->latest()
            ->get();

        $logincount = history::where('staff_id', $id)
            ->where('action', 'Login')
            ->count();
            
        return view('smedan.profile', compact('staff', 'history','approvals','disapprovals','logins','logincount','disapprovalcount','approvalcount'));
    }


    public function preview(Request $request, $bizid)
    {
        $businessinfo = Businessinfo::find($bizid);
        if ($businessinfo === null) {
            return redirect()->route('pending')->withErrors('You attempted to open a business that does not exist');
        }
        return view('smedan.preview', compact('businessinfo'));
    }

    public function approve(Request $request)
    {
        $id = $request->id;
        $businessinfo = Businessinfo::find($id);
        $approver = Auth::guard('staff')->user();
        $history = new history();
        if ($businessinfo) {

            $businessinfo->update([
                'approval' => 'Approved',
                'approved_by' => $approver->id,
            ]);

            $history->create([
                'action' => 'Business plan approval',
                'description' => 'Business plan approval for next stage',
                'staff_id' => $approver->id,
                'businessinfo_id' => $businessinfo->id
            ]);

            return redirect()->route('pending')->with('success', $businessinfo->business_no . ' has been approved for the next stage');
        } else {
            return redirect()->route('pending')->withErrors('Unable to perform approval at the moment');
        }
    }

    public function decline(Request $request)
    {
        $id = $request->id;
        $businessinfo = Businessinfo::find($id);
        $approver = Auth::guard('staff')->user();
        $history = new history();
        if ($businessinfo) {

            $businessinfo->update([
                'approval' => 'Declined',
                'approved_by' => $approver->id,
            ]);

            $history->create([
                'action' => 'Business plan disqualified',
                'description' => 'Business plan disqualified for next stage',
                'staff_id' => $approver->id,
                'businessinfo_id' => $businessinfo->id
            ]);

            return redirect()->route('pending')->with('success', $businessinfo->business_no . ' has been disqualified for the next stage');
        } else {
            return redirect()->route('pending')->withErrors('Unable to perform approval at the moment');
        }
    }
    public function appeal(Request $request)
    {
        $id = $request->id;
        $businessinfo = Businessinfo::find($id);
        $approver = Auth::guard('staff')->user();
        $history = new history();
        if ($businessinfo) {

            $businessinfo->update([
                'approval' => 'Pending',
                'approved_by' => $approver->id,
            ]);

            $history->create([
                'action' => 'Business plan Appeal',
                'description' => 'Appeal for Business plan reconsideration',
                'staff_id' => $approver->id,
                'businessinfo_id' => $businessinfo->id
            ]);

            return redirect()->route('pending')->with('success', 'An appeal for ' . $businessinfo->business_no . ' has been submitted for review');
        } else {
            return redirect()->route('pending')->withErrors('Unable to perform approval at the moment');
        }
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStaffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
