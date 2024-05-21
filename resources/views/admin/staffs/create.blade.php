@extends('layouts.AdminLayout')
@section('title')
    Add Staff
@endsection
@php
    $updatestatus = false;
    if (isset($staffdata)) {
        $updatestatus = true;
    }
@endphp
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/Add_Staff_User.css') }}">
@endsection
@section('header')
    {{ $updatestatus == true ? 'Edit' : 'Add' }} Staff
@endsection

@section('content')
    <form action="{{ $updatestatus == true ? route('UpdateProcess') : route('CreateProcess') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @if ($updatestatus == true)
            @method('PATCH')
        @endif
        <div class="add-staff-container">
            <div class="add-staff-name">

                <div class="add-staff">
                    {{-- <div>
                        <label for="name">Name</label> <br>
                        <input type="text" placeholder="First Name" name="fname"
                            value="{{ $updatestatus == true ? $staffdata->fname : '' }}">
                    </div>

                    <div>
                        <br>
                        <input type="text" placeholder="Last Name" name="lname">
                    </div> --}}
                    <input type="hidden" name="id" value="{{ $updatestatus == true ? $staffdata->id : '' }}">
                    <div>
                        <label for="name" id="name">Name</label>
                        <input type="text" name="name" placeholder="Enter Name"
                            value="{{ $updatestatus == true ? $staffdata->name : '' }}">
                    </div>
                </div>


                <div class="date-of-birth">
                    <div>
                        <label for="">Age</label> <br>
                        <input type="number" name="age" value="{{ $updatestatus == true ? $staffdata->age : '' }}">
                    </div>
                </div>

            </div>

            <div class="address">
                <label for="">Address</label> <br>
                <textarea name="address" id="" cols="30" rows="10">
                    {{ $updatestatus == true ? $staffdata->address : '' }}
                </textarea>
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
                    <input type="text" name="phone" value="{{ $updatestatus == true ? $staffdata->phone : '' }}">
                </div>
                <div>
                    <label for="">Email</label> <br>
                    <input type="text" name="email" value="{{ $updatestatus == true ? $staffdata->email : '' }}">
                </div>
            </div>
            {{-- <img src="{{asset('image/admin/staffinfo/' .$staffdata->image)}}"/> --}}

            <div class="profile-bottom">

                <div class="profile-img">
                    <label for="">Profile</label>
                    <div class="profile-img-inner">
                        <img src="icons/sample_image.png" alt="">
                        <div class="browse-img">
                            <input type="file" name="image" id="file" accept="image/*">
                            {{-- <img src="{{asset('image/admin/staffinfo/' .$staffdata->image)}}"  width="50" height="50"/> --}}

                            <label for="file">Browse Image</label>
                        </div>
                    </div>

                </div>

                <div class="position">
                    <div class="position-inner">
                        <div>
                            <label for="">Position</label> <br>
                            <select name="role_id" id="">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
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
            <button class="cancle-btn"><a href="{{ route('StaffList') }}">Cancel</a></button>
            <button class="publish-btn" type="submit">{{ $updatestatus == true ? 'Update' : 'Add' }}</button>
        </div>
    </form>
@endsection
@section('js')
@endsection
