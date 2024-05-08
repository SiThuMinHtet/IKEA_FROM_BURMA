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
    <link rel="stylesheet" href="{{ asset('css/customer/blog.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/contact.css') }}" />
</head>

<body>

    <div class="contact-home">
        <a href="{{ route('CustomerHome') }}">HOME</a>
    </div>
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d244399.15905418765!2d96.01676738107442!3d16.83940535350646!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon!5e0!3m2!1sen!2smm!4v1703304932662!5m2!1sen!2smm"
        width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    <!-- let's talk to us -->


    <div class="talk-to-us-container">

        <div class="talk-to-us-input">
            <P>LET'S TALK TO US</P>
            <div class="talk-to-us-first-input">
                <input type="text">
                <input type="text">
            </div>
            <div>
                <input type="text" name="" id="long-input">
            </div>

            <textarea name="" id="" cols="30" rows="10"></textarea>

            <input type="submit" id="submit">
        </div>


        <div class="talk-to-us-info">
            <div class="info">
                <h4>ADDRESS</h4>
                <p>17 Elimatta Dr,Ashgrove <br> QLD 4060, Australia.</p>
            </div>
            <div class="info">
                <h4>PHONE NUMBER</h4>
                <p>(+84)8 3555 3203 <br>(+84)8 3555 3203 </p>
            </div>
            <div class="info">
                <h4>EMAIL</h4>
                <p>themesky.info@gmail.com <br> support.info@gmail.com</p>
            </div>

        </div>
    </div>



    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>
