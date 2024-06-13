<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Product_photo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $quantity = $request->quantity;
        $user = Auth::guard('customer')->user();

        if ($user) {
            $this->handleAuthenticatedUserAddToCart($user->id, $productId, $quantity);
        } else {
            $this->handleGuestUserAddToCart($productId, $quantity);
        }

        return redirect()->route('Shop')->with('success', 'Product added to cart!');
    }

    private function handleAuthenticatedUserAddToCart($userId, $productId, $quantity)
    {
        $product = Product::findOrFail($productId);

        $cartItem = Cart::where('customer_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->totalprice = $cartItem->quantity * $product->price;
        } else {
            $cartItem = new Cart([
                'customer_id' => $userId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'totalprice' => $quantity * $product->price,
                'paymentmethod' => 'not specified',
                'uuid' => (string) Str::uuid(),
                'status' => 'pending',
            ]);
        }

        $cartItem->save();
        session()->put('cart', Cart::where('customer_id', $userId)->get());
    }

    private function handleGuestUserAddToCart($productId, $quantity)
    {
        // dd($quantity);
        $cart = session()->get('cart', []);
        $product = Product::findOrFail($productId);
        $productPhotos = Product_photo::where('product_id', $productId)->pluck('image')->toArray();

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
            $cart[$productId]['totalprice'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
        } else {
            $cart[$productId] = [
                'product_id' => $productId,
                'quantity' => $quantity,
                'price' => $product->price,
                'totalprice' => $quantity * $product->price,
                'name' => $product->name,
                'photos' => $productPhotos,
            ];
        }

        session()->put('cart', $cart);
    }

    public function increaseQuantity(Request $request, $id)
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            $this->handleAuthenticatedUserQuantityChange($id, 1);
        } else {
            $this->handleGuestUserQuantityChange($id, 1);
        }

        return redirect()->back();
    }

    public function decreaseQuantity(Request $request, $id)
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            $this->handleAuthenticatedUserQuantityChange($id, -1);
        } else {
            $this->handleGuestUserQuantityChange($id, -1);
        }

        return redirect()->back();
    }

    private function handleAuthenticatedUserQuantityChange($id, $amount)
    {
        $cartItem = Cart::find($id);
        if ($cartItem && ($amount > 0 || $cartItem->quantity > 1)) {
            $cartItem->quantity += $amount;
            $cartItem->totalprice = $cartItem->quantity * $cartItem->product->price;
            $cartItem->save();
        }
    }

    private function handleGuestUserQuantityChange($id, $amount)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id]) && ($amount > 0 || $cart[$id]['quantity'] > 1)) {
            $cart[$id]['quantity'] += $amount;
            $cart[$id]['totalprice'] = $cart[$id]['quantity'] * $cart[$id]['price'];
            session()->put('cart', $cart);
        }
    }

    public function index()
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            $cartItems = Cart::where('customer_id', $user->id)->with('product')->get();
        } else {
            $cartItems = session()->get('cart', []);
        }

        return view('customer.cart', compact('cartItems'));
    }

    public function removeItem(Request $request, $cartItemId)
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            Cart::findOrFail($cartItemId)->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$cartItemId])) {
                unset($cart[$cartItemId]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    public function removeAll()
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            Cart::where('customer_id', $user->id)->delete();
        } else {
            session()->forget('cart');
        }

        return redirect()->route('cart.index')->with('success', 'All products removed from cart!');
    }


    public function checkout()
    {
        $user = Auth::guard('customer')->user();

        if ($user) {
            $cartItems = Cart::where('customer_id', $user->id)
                ->with('product')
                ->get();
        } else {
            $cartItems = session()->get('cart', []);
        }

        return view('customer.checkout', compact('cartItems', 'user'));
    }
}
