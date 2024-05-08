<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/customer/checkout.css') }}" />
</head>

<body>
    <div class="checkout-nav">
        <hr>
        <a href="{{ route('CustomerHome') }}">Home</a>
        <img src="images/greater-than right .png" alt="">
        <a href="">Check Out</a>
    </div>


    <div class="checkout-left">
        <div class="billing-details">
            <p> <b>Billing Details</b> </p>
            <form>

                <div>
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname">
                </div>
                <div>
                    <label for="fname">Last Name</label>
                    <input type="text" name="lname" id="lname">
                </div>
                <div class="form-select">
                    <label for="country">Country / Region</label>
                    <select name="country" id="country">
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="America">America</option>
                        <option value="Australia">Australia</option>
                        <option value="Korea">Korea</option>
                        <option value="France">France</option>
                    </select>
                </div>
                <!-- cols="30" rows="5" -->
                <div class="text-area">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" cols="30" rows="5"></textarea>
                </div>

                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email">
                </div>

                <div>
                    <label for="phone">Phone</label>
                    <input type="tel" id="phone">
                </div>


            </form>
        </div>


        <!-- your-order -->

        <div class="your-order-container">
            <h3>Your Order</h3>
            <div class="order-detail order-heading">
                <p>PRODUCT</p>
                <p>SUBTOTAL</p>
            </div>
            <div class="order-detail order-list">
                <p>Armchair Black Leather x 1</p>
                <p>$220.00</p>
            </div>
            <div class="order-detail order-list">
                <p>Subtotal</p>
                <p>$220.00</p>
            </div>
            <div class="order-detail order-list">
                <p>Shipping</p>
            </div>
            <div class="order-detail order-list">
                <p>Total</p>
                <p>$220.00</p>
            </div>

            <input id="check-payment" type="radio">
            <label for="check-payment">Check Payments</label>

            <div class="your-order-img">
                <img src="images/visa.png" alt="">
                <img src="images/master.png" alt="">
                <img src="images/mpu.png" alt="">
            </div>

            <div class="your-order-btn">
                <button>Place Order</button>
            </div>


        </div>
    </div>





    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>
