
@extends('layouts.AdminLayout')
@section('title')
    Customer Management
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/customer_list.css') }}">
@endsection
@section('header')
    Customer Management
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
        <h3>Customers</h3>

        <div class="customer-table">
            <table>
                <tr>
                    <th>
                        <input type="checkbox" name="" id="">
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Phone
                    </th>
                    <th>
                        Joinging Date
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Sebastian Patterson
                    </td>
                    <td>
                        Sebastian Patterson@teleworm.us
                    </td>
                    <td>
                        918-743-7787
                    </td>
                    <td>
                        Nov 30 2023
                    </td>
                    <td>
                        <img src="icons/action.png" alt="">
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
