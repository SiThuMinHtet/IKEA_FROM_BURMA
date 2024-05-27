<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Code;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product_photo;
use App\Models\Supplier;
use App\Repositories\ProductImageRepository;

class ProductController extends Controller
{
    private $ProductImageRepository;

    public function __construct(ProductImageRepository $ProductImageRepository)
    {
        $this->ProductImageRepository = $ProductImageRepository;
    }

    //
    public function productlist()
    {
        $productlist = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->leftJoin('product_photos', 'product_photos.product_id', '=', 'products.id')
            ->join('codes', 'codes.id', '=', 'products.code_id')
            ->join('staffs', 'staffs.id', '=', 'products.staff_id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->where('product_photos.primaryphoto', '=', 1)
            // ->where('admins.id' , '=' , auth('admin')->user()->id)
            ->select('products.*', 'category.name as category', 'product_photos.image')
            // ->where( 'product_image.primary_img' , '=' , '1' , 'AND' , 'products', 'product_image.product_id', '=', 'products.id'  )
            // ->get();
            ->paginate(6);
        return view('admin.products.productlist', compact('productlist'));
    }

    public function search(Request $request)
    {
        $response = $this->ProductImageRepository->search($request);
        return $response;
    }

    public function productcreate()
    {
        // write category code
        $supplierlist = Supplier::select('id', 'name')->get();
        // dd($supplierlist);
        $categorylist = Category::select('id', 'name')->get();
        $codelist = Code::select('id', 'name')->get();
        return view('admin.products.create', compact('categorylist', 'codelist', 'supplierlist'));
    }

    // public function productdata(Request $request)
    // {
    //     dd($request);
    // }

    public function createprocess(Request $request)
    {
        $uuid  = Str::uuid()->toString();
        // dd($request);
        // $image = $uuid.'.'.$request->image->extension();
        // $request->image->move(public_path('img/staff/'));

        $img = $request->image;
        // dd($img);


        $product = new Product();
        $product->name = $request->name;
        $product->uuid = $uuid;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->code_id = $request->code;
        $product->staff_id = auth('admin')->user()->id;
        $product->supplier_id = $request->supplier;
        $product->created_at = Carbon::now();
        $codename = DB::table('codes')->select('name')->where('codes.id', '=', $request->code)->get();
        $product_data  = DB::table('products')->get();
        // dd($product_data);
        // $p = DB::table('products')->where('name' , 'LIKE' , '%'.$codename[0]->name.'%')->get();
        // dd($codename[0]->name);
        if ($product_data == "[]") {
            $product->code_name = $codename[0]->name . "1";
            $product->save();
        } else {
            $product_codelist = DB::table('products')->where('code_name', 'LIKE', '%' . $codename[0]->name . '%')->get();
            // dd(count($p));
            $count = count($product_codelist) + 1;
            $product->code_name = $codename[0]->name . $count;
            $product->save();
        }

        // $person_data  = DB::table('people')->where('uuid', '=', $uuid) ->get();



        $response = $this->ProductImageRepository->saveRecords($img, $uuid);
        return $response;
    }

    public function productedit($id)
    {
        $product_image = Product_photo::select('id', 'image')->where('product_id', '=', $id)->get();
        $product_data = Product::find($id);
        $categorylist = Category::select('id', 'name')->get();
        $codelist = Code::select('id', 'name')->get();
        $supplierlist = Supplier::select('id', 'name')->get();
        // dd($id);
        return view('admin.products.create', compact('product_data', 'categorylist', 'codelist', 'product_image', 'supplierlist'));
    }

    public function producteditprocess(Request $request)
    {

        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->code_id = $request->code;
        $product->staff_id = auth('admin')->user()->id;
        $product->updated_at = Carbon::now();
        // dd($product_data);
        $codename = DB::table('codes')->select('name')->where('codes.id', '=', $request->code)->get();
        $product_data  = DB::table('products')->get();
        // $p = DB::table('products')->where('name' , 'LIKE' , '%'.$codename[0]->name.'%')->get();
        // dd($codename[0]->name);
        if ($product_data == "[]") {
            $product->code_name = $codename[0]->name . "1";
            $product->save();
        } else {
            $product_codelist = DB::table('products')->where('code_name', 'LIKE', '%' . $codename[0]->name . '%')->get();
            // dd(count($p));
            $count = count($product_codelist) + 1;
            $product->code_name = $codename[0]->name . $count;
            $product->save();
        }
        return redirect()->route('ProductList');
    }

    public function productdelete($id)
    {
        Product::destroy($id);
        return redirect()->route('ProductList');
    }
}
