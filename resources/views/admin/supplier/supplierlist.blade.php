{{-- test page --}}
@extends('layouts.AdminLayout')
@section('title')
    Supplier
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/category.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@endsection

@section('header')
    Supplier
@endsection

@section('content')
    <div class="container">

        <div class="btn">
            <a class="button-link" href="{{ route('Supplier.Create') }}">Supplier Create</a>
        </div>

        <div class="table_container">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                @foreach ($supplier_data as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->phone }}</td>
                        <td><img style="max-width: 100px; max-height:100px"
                                src="{{ asset('image/admin/supplierinfo/' . $item->image) }}" alt=""></td>
                        <td>
                            <div class="action">
                                <div>
                                    <a href="{{ url('/admin/supplier/edit/' . $item->id) }}"><img
                                            src="{{ asset('image/admin/icons/action.png') }}" alt=""></a>
                                </div>
                                |
                                <div>
                                    <a href="{{ url('/admin/supplier/delete/' . $item->id) }}"><img
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
