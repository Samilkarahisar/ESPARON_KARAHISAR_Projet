@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card my-5">
                    <div class="card-body text-center">
                        <img class="w-25 mb-4" src="{{ asset('images/paypal-logo.png') }}" alt="Logo PayPal">
                        <form method="POST" action="{{ route('payment_method.paypal.success') }}">
                            @csrf
                            <div class="form-label-group">
                                <input type="email" class="form-control" name="email" required>

                            </div>
                            <div class="form-label-group mt-4 mb-3">
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block mt-5" type="submit">Payer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection