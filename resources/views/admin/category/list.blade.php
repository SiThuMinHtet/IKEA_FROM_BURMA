@extends('layouts.AdminLayout')
@section('title')
    Category
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@endsection

@section('header')
    Category
@endsection

@section('content')
    <div class="container">

        <div class="btn">
            <a href="{{ route('CategoryCreate') }}" class="button-link">New Category</a>
        </div>

        <div class="table_container">
            <table>
                <tr>
                    <th>
                        Category Name
                    </th>
                    <th>
                        Admin Name
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td>
                            <img style="max-height: 50px; max-width: 80px;"
                                src="{{ asset('image/admin/categoryinfo/' . $category->image) }}" />
                        </td>
                        <td>
                            {{ auth('admin')->user()->name }}
                        </td>
                        <td>
                            <div class="action">
                                <div>
                                    <a href="{{ route('CategoryEdit', $category->id) }}"><img
                                            src="{{ asset('image/admin/icons/action.png') }}" alt=""></a>
                                </div>
                                |
                                <div>
                                    <a href="{{ route('CategoryDelete', $category->id) }}"><img
                                            src="{{ asset('image/admin/icons/bin.png') }}" alt=""></a>
                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </table>

        </div>

    </div>
@endsection
