<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- <link rel="stylesheet" href="css/home.css" /> -->
    <!-- <link rel="stylesheet" href="/css/carousel.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/catagory.css">
    <link rel="stylesheet" href="/css/detail.css">
    <link rel="stylesheet" href="/css/cart.css"> -->
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
            <tr>
                <td class="cart-img">
                    <img id="cross-circle" src="images/cross-circle.svg" alt="">

                    <div>
                        <img id="cart-img" src="images/Catagory/Jervis.jpg" alt="">
                        <p>Modern Deluxe Bed</p>
                    </div>
                </td>
                <td>$100.00</td>
                <td><input type="number"></td>
                <td>$100.00</td>
            </tr>
        </table>
    </div>

    <div class="cart-product-btn">
        <div class="cart-left-btn">
            <button><a href="{{ route('Checkout') }}">Proceed to Checkout</a> </button>
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
                <a href=""><img src="images/Detail/haiku.png" alt="" />
                    <p>Haiku 2-Seater Sofa</p>
                    <p>$999.00 - $1,499.00</p>
                </a>
            </div>
            <div class="cart-product-item">
                <a href="">
                    <img src="images/Detail/solid wood .png" alt="" />
                    <p>Solid Wood Side Tables</p>
                    <p>$350.00</p>
                </a>
            </div>
            <div class="cart-product-item">
                <a href="">
                    <img src="images/Detail/vipp pillow.png" alt="" />
                    <p>Vipp Wool Pillow</p>
                    <p>$79.00</p>
                </a>
            </div>
            <div class="cart-product-item cart-item-4">
                <a href="">
                    <span>-20%</span>
                    <img src="images/Detail/wool blanket.png" alt="" />
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
