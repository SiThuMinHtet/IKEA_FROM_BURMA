<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Repositories\CustomerRepository;

class CustomerController extends Controller
{

    private $CustomerRepository;

    public function __construct(CustomerRepository $CustomerRepository)
    {
        $this->CustomerRepository = $CustomerRepository;
    }

    public function customerlist()
    {
        $customerlist = DB::table('customers')
            ->where('customers.status', '=', 'Active')
            ->select('customers.*')
            ->paginate(2);
        // dd($customerlist);
        return view('admin.customers.customerlist', compact('customerlist'));
    }

    public function search(Request $request)
    {
        $response = $this->CustomerRepository->search($request);
        return $response;
    }

    public function customercreate()
    {
        return view('customer.login');
    }

    public function customercreateprocess(Request $request)
    {
        // dd($request);
        $uuid = Str::uuid()->toString();
        $image = $uuid . '.' . $request->image->extension();
        $request->image->move(public_path('image/customer/customerinfo'), $image);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->joining_date = $request->joining_date;
        $customer->password = bcrypt($request->password);
        $customer->status = "Active";
        $customer->image = $image;
        $customer->uuid = $uuid;
        $customer->save();
        return redirect()->route('CustomerHome');
    }

    public function customerdelete($id)
    {
        $staffdelete = Customer::find($id);
        $staffdelete->status = "Inactive";
        $staffdelete->update();
        return redirect()->route('CustomerList');
    }

    public function showLoginForm()
    {
        return view('customer.login');
    }
}
