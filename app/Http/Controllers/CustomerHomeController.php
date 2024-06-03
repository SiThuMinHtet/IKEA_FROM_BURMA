<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerHomeController extends Controller
{
    public function customerhome()
    {
        if (Auth::guard('customer')->check()) {
            $userId = Auth::guard('customer')->id();
            $cart = Cart::where('customer_id', $userId)->get();
            session()->put('cart', $cart);
        } else {
            session()->get('cart');
        }
        $categories = Category::all();
        $products = Product::with(['photos' => function ($query) {
            $query->where('primaryphoto', 1);
        }])->get();
        $gridItems = Category::whereIn('name', ['Bed', 'Sofa', 'Cabinet', 'Lamp', 'Table'])
            ->withCount('products')
            ->get();
        // dd($gridItems);
        return view('customer.home', compact('gridItems', 'categories', 'products'));
    }

    public function shop()
    {
        $productList = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->leftJoin('product_photos', 'product_photos.product_id', '=', 'products.id')
            ->where('product_photos.status', 'Active')
            ->where('product_photos.primaryphoto', 1)
            ->select('products.*', 'category.name as category', 'product_photos.image')
            ->orderBy('id', 'desc')
            ->get();

        return view('customer.shop.shop', compact('productList'));
    }

    public function category()
    {
        return view('customer.category');
    }

    public function blog()
    {
        return view('customer.blog');
    }

    public function cart()
    {
        return view('customer.cart');
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $productImages = Product_photo::where('product_id', $id)->select('id', 'image')->get();
        $category = Category::select('category.id', 'category.name')
            ->join('products', 'category.id', '=', 'products.category_id')
            ->where('products.id', $id)
            ->first();

        return view('customer.detail', compact('product', 'productImages', 'category'));
    }

    public function about()
    {
        return view('customer.about');
    }

    public function contact()
    {
        return view('customer.contact');
    }

    public function sort(Request $request)
    {
        dd($request->sort);
    }

    public function sortprice(Request $request)
    {
        $productList = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->leftJoin('product_photos', 'product_photos.product_id', '=', 'products.id')
            ->select('products.*', 'category.name as category', 'product_photos.image');

        if ($request->sortPrice === 'High2Low') {
            $productList = $productList->orderBy('price', 'desc');
        } elseif ($request->sortPrice === 'Low2High') {
            $productList = $productList->orderBy('price', 'asc');
        }

        $productList = $productList->get();

        return view('customer.shop.shop', compact('productList'));
    }

    public function sortcategory(Request $request)
    {
        $categoryList = Category::select('category.id', 'category.name')
            ->join('products', 'category.id', '=', 'products.category_id')
            ->get();

        return view('customer.shop.shop', compact('categoryList'));
    }
}
