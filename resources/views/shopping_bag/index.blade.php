@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {!! Form::open(['id' => 'update-form']) !!}
                    @foreach ($products as $product)
                        <a href="{{ route('product', ['product' => $product]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $product->name }}</h5>
                                <p class="mb-1">{{ $product->price }}</p>
                            </div>
                        </a>
                        <div class="col-4 col-sm-4 col-md-4">
                            {!! Form::number($product->pivot->id, $product->pivot->quantity, array('class' => 'quantity-input', 'min' => 1, 'step' => 1, 'data-priceunit' => $product->price)) !!}
                        </div>
                        <div class="col-2 col-sm-2 col-md-2 text-right">
                            <button data-id="{{ $product->pivot->id }}" data-href="{{ route('shopping_bag.delete') }}" type="button" class="btn btn-outline-danger delete-btn">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                        <span class="total-price-product">{{ $product->pivot->quantity * $product->price }}</span>
                    @endforeach
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <button id="update-btn" type="button" class="btn btn-outline-info" data-href="{{ route('shopping_bag.update') }}">Mettre à jour le panier</button>
        <h6>Prix total : <span id="total-order">{{ $totalOrder }}</span></h6>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/bag.js') }} " defer></script>
@endsection
