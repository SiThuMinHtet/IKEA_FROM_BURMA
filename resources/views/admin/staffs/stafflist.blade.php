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
                        Email
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        Age
                    </th>
                    <th>
                        Phone
                    </th>
                    <th>
                        Roles
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                @foreach ($stafflist as $staff)
                    <tr>
                        <td>
                            <input type="checkbox">
                        </td>
                        <td>
                            {{ $staff->id }}
                        </td>
                        <td>
                            {{ $staff->name }}
                        </td>
                        <td>
                            {{ $staff->email }}
                        </td>
                        <td>
                            {{ $staff->address }}
                        </td>
                        <td>
                            {{ $staff->age }}
                        </td>
                        <td>
                            {{ $staff->phone }}
                        </td>
                        <td>
                            {{ $staff->rolename }}
                        </td>
                        <td>
                            {{ $staff->image }}
                        </td>
                        <td>
                            {{ $staff->status }}
                        </td>
                        <td class="action">
                            <a href="{{ route('staff.edit') }}"><img src="{{ asset('image/admin/icons/action.png') }}"
                                    alt=""></a> |
                            <a href=""><img src="{{ asset('image/admin/icons/bin.png') }}" alt=""></a>
                        </td>
                    </tr>
                @endforeach


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
