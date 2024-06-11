<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;  // Ensure this is imported
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class StripePaymentController extends Controller
{
    public function index()
    {
        $user = Auth::guard('customer')->user();
        $cartItems = $user ? Cart::where('customer_id', $user->id)->with('product')->get() : session()->get('cart', []);
        $checkoutDetails = session()->get('checkout_details', []);
        return view('customer.payment', compact('cartItems', 'checkoutDetails', 'user'));
    }

    public function processPayment(Request $request)
    {
        Log::info('Processing payment', ['request_data' => $request->all()]);

        $user = Auth::guard('customer')->user();
        $cartItems = $user ? Cart::where('customer_id', $user->id)->with('product')->get() : session()->get('cart', []);
        $checkoutDetails = session()->get('checkout_details', []);

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

            $OTP = false;
            $customer = $user;
            if (!$user) {
                $OTP = true;
                Log::info('Creating customer');
                $uuid = Str::uuid()->toString();
                $customer = new Customer();
                $customer->name = $checkoutDetails['name'];
                $customer->email = $checkoutDetails['email'];
                $customer->address = $checkoutDetails['address'];
                $customer->phone = $checkoutDetails['phone'];
                $customer->uuid = $uuid;
                $customer->joining_date = Carbon::now();
                $customer->password = '123456';
                $customer->status = 'Active';
                $customer->save();
            }

            $payment = $OTP ? "OTP" : "CARD";

            Log::info('Creating order');
            $order = new Order();
            $order->paymentmethod = $payment;
            $order->customer_id = $customer ? $customer->id : null;
            $order->totalprice = $totalPrice;
            $order->name = $checkoutDetails['name'];
            $order->deliveryaddress = $checkoutDetails['address'];
            $order->buyerphone = $checkoutDetails['phone'];
            $order->buyeremail = $checkoutDetails['email'];
            $order->buyername = $checkoutDetails['name'];
            $order->uuid = (string) Str::uuid();
            $order->status = 'pending';
            $order->save();

            Log::info('Creating order products');
            foreach ($cartItems as $item) {
                $orderProduct = new OrderProduct();
                if (is_array($item) && isset($item)) {
                    $orderProduct->order_id = $order->id;
                    $orderProduct->product_id = $item['product_id'];
                    $orderProduct->qty = $item['quantity'];
                    $orderProduct->price = $item['price'];
                    $orderProduct->uuid = (string) Str::uuid();
                    $orderProduct->status = 'completed';
                } else {
                    $orderProduct->order_id = $order->id;
                    $orderProduct->product_id = $item->product_id;
                    $orderProduct->qty = $item->quantity;
                    $orderProduct->price = $item->product->price;
                    $orderProduct->uuid = (string) Str::uuid();
                    $orderProduct->status = 'completed';
                }
                $orderProduct->save();

                // Update stock
                Log::info('Updating product stock', ['product_id' => $orderProduct->product_id, 'qty' => $orderProduct->qty]);
                $product = Product::find($orderProduct->product_id);
                if ($product) {
                    $product->stock -= $orderProduct->qty;
                    $product->save();
                }
            }

            Log::info('Clearing cart');
            if ($user) {
                Cart::where('customer_id', $user->id)->delete();
            } else {
                session()->forget('cart');
            }

            return redirect()->route('order.success')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            Log::error('Payment failed: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Payment failed! Please try again.']);
        }
    }

    public function success()
    {
        return view('customer.success');
    }
}
