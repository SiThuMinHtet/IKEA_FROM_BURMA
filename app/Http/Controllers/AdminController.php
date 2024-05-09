<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials  = $request->only('email', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->intended('admin.dashboard');
    //     }

    //     return redirect()->back()->withInput()->withErrors(['email' => 'Wrong email or password']);
    // }
}
