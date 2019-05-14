@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <p>{{ $product->name }}</p>
                    <p>{{ $product->description }}</p>
                    <p>{{ $product->price }} €</p>
                </div>
                <button id="add-to-bag-btn" data-productid="{{ $product->id }}"
                        data-href="{{ route('shopping_bag.add') }}" type="button" class="btn btn-info">Ajouter au panier</button>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/product.js') }} " defer></script>
@endsection