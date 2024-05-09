<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Staff;

class StaffController extends Controller
{
    //
    public function stafflist()
    {
        $stafflist = DB::table('staffs')
            ->join('roles', 'roles.id', '=', 'staffs.role_id')
            ->where('staffs.status', '=', 'Active')
            ->select('staffs.*', 'roles.name as rolename')->get();
        // dd($stafflist);
        return view('admin.staffs.stafflist', compact('stafflist'));
    }

    public function staffcreate()
    {
        $roles = DB::table('roles')
            ->select('id', 'name')
            ->where('status', '=', 'Active')
            ->get();
        return view('admin.staffs.create', compact('roles'));
    }

    public function createprocess(Request $request)
    {
        // dd($request);
        $uuid = Str::uuid()->toString();
        $image = $uuid . '.' . $request->image->extension();
        $request->image->move(public_path('image/admin/staffinfo'), $image);
        $name = $request->fname . '.' . $request->lname;
        $admin = new Staff();
        $admin->name = $name;
        $admin->role_id = $request->role_id;
        $admin->email = $request->email;
        $admin->address = $request->address;
        $admin->age = $request->age;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->status = "Active";
        $admin->image = $image;
        $admin->uuid = $uuid;

        $admin->save();
        return redirect()->route('StaffList');
    }

    public function staffedit($id)
    {
        $role = DB::table('roles')
            ->select('id', 'name')
            ->where('status', '=', 'Active')
            ->get();
        dd($role);
        $staffdata = Staff::find($id);
        // dd($staffdata);
        return view('', compact('role', 'staffdata'));
    }

    public function showdashboard()
    {
        return view('admin.dashboard');
    }
}
