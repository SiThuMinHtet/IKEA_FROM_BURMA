<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CustomerHomeController extends Controller
{
    //
    public function customerhome()
    {
        $grid_items =  Category::whereIn('name', ['Bed', 'Sofa', 'Cabinet', 'Lamp', 'Table'])->withCount('products')
            ->get();
        return view('customer.home', compact('grid_items'));
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
