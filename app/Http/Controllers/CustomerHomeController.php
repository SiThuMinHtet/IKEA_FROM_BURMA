<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Product;
use App\Models\Product_photo;

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
        $productlist = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->leftJoin('product_photos', 'product_photos.product_id', '=', 'products.id')
            // ->where('product_photos.primaryphoto', '=', 1)
            ->select('products.*', 'category.name as category', 'product_photos.image')
            ->orderBy('id', 'desc')
            ->get();
        return view('customer.shop.shop', compact('productlist'));
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

    public function detail($id)
    {
        $products = Product::find($id);
        $product_image = Product_photo::select('id', 'image')->where('product_id', '=', $id)->get();

        $categorylist = Category::select('category.id', 'category.name')
            ->join('products', 'category.id', '=', 'products.category_id')
            ->leftJoin('product_photos', 'product_photos.product_id', '=', 'products.id')
            ->where('products.id', $id)
            // ->where('product_photos.primaryphoto', '=', 1)
            ->first();

        return view('customer.detail', compact('products', 'product_image', 'categorylist'));
    }

    // public function detailprocess()
    // {

    //     return view('customer.detail');
    // }
    public function about()
    {
        return view('customer.about');
    }
    public function contact()
    {
        return view('customer.contact');
    }
    // public function login()
    // {
    //     return view('customer.login');
    // }
    public function checkout()
    {
        return view('customer.checkout');
    }

    public function sort(Request $request)
    {
        dd($request->sort);
    }
    public function sortprice(Request $request)
    {
        // dd($request->sortPrice);
        $productlist = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->leftJoin('product_photos', 'product_photos.product_id', '=', 'products.id')
            ->select('products.*', 'category.name as category', 'product_photos.image');
        if ($request->sortPrice != 'price') {
            if ($request->sortPrice == 'High2Low') {
                $productlist = $productlist->orderBy('price', 'desc');
            }
            if ($request->sortPrice == 'Low2High') {
                $productlist = $productlist->orderBy('price', 'asc');
            }
        } else {
            $productlist = $productlist;
        }
        $productlist = $productlist->get();

        return view('customer.shop.shop', compact('productlist'));
    }

    public function sortcategory(Request $request)
    {
        $categorylist = Category::select('category.id', 'category.name')
            ->join('products', 'category.id', '=', 'products.category_id')
            ->get();
        // dd($request);
        return view('customer.shop.shop', compact('categorylist'));
    }
}
