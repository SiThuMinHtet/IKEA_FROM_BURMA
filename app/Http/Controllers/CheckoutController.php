<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::guard('customer')->user();
        $cartItems = $user ? Cart::where('customer_id', $user->id)->with('product')->get() : session()->get('cart', []);
        // dd($cartItems);
        return view('customer.checkout', compact('cartItems', 'user'));
    }

    public function store(Request $request)
    {
        session()->put('checkout_details', $request->all());
        // dd($request->all());
        return redirect()->route('payment');
    }
}
