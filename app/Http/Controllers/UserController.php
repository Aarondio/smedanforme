<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Businessinfo;
use App\Models\Employees;
use Illuminate\Support\facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', User::class);

        $search = $request->get('search', '');

        $users = User::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('app.users.index', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', User::class);

        return view('app.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', User::class);

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        return redirect()
            ->route('users.edit', $user)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, User $user): View
    {
        $this->authorize('view', $user);

        return view('app.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, User $user): View
    {
        $this->authorize('update', $user);

        return view('app.users.edit', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirect to the desired page after logout
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UserUpdateRequest $request,
        User $user
    ): RedirectResponse {
        $this->authorize('update', $user);

        $validated = $request->validated();

        if (empty($validated['password'])) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return redirect()
            ->route('business', $user)
            ->withSuccess("Personal information has been saved successfully");
    }

    public function updateinfo(Request $request, User $user, Businessinfo $businessinfo, Expenses $expenses, Employees $employees)
    {
        // Validate the incoming request data
        $user = User::find($request->id);
        $validated = $request->validate([
            'firstname' => ['required', 'max:255', 'string'],
            'surname' => ['required', 'max:255', 'string'],
            'middlename' => ['nullable'],
            'gender' => 'required',
            'nationality' => 'required',
            'marital_status' => 'required',
            'state' => 'required',
            'lga' => 'required',
            'address' => 'required',
            'phone' => ['required', 'max:255', 'string'],
            'password' => ['nullable'],
        ]);
    
        try {
            if (empty($validated['password'])) {
                unset($validated['password']);
            } else {
                $validated['password'] = Hash::make($validated['password']);
            }
    
            $user->update($validated);
    
            // $check = $request->validate([
            //     'user_id'=>'required'
            // ]);
            // $businessinfo = Businessinfo::where('user_id',$request->id)->where('plan_type',1)->first();
            $businessinfo = Businessinfo::firstOrNew(['user_id' => $user->id, 'plan_type' => 1,]);
            if (!$businessinfo->exists) {
                $businessinfo->user_id = $request->id;
                $businessinfo->save();
               
                $expenses = new Expenses(); 
                $expenses->businessinfo_id = $businessinfo->id;
                $expenses->expense_type = "Annual";
                $expenses->save();
            
                $employees = new Employees(); 
                $employees->businessinfo_id = $businessinfo->id;
                $employees->save();
            }
    
            // return redirect()
            //     ->route('business', $user)
            //     ->withSuccess("Personal information has been saved successfully");
            return redirect()
                ->route('suin')
                ->withSuccess("Personal information has been saved successfully");
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()])
                ->withInput();
        }

        
    }
    
    public function updatepersonalinfo(Request $request, User $user, Businessinfo $businessinfo)
    {
        try {
            // Validate the incoming request data
            $user = User::find($request->id);
            $validated = $request->validate([
                'firstname' => ['required', 'max:255', 'string'],
                'surname' => ['required', 'max:255', 'string'],
                'middlename' => ['nullable'],
                'gender' => 'required',
                'nationality' => 'required',
                'marital_status' => 'required',
                'state' => 'required',
                'lga' => 'required',
                'address' => 'required',
                'phone' => ['required', 'max:255', 'string'],
                'password' => ['nullable'],
            ]);

            // Handle the password update logic
            if (empty($validated['password'])) {
                unset($validated['password']);
            } else {
                $validated['password'] = Hash::make($validated['password']);
            }

            // Update the user's information
            $user->update($validated);

            // $check = $request->validate([
            //     'user_id'=>'required'
            // ]);
            // $businessinfo = Businessinfo::where('user_id',$request->id)->where('plan_type',1)->first();
            $businessinfo = Businessinfo::firstOrNew(['user_id' => $user->id, 'plan_type' => 2,]);
            if (!$businessinfo->exists) {
                $businessinfo->user_id = $request->id;
                $businessinfo->plan_type = 2;
                $businessinfo->save();
            }


            return redirect()
                ->route('businessinfo', $user)
                ->withSuccess("Business information has been saved successfully");
                
        } catch (\Exception $e) {
           
            return redirect()->back()->withErrors('error', $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user): RedirectResponse
    {
        $this->authorize('delete', $user);

        $user->delete();

        return redirect()
            ->route('users.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
