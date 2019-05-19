@extends('layouts.app')

@section('content')
    <div class="container dark-grey-text">
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="{{ $product->getImage() }}" class="img-fluid border" alt="Image produit">
            </div>
            <div class="col-md-6 mb-4">
                <div class="p-4">
                    <div class="mb-3">
                        <span class="badge badge-pill badge-dark mr-1">{{ $product->getProductCategory()->getName() }}</span>
                    </div>
                    <p class="lead font-weight-bold">{{ $product->getName() }}</p>
                    <p class="lead">{{ $product->getPrice() }} €</p>
                    <p class="lead font-weight-bold">Description</p>
                    <p>{{ $product->getDescription() }}</p>
                    <div class="d-flex justify-content-left">
                        <input id="quantity-input" type="number" value="1" min="1" class="form-control w-25 mr-2">
                        <button id="add-to-bag-btn" data-productid="{{ $product->getId() }}" data-href="{{ route('shopping_cart.add') }}"
                                class="btn btn-primary">Ajouter au panier
                            <i class="fas fa-shopping-cart ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (sizeof($sameCategoryProducts) === 3)
        <hr>
        <div class="row d-flex justify-content-center wow fadeIn">
            <div class="col-md-6 text-center">
                <h4 class="my-4 h4">Dans la même catégorie</h4>
            </div>
            <div class="row wow fadeIn">
                @foreach($sameCategoryProducts as $sameCategoryProduct)
                    <div class="col-lg-4 col-md-12 mb-4">
                        <a href="{{ route('product.show', ['productId' => $sameCategoryProduct->getId()]) }}">
                            <img src="{{ $sameCategoryProduct->getImage() }}" class="img-fluid" alt="Image Produit">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection

@section('js')
    <script src="{{ asset('js/product.js') }} " defer></script>
@endsection