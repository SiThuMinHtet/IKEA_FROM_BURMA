<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerHomeController extends Controller
{
    //
    public function customerhome()
    {
        return view('customer.home');
    }

    public function shop()
    {
        return view('customer.shop.shop');
    }

    public function category()
    {
        return view('customer.category');
    }

    public function blog()
    {
        return view('customer.blog');
    }

    public  function cart()
    {
        return view('customer.cart');
    }

    public function detail()
    {
        return view('customer.detail');
    }
    public function about()
    {
        return view('customer.about');
    }
    public function contact()
    {
        return view('customer.contact');
    }
    public function login()
    {
        return view('customer.login');
    }
    public function checkout()
    {
        return view('customer.checkout');
    }
}
