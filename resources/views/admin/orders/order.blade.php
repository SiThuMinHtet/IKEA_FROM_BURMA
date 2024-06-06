@extends('layouts.AdminLayout')
@section('title')
    Order Management
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/order_list.css') }}">
    <style>
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.264);
            /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            border-radius: 10px;
            margin: auto;
            padding: 10px 50px;
            border: 1px solid #888;
            width: 20%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .update_status {
            margin: 20px 0px;
            height: 30px;
            border-radius: 5px;
        }
    </style>
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
            <p>Orders Delivered <br> {{ $delivered }}</p>
            <img src="{{ asset('image/admin/icons/check_button.png') }}" alt="">
        </div>

        <div class="order-card order-pending">
            <p>Orders Pending <br> {{ $pending }}</p>
            <img src="{{ asset('image/admin/icons/check_button.png') }}" alt="">
        </div>

        <div class="order-card order-cancle">
            <p>Orders Proccessing <br> {{ $processing }} </p>
            <img src="{{ asset('image/admin/icons/check_button.png') }}" alt="">
        </div>
    </div>

    <div class="customer">
        <h3>Customers</h3>

        <div class="customer-table">
            <table>
                <tr>
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
                @foreach ($orderlist as $item)
                    <tr>
                        <td>
                            {{ $item->productname }}
                        </td>
                        <td>
                            {{ $item->order_id }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            {{ $item->customername }}
                        </td>
                        <td>
                            {{ $item->status }}
                        </td>
                        <td>
                            {{ $item->price }}
                        </td>
                        <td>
                            <button class="editStatusBtn" data-order-id="{{ $item->id }}"
                                data-order-status="{{ $item->status }}"><img
                                    src="{{ asset('image/admin/icons/action.png') }}" alt=""></button>
                        </td>
                    </tr>
                @endforeach

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

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="flex_row" style="justify-content: space-between;">
                <h3>Update Status</h3>
                <span class="close">&times;</span>
            </div>
            {{-- <div style="font-size: 14px;">
                <p><b>Pending</b> - Customer ordered items and haven't checked by the admins</p>
                <p><b>Processing</b> - Order has been checked and start delivering</p>
                <p><b>Delivered</b> - Order had been reached to customer</p>
            </div> --}}
            <form action="{{ route('updateOrderstatus') }}" method="post" class="updatestatusform">
                @csrf
                <input type="hidden" name="order_id" id="modal_order_id">
                <div class="flex_row">
                    <label for="update_status"><b>Change:</b></label>
                    <select name="update_status" id="update_status" class="update_status">
                        <option value="Pending">Pending</option>
                        <option value="Processing">Processing</option>
                        <option value="Delivered">Delivered</option>
                    </select>
                </div>
                <div class="flex_row" style="justify-content: flex-end">
                    <button type="submit" class="change_button">Change</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var modal = document.getElementById("myModal");
            var span = document.getElementsByClassName("close")[0];
            var editButtons = document.querySelectorAll('.editStatusBtn');
            var orderIdInput = document.getElementById('modal_order_id');
            var statusSelect = document.getElementById('update_status');

            editButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var orderId = this.getAttribute('data-order-id');
                    var currentStatus = this.getAttribute('data-order-status');

                    orderIdInput.value = orderId;
                    statusSelect.value = currentStatus;
                    modal.style.display = "block";
                });
            });

            span.onclick = function() {
                modal.style.display = "none";
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
@endsection

@section('js')
@endsection
