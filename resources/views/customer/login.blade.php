<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="{{ asset('css/customer/login_form.css') }}" />
</head>

<body>
    <div class="detail-nav">
        <a href="{{ route('CustomerHome') }}">Home</a>
        <a href="">My Account</a>
    </div>


    <div class="log-in-container">
        <div class="log-in">
            <h2>Login</h2>
            <div>
                <label>Username or email address</label>
                <input type="text" required>
            </div>
            <div>
                <label>Password</label>
                <input type="text" required>
            </div>

            <div>
                <button class="first-log-btn">LOG IN</button>
                <button class="sec-log-btn">Remember me</button>
            </div>
            <a href="">Lost your password?</a>
        </div>

        <div class="Register">
            <h2>Register</h2>
            <form action="{{ route('CustomerCreateProcess') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Name</label>
                    <input type="text" required name="name">
                </div>
                <div>
                    <label>Email address</label>
                    <input type="text" required name="email">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" required name="password">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="text" required name="phone">
                </div>
                <div>
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <label>Address</label>
                    {{-- <textarea name="address" id="" cols="30" rows="10"></textarea> --}}
                    <input type="text" required name="address">
                </div>

                <div>
                    <label>Joining Date</label>
                    <input type="date" required name="joining_date">
                </div>

                <div>
                    <button type="submit">REGISTER</button>
                </div>
            </form>


        </div>
    </div>



    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>
