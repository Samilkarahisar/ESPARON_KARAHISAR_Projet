@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')
    <img id="welcome-image" src="{{ asset('images/welcome.jpg') }}" class="img-fluid" alt="Image femme">
    <div class="container mt-5">
        <h3 class="text-center mb-5">Quelques produits</h3>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card mb-3">
                        <img src="{{ asset('images/' . $product->getImage()) }}" class="card-img-top" alt="Image produit">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $product->getPrice() }} €</h5>
                            <a href="{{ route('product.show', ['product' => $product->getId()]) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

