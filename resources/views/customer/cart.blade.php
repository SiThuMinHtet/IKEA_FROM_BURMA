{{-- @dd($cartItems);
{{ dd($cart) }} --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="{{ asset('css/customer/cart 2.css') }}">
</head>

<body>
    <div class="detail-nav">
        <a href="{{ route('CustomerHome') }}">Home</a>
        <img src="images/greater-than right .png" alt="">
        <a href="">Shopping Cart</a>
    </div>

    <div class="table-wrapper">
        <table>
            <caption>Your selection(1 item)</caption>
            <tr>
                <th id="product">Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>

            @if (auth('customer')->check())
                @foreach ($cartItems as $cartItem)
                    <tr>
                        <td class="product_image">
                            <div>
                                <form action="{{ route('cart.removeItem', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remove</button>
                                </form>
                            </div>
                            <div>
                                @foreach ($cartItem->product->photos as $photo)
                                    <img src="{{ asset('img/products/' . $photo->image) }}" alt="{{ $photo->name }}"
                                        width="100">
                                @endforeach
                            </div>
                            <div>
                                <p>{{ $cartItem->product->name }}</p>
                            </div>
                        </td>
                        <td>
                            {{ $cartItem->product->price }}
                        </td>
                        <td>
                            <div class="quantity">
                                <div>
                                    {{ $cartItem->quantity }}
                                </div>
                                <div class="plusminus">
                                    <form action="{{ route('cart.increase', $cartItem->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">+</button>
                                    </form>
                                    <form action="{{ route('cart.decrease', $cartItem->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">-</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $cartItem->totalprice }}
                        </td>
                    </tr>
                @endforeach
            @else
                @foreach ($cartItems as $productId => $cartItem)
                    <tr>
                        <td class="product_image">
                            <div>
                                <form action="{{ route('cart.removeItem', $productId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Remove</button>
                                </form>
                            </div>
                            <div>
                                @foreach ($cartItem['photos'] as $photo)
                                    <img src="{{ asset('img/products/' . $photo) }}" alt="Product Photo"
                                        width="100">
                                @endforeach
                            </div>
                            <div>
                                <p>{{ $cartItem['name'] }}</p>
                            </div>
                        </td>
                        <td>
                            {{ $cartItem['price'] }}
                        </td>
                        <td>
                            <div class="quantity">
                                <div>
                                    {{ $cartItem['quantity'] }}
                                </div>
                                <div class="plusminus">
                                    <form action="{{ route('cart.increase', $productId) }}" method="POST">
                                        @csrf
                                        <button type="submit">+</button>
                                    </form>
                                    <form action="{{ route('cart.decrease', $productId) }}" method="POST">
                                        @csrf
                                        <button type="submit">-</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $cartItem['totalprice'] }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </table>
    </div>

    <div class="cart-product-btn">
        <div class="cart-left-btn">
            <button><a href="{{ route('Checkout') }}">Proceed to Checkout</a></button>
        </div>
        <div class="cart-right-btn">
            <button class="cart-right-btn-first">Clear All</button>
            <button class="cart-right-btn-sec">Update Cart</button>
        </div>
    </div>

    <div class="cart-wrapper">
        <h2 class="cart-heading">YOU MAY ALSO LIKE...</h2>
        <div class="cart-grid">
            <div class="cart-product-item">
                <a href="">
                    <img src="{{ asset('image/customer/Detail/haiku.png') }}" alt="">
                    <p>Haiku 2-Seater Sofa</p>
                    <p>$999.00 - $1,499.00</p>
                </a>
            </div>
            <div class="cart-product-item">
                <a href="">
                    <img src="{{ asset('image/customer/Detail/solid wood .png') }}" alt="">
                    <p>Solid Wood Side Tables</p>
                    <p>$350.00</p>
                </a>
            </div>
            <div class="cart-product-item">
                <a href="">
                    <img src="{{ asset('image/customer/Detail/vipp pillow.png') }}" alt="">
                    <p>Vipp Wool Pillow</p>
                    <p>$79.00</p>
                </a>
            </div>
            <div class="cart-product-item cart-item-4">
                <a href="">
                    <span>-20%</span>
                    <img src="{{ asset('image/customer/Detail/wool blanket.png') }}" alt="">
                    <p>Vipp Wool Blanket</p>
                    <div class="cart-price">
                        <p>$100.00 - $80.00</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</body>

</html>
