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
            <form action="{{ route('StaffListDateFilter') }}" method="GET">
                <input type="date" name="start_date">
                <input type="date" name="end_date">
                <button type="submit">Filter</button>
            </form>
        </div>

        <div class="search-sort">
            <form action="{{ route('StaffSearch') }}" method="GET">

                <div class="search">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit">Search</button>
                    <img src="icons/search.png" alt="">
                </div>
            </form>


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
                        <td class="staff_name">
                            <div>
                                <img style="max-height: 80px; max-width: 100px;"
                                    src="{{ asset('image/admin/staffinfo/' . $staff->image) }}" />
                            </div>
                            <div>
                                {{ $staff->name }}
                            </div>
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
                            {{ $staff->status }}
                        </td>
                        <td class="action">
                            <div>
                                <div>
                                    <a href="{{ url('/admin/staffedit/' . $staff->id) }}"><img
                                            src="{{ asset('image/admin/icons/action.png') }}" alt=""></a>
                                </div>
                                |
                                <div>
                                    <a href="{{ url('/admin/stafflist/delete/' . $staff->id) }}"><img
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
        {{ $stafflist->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
    </div>
@endsection

@section('js')
@endsection
