{{-- @dd($productlist); --}}
@dd($categorylist);
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
                {{-- <button class="shop-dropbtn">CATAGORIES <img src="{{ asset('image/customer/greater-than-symbol.png') }}"
                        alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div> --}}
                <form action="{{ route('customer.shop.sortCategory') }}" method="GET" id="sortCateForm">
                    @csrf
                    <select name="sort" id="sortCate" onchange="document.getElementById('sortCateForm').submit()">
                        @foreach ($collection as $item)
                            <option value="" {{ request('sortCate') == 'latest' ? 'selected' : '' }}>
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
                {{-- <button class="shop-dropbtn">PRICE <img src="images/greater-than-symbol.png" alt=""></button>
                <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a> --}}
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

            {{-- <div class="shop-dropdown-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                </div> --}}
        </div>
    </div>
    </div>

    <!-- shop-product-grid -->
    <div class="shop-product-grid">
        <div id="bed" class="menu">
            @foreach ($productlist as $product)
                <div class="shop-product-item shop-item-1">
                    <a href="{{ route('Detail', $product->id) }}">
                        <img src="{{ asset('img/products/' . $product->image) }}" alt="" />
                        <p>{{ $product->name }}Globe Electric Tech Series</p>
                        <p>{{ $product->price }}</p>
                    </a>
                </div>
            @endforeach





            {{-- <div class="shop-product-item shop-item-2">
                <a href="">
                    <img src="images/shop/chair-sofa.jpg" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <p>$699.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-3">
                <a href="">
                    <img src="images/shop/stacking storage.jpg" alt="" />
                    <p>Stacking Storage Box</p>
                    <p>$600.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-4">
                <span>HOT</span>
                <a href="">
                    <img src="images/shop/stacking drawer.jpg" alt="" />
                    <p>Stacking Drawer</p>
                    <p>$600.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-5">
                <span>-31%</span>
                <a href="">
                    <img src="images/shop/fabric sofa.jpg" alt="" />
                    <p>Cylindo Fabric Sofa</p>
                    <div class="shop-price">
                        <p style="opacity: .5;">$1,459.00</p>
                        <p>$1,000.00</p>
                    </div>

                </a>
            </div>
            <div class="shop-product-item shop-item-6">
                <span>-17%</span>
                <span class="shop-item-6-span">HOT</span>
                <a href="">
                    <img src="images/shop/vipp.jpg" alt="" />
                    <p>Vipp Pendant</p>
                    <div class="shop-price">
                        <p style="opacity: .5;">$600.00</p>
                        <p>$500.00</p>
                    </div>

                </a>
            </div>
            <div class="shop-product-item shop-item-7">
                <span>HOT</span>
                <a href="">
                    <img src="images/shop/draht.jpg" alt="" />
                    <p>Draht Hocker Sidetable</p>
                    <p>$299.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-8">
                <a href="">
                    <img src="images/shop/vipp armchair.jpg" alt="" />
                    <p>Vipp Armchair Black Leather</p>
                    <p>$220.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-9">
                <a href="">
                    <img src="images/shop/modwayy.jpg" alt="" />
                    <p>Modway Olivia Bed</p>
                    <p>$1,200.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-10">
                <a href="">
                    <img src="images/shop/velvet.jpg" alt="" />
                    <p>Gwyneth Velvet King Bed</p>
                    <p>$1,200.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-11">
                <a href="">
                    <img src="images/shop/vipp desk lamp.jpg" alt="" />
                    <p>Cylindo Accent Arm Chair</p>
                    <div class="shop-price">
                        <p style="opacity: .5;">$500.00</p>
                        <p>$600.00</p>
                    </div>
                </a>
            </div>
            <div class="shop-product-item shop-item-12">
                <a href="">
                    <img src="images/shop/bed.jpg" alt="" />
                    <p>Upholstered Bed</p>
                    <p>$1,200.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-13">
                <a href="">
                    <span>HOT</span>
                    <img src="images/shop/kloch.jpg" alt="" />
                    <p>Klosh Wall Clock</p>
                    <div class="shop-price">
                        <p style="opacity: .5;">$80.00</p>
                        <p>$129.00</p>
                    </div>
                </a>
            </div>
            <div class="shop-product-item shop-item-14">
                <a href="">
                    <img src="images/shop/arne.jpg" alt="" />
                    <p>Arne Dining Chair</p>
                    <p>$350.00</p>
                </a>
            </div>
            <div class="shop-product-item shop-item-15">
                <a href="">
                    <span>-32%</span>
                    <img src="images/shop/vasaagle.jpg" alt="" />
                    <p>Vasagel Vanity Table</p>
                    <div class="shop-price">
                        <p style="opacity: .5;">$1,760.00</p>
                        <p>$1,200.00</p>
                    </div>
                </a>
            </div>
            <div class="shop-product-item shop-item-16">
                <a href="">
                    <img src="images/shop/modern side table.jpg" alt="" />
                    <p>Modern Side Table</p>
                    <p>$500.00</p>
                </a>
            </div>
        </div> --}}
        </div>

        <div class="shop-last-section">
            <p>You've viewed 16 or 50 products</p>
            <button>LOAD MORE</button>
        </div>
    @endsection

    @section('js')
        <script src="{{ asset('js/customer/shop.js') }}"></script>
    @endsection
