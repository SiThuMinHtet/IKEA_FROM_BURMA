@extends('layouts.AdminLayout')

{{-- @dd($product_image[0]->image); --}}
{{-- @dd($product_data); --}}
@php
    $updateStatus = false;
    if (isset($product_data)) {
        $updateStatus = true;
    }
@endphp

@section('title')
    {{ $updateStatus == true ? 'Edit' : 'Add' }} Product
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/product_add.css') }}">
@endsection
@section('header')
    {{ $updateStatus == true ? 'Edit' : 'Add' }} Product
@endsection

@section('content')
    <div class="add-product-container">

        <!-- add-image -->
        <form action="{{ $updateStatus == true ? route('ProductEditProcess') : route('ProductCreateProcess') }}"
            method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="{{ $updateStatus == true ? $product_data->id : '' }}">
            @csrf
            @if ($updateStatus == true)
                @method('PATCH')
            @endif
            <div class="add-image-container">

                <div class="product-detail">
                    <div class="image">
                        @if ($updateStatus == true)
                            <img style="max-width: 100px; max-height:100px"
                                src="{{ asset('img/products/' . $product_image[0]->image) }}" alt="">
                        @else
                            <input type="file" name="image[]">
                        @endif

                    </div>
                    <div class="input product-name">
                        <label for="name">Product Name</label>
                        <input id="name" type="text" name="name"
                            value="{{ $updateStatus == true ? $product_data->name : '' }}">
                    </div>
                    <div class="input">
                        <label for="catagory">Catagory</label>
                        <select name="category" id="category" class="category">

                            @foreach ($categorylist as $category)
                                <option value="{{ $category->id }}"
                                    @isset($product_data){{ $product_data->category_id === $category->id ? 'selected' : '' }}
                                    @endisset>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- tesing --}}
                    <div class="input">
                        <label for="code">Product Code</label>
                        <select name="code" id="code" class="code">
                            <option value="codeid">Select Code</option>
                            @foreach ($codelist as $code)
                                <option value="{{ $code->id }}"
                                    @isset($product_data)
                                      
                                   {{ $product_data->code_id === $code->id ? 'selected' : '' }} @endisset>
                                    {{ $code->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input">
                        <label for="supplier">Supplier</label>
                        <select name="supplier" class="supplier">
                            @foreach ($supplierlist as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="input stock">
                        <label for="stock">Stock</label>
                        <input id="stock" type="text" name="stock"
                            value="{{ $updateStatus == true ? $product_data->stock : '' }}">
                    </div>



                    <div class="input price">
                        <label for="price">Price</label>
                        <input id="price" type="text" name="price"
                            value="{{ $updateStatus == true ? $product_data->price : '' }}">
                    </div>
                    <div class="input Description">
                        <label for="description">Description</label>
                        <textarea id="description" name="description">{{ $updateStatus == true ? $product_data->description : '' }}</textarea>
                    </div>
                    <div class="add-product-btn">
                        <button class="cancle-btn">Cancle</button>
                        <button class="publish-btn" type="submit">Publish Product</button>
                    </div>

                </div>

            </div>

    </div>


    </form>
@endsection

@section('js')
@endsection
