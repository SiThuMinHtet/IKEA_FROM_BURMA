@extends('layouts.CustomerLayout')

@section('title', 'Home')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customer/home-responsive.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/home-responsive.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
    </style>
@endsection

{{-- @dd($products->photo[0]); --}}
@section('content')
    <!-- Hero Section -->
    <div class="hero-container">
        @foreach (['hero-img.jpg', 'blue sofa.jpg', 'gray sofa.jpg', 'hero.jpg'] as $image)
            <div class="mySlides fade">
                <img src="{{ asset('image/customer/' . $image) }}" alt="" />
            </div>
        @endforeach
        <a class="next" onclick="plusSlides(-1)"><i class="fa-solid fa-circle-arrow-right"
                style="color: #ff0000;"></i></a>
        <a class="prev" onclick="plusSlides(1)"><i class="fa-solid fa-circle-arrow-left" style="color: #ff0000;"></i></a>
        <div class="hero-container-inner">
            <h3>SALE OFF 30%</h3>
            <h1>Classic 2023 Interior Designs</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <a href="{{ route('Shop') }}">
                Shop Now
                <i class="fa-solid fa-arrow-right-long"></i>
            </a>
        </div>
    </div>

    <!-- Hero Grid Section -->
    <div class="hero-grid-container">
        {{-- @dd($products[0]->id); --}}
        @foreach ($gridItems as $index => $item)
            <div class="grid-item item-{{ $index + 1 }}">
                <p>{{ $item['name'] }}<br />{{ $item['products_count'] }} Products</p>
                <a href="#"><img src="{{ asset('image/admin/categoryinfo/' . $item['image']) }}" alt="" /></a>
            </div>
        @endforeach
        <a href="#">
            <p>Explore more<img src="{{ asset('image/customer/right-arrow-svgrepo-com.svg') }}" alt="" /></p>
        </a>
    </div>

    <!-- New Products Section -->
    <div class="new-product">
        <h1>NEW PRODUCTS</h1>
        <ul class="tab-menu">
            {{-- @dd($categories); --}}
            @foreach ($categories as $category)
                <li data-category-id="{{ $category->id }}">{{ $category->name }}</li>
            @endforeach
        </ul>

        <div class="products">
            @foreach ($products as $product)
                <a href="{{ route('Detail', $product->id) }}">
                    <div class="product" data-category-id="{{ $product->category_id }}">
                        @foreach ($product->photos as $photo)
                            <img src="{{ asset('img/products/' . $photo->image) }}" alt="{{ $product->name }}"
                                width="100">
                        @endforeach

                        <div class="overlay">
                            <i class="fa-solid fa-eye"></i>
                            <p>Quick View</p>
                        </div>

                        <h3>{{ $product->name }}</h3>
                        <p>${{ $product->price }}</p>

                    </div>

                </a>
            @endforeach



        </div>
    </div>

    <!-- Up to 60% Off Section -->
    <div class="couch-60-bg">
        <div class="couch-60-flex">
            <div class="couch-60-item">
                <h1>Up To 60% Off</h1>
                <div class="couch-blk-circle">
                    @foreach ([['3', 'Days'], ['5', 'Hours'], ['30', 'Mins'], ['30', 'Secs']] as $circle)
                        <div>
                            <div class="black-circle">
                                <p class="ellip-text-1"><b>{{ $circle[0] }}</b><br />{{ $circle[1] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="couch-img">
                <img src="{{ asset('image/customer/brown-couch.png') }}" alt="" />
            </div>
        </div>
    </div>

    <!-- Last Blog Section -->
    <div class="last-blog-container">
        <h3>LAST BLOG</h3>
        <div class="last-blog-grid">
            @foreach ([['card1.jpg', 'Nov 7, 2023', 'Blog.html', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.'], ['card2.jpg', 'Nov 7, 2023', 'Blog.html', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.']] as $blog)
                <div class="last-blog-card{{ $loop->iteration }}">
                    <img src="image/customer/{{ $blog[0] }}" alt="" />
                    <p>{{ $blog[1] }}</p>
                    <a href="{{ $blog[2] }}">
                        <h4>{{ $blog[3] }}</h4>
                    </a>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ut natus expedita repellendus officiis
                        debitis illum officia nesciunt facilis optio dolorum aperiam voluptatum id, in libero ratione,
                        voluptatibus rem nam earum.</p>
                </div>
            @endforeach


        </div>
    </div>
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
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab-menu li');
        const products = document.querySelectorAll('.product');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const categoryId = this.getAttribute('data-category-id');

                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));

                // Add active class to the clicked tab
                this.classList.add('active');

                // Show/hide products based on the selected category
                products.forEach(product => {
                    if (product.getAttribute('data-category-id') === categoryId) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            });
        });

        // Trigger click on the first tab to display the initial set of products
        if (tabs.length > 0) {
            tabs[0].click();
        }
    });
</script>

@section('js')
    <!-- Include your JavaScript files here -->
@endsection
