<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- <link rel="stylesheet" href="css/product_add.css"> -->
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    @yield('css')
</head>

<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <img src="{{ asset('image/admin/icons/home.png') }}" alt="">
                <div class="logo_name">Furniture</div>
            </div>
        </div>
        <img class="side-menu-bar" src="{{ asset('image/admin/icons/side_menu_bar.png') }}" alt="">

        <ul class="nav_list">
            <li>
                <a href="">
                    <img src="{{ asset('image/admin/icons/dashboard.png') }}" alt="">
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="{{ route('ProductList') }}">
                    <img src="{{ asset('image/admin/icons/products.png') }}" alt="">
                    <span class="links_name">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>
            <li>
                <a href="{{ route('CustomerList') }}">
                    <img src="{{ asset('image/admin/icons/customers.png') }}" alt="">
                    <span class="links_name">Customers</span>
                </a>
                <span class="tooltip">Customers</span>
            </li>
            <li>
                <a href="{{ route('OrderList') }}">
                    <img src="{{ asset('image/admin/icons/orders.png') }}" alt="">
                    <span class="links_name">Orders</span>
                </a>
                <span class="tooltip">Orders</span>
            </li>
            <li>
                <a href="{{ route('StaffList') }}">
                    <img src="{{ asset('image/admin/icons/staff_list.png') }}" alt="">
                    <span class="links_name">StaffList</span>
                </a>
                <span class="tooltip">Staff List</span>
            </li>
            <li>
                <a href="">
                    <img src="{{ asset('image/admin/icons/reports.png') }}" alt="">
                    <span class="links_name">Reports</span>
                </a>
                <span class="tooltip">Reports</span>
            </li>
        </ul>
        <div class="side-bar-bottom">
            <ul>
                <li>
                    <a href="">
                        <img src="{{ asset('image/admin/icons/setting.png') }}" alt="">
                        <span class="links_name">Setting</span>
                    </a>
                    <span class="tooltip">Setting</span>
                </li>
                <li>
                    <a href="">
                        <img src="{{ asset('image/admin/icons/logout.png') }}" alt="">
                        <span class="links_name">Logout</span>
                    </a>
                    <span class="tooltip">Logout</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="profile">
        <div class="add-product-heading">
            <div class="add-product-heading-left">
                <h3>@yield('header')</h3>
            </div>

            <div class="add-product-heading-right">
                <div class="noti-bell">
                    <img src="icons/noti_bell.png" alt="">
                    <span></span>
                </div>

                <img src="{{ asset('image/admin/profile.png') }}" alt="">
            </div>
        </div>
    </div>

    @yield('content')

    <script src="{{ asset('js/admin/script.js') }}"></script>
    @yield('js')
</body>

</html>
