<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function productlist()
    {
        return view('admin.products.product');
    }

    public function productcreate()
    {
        return view('admin.products.create');
    }
}
