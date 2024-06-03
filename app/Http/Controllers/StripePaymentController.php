<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class StripePaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        Log::info('Processing payment');  // Debug statement

        $user = Auth::guard('customer')->user();
        $cartItems = $user ? Cart::where('customer_id', $user->id)->with('product')->get() : session()->get('cart', []);
        // dd($cartItems);

        // Calculate total price
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            if (is_array($item) && isset($item)) {
                $totalPrice += $item['quantity'] * $item['price'];
            } elseif (!is_array($item)) {
                $totalPrice += $item->quantity * $item->product->price;
            }
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $charge = Charge::create([
                'amount' => $totalPrice * 100,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'Order Payment',
                'metadata' => ['order_id' => Str::uuid()->toString()],
            ]);

            $customer = $user;
            if (!$user) {
                // Create Customer for guest user
                Log::info('Creating customer');  // Debug statement
                $uuid = Str::uuid()->toString();
                $customer = new Customer();
                $customer->name = $request->name;
                $customer->email = $request->email;
                $customer->address = $request->address;
                $customer->phone = $request->phone;
                $customer->uuid = $uuid;
                $customer->joining_date = Carbon::now();
                $customer->password = '123456';
                $customer->status = 'Active';
                $customer->save();
            }

            // Create Order
            Log::info('Creating order');  // Debug statement
            $order = new Order();
            $order->paymentmethod = 'stripe';
            $order->customer_id = $customer ? $customer->id : null;
            $order->totalprice = $totalPrice;
            $order->name = $request->name;
            $order->deliveryaddress = $request->address;
            $order->buyerphone = $request->phone;
            $order->buyeremail = $request->email;
            $order->buyername = $request->name;
            $order->uuid = (string) Str::uuid();
            $order->status = 'completed';
            $order->save();

            // Create OrderProduct entries
            Log::info('Creating order products');  // Debug statement
            foreach ($cartItems as $item) {
                if (is_array($item) && isset($item['product'])) {
                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id = $order->id;
                    $orderProduct->product_id = $item['product_id'];
                    $orderProduct->qty = $item['quantity'];
                    $orderProduct->price = $item['product']['price'];
                    $orderProduct->uuid = (string) Str::uuid();
                    $orderProduct->status = 'completed';
                    $orderProduct->save();
                } elseif (!is_array($item)) {
                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id = $order->id;
                    $orderProduct->product_id = $item->product_id;
                    $orderProduct->qty = $item->quantity;
                    $orderProduct->price = $item->product->price;
                    $orderProduct->uuid = (string) Str::uuid();
                    $orderProduct->status = 'completed';
                    $orderProduct->save();
                }
            }

            // Clear cart
            Log::info('Clearing cart');  // Debug statement
            if ($user) {
                Cart::where('customer_id', $user->id)->delete();
            } else {
                session()->forget('cart');
            }

            return redirect()->route('order.success')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            Log::error('Payment failed: ' . $e->getMessage());  // Debug statement
            return back()->withErrors(['error' => 'Payment failed! Please try again.']);
        }
    }

    public function success()
    {
        return view('customer.success');
    }
}
