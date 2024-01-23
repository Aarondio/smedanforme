<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Businessinfo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BusinessinfoStoreRequest;
use App\Http\Requests\BusinessinfoUpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Paystack;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Mail\DownloadPlan;
use Illuminate\Support\Facades\Mail;
class BusinessinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Businessinfo::class);

        $search = $request->get('search', '');

        $businessinfos = Businessinfo::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.businessinfos.index',
            compact('businessinfos', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Businessinfo::class);

        $users = User::pluck('name', 'id');

        return view('app.businessinfos.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessinfoStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Businessinfo::class);

        $validated = $request->validated();

        $businessinfo = Businessinfo::create($validated);

        return redirect()
            ->route('businessinfos.edit', $businessinfo)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Businessinfo $businessinfo): View
    {
        $this->authorize('view', $businessinfo);

        return view('app.businessinfos.show', compact('businessinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Businessinfo $businessinfo): View
    {
        $this->authorize('update', $businessinfo);

        $users = User::pluck('name', 'id');

        return view('app.businessinfos.edit', compact('businessinfo', 'users'));
    }

    //     public function audience_need(Request $request, Businessinfo $businessinfo)
    // {
    //     $validated = $request->validate([
    //         'audience_need' => 'string', // Define appropriate validation rules
    //     ]);
    //     $id =  2;
    //     $businessinfo = Businessinfo::find($id);
    //     // Update the audience_need field in the injected $businessinfo model
    //     $businessinfo->update(['audience_need' => $validated['audience_need']]);

    //     // You might want to associate the plan_type as well, if needed
    //     // $businessinfo->update(['plan_type' => $request->plan_type]);

    //     if ($businessinfo->wasChanged()) {
    //         return response()->json(['statusCode' => 200]);
    //     } else {
    //         return response()->json(['statusCode' => 401]);
    //     }
    // }
    public function application(Request $request, $bizno)
    {
        // $bizno = $request->input('application_number'); // Not needed anymore

        $businessinfo = Businessinfo::where('business_no', $bizno)->first();

        if ($businessinfo) {
            $biz_user = $businessinfo->user_id;
            $user = User::where('id', $biz_user)->first();

            if ($user) {
                return view('application', compact('businessinfo', 'user'));
            }
        }

        return redirect()->route('application')->withErrors('Invalid application number');
    }
    public function applications(Request $request, $bizno)
    {
        // $bizno = $request->input('application_number'); // Not needed anymore

        $businessinfo = Businessinfo::where('business_no', $bizno)->first();

        if ($businessinfo) {
            $biz_user = $businessinfo->user_id;
            $user = User::where('id', $biz_user)->first();

            if ($user) {
                return view('application', compact('businessinfo', 'user'));
            }
        }

        return redirect()->route('application')->withErrors('Invalid application number');
    }


    // public function application(Request $request,$bizno)
    // {
    //     $bizno = $request->input('application_number');
    //     $businessinfo = Businessinfo::where('business_no', $bizno)->first();
    //     if ($businessinfo) {
    //         $biz_user = $businessinfo->user_id;
    //         $user = User::where('id', $biz_user)->first();
    //         if ($user) {
    //             return view('application', compact('businessinfo', 'user'));
    //         }
    //     } else {
    //         return redirect()->route('application')->withErrors('Invalid application number');
    //     }
    // }
    public function audience_need(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'audience_need',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['audience_need' => $request->audience_need]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->audience_need));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function business_model(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['business_model' => $request->business_model]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->business_model));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function target_market(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['target_market' => $request->target_market]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->target_market));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function competition_ad(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['competition_ad' => $request->competition_ad]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->competition_ad));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function management_team(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['management_team' => $request->management_team]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->management_team));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function loan_amount(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['loan_amount' => $request->loan_amount]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->loan_amount));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function about(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['about' => $request->about]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->about));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function mission(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['mission' => $request->mission]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->mission));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function journey(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['journey' => $request->journey]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->journey));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }

    public function strength(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['strength' => $request->strength]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->strength));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function weakness(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['weakness' => $request->weakness]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->weakness));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function opportunity(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['opportunity' => $request->opportunity]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->opportunity));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }
    public function threats(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['threats' => $request->threats]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->threats));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }

    public function finalsubmission(Request $request, Businessinfo $businessinfo)
    {
        $user = Auth::user();
        $randomNumber = mt_rand(1000, 9999);
        $randomAlphabet = chr(mt_rand(65, 90));
        $bizno = 'SME' . $randomNumber . $randomAlphabet;
        $id = $request->id;
        $businessinfo = Businessinfo::where('id', $id)->first();


        // $paystack = Paystack::where('user_id', $user->id)->first();
        if (empty($businessinfo->business_no)) {

            $businessinfo->update(['business_no' => $bizno, 'status' => 'Completed']);
            Mail::to($user->email)->send(new DownloadPlan($businessinfo));
            return view('app.dashboard.success', compact('user', 'businessinfo'));
        }else{

            $businessinfo->update(['status' => 'Completed']);
        }

        if (empty($businessinfo->status)) {
            $businessinfo->update(['status' => 'Completed']);
        }
       
        return view('app.dashboard.success', compact('user', 'businessinfo'));
        //    if($businessinfo){
        //      return view('home');
        //    }
    }
    public function loan_reason(Request $request, Businessinfo $businessinfo)
    {
        $validated = $request->validate([
            'business_model',
        ]);
        $user = Auth::user();
        if ($user) {
            $businessinfo = Businessinfo::where('user_id', $user->id)
                ->where('plan_type', $request->plan)
                ->first();
            $businessinfo->update(['loan_reason' => $request->loan_reason]);
            if ($businessinfo) {
                return json_encode(array('statusCode' => 200, 'data' => $request->loan_reason));
            } else {
                return json_encode(array('statusCode' => 401));
            }
        }
    }


    public function updatebusiness(Request $request, User $user, Businessinfo $businessinfo)
    {
        try {
            // Validate the incoming request data
            $businessinfo = Businessinfo::find($request->id);
            $validated = $request->validate([
                'business_name' => ['required', 'max:255', 'string'],
                'is_registered' => ['required'],
                'suin' => 'required|regex:/^SUIN\d{8}$/',
                'register_type' => 'required',
                'business_age' => 'required',
                'emp_no' => 'required',
                'loan_amount' => 'required',
                'sector' => 'required',
                'address' => 'required',
                'website' => 'nullable',
            ], [
                'suin.regex' => 'The SUIN provided is invalid',
            ]);

            // Update the business information
            $businessinfo->update($validated);

            return redirect()
                ->route('nanoplan', $businessinfo)
                ->withSuccess("Business information has been saved successfully");
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->validator->getMessageBag())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
        }
    }

    public function updatebusinessinfo(Request $request, User $user, Businessinfo $businessinfo)
    {
        try {
            // Validate the incoming request data
            $businessinfo = Businessinfo::find($request->id);
            $validated = $request->validate([
                'business_name' => ['required', 'max:255', 'string'],
                // 'business_type' => ['required', 'max:255', 'string'],
                'is_registered' => ['required'],
                'suin' => 'required',
                'register_type' => 'required',
                'business_age' => 'required',
                // 'register_year' => 'required',
                'emp_no' => 'required',
                'loan_amount' => 'required',
                'sector' => 'required',
                'address' => 'required',

            ]);
            $businessinfo->update($validated);
            return redirect()
                ->route('nanoplaninfo', $businessinfo)
                ->withSuccess("Personal information has been saved successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(
        BusinessinfoUpdateRequest $request,
        Businessinfo $businessinfo
    ): RedirectResponse {
        $this->authorize('update', $businessinfo);

        $validated = $request->validated();

        $businessinfo->update($validated);

        return redirect()
            ->route('businessinfos.edit', $businessinfo)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Businessinfo $businessinfo
    ): RedirectResponse {
        $this->authorize('delete', $businessinfo);

        $businessinfo->delete();

        return redirect()
            ->route('businessinfos.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
