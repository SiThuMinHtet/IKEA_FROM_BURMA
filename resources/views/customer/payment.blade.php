@extends('layouts.CustomerLayout')

<link rel="stylesheet" href="{{ asset('css/customer/home.css') }}" />
<link rel="stylesheet" href="{{ asset('css/customer/payment.css') }}" />

@section('content')
    <div class="container">
        <div class="inner_container">
            <h2>Payment Information</h2>
            <div>
                <form action="{{ route('checkout.process') }}" method="POST" id="payment-form">
                    @csrf
                    <div class="form-group">

                            <label for="card-element">Credit or Debit Card</label>
                            <div id="card-element" class="form-control"></div>
                        
                            <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                        
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Submit Payment</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var stripe = Stripe('{{ env('STRIPE_KEY') }}');
            var elements = stripe.elements();
            var card = elements.create('card');
            card.mount('#card-element');

            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    </script>
    <script src="https://js.stripe.com/v3/"></script>
@endsection
