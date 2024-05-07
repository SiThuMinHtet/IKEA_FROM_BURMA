@extends('layouts.AdminLayout')
@section('title')
    Order Management
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/order_list.css') }}">
@endsection
@section('header')
    Order Management
@endsection

@section('content')
    <div class="date-search-sort">

        <div class="date">
            <p>01/01/2023 - 01/01/2024</p> <img src="{{ asset('image/admin/icons/calendar.png') }}" alt="">
        </div>

        <div class="search-sort">
            <div class="search">
                <input type="text" placeholder="Search...">
                <img src="{{ asset('image/admin/icons/search.png') }}" alt="">
            </div>
            <div class="sort">
                <select name="" id="">
                    <option value="">Status</option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
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

    <div class="order-card-container">
        <div class="order-card order-delivered">
            <p>Orders Delivered <br> 648 K </p>
            <img src="{{ asset('image/admin/icons/check_button.png') }}" alt="">
        </div>

        <div class="order-card order-pending">
            <p>Orders Pending <br> 650</p>
            <img src="{{ asset('image/admin/icons/check_button.png') }}" alt="">
        </div>

        <div class="order-card order-cancle">
            <p>Orders Cancel <br> 56 </p>
            <img src="{{ asset('image/admin/icons/check_button.png') }}" alt="">
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
                        Product Name
                    </th>
                    <th>
                        Order ID
                    </th>

                    <th>
                        Date
                    </th>
                    <th>
                        Customer Name
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Amount
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
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot">
                        <span></span>
                        Delivered
                    </td>
                    <td>
                        250,000 MMK
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot dot-orange">
                        <span></span>
                        Pending
                    </td>
                    <td>
                        250,000 MMK
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot dot-orange">
                        <span></span>
                        Pending
                    </td>
                    <td>
                        250,000 MMK
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot">
                        <span></span>
                        Delivered
                    </td>
                    <td>
                        250,000 MMK
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot dot-orange">
                        <span></span>
                        Pending
                    </td>
                    <td>
                        250,000 MMK
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot dot-red">
                        <span></span>
                        Cancled
                    </td>
                    <td>
                        250,000 MMK
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        Modern Sofa
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        Sofia Mia
                    </td>
                    <td class="status-dot">
                        <span></span>
                        Delivered
                    </td>
                    <td>
                        250,000 MMK
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/icons/action.png') }}" alt="">
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
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
