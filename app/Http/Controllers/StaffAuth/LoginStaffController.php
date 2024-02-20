<?php

namespace App\Http\Controllers\StaffAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class LoginStaffController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/smedan/index'; // Customize the redirection after login

    public function __construct()
    {
        $this->middleware('guest:staff')->except('logout');
    }

    public function showLoginForm()
    {
        // if (Auth::guard('staff')->check()) {
        //     return redirect()->route('admindashboard');
        // }

        return view('smedan.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $history = new History();

        if (Auth::guard('staff')->attempt($credentials, $request->remember)) {
            $approver = Auth::guard('staff')->user();
            $history->create([
                'action' => 'Login',
                'description' => 'Your account was loggedin',
                'staff_id' => $approver->id,
            ]);
            return redirect()->intended($this->redirectTo);
        }

        return back()->withErrors(['email' => 'Invalid login credentials'])->withInput($request->only('email', 'remember'));
    }

    public function logout(Request $request)
    {
        $history = new History();
        $approver = Auth::guard('staff')->user();
        $history->create([
            'action' => 'Logged Out',
            'description' => 'Your account was logged out',
            'staff_id' => $approver->id,
        ]);
        Auth::guard('staff')->logout();
        $request->session()->invalidate();

        return redirect('/smedan');
    }
}
