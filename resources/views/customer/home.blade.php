@extends('layouts.CustomerLayout')
@section('title')
    Home
@endsection
{{-- @dd($grid_items); --}}

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customer/home-responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/home.css') }}">
@endsection

@section('content')
    <div class="hero-container">
        <div class="mySlides fade">
            <img src="images/hero-img.jpg" alt="" />
        </div>
        <div class="mySlides fade">
            <img src="images/blue sofa.jpg" alt="" />
        </div>
        <div class="mySlides fade">
            <img src="images/gray sofa.jpg" alt="" />
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="hero-container-inner">
            <h3>SALE OFF 30%</h3>
            <h1>Classic 2023 Interior Designs</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="shop.html">
                <button>
                    Shop Now <img src="images/right-arrow-svgrepo-com.svg" alt="" />
                </button>
            </a>

        </div>
    </div>

    <div class="hero-grid-container">
        <div class="grid-item item-1">
            <p>
                {{ $grid_items[0]['name'] }}
                <br />
                {{ $grid_items[0]['products_count'] }} Products
            </p>
            <a href=""><img src="{{ asset('image/customer/white bed.png') }}" alt="" /></a>
        </div>

        <div class="grid-item item-2">
            <p>
                {{ $grid_items[1]['name'] }}
                <br />
                {{ $grid_items[1]['products_count'] }} Products
            </p>
            <a href=""><img src="{{ asset('image/customer/black chair.png') }}" alt="" /></a>
        </div>

        <div class="grid-item item-3">
            <p>
                {{ $grid_items[2]['name'] }}
                <br />
                {{ $grid_items[2]['products_count'] }} Products
            </p>
            <a href=""><img src="{{ asset('image/customer/lamp.png') }}" alt="" /></a>
        </div>
        <div class="grid-item item-4">
            <p>
                {{ $grid_items[3]['name'] }}
                <br />
                {{ $grid_items[3]['products_count'] }} Products
            </p>
            <a href=""><img src="{{ asset('image/customer/cabinet.png') }}" alt="" /></a>
        </div>
        <div class="grid-item item-5">
            <p>
                {{ $grid_items[4]['name'] }}
                <br />
                {{ $grid_items[4]['products_count'] }} Products
            </p>
            <a href=""><img src="{{ asset('image/customer/table.png') }}" alt="" /></a>
        </div>

        <a href="">
            <p>
                Explore more
                <img src="{{ asset('image/customer/right-arrow-svgrepo-com.svg') }}" alt="" />
            </p>
        </a>
    </div>

    <!-- new-product -->
    <div class="new-product">
        <h1>NEW PRODUCTS</h1>
        <div class="product-nav">
            <button class="" onclick="openMenu('bed')"><a>Bed</a></button>
            <button class="" onclick="openMenu('sofa')"><a>Sofa</a></button>
            <button class="" onclick="openMenu('lamp')"><a>Lamp</a></button>
            <button class="" onclick="openMenu('cabinet')"><a>Cabinet</a></button>
            <button class="" onclick="openMenu('table')"><a>Table</a></button>
        </div>
    </div>


    <div class="new-product-grid">
        <div id="bed" class="menu">
            <div class="new-product-item new-item-1">
                <span>SALE</span>
                <a href=""><img src="images/white bed.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-2">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/black chair.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-3">
                <span>SALE</span>
                <a href="">
                    <img src="images/white bed.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-4">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/black chair.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-5">
                <span>SALE</span>
                <a href="">
                    <img src="images/white bed.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-6">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/black chair.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-7">
                <span>SALE</span>
                <a href="">
                    <img src="images/white bed.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-8">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/black chair.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
        </div>

        <div id="sofa" class="menu" style="display: none">
            <div class="new-product-item new-item-1">
                <span>SALE</span>
                <a href=""><img src="images/Sofa/sofa-1.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-2">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/Sofa/sofa-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-3">
                <span>SALE</span>
                <a href="">
                    <img src="images/Sofa/sofa-3.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-4">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/Sofa/sofa-4.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-5">
                <span>SALE</span>
                <a href="">
                    <img src="images/Sofa/sofa-1.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-6">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/Sofa/sofa-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-7">
                <span>SALE</span>
                <a href="">
                    <img src="images/Sofa/sofa-3.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-8">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/Sofa/sofa-4.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
        </div>

        <div id="lamp" class="menu" style="display: none">
            <div class="new-product-item new-item-1">
                <span>SALE</span>
                <a href=""><img src="images/lamp-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-2">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/lamp.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-3">
                <span>SALE</span>
                <a href="">
                    <img src="images/lamp-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-4">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/lamp.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-5">
                <span>SALE</span>
                <a href="">
                    <img src="images/lamp-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-6">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/lamp.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-7">
                <span>SALE</span>
                <a href="">
                    <img src="images/lamp-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-8">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/lamp.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
        </div>

        <div id="cabinet" class="menu" style="display: none">
            <div class="new-product-item new-item-1">
                <span>SALE</span>
                <a href=""><img src="images/cabinet-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-2">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/cabinet.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-3">
                <span>SALE</span>
                <a href="">
                    <img src="images/cabinet-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-4">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/cabinet.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-5">
                <span>SALE</span>
                <a href="">
                    <img src="images/cabinet-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-6">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/cabinet.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-7">
                <span>SALE</span>
                <a href="">
                    <img src="images/cabinet-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-8">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/cabinet.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
        </div>

        <div id="table" class="menu" style="display: none">
            <div class="new-product-item new-item-1">
                <span>SALE</span>
                <a href=""><img src="images/table-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-2">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/table.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-3">
                <span>SALE</span>
                <a href="">
                    <img src="images/table-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-4">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/table.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-5">
                <span>SALE</span>
                <a href="">
                    <img src="images/table-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-6">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/table.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-7">
                <span>SALE</span>
                <a href="">
                    <img src="images/cabinet-2.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="new-product-item new-item-8">
                <span>SOLD OUT</span>
                <a href="">
                    <img src="images/cabinet.png" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
        </div>
    </div>

    <!-- up to 60% off -->
    <div class="couch-60-bg">
        <div class="couch-60-flex">
            <div class="couch-60-item">
                <h1>Up To 60% Off</h1>
                <div class="couch-blk-circle">
                    <div>
                        <div class="black-circle">
                            <p class="ellip-text-1">
                                <b>3</b> <br />
                                Days
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="black-circle">
                            <p class="ellip-text-1">
                                <b>5</b> <br />
                                Hours
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="black-circle">
                            <p class="ellip-text-1">
                                <b>30</b> <br />
                                Mins
                            </p>
                        </div>
                    </div>
                    <div>
                        <div class="black-circle">
                            <p class="ellip-text-1">
                                <b>30</b> <br />
                                Secs
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="couch-img">
                <img src="images/brown-couch.png" alt="" />
            </div>
        </div>
    </div>

    <!-- last-blog -->
    <div class="last-blog-container">
        <h3>LAST BLOG</h3>
        <div class="last-blog-grid">
            <div class="last-blog-card1">
                <img src="images/card1.jpg" alt="" />
                <p>Nov 7, 2023</p>
                <a href="Blog.html">
                    <h4>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    </h4>
                </a>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut natus
                    expedita repellendus officiis debitis illum officia nesciunt facilis
                    optio dolorum aperiam voluptatum id, in libero ratione, voluptatibus
                    rem nam earum.
                </p>
            </div>
            <div class="last-blog-card2">
                <img src="images/card2.jpg" alt="" />
                <p>Nov 7, 2023</p>
                <a href="Blog.html">
                    <h4>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    </h4>
                </a>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut natus
                    expedita repellendus officiis debitis illum officia nesciunt facilis
                    optio dolorum aperiam voluptatum id, in libero ratione, voluptatibus
                    rem nam earum.
                </p>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="footer-container">
        <div class="social-icon">
            <a href=""><img src="images/facebook-line.svg" alt="" /></a>
            <a href=""><img src="images/twitter-line.svg" alt="" /></a>
            <a href=""><img src="images/flickr.svg" alt="" /></a>
            <a href=""><img src="images/instagram.svg" alt="" /></a>
        </div>
        <div class="social-middle">
            <a href="home.html">Home</a>
            <a href="shop.html">Shop</a>
            <a href="Blog.html">Blog</a>
            <a href="about.html">About Us</a>
            <a href="contact.html">Contact Us</a>
        </div>

        <div class="newsletter">
            <h2>NEWSLETTER</h2>
            <p>
                Enjoy our newsletter to stay updated with the latest news and special
                sales.
            </p>
            <input type="text" placeholder="Enter your email address" />
            <hr />
        </div>
    </footer>
    <div class="sec-footer">
        <div>
            <p>&copy; 2023 All Rights Reserved.</p>
        </div>

        <div class="sec-footer-img">
            <a href="">
                <img src="images/visa.svg" alt="" />
            </a>
            <a href="">
                <img src="images/american express.svg" alt="" />
            </a>
            <a href="">
                <img src="images/discover-2-removebg-preview.png" alt="" />
            </a>
            <a href="">
                <img src="images/master.svg" alt="" />
            </a>
            <a href="">
                <img src="images/paypal.svg" alt="" />
            </a>
        </div>
    </div>
@endsection

@section('js')
@endsection
