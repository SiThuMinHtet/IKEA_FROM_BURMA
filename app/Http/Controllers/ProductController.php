<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Code;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductPhoto;
use App\Models\Supplier;
use App\Repositories\ProductImageRepository;

class ProductController extends Controller
{
    private $ProductImageRepository;

    public function __construct(ProductImageRepository $ProductImageRepository)
    {
        $this->ProductImageRepository = $ProductImageRepository;
    }

    public function productlist()
    {
        $productlist = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->leftJoin('product_photos', function ($join) {
                $join->on('product_photos.product_id', '=', 'products.id')
                    ->where('product_photos.status', '=', 'Active');
            })
            ->join('codes', 'codes.id', '=', 'products.code_id')
            ->join('staffs', 'staffs.id', '=', 'products.staff_id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->where('product_photos.primaryphoto', '=', 1)
            ->orderBy('products.id', 'asc')
            ->select('products.*', 'category.name as category', 'product_photos.image')
            ->paginate(6);

        return view('admin.products.productlist', compact('productlist'));
    }

    public function search(Request $request)
    {
        return $this->ProductImageRepository->search($request);
    }

    public function productcreate()
    {
        $supplierlist = Supplier::select('id', 'name')->get();
        $categorylist = Category::select('id', 'name')->get();
        $codelist = Code::select('id', 'name')->get();

        return view('admin.products.create', compact('categorylist', 'codelist', 'supplierlist'));
    }

    public function createprocess(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'category' => 'required|exists:category,id',
                'code' => 'required|exists:codes,id',
                'supplier' => 'required|exists:suppliers,id',
                'stock' => 'required|numeric|min:0',
                'price' => 'required|numeric|min:0',
                'description' => 'required|string'
            ],
            [
                'name.required' => 'Product Name is required.',
                'category.required' => 'Category is required.',
                'category.exists' => 'Selected category is invalid.',
                'code.required' => 'Product Code is required.',
                'code.exists' => 'Selected product code is invalid.',
                'supplier.required' => 'Supplier is required.',
                'supplier.exists' => 'Selected supplier is invalid.',
                'stock.required' => 'Stock is required.',
                'stock.numeric' => 'Stock must be a number.',
                'stock.min' => 'Stock must be at least 0.',
                'price.required' => 'Price is required.',
                'price.numeric' => 'Price must be a number.',
                'price.min' => 'Price must be at least 0.',
                'description.required' => 'Description is required.',
                'image.required' => 'At least one image is required.',
                'image.image' => 'Each file must be an image.',
                'image.mimes' => 'Images must be of type jpeg, png, jpg, gif, svg.',
                'image.max' => 'Each image must be less than 2MB.'
            ]
        );


        $uuid = Str::uuid()->toString();
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

        $codename = Code::find($request->code)->name;
        $product_data = Product::all();

        if ($product_data->isEmpty()) {
            $product->code_name = $codename . "1";
        } else {
            $product_codelist = Product::where('code_name', 'LIKE', '%' . $codename . '%')->get();
            $count = $product_codelist->count() + 1;
            $product->code_name = $codename . $count;
        }

        $product->save();

        $this->ProductImageRepository->saveRecords($request->image, $uuid);

        return redirect()->route('ProductList');
    }

    public function productedit($id)
    {
        $product_image = Product_photo::where('product_id', $id)
            ->where('status', 'Active')
            ->get(['id', 'image']);

        $product_data = Product::find($id);
        $categorylist = Category::select('id', 'name')->get();
        $codelist = Code::select('id', 'name')->get();
        $supplierlist = Supplier::select('id', 'name')->get();

        return view('admin.products.create', compact('product_data', 'categorylist', 'codelist', 'product_image', 'supplierlist'));
    }

    public function producteditprocess(Request $request)
    {
        $product = Product::find($request->id);
        $uuid = $product->uuid;

        if ($request->image) {
            Product_photo::where('product_id', $request->id)->update(['status' => 'Inactive']);
            $this->ProductImageRepository->saveRecords($request->image, $uuid);
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category;
        $product->code_id = $request->code;
        $product->staff_id = auth('admin')->user()->id;
        $product->updated_at = Carbon::now();

        $codename = Code::find($request->code)->name;
        $product_count = Product::where('code_name', 'LIKE', $codename . '%')->count();

        if ($product->code->name !== $codename) {
            $product->code_name = $codename . ($product_count + 1);
        }

        $product->save();

        return redirect()->route('ProductList');
    }

    public function productdelete($id)
    {
        Product::destroy($id);

        return redirect()->route('ProductList');
    }
}
