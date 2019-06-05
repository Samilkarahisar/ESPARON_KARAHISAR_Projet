@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        @if(!empty($orderProductsFiltered))
            <h5>Gestion des commandes</h5>
            <hr class="mb-5">
            <div id="accordion">
                @foreach ($orderProductsFiltered as $orderId => $orderProducts)
                    <div class="card">
                        <div class="card-header" id="heading{{ $orderId }}" data-toggle="collapse"
                             data-target="#collapse{{ $orderId }}" aria-expanded="false"
                             aria-controls="collapse{{ $orderId }}">
                            <h6 class="my-2">Commande n°{{ $orderId }}</h6>
                        </div>
                        <div id="collapse{{ $orderId }}" class="collapse"
                             aria-labelledby="heading{{ $orderId }}" data-parent="#accordion">
                            <div class="card-body">
                                @foreach ($orderProducts as $orderProduct)
                                    <div class="row">
                                        <div class="text-center col-12 col-sm-12 col-md-2">
                                            <img class="img-responsive" src="{{ asset('images/' . $orderProduct->getProduct()->getImage()) }}" alt="Produit">
                                        </div>
                                        <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6 mt-2">
                                            <h6>{{ $orderProduct->getProduct()->getName() }}</h6>
                                            <small>{{ $orderProduct->getProduct()->getDescription() }}</small>
                                        </div>
                                        <div class="row col-12 col-sm-12 text-sm-center col-md-4 text-md-right mt-2">
                                            <small>Prix unitaire : {{ $orderProduct->getProduct()->getPrice() }} €</small>
                                            <h6 class="col-3 col-sm-3 col-md-6 text-md-right">x{{ $orderProduct->getQuantity() }}</h6>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                                <div class="text-right">
                                    <small class="mt-2">Montant payé : <strong>{{ $orderProduct->getTotal() }} €</strong> (Type de paiement :
                                        <strong>{{ $orderProduct->getOrder()->getPaymentMethod()->getName() }}</strong>)</small>
                                </div>
                                <button data-id="{{ $orderId }}" data-url="{{ route('admin.confirm') }}" type="button" class="btn btn-success btn-sm float-right my-3 confirm-btn">
                                    Confirmer le paiement</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info" role="alert">
                Il n'y a aucune commande à traiter.
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/admin.js') }} " defer></script>
@endsection