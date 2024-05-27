<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('css')
</head>

<body>
    <nav class="nav-link">
        <ul>
            <li>
                <a href=""><img id="facebook" src="{{ asset('image/customer/facebook.svg') }}"
                        alt="" /></a>
            </li>
            <li>
                <a href=""><img src="{{ asset('image/customer/instagram.png') }}" alt="" /></a>
            </li>
            <li>
                <a href=""><img src="{{ asset('image/customer/youtube.svg') }}" alt="" /></a>
            </li>
            <li>
                <a href=""><img src="{{ asset('image/customer/telegram-original.svg') }}" alt="" /></a>
            </li>
        </ul>

        <div>
            <p>Up to 40% of best selling furniture. <a href="{{ route('Shop') }}">Shop Now</a></p>
        </div>
    </nav>

    <div class="navbar">
        <div class="first-nav-icon">
            <a href="home.html">LOGO</a>
            <a href="{{ route('CustomerHome') }}">Home</a>
            <a href="{{ route('Shop') }}">Shop</a>

            <div class="dropdown">
                <button class="dropbtn">
                    <a href="{{ route('Category') }}">Catagory</a>
                    <img src="images/greater-than-symbol.png" alt="" />
                </button>
                <div class="dropdown-content">
                    <div class="row">
                        <h3>CATEGORY ONE</h3>
                        <div class="column">
                            <div>
                                <a href="#">Bed</a>
                                <a href="#">Cabinet</a>
                                <a href="#">Sofa</a>
                                <a href="#">Kitchen</a>
                                <a href="#">Office</a>
                                <a href="#">Chair</a>
                            </div>
                            <div>
                                <a href="#">Bed</a>
                                <a href="#">Cabinet</a>
                                <a href="#">Sofa</a>
                                <a href="#">Kitchen</a>
                                <a href="#">Office</a>
                                <a href="#">Chair</a>
                            </div>
                        </div>
                        <div class="column-2">
                            <img src="images/banner.jpg" alt="" />
                            <br />
                            <img src="images/Rectangle 48.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>

            <a href="{{ route('Blog') }}">Blog</a>
            <a href="{{ route('About') }}">About Us</a>
            <a href="{{ route('Contact') }}">Contact Us</a>

            @if (auth('customer')->user() != null)
                <a href="{{ route('Customer.logout') }}">Log Out</a>
            @else
                <a href="{{ route('CustomerLogin') }}">Log In</a>
            @endif





        </div>

        <div class="sec-nav-icon">
            <a href="">
                <img src="{{ asset('image/customer/search.svg') }}" alt="" />
            </a>
            <a href="{{ route('CustomerLogin') }}">
                <img src="{{ asset('image/customer/user.svg') }}" alt="" />
            </a>
            <a class="cart-img" href="{{ route('cart.index') }}">
                <img src="{{ asset('image/customer/cart.png') }}" alt="" />
                {{-- <span>{{count()}}</span> --}}
            </a>
        </div>

    </div>

    <div class="hamburger">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    @yield('content')
    @yield('js')
    <script src="{{ asset('js/customer/script.js') }}"></script>
</body>

</html>
