<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <link rel="stylesheet" href="{{ asset('css/customer/login_form.css') }}" />
</head>

<body>
    @php
        $user = auth('customer')->user();
        $updatestatus = false;
        if (isset($user)) {
            $updatestatus = true;
        }
        // dd($updatestatus);
    @endphp
    <div class="detail-nav">
        <a href="{{ route('CustomerHome') }}">Home</a>
        <a href="">My Account</a>
    </div>


    <div class="log-in-container">
        @if ($updatestatus == false)
            <div class="log-in">
                <h2>Login</h2>
                <form action="{{ route('LoginProcess') }}" method="POST">
                    @csrf
                    <input type="hidden" value="customer" name="usertype">
                    <div>
                        <label>Email address</label>
                        <input type="text" name="email" value="{{ $updatestatus == true ? $user->email : '' }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                    @enderror
                    <div>
                        <label>Password</label>
                        <input type="text" name="password">
                    </div>
                    @error('password')
                        <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                    @enderror
                    <div>
                        <button class="first-log-btn" type="submit">LOG IN</button>
                        <button class="sec-log-btn">Remember me</button>
                    </div>
                    <a href="">Lost your password?</a>
                </form>
            </div>
        @else
            <div class="log-in">
                <img src="{{ asset('image/customer/banner-9.png') }}" alt="">
            </div>
        @endif



        <div class="Register">
            <h2> {{ $updatestatus == true ? 'Update Profile' : 'Register' }}</h2>
            <form action="{{ $updatestatus == true ? route('CustomerEditProcess') : route('CustomerCreateProcess') }}"
                method="post" enctype="multipart/form-data">
                @csrf
                @if ($updatestatus == true)
                    @method('PATCH')
                @endif
                <input type="hidden" name="id">
                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $updatestatus == true ? $user->name : '' }}">
                </div>
                @error('name')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror
                <div>
                    <label>Email address</label>
                    <input type="text" name="email" value="{{ $updatestatus == true ? $user->email : '' }}">
                </div>
                @error('email')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror
                <div>
                    <label>Password</label>
                    <input type="text" name="password">
                </div>
                @error('password')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror
                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{ $updatestatus == true ? $user->phone : '' }}">
                </div>
                @error('phone')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror
                <div>
                    <label>Image</label>
                    <input type="file" name="image">
                </div>
                @error('image')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror
                <div>
                    <label>Address</label>
                    <input type="text" name="address" value="{{ $updatestatus == true ? $user->address : '' }}">
                </div>
                @error('address')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror

                <div>
                    <label>Joining Date</label>
                    <input type="date" name="joining_date" {{ $updatestatus == true ? 'disabled' : '' }}>
                </div>
                @error('joining_date')
                    <div class="alert alert-danger error"><small><b>*{{ $message }}*</b></small></div>
                @enderror

                <div>
                    <button type="submit">{{ $updatestatus == true ? 'UPDATE' : 'REGISTER' }}</button>
                </div>
            </form>
        </div>
    </div>



    <script src="./js/script.js"></script>
    <script src="./js/shop.js"></script>
</body>

</html>
