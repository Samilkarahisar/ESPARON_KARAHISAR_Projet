@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/shopping_cart.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        @if(sizeof($orderProducts) > 0)
            <div id="shopping-cart">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div id="items">
                            @foreach ($orderProducts as $orderProduct)
                                <div class="row py-2 mb-2 product">
                                    <div class="col-md-3">
                                        <img class="img-fluid mx-auto d-block image" src="{{ $orderProduct->getProduct()->getImage() }}">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row info">
                                            <div class="col-md-5">
                                                <p class="lead">
                                                    <a href="{{ route('product.show', ['product' => $orderProduct->getProduct()->getId()]) }}">
                                                        {{ $orderProduct->getProduct()->getName() }}
                                                    </a>
                                                </p>
                                                <p class="mt-3">{{ $orderProduct->getProduct()->getDescription() }}</p>
                                            </div>
                                            <div class="col-md-3 quantity mb-4">
                                                <input id="quantity" class="form-control quantity-input" min="1" step="1"
                                                       data-priceunit="{{ $orderProduct->getProduct()->getPrice()  }}" name="{{ $orderProduct->getId() }}" type="number"
                                                       value="{{ $orderProduct->getQuantity() }}">
                                            </div>
                                            <div class="col-md-3 lead mb-4">
                                                <p>Total : </br><span class="total-price-product">{{ $orderProduct->getQuantity() * $orderProduct->getProduct()->getPrice() }}
                                                    </span> €</p>
                                                <small class="text-muted">(P.U : {{ $orderProduct->getProduct()->getPrice() }} €)</small>
                                            </div>
                                            <div class="col-md-1">
                                                <button data-id="{{ $orderProduct->getId() }}" data-href="{{ route('shopping_cart.delete') }}" type="button" class="btn delete-btn">
                                                    <i class="fas fa-trash fa-lg" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary p-4">
                            <p class="h4 py-2 text-center font">Résumé de la commande</p>
                            <div class="summary-item"><span class="font-weight-bold">Sous-total</span><span id="total-order" class="float-right">{{ $totalOrder }} €</span></div>
                            <div class="summary-item"><span class="font-weight-bold">Réduction</span><span class="float-right">0 €</span></div>
                            <div class="summary-item"><span class="font-weight-bold">Livraison</span><span class="float-right">0 €</span></div>
                            <div class="summary-item my-3"><span class="font-weight-bold">Total</span><span id="full-total-order" class="float-right">{{ $totalOrder }} €</span></div>
                            <a role="button" href="{{ route('client.fill_addresses') }}" class="btn btn-primary btn-lg btn-block mt-5">Valider le panier <i class="fas fa-check ml-3"></i></a>
                            <button id="update-btn" type="button" class="btn btn-secondary btn-lg btn-block mt-2" data-href="{{ route('shopping_cart.update') }}">
                                Mettre à jour le panier<i class="fas fa-pen ml-3"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center mt-5">
                <h1>Votre panier est vide !</h1>
                <div class="lead my-4">
                    @if (Auth::user())
                        Consultez nos articles.
                    @else
                        Consultez nos articles, en vous connectant ou non.
                    @endif
                </div>
                <div class="error-actions">
                    <a href="{{ route('welcome') }}" class="btn btn-primary btn-lg mr-2"><i class="fa fa-home mr-2"></i>Page d'accueil</a>
                    @if (Auth::guest())
                        <a href="{{ route('login') }}" class="btn btn-success btn-lg"><i class="fa fa-user mr-2"></i>Connexion</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/bag.js') }} " defer></script>
@endsection
