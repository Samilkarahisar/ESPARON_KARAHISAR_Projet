@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-5">Informations sur votre carte bancaire</h2>
        <form method="POST" action="{{ route('payment_method.success') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Nom sur la carte</label>
                    <input type="text" class="form-control" required>
                    <small class="text-muted">Full name as displayed on card</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Numéro de carte</label>
                    <input type="text" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">Expiration</label>
                    <input type="text" class="form-control" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cc-expiration">CVV</label>
                    <input type="text" class="form-control" required>
                </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Valider le paiement</button>
        </form>
    </div>
@endsection