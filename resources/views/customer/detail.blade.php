<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="{{ asset('css/customer/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/carousel.css') }}">
    <link
        rel="stylesheet"href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/category.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/detail.css') }}" />
</head>

<body>
    <div class="detail-nav">
        <a href="{{ route('CustomerHome') }}">Home</a>
        <a href="{{ route('Shop') }}">Shop</a>
        <a href="{{ route('Category') }}">Bed</a>
        <a href="">Modway Olivia Bed</a>
    </div>
    <div class="item-detail">
        <div class="detail-img">
            <img src="{{ asset('img/products/' . $productImages[0]->image) }}" alt="">
        </div>


        <div class="detail-info">
            <h2>{{ $product->name }}</h2>
            <p class="item-price-detail"><b>{{ $product->price }} MMK</b></p>
            <p class="item-text">
                The All in One Fully Upholstered Shelter Queen Bed upholstered bed is designed to add a contemporary
                flair to many of today's modern homes. The button tufted headboard is inset w/two wings, giving it a
                contemporary shelter feel. Also features a matching low profile tootboard and hinged/folding side rails.
            </p>
            <div class="detail_btn_group">
                <div class="detail-btn">
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" id="cartForm">
                        @csrf
                        <div>
                            <input type="number" name="quantity" id="quantity" min="1" value="1">
                        </div>
                        <button type="submit" onclick="submitCartForm(false)">Add To Cart</button>
                        <button type="submit" onclick="submitCartForm(true)">BUY IT NOW</button>
                    </form>
                </div>
            </div>

            <p>
                SKU: {{ $product->code_name }}<br>
                Categories:{{ $category->name }} <br>
                Tags: theme-sky, upstore, WooCommerce, WordPress
            </p>
            <div class="detail-social-icon">
                <img src="/images/icons/facebook.png" alt="">
                <img src="/images/icons/twitter.png" alt="">
                <img src="/images/icons/pintrest.png" alt="">
                <img src="/images/icons/linkdin.png" alt="">
                <img src="/images/icons/git.png" alt="">

            </div>
        </div>
        @if (isset($productImages[1]->image) && $productImages[2]->image)
            <div class="sm-img">
                <div class="detail-img">
                    <img src="{{ asset('img/products/' . $productImages[1]->image) }}" alt="">
                </div>
                <div class="detail-img">
                    <img src="{{ asset('img/products/' . $productImages[2]->image) }}" alt="">
                </div>
            </div>
        @else
            <div></div>
        @endif


    </div>

    <div class="description">
        <div class="product-nav">
            <button class="" onclick="openMenu('description')"><a>DESCRIPTION</a></button>
            <button class="" onclick="openMenu('additional')"><a>ADDITIONAL <br>INFORMATION</a></button>
        </div>

        <div id="description" class="menu">
            <p>
                {{ $product->description }}
                <br>
                <b>Features</b> <br>
            </p>
            <div class="text-indent cutoff-text">
                Materials:wood, foam,polyester <br>
                100% polyester fabric cover <br>
                Plywood panel construction with thick foam padding <br>
                Materials:wood, foam,polyester <br>
                100% polyester fabric cover <br>
            </div>

            <input class="expand-btn" type="checkbox">

        </div>
        <div id="additional" class="menu" style="display: none">
            <p class="cutoff-text">
                {{ $product->additionalinfo }}
            </p>
            <input class="expand-btn" type="checkbox">
        </div>
    </div>


    <h2 class="detail-heading">YOU MAY ALSO LIKE...</h2>
    <div class="detail-grid">
        <div class="new-product-item new-item-1">

            <a href=""><img src="images/Detail/haiku.png" alt="" />
                <p>Haiku 2-Seater Sofa</p>
                <p>$999.00 - $1,499.00</p>
            </a>
        </div>
        <div class="shop-product-item shop-item-2">
            <a href="">
                <img src="images/Detail/solid wood .png" alt="" />
                <p>Solid Wood Side Tables</p>
                <p>$350.00</p>
            </a>
        </div>
        <div class="shop-product-item shop-item-3">
            <a href="">
                <img src="images/Detail/vipp pillow.png" alt="" />
                <p>Vipp Wool Pillow</p>
                <p>$79.00</p>
            </a>
        </div>
        <div class="shop-product-item grid-item-3">
            <a href="">
                <span>-20%</span>
                <img src="images/Detail/wool blanket.png" alt="" />
                <p>Vipp Wool Blanket</p>
                <div class="shop-price">
                    <p style="opacity: .5;">$100.00</p>
                    <p>$80.00</p>
                </div>
            </a>
        </div>
    </div>


    <script>
        document.getElementById('quantity').addEventListener('input', function() {
            document.getElementById('form-quantity').value = this.value;
        });

        function openMenu(menuItem) {
            var i;
            var x = document.getElementsByClassName("menu");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(menuItem).style.display = "grid";
        }
    </script>



    {{--  --}}
    <script>
        function submitCartForm(redirectToCart) {
            const form = document.getElementById('cartForm');

            // Remove existing redirect_to_cart input if it exists
            let redirectInput = document.querySelector('input[name="redirect_to_cart"]');
            if (redirectInput) {
                redirectInput.remove();
            }

            // Add redirect_to_cart input if redirectToCart is true
            if (redirectToCart) {
                redirectInput = document.createElement('input');
                redirectInput.type = 'hidden';
                redirectInput.name = 'redirect_to_cart';
                redirectInput.value = 'true';
                form.appendChild(redirectInput);
            }

            // Submit the form
            form.submit();
        }
    </script>

</body>

</html>
