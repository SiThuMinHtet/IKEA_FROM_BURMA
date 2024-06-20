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
            <div>
                <a href="{{ route('CustomerHome') }}">LOGO</a>
            </div>
            <div>
                <a href="{{ route('CustomerHome') }}">Home</a>
            </div>
            <div>
                <a href="{{ route('Shop') }}">Shop</a>
            </div>

            <div class="dropdown">
                <p>Category</p>

                <div class="dropdown-content">
                    <div class="row">
                        <h3>CATEGORY ONE</h3>
                        <div class="column">
                            <div>
                                <a href="{{ route('ShopCategory', ['category' => '1']) }}">Bed</a>
                                <a href="{{ route('ShopCategory', ['category' => '2']) }}">Sofa</a>
                                <a href="{{ route('ShopCategory', ['category' => '3']) }}">Lamp</a>
                                <a href="{{ route('ShopCategory', ['category' => '4']) }}">Cabinet</a>
                                <a href="{{ route('ShopCategory', ['category' => '5']) }}">Table</a>
                                <a href="{{ route('ShopCategory', ['category' => '6']) }}">Blanket</a>
                                <a href="{{ route('ShopCategory', ['category' => '7']) }}">Chair</a>
                                <a href="{{ route('ShopCategory', ['category' => '8']) }}">Pillow</a>
                            </div>
                        </div>
                        <div class="column-2">
                            <img src="{{ asset('image/customer/banner.jpg') }}" alt="" />
                            <br />
                            <img src="{{ asset('image/customer/Rectangle 48.jpg') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <a href="{{ route('Blog') }}">Blog</a>
            </div>
            <div>
                <a href="{{ route('About') }}">About Us</a>
            </div>
            <div>
                <a href="{{ route('Contact') }}">Contact Us</a>
            </div>



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

    <!-- Footer Section -->
    <footer class="footer-container">
        <div class="social-icon">
            @foreach (['facebook-line.svg', 'twitter-line.svg', 'flickr.svg', 'instagram.svg'] as $social)
                <a href="#"><img src="image/customer/{{ $social }}" alt="" /></a>
            @endforeach
        </div>

        <div class="social-middle">
            @foreach (['home.html' => 'Home', 'shop.html' => 'Shop', 'Blog.html' => 'Blog', 'about.html' => 'About Us', 'contact.html' => 'Contact Us'] as $link => $name)
                <a href="{{ $link }}">{{ $name }}</a>
            @endforeach
        </div>
        <div class="newsletter">
            <h2>NEWSLETTER</h2>
            <p>Enjoy our newsletter to stay updated with the latest news and special sales.</p>
            <input type="text" placeholder="Enter your email address" />
            <hr />
        </div>
    </footer>

    <div class="sec-footer">
        <div>
            <p>&copy; 2023 All Rights Reserved.</p>
        </div>
        <div class="sec-footer-img">
            @foreach (['visa.svg', 'american express.svg', 'discover-2-removebg-preview.png', 'master.svg', 'paypal.svg'] as $payment)
                <a href="#"><img src="image/customer/{{ $payment }}" alt="" /></a>
            @endforeach
        </div>
    </div>
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
