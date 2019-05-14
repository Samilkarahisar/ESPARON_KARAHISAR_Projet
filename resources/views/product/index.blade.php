@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="{{ $product->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{ $product->name }}</h5>
                            <a href="{{ route('product.show', ['product' => $product]) }}" class="stretched-link"></a>
                            <p class="text-right">{{ $product->price }} €</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
