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

        <p id="shop">SHOP</p>
    </div>

    <div class="shop-nav">

        <div class="shop-nav-right">
            <div class="shop-dropdown">
                <form action="{{ route('customer.shop.sortCategory') }}" method="GET" id="sortCateForm">
                    @csrf
                    <select name="sortCate" id="sortCate" onchange="document.getElementById('sortCateForm').submit()">
                        <option value="category" {{ request('sortCate') == 'category' ? 'selected' : '' }}>Category
                        </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request('sortCate') == $category->id ? 'selected' : '' }}>{{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </form>
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

                        <div class="overlay">
                            <i class="fa-solid fa-eye"></i>
                            <p>Quick View</p>
                        </div>

                        <p>{{ $product->name }}</p>
                        <p>${{ $product->price }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/customer/shop.js') }}"></script>
@endsection
