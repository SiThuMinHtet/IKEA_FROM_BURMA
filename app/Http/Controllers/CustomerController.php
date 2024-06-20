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

    public function customerteditprocess(Request $request)
    {
        // dd($request);
        $uuid = Str::uuid()->toString();
        $customerupdate = Customer::find($request->id);
        $customerupdate->name = $request->name;
        $customerupdate->email = $request->email;
        $customerupdate->address = $request->address;
        $customerupdate->phone = $request->phone;
        $customerupdate->uuid = $uuid;

        if ($request->password && $request->image == null) {
            $customerupdate->update();
        } else {
            if ($request->password != null) {
                $customerupdate->password = bcrypt($request->password);
            }
            if ($request->image != null) {
                $image = $uuid . '.' . $request->image->extension();
                $request->image->move(public_path('image/customer/customerinfo'), $image);
                $customerupdate->image = $image;
            }
            $customerupdate->update();
            // dd($customerupdate);
        }
        return redirect()->route('CustomerHome');
    }

    public function customercreateprocess(Request $request)
    {
        $validateData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'phone' => 'required|string|max:15',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'address' => 'required|string|max:255',
                'joining_date' => 'required|date'
            ],
            [
                'name.required' => 'Name field is required.',
                'email.required' => 'Email field is required.',
                'email.email' => 'Please enter a valid email address.',
                'password.required' => 'Password field is required.',
                'password.min' => 'Password must be at least 6 characters long.',
                'phone.required' => 'Phone field is required.',
                'image.required' => 'Image field is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
                'image.max' => 'The image size must not be greater than 2048 kilobytes.',
                'address.required' => 'Address field is required.',
                'joining_date.required' => 'Joining date field is required.',
                'joining_date.date' => 'Joining date must be a valid date.'
            ]
        );


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
        // dd($customer);
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

    public function datefilter(Request $request)
    {
        $customerlist = DB::table('customers');

        if ($request->has('start_date') && $request->start_date) {
            $customerlist->where('products.created_at', '>=', $request->start_date);
        }

        if ($request->has('end_date') && $request->end_date) {
            $customerlist->where('products.created_at', '<=', $request->end_date);
        }

        $customerlist = $customerlist
            ->where('customers.status', '=', 'Active')
            ->select('customers.*')
            ->paginate(2);
        return view('admin.customers.customerlist', compact('customerlist'));
    }
}
