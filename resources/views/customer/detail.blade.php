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
            <img src="/images/Detail/modway olivia bed detail.png" alt="">
        </div>

        <div class="detail-info">
            <h2>Modway Olivia Bed</h2>
            <p class="item-price-detail"><b>$1,200.00</b></p>
            <p class="item-text">
                The All in One Fully Upholstered Shelter Queen Bed upholstered bed is designed to add a contemporary
                flair to many of today's modern homes. The button tufted headboard is inset w/two wings, giving it a
                contemporary shelter feel. Also features a matching low profile tootboard and hinged/folding side rails.
            </p>
            <div class="detail-btn">
                <input type="number">
                <button><a href="{{ route('Cart') }}">ADD TO CART</a></button>
                <p></p>
                <p></p>
            </div>
            <p>
                SKU: BE-006 <br>
                Categories: Bed <br>
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

        <div class="sm-img">
            <img src="/images/Detail/modway olivia bed detail.png" alt="">
            <img src="/images/shop/modwayy.jpg" alt="">
        </div>

    </div>

    <div class="description">
        <div class="product-nav">
            <button class="" onclick="openMenu('description')"><a>DESCRIPTION</a></button>
            <button class="" onclick="openMenu('additional')"><a>ADDITIONAL <br>INFORMATION</a></button>
        </div>

        <div id="description" class="menu">
            <p>
                The All in One Fully Upholstered Shelter Queen Bed upholstered bed is designed to add a contemporary
                flair to many of today's modern homes. The button tufted headboard is inset w/two wings, giving it a
                contemporary shelter feel. Also features a matching low profile tootboard and hinged/folding side rails.
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
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Asperiores consequuntur quia adipisci sed quis
                tenetur quod molestiae quos corrupti eius itaque impedit facere aliquam, atque nesciunt architecto
                suscipit, incidunt officia. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis iure sit
                commodi delectus eveniet tempora, expedita possimus eius, eligendi quidem impedit laboriosam natus
                dolores nulla. Vitae, quia. Possimus, fugiat sunt. Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Reprehenderit nihil vitae aut sunt ab quaerat qui quos cumque, nulla sequi modi laboriosam cum
                explicabo nostrum dolorum expedita! Odio, modi numquam? Lorem ipsum dolor, sit amet consectetur
                adipisicing elit. Magni ipsum ipsam sit magnam quos! Quaerat laudantium autem nobis, laborum eos maiores
                obcaecati debitis magnam corporis similique sit minima. Aliquid, mollitia!
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



    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>
