<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        // Validate the request data
        $validateData = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6'
            ],
            [
                'email.required' => 'Email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'password.required' => 'Password field is required.',
                'password.min' => 'Password must be at least 6 characters long.'
            ]
        );

        $input = $request->all();
        $userdata = ['email' => $input['email'], 'password' => $input['password']];

        if ($input['usertype'] == 'admin') {
            if (Auth::guard('admin')->attempt($userdata)) {
                $user = Auth::guard('admin')->user();

                if ($user->status == "Active") {
                    return redirect()->route('Dashboard');
                } else {
                    Auth::guard('admin')->logout();
                    return redirect()->route('AdminLogin')->with('error', 'You don\'t have Admin Account Access!');
                }
            } else {
                return redirect()->route('AdminLogin')->with('error', 'Wrong Email and Password');
            }
        }

        if ($input['usertype'] == 'customer') {
            if (Auth::guard('customer')->attempt($userdata)) {
                $user = Auth::guard('customer')->user();

                if ($user->status == "Active") {
                    return redirect()->route('CustomerHome');
                } else {
                    Auth::guard('customer')->logout();
                    return redirect()->route('CustomerLogin')->with('error', 'You don\'t have Customer Account Access!');
                }
            } else {
                return redirect()->route('CustomerLogin')->with('error', 'Wrong Email and Password');
            }
        } else {
            return redirect()->route('CustomerLogin')->with('error', 'You don\'t have Account Access!');
        }
    }

    public function Customerlogout()
    {
        Auth::guard('customer')->logout();
        Session::flush();
        return redirect()->route('CustomerHome');
    }

    public function Adminlogout()
    {
        Auth::guard('admin')->logout();
        Session::flush();
        return redirect()->route('AdminLogin');
    }
}
