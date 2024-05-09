<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/admin/Admin_panel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="login-img">
            <img src="Images/admin login.png" alt="">
        </div>
        <div class="login-form">
            <p>Admin Login</p>
            <form action="{{ route('AdminLoginProcess') }}" method="post">
                <input type="hidden" value="admin" name="usertype">
                @csrf
                <div>
                    <label for="email">Email</label> <br>
                    <input type="text" name="email" id="email" size="40">
                </div>

                <div>
                    <label for="password">Password</label> <br>
                    <input type="password" name="password" id="password" size="40">
                </div>
                <!-- <button><a href="dashboard.html">Login</a></button> -->
                <div>
                    {{-- <a href="dashboard.html">Login</a> --}}
                    <button type="submit">Login</button>
                </div>

            </form>
        </div>
    </div>


</body>

</html>
