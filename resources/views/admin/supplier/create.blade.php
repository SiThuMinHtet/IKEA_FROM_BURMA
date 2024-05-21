@extends('layouts.AdminLayout')

@php
    $updateStatus = false;
    if (isset($supplier_data)) {
        $updateStatus = true;
    }
@endphp

@section('title')
    {{ $updateStatus == true ? 'Edit' : 'Add' }} Supplier
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/product_add.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/category.css') }}">
@endsection
@section('header')
    {{ $updateStatus == true ? 'Edit' : 'Add' }} Supplier
@endsection

@section('content')
    <div class="add-product-container">

        <!-- add-image -->
        <form action="{{ $updateStatus == true ? route('SupplierEditProcess') : route('SupplierCreateProcess') }}"
            method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="{{ $updateStatus == true ? $supplier_data->id : '' }}">
            @csrf
            @if ($updateStatus == true)
                @method('PATCH')
            @endif
            <div class="add-image-container">

                <div class="product-detail">

                    <div class="input product-name">
                        <label for="name">Supplier Name</label>
                        <input id="name" type="text" name="name"
                            value="{{ $updateStatus == true ? $supplier_data->name : '' }}">
                    </div>

                    <div class="input email">
                        <label for="email">Email</label>
                        <input id="email" type="text" name="email"
                            value="{{ $updateStatus == true ? $supplier_data->email : '' }}">
                    </div>
                    <div class="input Address">
                        <label for="address">Address</label>
                        <input id="address" type="text" name="address"
                            value="{{ $updateStatus == true ? $supplier_data->address : '' }}">
                    </div>
                    <div class="input phone">
                        <label for="phone">Phone</label>
                        <input id="phone" type="text" name="phone"
                            value="{{ $updateStatus == true ? $supplier_data->phone : '' }}">
                    </div>
                    <div>
                        <label for="image">Image</label>
                        <input type="file" name="image">
                    </div>

                    <div class="add-product-btn">

                        <div class="btn">
                            <button class="button-link"
                                type="submit">{{ $updateStatus == true ? 'Edit' : 'Add' }}</button>
                        </div>
                        <div class="btn">
                            <a class="button-link" href="{{ route('Supplier.List') }}">Cancel</a>
                        </div>

                    </div>

                </div>

            </div>

    </div>


    </form>
@endsection

@section('js')
@endsection
