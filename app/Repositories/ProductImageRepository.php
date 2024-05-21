<?php

namespace App\Repositories;

use App\Models\Product_Image;
use App\Models\Product_photo;
use Illuminate\Support\Str;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use Your Model

/**
 * Class ProductImageRepository.
 */
class ProductImageRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function saveRecords($img, $uuid)
    {
        $total_img = count($img);
        $product_data  = DB::table('products')->where('uuid', '=', $uuid)->get();
        // dd($uuid);

        for ($i = 0; $i < $total_img; $i++) {
            $uuid = Str::uuid()->toString();

            $image = $uuid . '.' . $img[$i]->getClientOriginalExtension();
            $img[$i]->move(public_path('img/products/'), $image);
            // dd($image);
            if ($i == 0) {
                $primary_img = new Product_photo();
                $primary_img->product_id = $product_data[0]->id;
                $primary_img->name = $product_data[0]->name;
                $primary_img->primaryphoto     = true;
                $primary_img->image = $image;
                $primary_img->uuid = $uuid;
                $primary_img->status = 'Active';
                $primary_img->save();
            } else {
                $sec_img = new Product_photo();
                $sec_img->product_id = $product_data[0]->id;
                $sec_img->name = $product_data[0]->name;
                $sec_img->primaryphoto     = false;
                $sec_img->image = $image;
                $sec_img->uuid = $uuid;
                $sec_img->status = 'Active';
                $sec_img->save();
            }
        }

        return redirect()->route('ProductList');
    }

    public function search(Request $request)
    {
        // dd($request->all());
        $columns = [
            'products.name' => 'Product Name',
            'category.name' => 'Category Id'
        ];
        // dd($columns);

        $query =  DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->leftJoin('product_photos', 'product_photos.product_id', '=', 'products.id')
            ->join('codes', 'codes.id', '=', 'products.code_id')
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id');

        if (!empty($request->search)) {
            $search = $request->search;
            $query->where(function ($subQuery) use ($columns, $search) {
                foreach ($columns as $column => $label) {
                    $subQuery->orWhere($column, 'LIKE', '%' . $search . '%');
                }
            });
        }

        $productlist = $query
            ->select('products.*', 'category.name as category', 'product_photos.image')
            ->get();
        return view('admin.products.productlist', compact('productlist'));
        // dd($search);
    }
}
