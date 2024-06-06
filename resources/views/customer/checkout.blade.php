<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/customer/checkout.css') }}" />
</head>

<body>
    <div class="checkout-nav">
        <hr>
        <a href="{{ route('CustomerHome') }}">Home</a>
        <img src="{{ asset('image/customer/greater-than right .png') }}" alt="">
        <a href="{{ route('cart.index') }}">Shopping Cart</a>
        <img src="{{ asset('image/customer/greater-than right .png') }}" alt="">
        <a href="{{ route('checkout') }}">Check Out</a>
    </div>

    <div class="checkout-left">
        <div class="billing-details">
            <p><b>Billing Details</b> <b>Have an account? <a href="{{ route('CustomerLogin') }}">Login</a></b></p>
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div>
                    <label for="name">User Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}">
                </div>
                <div class="form-select">
                    <label for="country">Country / Region</label>
                    <input type="text" name="country" value="Myanmar">
                </div>
                <div class="text-area">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="45" rows="5">{{ old('address', $user->address ?? '') }}</textarea>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}">
                </div>
                <div>
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}">
                </div>

                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>

        <div class="your-order-container">
            <h3>Your Order</h3>
            <div class="order-detail order-heading">
                <p>PRODUCT</p>
                <p>SUBTOTAL</p>
            </div>
            @foreach ($cartItems as $cartItem)
                @if (is_array($cartItem))
                    @if (isset($cartItem))
                        <div class="order-detail order-list">
                            <p>{{ $cartItem['name'] }} x {{ $cartItem['quantity'] }}</p>
                            <p>${{ $cartItem['quantity'] * $cartItem['price'] }}</p>
                        </div>
                    @endif
                @else
                    <div class="order-detail order-list">
                        <p>{{ $cartItem->product->name }} x {{ $cartItem->quantity }}</p>
                        <p>${{ $cartItem->quantity * $cartItem->product->price }}</p>
                    </div>
                @endif
            @endforeach
            <div class="order-detail order-list">
                <p>Subtotal</p>
                <p>
                    @php
                        $subtotal = 0;
                        foreach ($cartItems as $cartItem) {
                            if (is_array($cartItem) && isset($cartItem)) {
                                $subtotal += $cartItem['quantity'] * $cartItem['price'];
                            } elseif (!is_array($cartItem)) {
                                $subtotal += $cartItem->quantity * $cartItem->product->price;
                            }
                        }
                        echo '$' . $subtotal;
                    @endphp
                </p>
            </div>
            <div class="order-detail order-list">
                <p>Shipping</p>
            </div>
            <div class="order-detail order-list">
                <p>Total</p>
                <p>${{ $subtotal }}</p>
            </div>

            <div class="your-order-img">
                <img src="{{ asset('image/customer/visa.png') }}" alt="">
                <img src="{{ asset('image/customer/master.png') }}" alt="">
                <img src="{{ asset('image/customer/mpu.png') }}" alt="">
            </div>
        </div>
    </div>
</body>

</html>
