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
            <div>
                <label>Email address</label>
                <input type="text" required>
            </div>
            <div>
                <label>Password</label>
                <input type="text" required>
            </div>

            <div>
                <button>REGISTER</button>
            </div>

        </div>
    </div>



    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>
