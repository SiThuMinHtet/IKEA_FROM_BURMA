@extends('layouts.AdminLayout')

{{-- @dd($product_image); --}}
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
                    <div class="product_grid_1">
                        {{-- <div class="image">
                            @if ($updateStatus == true)
                                <img style="max-width: 100px; max-height:100px"
                                    src="{{ asset('img/products/' . $product_image[0]->image) }}" alt="">
                            @else
                                <label for="image">Image</label>
                                <input type="file" id="image" name="image[]" multiple>
                            @endif
                        </div> --}}
                        <div class="image">
                            <div id="existing-images" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                @if ($updateStatus == true && !empty($product_image))
                                    @foreach ($product_image as $image)
                                        <img style="max-width: 100px; max-height: 100px"
                                            src="{{ asset('img/products/' . $image->image) }}" alt="">
                                    @endforeach
                                @endif
                            </div>
                            <div id="image-preview" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                <!-- Preview of newly uploaded images will be displayed here -->
                            </div>

                            <label for="image">Upload Images</label>
                            <input type="file" id="image" name="image[]" multiple onchange="previewImages(event)">


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
                    </div>

                    <div class="product_grid_2">
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
    </div>


    </form>
@endsection

@section('js')
    <script>
        function previewImages(event) {
            const existingImagesContainer = document.getElementById('existing-images');
            const imagePreviewContainer = document.getElementById('image-preview');

            // Hide existing images
            existingImagesContainer.style.display = 'none';

            // Clear the previous previews
            imagePreviewContainer.innerHTML = "";

            const files = event.target.files;
            const maxFiles = 3;
            const filesToPreview = Array.from(files).slice(0, maxFiles); // Limit to 3 files

            filesToPreview.forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.style.maxWidth = '100px';
                    img.style.maxHeight = '100px';
                    img.src = e.target.result;
                    imagePreviewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            });

            // If more than 3 files are selected, show an alert
            if (files.length > maxFiles) {
                alert('You can only upload a maximum of 3 images.');
            }
        }
    </script>
@endsection
