<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function supplierlist()
    {
        $supplier_data = DB::table('suppliers')
            ->where('status', '=', 'Active')
            ->get();
        // dd($supplier_data);
        return view('admin.supplier.supplierlist', compact('supplier_data'));
    }

    public function suppliercreate()
    {
        return view('admin.supplier.create');
    }

    public function suppliercreateprocess(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $image = $uuid . '.' . $request->image->extension();
        $request->image->move(public_path('image/admin/supplierinfo'), $image);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->status = "Active";
        $supplier->image = $image;
        $supplier->uuid = $uuid;
        $supplier->save();
        return redirect()->route('Supplier.List');
    }

    public function supplieredit($id)
    {
        // dd($id);
        $supplier_data = Supplier::find($id);
        // dd($supplier_data);
        return view('admin.supplier.create', compact('supplier_data'));
    }

    public function suppliereditprocess(Request $request)
    {
        $uuid = Str::uuid()->toString();
        // $image = $uuid . '.' . $request->image->extension();
        // $request->image->move(public_path('image/admin/supplierinfo'), $image);
        $supplier = Supplier::find($request->id);
        $supplier->name = $request->name;
        $supplier->uuid = $uuid;
        $supplier->email = $request->email;
        $supplier->address = $request->address;
        $supplier->phone = $request->phone;
        $supplier->status = "Active";
        if ($request->image == null) {
            $supplier->update();
        } else {
            $image = $uuid . '.' . $request->image->extension();
            $request->image->move(public_path('image/admin/supplierinfo'), $image);
            $supplier->image = $image;
            $supplier->update();
        }
        // $supplier->update();
        return redirect()->route('Supplier.List');
    }

    public function supplierdelete($id)
    {
        $supplierdelete = Supplier::find($id);
        $supplierdelete->status = "Inactive";
        $supplierdelete->update();
        return redirect()->route('Supplier.List');
    }
}
