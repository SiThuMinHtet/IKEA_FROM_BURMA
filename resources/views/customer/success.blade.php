@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Order Success</h2>
        <p>Your order has been placed successfully!</p>
        <a href="{{ route('Shop') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
@endsection
