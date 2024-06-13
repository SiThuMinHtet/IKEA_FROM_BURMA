@extends('layouts.CustomerLayout')
@section('title')
    Category
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customer/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/catagory.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/carousel.css') }}" />
@endsection

@section('content')
    <div class="shop-nav">
        <h2>{{ $productList[0]->category }}</h2>
    </div>

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
                        <p>{{ $product->price }}</p>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
@endsection
