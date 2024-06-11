<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @yield('css')
    <style>
        .sec-nav-icon {
            display: flex;
            align-items: center;
        }

        .user_profile {
            display: inline-block;
            cursor: pointer;
        }

        .user_profile_info {
            background-color: white;
            display: none;
            position: absolute;
            border: 1px solid black;
            border-radius: 3px;
            z-index: 2;
        }

        .profile a:hover {
            color: black;
            font-weight: bold;
        }

        .log_in_out a:hover {
            color: black;
            font-weight: bold;
        }
    </style>
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
                    <a href="{{ route('ShopCategory') }}">Catagory</a>
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


        </div>
        <div class="sec-nav-icon">
            <div class="user_profile">
                <div>
                    @if (auth('customer')->user() != null)
                        <img src="{{ asset('image/customer/customerinfo/' . auth('customer')->user()->image) }}"
                            alt="" style="max-height: 50px; max-width:50px;border-radius: 100%;">
                    @else
                        <img src="{{ asset('image/customer/user.svg') }}" alt="" />
                    @endif
                </div>
                <div class="user_profile_info">
                    <div class="profile">
                        @if (auth('customer')->user())
                            <a href="{{ route('CustomerLogin') }}">Edit Profile</a>
                        @endif
                    </div>


                    <div class="log_in_out">
                        @if (auth('customer')->user() != null)
                            <a href="{{ route('Customer.logout') }}">Log Out</a>
                        @else
                            <a href="{{ route('CustomerLogin') }}">Log In</a>
                        @endif
                    </div>


                </div>
            </div>

            <div>
                <a class="cart-img" href="{{ route('cart.index') }}">
                    <img src="{{ asset('image/customer/cart.png') }}" alt="" />
                    {{-- @if (session()->get('cart') == null)
                        @if (session()->get('cart') == null)
                            <span>0</span>
                        @else
                            <span>{{ count((array) session()->get('cart')) }}</span>
                        @endif
                    @else
                        @if (session()->get('cart') == null)
                            <span>0</span>
                        @else
                            <span>{{ count(session()->get('cart')) }}</span>
                        @endif
                    @endif --}}
                    @php
                        $user = Auth('customer')->user();
                        if ($user) {
                            // Get cart items count from the database for logged-in users
                            $cartCount = App\Models\Cart::where('customer_id', $user->id)->count();
                        } else {
                            // Get cart items count from the session for guest users
                            $cartCount = count((array) session()->get('cart', []));
                        }
                    @endphp
                    <span>{{ $cartCount }}</span>
                </a>
            </div>


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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const profile = document.querySelector(".user_profile");
            const profileInfo = document.querySelector(".user_profile_info");

            profile.addEventListener("click", () => {
                if (profileInfo.style.display === "none" || profileInfo.style.display === "") {
                    profileInfo.style.display = "inline-block";
                } else {
                    profileInfo.style.display = "none";
                }
            });

            document.addEventListener("click", (event) => {
                if (!profile.contains(event.target) && !profileInfo.contains(event.target)) {
                    profileInfo.style.display = "none";
                }
            });
        });
    </script>
</body>

</html>
