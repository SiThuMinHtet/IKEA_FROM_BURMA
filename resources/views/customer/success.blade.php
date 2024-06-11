@extends('layouts.CustomerLayout')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/customer/home.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/customer/success.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="inner_container">
            <div class="check">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <h2>Your Order is Completed!</h2>
            <p>Your order has been placed successfully!</p>
            <a href="{{ route('Shop') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    </div>
@endsection
