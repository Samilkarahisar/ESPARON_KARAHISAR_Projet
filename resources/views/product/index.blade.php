@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card mb-3">
                        <img src="{{ asset('images/' . $product->getImage()) }}" class="card-img-top" alt="Image produit">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $product->getName() }}</h5>
                            <a href="{{ route('product.show', ['product' => $product->getId()]) }}" class="stretched-link"></a>
                            <p class="text-right">{{ $product->getPrice() }} €</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
