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
            <div class="customer_search">
                <form action="{{ route('CustomerSearch') }}" method="POST">
                    @csrf
                    <input name="search" type="text" placeholder="Search...">
                    <button type="submit">Search</button>
                    <img src="icons/search.png" alt="">
                </form>
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
                        Id
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
                        Address
                    </th>
                    <th>
                        Joinging Date
                    </th>
                    <th>
                        Action
                    </th>
                </tr>

                @foreach ($customerlist as $customer)
                    <tr>
                        <td>
                            <input type="checkbox" name="" id="">
                        </td>
                        <td>
                            {{ $customer->id }}
                        </td>
                        <td class="customer_name">
                            <div>
                                <img style="max-height: 80px; max-width: 80px;"
                                    src="{{ asset('image/customer/customerinfo/' . $customer->image) }}" />
                            </div>
                            <div>
                                {{ $customer->name }}
                            </div>

                        </td>
                        <td>
                            {{ $customer->email }}
                        </td>
                        <td>
                            {{ $customer->phone }}
                        </td>
                        <td>
                            {{ $customer->address }}
                        </td>
                        <td>
                            {{ $customer->joining_date }}
                        </td>


                        <td class="action">
                            <div>
                                <div>
                                    @if (auth('admin')->user()->role_id == 3)
                                        <img src="{{ asset('image/admin/icons/bin.png') }}" alt="" disabled>
                                    @else
                                        <a href="{{ url('/admin/customerlist/delete/' . $customer->id) }}"><img
                                                src="{{ asset('image/admin/icons/bin.png') }}" alt=""></a>
                                    @endif

                                </div>
                            </div>


                        </td>
                    </tr>
                @endforeach


            </table>
        </div>

    </div>
    <div class="Pagination">
        {{ $customerlist->links('pagination::bootstrap-4') }}
    </div>
@endsection

@section('js')
@endsection
