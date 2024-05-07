@extends('layouts.AdminLayout')
@section('title')
    Product Management
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/product_list.css') }}">
@endsection
@section('header')
    Product Management
@endsection

@section('content')
    <div class="product-mng-container">
        <div class="product-mng">
            <div class="product-mng-search">
                <input type="text" placeholder="Search...">
                <img src="{{ asset('image/admin/icons/search.png') }}" alt="">
            </div>

            <div class="new-product-btn">
                <button><a href="{{route('ProductCreate')}}">New Product</a> <img src="icons/new_product.png" alt=""></button>
            </div>
        </div>

        <div class="product_table">
            <table>
                <tr>
                    <th>
                        <input type="checkbox" name="" id="">
                    </th>
                    <th>
                        <img src="{{ asset('image/admin/icons/sample_image.png') }}" alt="">
                    </th>
                    <th>
                        ID
                    </th>
                    <th>
                        Product Name
                    </th>
                    <th>
                        Catagory
                    </th>
                    <th>
                        Description
                    </th>
                    <th>
                        Stock
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Date
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
                        <img src="{{ asset('image/admin/plush-paradise sofa.png') }}" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="icons/action.png" alt=""></a>
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/2024.png') }}" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="icons/action.png" alt=""></a>
                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="{{ asset('image/admin/20-410x492 1.png') }}" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="Images/2025.png" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="Images/2026.png" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="Images/2027.png" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="icons/action.png" alt=""></a>
                        <img src="icons/bin.png" alt="">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="checkbox" name="" id="">
                    </td>
                    <td>
                        <img src="Images/2028.png" alt="">
                    </td>
                    <td>
                        EE72823
                    </td>
                    <td>
                        Plus-Paradise Sofa
                    </td>
                    <td>
                        Sofa
                    </td>
                    <td id="description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </td>
                    <td>
                        In Stock
                    </td>
                    <td>
                        205
                    </td>
                    <td>
                        2023 Nov 22
                    </td>
                    <td>
                        <a href="Edit_product.html"><img src="icons/action.png" alt=""></a>
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
