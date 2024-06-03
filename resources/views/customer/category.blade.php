<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/customer/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/carousel.css') }}">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/catagory.css') }}" />
</head>

<body>
    <div class="cata-nav">
        <a href="{{ route('CustomerHome') }}">Home</a>
        <a href="{{ route('Shop') }}">Shop</a>
        <a href="{{ route('ShopCategory') }}">Bed</a>

        <h2>BED</h2>
    </div>
    <div class="shop-nav">
        <div class="shop-nav-left">
            <p>view <b>16</b> per page</p>
            <a href="">Zoom in</a>
        </div>

        <div class="shop-nav-right">
            <div class="shop-dropdown">
                <button class="shop-dropbtn">CATAGORIES <img src="images/greater-than-symbol.png"
                        alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="shop-dropdown">
                <button class="shop-dropbtn">PRICE <img src="images/greater-than-symbol.png" alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="shop-dropdown">
                <button class="shop-dropbtn">COLOR <img src="images/greater-than-symbol.png" alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="shop-dropdown">
                <button class="shop-dropbtn">MATERIAL <img src="images/greater-than-symbol.png" alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
            <div class="shop-dropdown">
                <button class="shop-dropbtn-last">SORT BY LATEST <img src="images/greater-than-symbol.png"
                        alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div>
            </div>
        </div>
    </div>


    <div class="shop-product-grid">
        <div id="bed" class="menu">
            <div class="shop-product-item shop-item-1">
                <a href=""><img src="images/shop/modwayy.jpg" alt="" />
                    <p>Modway Olivia Bed</p>
                    <p>$1,200.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-2">
                <a href="">
                    <img src="images/shop/velvet.jpg" alt="" />
                    <p>Gwyneth Velvet King Bed</p>
                    <p>$1,200.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-3">
                <a href="">
                    <img src="images/Catagory/upholstered Bed.png" alt="" />
                    <p>Upholstered Bed</p>
                    <p>$1,200.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-4">
                <a href="">
                    <img src="images/Catagory/Montana.png" alt="" />
                    <p>Monatana King Bed</p>
                    <div class="shop-price">
                        <p style="opacity: .5;">$1,000.00</p>
                        <p>$1,500.00</p>
                    </div>
                </a>
            </div>
            <div class="shop-product-item shop-item-5">
                <a href="">
                    <img src="images/Catagory/Jervis.jpg" alt="" />
                    <p>Jervis Single Bed</p>
                    <p>$1,100.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-6">
                <a href="">
                    <img src="images/Catagory/Storage Bed Frame.png" alt="" />
                    <p>Storage Bed Frame</p>
                    <p>$1,200.00</p>

                </a>
            </div>
            <div class="shop-product-item shop-item-7">
                <a href="">
                    <img src="images/Catagory/Chaise Corner Sofa.png" alt="" />
                    <p>Chaise Corner Sofa Bed</p>
                    <p>$1500.00</p>
                </a>
            </div>
            <div class="shop-product-item cata-item-8">
                <a href="">
                    <span>-17%</span>
                    <img src="images/Catagory/Fabric Sofa Bed.png" alt="" />
                    <p>Fabric Sofa Bed</p>
                    <div class="shop-price">
                        <p style="opacity: .5;">$1,200.00</p>
                        <p>$1,000.00</p>
                    </div>
                </a>
            </div>

        </div>
    </div>




    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>
