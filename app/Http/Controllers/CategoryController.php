<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //
    public function category()
    {
        $categories =  DB::table('category')
            ->where('category.status', '=', 'Active')
            ->select('category.*')->get();
        // dd($categories);
        return view('admin.category.list', compact('categories'));
    }

    public function categorycreate()
    {
        return view('admin.category.create');
    }

    public function categorycreateprocess(Request $request)
    {
        // dd($request);
        $uuid = Str::uuid()->toString();
        $category = new Category();
        $category->name = $request->name;
        $category->status = "Active";
        $category->uuid = $uuid;
        $category->save();
        return redirect()->route('Category');
    }

    public function categoryedit($id)
    {
        // dd($id);
        $categorydata = DB::table('category')
            ->select('id', 'name')
            ->where('status', '=', 'Active')
            ->where('id', '=', $id)
            ->first();
        // dd($categorydata);
        return view('admin.category.create', compact('categorydata'));
    }

    public function categoryupdate(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $categoryedit = Category::find($request->id);
        $categoryedit->name = $request->name;
        $categoryedit->status = "Active";
        $categoryedit->uuid = $uuid;
        $categoryedit->update();
        return redirect()->route('Category');
    }

    public function categorydelete($id)
    {
        $categorydelete = Category::find($id);
        $categorydelete->status = "Inactive";
        $categorydelete->update();
        return redirect()->route('Category');
    }
}
