@extends('layouts.AdminLayout')
@section('title')
    Add Staff
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/Add_Staff_User.css') }}">
@endsection
@section('header')
    Add Staff
@endsection

@section('content')
    <div class="add-staff-container">
        <div class="add-staff-name">

            <div class="add-staff">
                <div>
                    <label for="name">Name</label> <br>
                    <input type="text" placeholder="First Name">
                </div>

                <div>
                    <br>
                    <input type="text" placeholder="Last Name">
                </div>
            </div>


            <div class="date-of-birth">
                <div>
                    <label for="">Date of Birth</label> <br>
                    <select name="" id="">
                        <option value="">Month</option>
                        <option value="">January</option>
                        <option value="">February</option>
                        <option value="">March</option>
                        <option value="">April</option>
                    </select>
                </div>
                <div>
                    <br>
                    <select name="" id="">
                        <option value="">Day</option>
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                    </select>
                </div>
                <div>
                    <br>
                    <select name="" id="">
                        <option value="">Year</option>
                        <option value="">2024</option>
                        <option value="">2025</option>
                        <option value="">2026</option>
                    </select>
                </div>
            </div>

        </div>

        <div class="address">
            <label for="">Address</label> <br>
            <input type="text" placeholder="Street Address">
        </div>

        <div class="city">
            <div>
                <label for="">City</label> <br>
                <input type="text">
            </div>

            <div>
                <label for="">State</label> <br>
                <input type="text">
            </div>


        </div>


        <div class="phone_number">
            <div>
                <label for="">Phone Number</label> <br>
                <input type="text">
            </div>
            <div>
                <label for="">Email</label> <br>
                <input type="text">
            </div>
        </div>

        <div class="profile-bottom">

            <div class="profile-img">
                <label for="">Profile</label>
                <div class="profile-img-inner">
                    <img src="icons/sample_image.png" alt="">
                    <div class="browse-img">
                        <input type="file" id="file" accept="image/*">
                        <label for="file">Browse Image</label>
                    </div>
                </div>

            </div>

            <div class="position">
                <div class="position-inner">
                    <div>
                        <label for="">Position</label> <br>
                        <select name="" id="">
                            <option value=""></option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>

                    <div class="add-stuff-password">
                        <label for="">Password</label> <br>
                        <input type="text">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="add-product-btn">
        <button class="cancle-btn">Cancle</button>
        <button class="publish-btn">Update</button>
    </div>
@endsection
@section('js')
@endsection
