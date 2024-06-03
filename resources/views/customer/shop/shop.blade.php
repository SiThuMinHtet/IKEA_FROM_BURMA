{{-- @dd($productlist); --}}
{{-- @dd($categorylist); --}}

@extends('layouts.CustomerLayout')
@section('title')
    Shop
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customer/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/shop-responsive.css') }}">
@endsection

@section('content')
    <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <div class="carousel">
            <div class="card">
                <img src="{{ asset('image/customer/slider/slider-img1.jpg') }}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{ asset('image/customer/slider/slider-img2.jpg') }}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{ asset('image/customer/slider/slider-img3.jpg') }}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{ asset('image/customer/slider/slider-img4.jpg') }}" alt="img" draggable="false">
            </div>
            <div class="card">
                <img src="{{ asset('image/customer/slider/slider-img5.jpg') }}" alt="img" draggable="false">
            </div>
        </div>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>

    <!-- hero-grid -->
    <div class="shop-nav-heading">
        <div class="mini-heading">
            <p>Home</p>
            <p>Shop</p>
        </div>

        <p id="shop">SHOP</p>
    </div>

    <div class="shop-nav">
        <div class="shop-nav-left">
            <p>view <b>16</b> per page</p>
        </div>

        <div class="shop-nav-right">
            <div class="shop-dropdown">

            </div>
            <div class="shop-dropdown">
                <form action="{{ route('customer.shop.sortPrice') }}" method="GET" id="sortPriceForm">
                    @csrf
                    <select name="sortPrice" id="sortPrice" onchange="document.getElementById('sortPriceForm').submit()">
                        <option value="price" {{ request('sortPrice') == 'price' ? 'selected' : '' }}>
                            Price</option>
                        <option value="Low2High" {{ request('sortPrice') == 'Low2High' ? 'selected' : '' }}>Lower to Higher
                            Price</option>
                        <option value="High2Low" {{ request('sortPrice') == 'High2Low' ? 'selected' : '' }}>Higher to Lower
                            Price
                        </option>
                    </select>
                </form>
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
            <form action="{{ route('customer.shop.sort') }}" method="GET" id="sortForm">
                @csrf
                <select name="sort" id="sortSelect" onchange="document.getElementById('sortForm').submit()">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Sort by Latest</option>
                    <option value="popular" {{ request('sort') == 'popular' ? 'selected' : '' }}>Sort by Popularity
                    </option>
                </select>
            </form>
        </div>
    </div>
    </div>
    {{-- @dd($productList[0]->image); --}}
    <!-- shop-product-grid -->
    <div class="shop-product-grid">
        <div id="bed" class="menu">
            @foreach ($productList as $product)
                <div class="shop-product-item shop-item-1">
                    <a href="{{ route('Detail', $product->id) }}">
                        <img src="{{ asset('img/products/' . $product->image) }}" alt="" />
                        <p>{{ $product->name }}</p>
                        <p>{{ $product->price }}</p>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="shop-last-section">
            <p>You've viewed 16 or 50 products</p>
            <button>LOAD MORE</button>
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/customer/shop.js') }}"></script>
    @endsection
