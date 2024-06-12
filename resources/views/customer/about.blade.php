@extends('layouts.CustomerLayout')
@section('title')
    About
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customer/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/carousel.css') }}">
    <link rel="stylesheet"href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/category.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/detail.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/blog.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/about.css') }}" />
@endsection

@section('content')
    <div class="our-story">
        <div class="out-story-text">
            <h1>Our Story</h1>
            <p>Our wonderful story starts back in 1973 when the first Monsoon boutique opened on London's Beauchamp
                Place.</p>
            <p>
                Today, our two great sister brands have an international presencce with over 1,000 stores around the
                world. Throughout the UK and much further a field.
            </p>
        </div>

        <div>
            <img src="{{ asset('image/customer/about/stool.png') }}" alt="">
        </div>
    </div>

    <div class="our-great-team">
        <h1>OUR GREAT TEAM</h1>
        <div class="our-great-team-grid">
            <div class="grid-img">
                <img src="{{ asset('image/customer/about/frances.png') }}" alt="">
                <h4>Frances Rodriguez <br> Designer</h4>
            </div>
            <div class="grid-img">
                <img src="{{ asset('image/customer/about/martha.png') }}" alt="">
                <h4>Martha Garza <br> CEO</h4>
            </div>
            <div class="grid-img">
                <img src="{{ asset('image/customer/about/willie.jpg') }}" alt="">
                <h4>Willie Robertson <br> Photographer</h4>
            </div>
            <div class="grid-img">
                <img src="{{ asset('image/customer/about/jean.jpg') }}" alt="">
                <h4>Jean Kelley <br> Co-Founder</h4>
            </div>
            <div class="grid-img">
                <img src="{{ asset('image/customer/about/douglas.jpg') }}" alt="">
                <h4>Douglas Dean <br> Technical Manager</h4>
            </div>
            <div class="grid-img">
                <img src="{{ asset('image/customer/about/alexander.jpg') }}" alt="">
                <h4>Alexander Fields <br> Art Director</h4>
            </div>

        </div>
    </div>

    <div class="testimonial">
        <div class="testimonial-img">
            <img src="{{ asset('image/customer/about/douglas.jpg') }}" alt="">
        </div>
        <div>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia praesentium similique saepe tenetur velit
                sequi necessitatibus a, tempore animi nulla alias deserunt itaque possimus, voluptatem ipsam ipsum
                quisquam. Excepturi, fugiat?</p>
            <p class="testimonial-name">
                Douglas Dean <br>
                Technical Manager
            </p>
        </div>
    </div>

    <div class="our-services-container">
        <h1>OUR SERVICES</h1>
        <div class="our-services-grid">
            <div class="our-service-item grid-1">
                <img src="{{ asset('image/customer/about/easy payment.png') }}" alt="">
                <h2>EASY PAYMENT</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum voluptatum excepturi sunt cumque
                    ipsam.
                </p>
            </div>
            <div class="our-service-item grid-2">
                <img src="{{ asset('image/customer/about/worldwide shipping.png') }}" alt="">
                <h2>WORLDWIDE SHIPPING</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum voluptatum excepturi sunt cumque
                    ipsam.
                </p>
            </div>
            <div class="our-service-item grid-3">
                <img src="{{ asset('image/customer/about/24 7 support.png') }}" alt="">
                <h2>24/7 SUPPORT</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum voluptatum excepturi sunt cumque
                    ipsam.
                </p>
            </div>
            <div class="our-service-item grid-4">
                <img src="{{ asset('image/customer/about/amazing offers.png') }}" alt="">
                <h2>AMAZING offers</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum voluptatum excepturi sunt cumque
                    ipsam.
                </p>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
@endsection
