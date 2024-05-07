@extends('layouts.AdminLayout')
@section('title')
    Staff Management
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/staff_list.css') }}">
@endsection
@section('header')
    Staff Management
@endsection

@section('content')
    <div class="date-search-sort">

        <div class="date">
            <p>01/01/2023 - 01/01/2024</p> <img src="icons/calendar.png" alt="">
        </div>

        <div class="search-sort">
            <div class="search">
                <input type="text" placeholder="Search...">
                <img src="icons/search.png" alt="">
            </div>

            <div class="sort">
                <select name="" id="">
                    <option value="">Default Sorting</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
            </div>
        </div>
    </div>

    <div class="customer">

        <div class="staff-list-head">
            <div>
                <h3>Staff List</h3>
            </div>

            <div class="new-staff-btn">
                <a href="{{ route('StaffCreate') }}"><button><img src="icons/new_product.png" alt="">New
                        Staff</button></a>
            </div>
        </div>



        <div class="customer-table">
            <table>
                <tr>
                    <th>
                        <input type="checkbox" name="" id="">
                    </th>
                    <th>
                        Staff ID
                    </th>
                    <th>
                        Staff Name
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Role(s)
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td data-label="Staff ID">
                        HFJ7784872
                    </td>
                    <td data-label="Staff Name">
                        Leronado Luris
                    </td>
                    <td data-label="Address">
                        331 Wright Court
                    </td>
                    <td data-label="Email">
                        leronado@gmail.com
                    </td>
                    <td data-label="Roles">
                        Super Admin
                        <img src="icons/drop_down.png" alt="">
                    </td>
                    <td data-label="Status" class="status status-1">
                        Active
                    </td>

                    <td data-label="Action">
                        <a href="edit_staff_user.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td data-label="Staff ID">
                        HFJ7784872
                    </td>
                    <td data-label="Staff Name">
                        Leronado Luris
                    </td>
                    <td data-label="Address">
                        331 Wright Court
                    </td>
                    <td data-label="Email">
                        leronado@gmail.com
                    </td>
                    <td data-label="Roles">
                        Super Admin
                        <img src="icons/drop_down.png" alt="">
                    </td>
                    <td data-label="Status" class="status status-2">
                        Inactive
                    </td>

                    <td data-label="Action">
                        <a href="edit_staff_user.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td data-label="Staff ID">
                        HFJ7784872
                    </td>
                    <td data-label="Staff Name">
                        Leronado Luris
                    </td>
                    <td data-label="Address">
                        331 Wright Court
                    </td>
                    <td data-label="Email">
                        leronado@gmail.com
                    </td>
                    <td data-label="Roles">
                        Super Admin
                        <img src="icons/drop_down.png" alt="">
                    </td>
                    <td data-label="Status" class="status status-3">
                        Suspended
                    </td>

                    <td data-label="Action">
                        <a href="edit_staff_user.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td data-label="Staff ID">
                        HFJ7784872
                    </td>
                    <td data-label="Staff Name">
                        Leronado Luris
                    </td>
                    <td data-label="Address">
                        331 Wright Court
                    </td>
                    <td data-label="Email">
                        leronado@gmail.com
                    </td>
                    <td data-label="Roles">
                        Super Admin
                        <img src="icons/drop_down.png" alt="">
                    </td>
                    <td data-label="Status" class="status status-4">
                        Active
                    </td>

                    <td data-label="Action">
                        <a href="edit_staff_user.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td data-label="Staff ID">
                        HFJ7784872
                    </td>
                    <td data-label="Staff Name">
                        Leronado Luris
                    </td>
                    <td data-label="Address">
                        331 Wright Court
                    </td>
                    <td data-label="Email">
                        leronado@gmail.com
                    </td>
                    <td data-label="Roles">
                        Super Admin
                        <img src="icons/drop_down.png" alt="">
                    </td>
                    <td data-label="Status" class="status status-5">
                        Active
                    </td>

                    <td data-label="Action">
                        <a href="edit_staff_user.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td data-label="Staff ID">
                        HFJ7784872
                    </td>
                    <td data-label="Staff Name">
                        Leronado Luris
                    </td>
                    <td data-label="Address">
                        331 Wright Court
                    </td>
                    <td data-label="Email">
                        leronado@gmail.com
                    </td>
                    <td data-label="Roles">
                        Super Admin
                        <img src="icons/drop_down.png" alt="">
                    </td>
                    <td data-label="Status" class="status status-6">
                        Active
                    </td>

                    <td data-label="Action">
                        <a href="edit_staff_user.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td data-label="Staff ID">
                        HFJ7784872
                    </td>
                    <td data-label="Staff Name">
                        Leronado Luris
                    </td>
                    <td data-label="Address">
                        331 Wright Court
                    </td>
                    <td data-label="Email">
                        leronado@gmail.com
                    </td>
                    <td data-label="Roles">
                        Super Admin
                        <img src="icons/drop_down.png" alt="">
                    </td>
                    <td data-label="Status" class="status status-7">
                        Active
                    </td>

                    <td data-label="Action">
                        <a href="edit_staff_user.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>

            </table>
        </div>
    </div>

    <div class="Pagination">
        <div>
            <i class="fa-solid fa-less-than"></i>
        </div>
        <div>
            1
        </div>
        <div id="blue">
            2
        </div>
        <div>
            <i class="fa-solid fa-greater-than"></i>
        </div>
    </div>
@endsection

@section('js')
@endsection
