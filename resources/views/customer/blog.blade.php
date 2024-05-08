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
</head>

<body>
    <div class="container">
        <div class="blog-home">
            <a href="{{ route('CustomerHome') }}">HOME</a>
        </div>
        <div class="card-galley">
            <div class="card-column">
                <div class="card">
                    <img src="images/card/how to choose right.jpg">
                    <div class="card-date">
                        <p>Jan 2, 2020</p>
                        <p>3 comments</p>
                    </div>
                    <h3>How to Choose the right Color Palette for Home</h3>
                    <p>in <b>HOW TO CHOOSE</b></p>
                    <P>The small round table in the dinette may be great for casual meals with your family, but inviting
                        overnight guests</P>
                    <button>READ MORE</button>
                </div>
                <div class="card">
                    <img src="images/card/fix up your dining.jpg">
                    <div class="card-date">
                        <p>Dec 1, 2019</p>
                        <p>0 comments</p>
                    </div>
                    <h3>Fix Up Your Dining Room for the Holidays</h3>
                    <p>in <b>DIY. HOME DECOR</b></p>
                    <P>The small round table in the dinette may be great for casual meals with your family, but inviting
                        overnight guests</P>
                    <button>READ MORE</button>
                </div>
                <div class="card">
                    <img src="images/card/how to choose right.jpg">
                    <div class="card-date">
                        <p>Sep 1, 2019</p>
                        <p>0 comments</p>
                    </div>
                    <h3>What is Ergonomic Office Furniture?</h3>
                    <p>in <b>LIFE STYLE</b></p>
                    <P>The small round table in the dinette may be great for casual meals with your family, but inviting
                        overnight guests</P>
                    <button>READ MORE</button>
                </div>
            </div>
            <div class="card-column">
                <div class="card">
                    <img src="images/card/how to make the most.jpg">
                    <div class="card-date">
                        <p>Jan 1, 2020</p>
                        <p>2 comments</p>
                    </div>
                    <h3>How to Make the Most Our of Your Backyard</h3>
                    <p>in <b>HOW TO CHOOSE</b></p>
                    <P>What could be better than a leisurely card game with friends in front of the fireplace ona chilly
                        evening?</P>
                    <button>READ MORE</button>
                </div>
                <div class="card">
                    <img src="images/card/discounted high end.jpg">
                    <div class="card-date">
                        <p>Nov 10, 2019</p>
                        <p>0 comments</p>
                    </div>
                    <h3>Discounted High End Sofas in NJ Ideas</h3>
                    <p>in <b>DIY, SHOPPING TIPS</b></p>
                    <P>The small round table in the dinette may be great for casual meals with your family, but inviting
                        overnight guests</P>
                    <button>READ MORE</button>
                </div>
                <div class="card">
                    <img src="images/card/red white and blue.jpg">
                    <div class="card-date">
                        <p>Oct 24, 2019</p>
                        <p>3 comments</p>
                    </div>
                    <h3>Red, White and Blue Furniture Ideas: 4th of July Fun</h3>
                    <p>in <b>DIY, HOME DECOR</b></p>
                    <P>The small round table in the dinette may be great for casual meals with your family, but inviting
                        overnight guests</P>
                    <button>READ MORE</button>
                </div>
            </div>
            <div class="card-column">
                <div class="card">
                    <img src="images/card/discounted high end.jpg">
                    <div class="card-date">
                        <p>Dec 15, 2019</p>
                        <p>1 comments</p>
                    </div>
                    <h3>What to Look for in a Top Home Furniture Store in NJ</h3>
                    <p>in <b>HOW TO CHOOSE</b></p>
                    <P>The small round table in the dinette may be great for casual meals with your family, but inviting
                        overnight guests</P>
                    <button>READ MORE</button>
                </div>
                <div class="card">
                    <img src="images/card/all things freehold.jpg">
                    <div class="card-date">
                        <p>Nov 20, 2019</p>
                        <p>0 comments</p>
                    </div>
                    <h3>All Things Freehold, NJ:Family Fun and More</h3>
                    <p>in <b>DIY, HOME DECOR</b></p>
                    <P>The small round table in the dinette may be great for casual meals with your family, but inviting
                        overnight guests</P>
                    <button>READ MORE</button>
                </div>
                <div class="card">
                    <img src="images/card/6 ideas for furnishing.jpg">
                    <div class="card-date">
                        <p>Aug 22, 2019</p>
                        <p>0 comments</p>
                    </div>
                    <h3>6 Ideas for Furnishing a Family Room </h3>
                    <p>in <b>DIY, SHOPPING TIPS</b></p>
                    <P>The small round table in the dinette may be great for casual meals with your family, but inviting
                        overnight guests</P>
                    <button>READ MORE</button>
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="load-more-btn">
        <button>LOAD MORE</button>
    </div>

    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>
