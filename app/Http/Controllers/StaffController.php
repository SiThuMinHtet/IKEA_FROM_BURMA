<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Staff;
use App\Repositories\StaffRepository;

class StaffController extends Controller
{
    //
    private $StaffRepository;

    public function __construct(StaffRepository $StaffRepository)
    {
        $this->StaffRepository = $StaffRepository;
    }

    public function stafflist()
    {
        $stafflist = DB::table('staffs')
            ->join('roles', 'roles.id', '=', 'staffs.role_id')
            ->where('staffs.status', '=', 'Active')
            ->select('staffs.*', 'roles.name as rolename')
            ->paginate(1);
        // dd($stafflist);
        return view('admin.staffs.stafflist', compact('stafflist'));
    }

    public function search(Request $request)
    {
        $response = $this->StaffRepository->search($request);
        return $response;
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
        $admin = new Staff();
        $admin->name = $request->name;
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
        $roles = DB::table('roles')
            ->select('id', 'name')
            ->where('status', '=', 'Active')
            ->get();
        $staffdata = Staff::find($id);
        return view('admin.staffs.create', compact('staffdata', 'roles'));
    }

    public function staffupdate(Request $request)
    {
        $uuid = Str::uuid()->toString();
        $adminupdate = Staff::find($request->id);
        $adminupdate->name = $request->name;
        $adminupdate->role_id = $request->role_id;
        $adminupdate->email = $request->email;
        $adminupdate->address = $request->address;
        $adminupdate->age = $request->age;
        $adminupdate->phone = $request->phone;
        $adminupdate->password = bcrypt($request->password);
        $adminupdate->status = "Active";

        $adminupdate->uuid = $uuid;
        if ($request->image == null) {
            $adminupdate->update();
        } else {
            $image = $uuid . '.' . $request->image->extension();
            $request->image->move(public_path('image/admin/staffinfo'), $image);
            $adminupdate->image = $image;
            $adminupdate->update();
        }
        return redirect()->route('StaffList');
    }



    public function showdashboard()
    {
        $totalSales = Order::sum('totalprice');
        $totalItems = OrderProduct::sum('qty');
        $totalCustomers = Customer::count('id');
        $totalOrders =  $totalItems;
        $orderlist = DB::table('order_product')
            ->join('orders', 'orders.id', '=', 'order_product.order_id')
            ->join('products', 'products.id', '=', 'order_product.product_id')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->orderBy('orders.id', 'desc')
            ->select('order_product.*', 'products.name as productname', 'customers.name as customername')
            ->get();
        // dd($totalCustomers);


        // doughnut
        $onetimeorder = Order::where('paymentmethod', '=', 'OTP')->count('id');
        $ReguserOrder = Order::where('paymentmethod', '=', 'CARD')->count('id');


        $salesData = DB::table('orders')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('SUM(totalprice) as total_amount'))
            ->groupBy('month')
            ->get();
        // dd($salesData);

        // array_fill(start_index, count, value)
        $monthlySales = array_fill(0, 12, 0);

        foreach ($salesData as $data) {
            $monthlySales[$data->month - 1] = $data->total_amount;
        }
        // dd($monthlySales);
        // dd($ReguserOrder);

        return view('admin.dashboard', compact('totalSales', 'totalItems', 'totalCustomers', 'totalOrders', 'orderlist', 'onetimeorder', 'ReguserOrder', 'monthlySales'));
    }

    public function staffdelete($id)
    {
        $staffdelete = Staff::find($id);
        $staffdelete->status = "Inactive";
        $staffdelete->update();
        return redirect()->route('StaffList');
    }
}
