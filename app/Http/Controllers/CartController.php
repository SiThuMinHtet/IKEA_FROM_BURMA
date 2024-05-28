<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            // Authenticated user
            $userId = $user->id;

            $product = Product::findOrFail($productId);
            $productPhotos = $product->image;

            $cartItem = Cart::where('customer_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->totalprice = $cartItem->quantity * $product->price;
            } else {
                $cartItem = new Cart();
                $cartItem->customer_id = $userId;
                $cartItem->product_id = $productId;
                $cartItem->quantity = 1;
                $cartItem->totalprice = $product->price;
                $cartItem->paymentmethod = 'not specified';
                $cartItem->uuid = (string) Str::uuid();
                $cartItem->status = 'pending';
            }

            $cartItem->save();
        } else {
            // Guest user
            $cart = session()->get('cart', []);
            $product = Product::findOrFail($productId);
            $productPhotos = Product_photo::where('product_id', $productId)->get();

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += 1;
                $cart[$productId]['totalprice'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
            } else {
                $cart[$productId] = [
                    'product_id' => $productId,
                    'quantity' => 1,
                    'price' => $product->price,
                    'totalprice' => $product->price,
                    'name' => $product->name,
                    'photos' => $productPhotos->pluck('image')->toArray(),
                ];
            }

            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function increaseQuantity(Request $request, $id)
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            $cartItem = Cart::find($id);
            if ($cartItem) {
                $cartItem->quantity += 1;
                $cartItem->totalprice = $cartItem->quantity * $cartItem->product->price;
                $cartItem->save();
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += 1;
                $cart[$id]['totalprice'] = $cart[$id]['quantity'] * $cart[$id]['price'];
                session()->put('cart', $cart);
            }
        }

        return redirect()->back();
    }

    public function decreaseQuantity(Request $request, $id)
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            $cartItem = Cart::find($id);
            if ($cartItem && $cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->totalprice = $cartItem->quantity * $cartItem->product->price;
                $cartItem->save();
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id]) && $cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity'] -= 1;
                $cart[$id]['totalprice'] = $cart[$id]['quantity'] * $cart[$id]['price'];
                session()->put('cart', $cart);
            }
        }

        return redirect()->back();
    }

    public function index()
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            $userId = $user->id;
            $cartItems = Cart::where('customer_id', $userId)->with('product')->get();
        } else {
            $cartItems = session()->get('cart', []);
        }

        return view('customer.cart', compact('cartItems'));
    }

    public function removeItem(Request $request, $cartItemId)
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            $cartItem = Cart::findOrFail($cartItemId);
            $cartItem->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$cartItemId])) {
                unset($cart[$cartItemId]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
}
