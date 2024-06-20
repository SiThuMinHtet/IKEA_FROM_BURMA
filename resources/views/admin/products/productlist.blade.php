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
            <div class="product_search">
                <form action="{{ route('ProductSearch') }}" method="GET">
                    <input name="search" type="text" placeholder="Search">
                    <button type="submit">Search</button>
                </form>
            </div>
            <div class="date">
                <form action="{{ route('ProductDatefilter') }}" method="GET">
                    <input name="start_date" type="date">
                    <input name="end_date" type="date">
                    <button type="submit">Filter</button>
                </form>
            </div>

            <div class="new-product-btn">
                <button><a href="{{ route('ProductCreate') }}">New Product</a> <img src="icons/new_product.png"
                        alt=""></button>
            </div>
        </div>

        <div class="product_table">
            <table>
                <tr>
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
                        Action
                    </th>
                </tr>
                @foreach ($productlist as $product)
                    <tr>
                        <td>
                            <img src="{{ asset('img/products/' . $product->image) }}" alt=""
                                style="max-width: 70px; max-height: 70px">
                        </td>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <div class="action">
                                <div>
                                    <a href="{{ url('/admin/product/edit/' . $product->id) }}"><img
                                            src="{{ asset('image/admin/icons/action.png') }}" alt=""></a>
                                </div>
                                |
                                <div>
                                    <a href="{{ url('/admin/product/delete/' . $product->id) }}"><img
                                            src="{{ asset('image/admin/icons/bin.png') }}" alt=""></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>


    </div>

    <div class="Pagination">
        {{ $productlist->appends(['search' => request('search'), 'start_date' => request('start_date'), 'end_date' => request('end_date')])->links('pagination::bootstrap-4') }}
    </div>
@endsection

@section('js')
@endsection
