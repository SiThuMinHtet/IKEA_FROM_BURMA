<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="{{ asset('css/customer/checkout.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
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

    <div class="checkout_heading">
        <h2 class="checkout_head">Checkout</h2>
        <h3>Have an account? <a href="{{ route('CustomerLogin') }}">Login</a></h3>
    </div>


    <div class="checkout-left">
        <div class="billing-details">
            <p><b>Billing Details</b> </p>
            <form action="{{ route('checkout.store') }}" method="POST">
                @csrf
                <div>
                    <label for="name">User Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name ?? '') }}">
                </div>
                @error('name')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror
                <div class="form-select">
                    <label for="country">Country / Region</label>
                    <input type="text" name="country" value="Myanmar">
                </div>
                <div class="text-area">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="45" rows="5">{{ old('address', $user->address ?? '') }}</textarea>
                </div>
                @error('address')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email ?? '') }}">
                </div>
                @error('email')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror
                <div>
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone ?? '') }}">
                </div>
                @error('phone')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror

                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>

        <div class="your-order-container">
            <h3>Order Items</h3>
            <div class="order_item_container">
                @foreach ($cartItems as $cartItem)
                    @if (is_array($cartItem))
                        @if (isset($cartItem))
                            <div class="order_items">
                                <div>
                                    @if (isset($cartItem['photos']) && !empty($cartItem['photos']))
                                        @foreach ($cartItem['photos'] as $photo)
                                            <img src="{{ asset('img/products/' . $photo) }}" alt="Product Photo"
                                                width="100">
                                        @endforeach
                                    @else
                                        <p>No photos available</p>
                                    @endif
                                </div>
                                <div class="order_items_detail">
                                    <div class="order-detail order-list">
                                        <p>{{ $cartItem['name'] }} x {{ $cartItem['quantity'] }}</p>
                                    </div>
                                    <div>
                                        <p>${{ $cartItem['quantity'] * $cartItem['price'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endif
                    @else
                        <div class="order_items">
                            <div>
                                @foreach ($cartItem->product->photos as $photo)
                                    <img src="{{ asset('img/products/' . $photo->image) }}" alt="{{ $photo->name }}"
                                        width="100">
                                @endforeach
                            </div>
                            <div class="order_items_detail">
                                <div class="order-detail order-list">
                                    <p>{{ $cartItem->product->name }} x {{ $cartItem->quantity }}</p>
                                </div>
                                <div>
                                    <p>${{ $cartItem->quantity * $cartItem->product->price }}</p>
                                </div>

                            </div>
                        </div>

                    @endif
                @endforeach
            </div>
            <div class="total_container">
                <div class="order-detail total_list">
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
                <hr>
                <div class="order-detail total_list">
                    <p>Total</p>
                    <p>${{ $subtotal }}</p>
                </div>
            </div>

        </div>
    </div>
</body>

</html>
