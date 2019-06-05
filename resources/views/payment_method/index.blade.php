@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-deck">
            @foreach($paymentMethods as $paymentMethod)
                <div class="card">
                    <img class="card-img-top w-50 h-auto mx-auto" src="{{ asset('images/' . $paymentMethod->getImage()) }}" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $paymentMethod->getName() }}</h5>
                        <p class="card-text">{{ $paymentMethod->getDescription() }}</p>
                        <a href="
                        @switch($paymentMethod->getName())
                        @case('PayPal') {{ route('payment_method.paypal') }}
                        @break
                        @case('Carte Bancaire') {{ route('payment_method.credit_card') }}
                        @break
                        @case('Chèque') {{ route('payment_method.bill') }}
                        @break
                        @default #
                        @endswitch"
                           class="btn btn-success mt-auto">Choisir ce mode</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
