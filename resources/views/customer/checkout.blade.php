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
            <p><b>Billing Details</b></p>
            <form action="{{ route('checkout.process') }}" method="POST" id="payment-form">
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

                <div class="form-group">
                    <label for="card-element">Credit or Debit Card</label>
                    <div id="card-element"></div>
                    <div id="card-errors" role="alert"></div>
                </div>

                <button type="submit" class="btn btn-primary">Submit Payment</button>
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

            <input id="check-payment" type="radio">
            <label for="check-payment">Check Payments</label>

            <div class="your-order-img">
                <img src="{{ asset('image/customer/visa.png') }}" alt="">
                <img src="{{ asset('image/customer/master.png') }}" alt="">
                <img src="{{ asset('image/customer/mpu.png') }}" alt="">
            </div>

            <div class="your-order-btn">
                <button>Place Order</button>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log('Stripe script loaded'); // Debug statement

            var stripe = Stripe('{{ env('STRIPE_KEY') }}');
            var elements = stripe.elements();
            var card = elements.create('card');
            card.mount('#card-element');

            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                console.log('Form submitted'); // Debug statement

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        console.log('Token created:', result.token); // Debug statement
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                console.log('Handling token:', token); // Debug statement

                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                form.submit();
            }
        });
    </script>

</body>

</html>
