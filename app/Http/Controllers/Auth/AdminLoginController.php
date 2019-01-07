<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SiteAttributeController;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin');
    }

    public function showLoginForm() {
        $data = SiteAttributeController::getAllSiteAttributeParameter();
        return view('auth.admin-login')->with($data);
        // return view('auth.admin-login');
    }

    public function login(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // attempt to log user in
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            // if successful, redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }
    
        // if unsuccessful, redirect back to the login with form data
        return redirect()->back()->withInput($request->only('email'));
    }
}
