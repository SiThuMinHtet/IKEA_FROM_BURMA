<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function list()
    {
        $pending = DB::table('order_product')
            ->where('status', '=', 'pending')
            ->count('id');
        $processing = DB::table('order_product')
            ->where('status', '=', 'processing')
            ->count('id');
        $delivered = DB::table('order_product')
            ->where('status', '=', 'delivered')
            ->count('id');
        $orderlist = DB::table('order_product')
            ->join('orders', 'orders.id', '=', 'order_product.order_id')
            ->join('products', 'products.id', '=', 'order_product.product_id')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select('order_product.*', 'products.name as productname', 'customers.name as customername')
            ->get();
        // dd($orderlist);
        return view('admin.orders.order', compact('orderlist', 'pending', 'processing', 'delivered'));
    }

    public function updateOrderstatus(Request $request)
    {
        $order = OrderProduct::find($request->input('order_id'));
        if ($order) {
            $order->status = $request->input('update_status');
            $order->update();
        }

        return redirect()->route('OrderList')->with('success', 'Order status updated successfully.');
    }
}
