<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffContorller extends Controller
{
    //
    public function stafflist()
    {
        return view('admin.staffs.stafflist');
    }

    public function staffcreate()
    {
        return view('admin.staffs.create');
    }
}
