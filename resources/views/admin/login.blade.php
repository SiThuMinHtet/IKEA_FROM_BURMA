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
            <img src="{{ asset('image/admin/admin login.png') }}" alt="Admin Login">
        </div>
        <div class="login-form">
            <p>Admin Login</p>


            <form action="{{ route('LoginProcess') }}" method="post">
                @csrf
                <input type="hidden" value="admin" name="usertype">
                <div>
                    <label for="email">Email</label> <br>
                    <input type="text" name="email" id="email" size="40">
                </div>
                @error('email')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror

                <div>
                    <label for="password">Password</label> <br>
                    <input type="password" name="password" id="password" size="40">
                </div>
                @error('password')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror

                @if (session('error'))
                    <div class="alert alert-danger">
                        <small><b>{{ session('error') }}</b></small>
                    </div>
                @endif


                <div>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
