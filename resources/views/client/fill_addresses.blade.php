@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/toggle_switch.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        {{ Form::open(array('route' => 'client.post_fill_addresses')) }}
        <h3>Adresse de livraison</h3>
        <hr>

        <div id="shipping-part">
            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    {{ Form::label('shipping_address[first_name]', 'Prénom', array('class' => 'form-label')) }}
                    {{ Form::text('shipping_address[first_name]', null, array('id' => 'shipping_address_first_name', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Prénom')) }}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('shipping_address[last_name]', 'Nom', array('class' => 'form-label')) }}
                    {{ Form::text('shipping_address[last_name]', null, array('id' => 'shipping_address_last_name', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Nom')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('shipping_address[street_1]', 'Adresse 1', array('class' => 'form-label')) }}
                {{ Form::text('shipping_address[street_1]', null, array('id' => 'shipping_address_street_1', 'class' => 'form-control', 'required' => true, 'placeholder' => '14 rue Colin')) }}
            </div>
            <div class="form-group">
                {{ Form::label('shipping_address[street_2]', 'Adresse 2', array('class' => 'form-label')) }}
                {{ Form::text('shipping_address[street_2]', null, array('id' => 'shipping_address_street_2', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Appartement, studio...')) }}
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    {{ Form::label('shipping_address[city]', 'Ville', array('class' => 'form-label')) }}
                    {{ Form::text('shipping_address[city]', null, array('id' => 'shipping_address_city', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Ville')) }}
                </div>
                <div class="form-group col-md-2">
                    {{ Form::label('shipping_address[zip_code]', 'Code postal', array('class' => 'form-label')) }}
                    {{ Form::text('shipping_address[zip_code]', null, array('id' => 'shipping_address_zip_code', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Code postal')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('shipping_address[country]', 'Pays', array('class' => 'form-label')) }}
                    {{ Form::text('shipping_address[country]', null, array('id' => 'shipping_address_country', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Pays')) }}
                </div>
            </div>
        </div>

        @if(Auth::user())
            <div>
                <label class="switch">
                    <input id="use-address-shipping-checkbox" data-href="{{ route('client.use_address') }}" type="checkbox">
                    <span class="slider"></span>
                </label>
                <span>Utiliser votre adresse</span>
            </div>
        @endif

        <h3 class="mt-5">Adresse de facturation</h3>
        <hr>
        <div id="billing-part">
            <div class="form-row mt-4">
                <div class="form-group col-md-6">
                    {{ Form::label('billing_address[first_name]', 'Prénom', array('class' => 'form-label')) }}
                    {{ Form::text('billing_address[first_name]', null, array('id' => 'billing_address_first_name', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Prénom')) }}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('billing_address[last_name]', 'Nom', array('class' => 'form-label')) }}
                    {{ Form::text('billing_address[last_name]', null, array('id' => 'billing_address_last_name', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Nom')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('billing_address[street_1]', 'Adresse 1', array('class' => 'form-label')) }}
                {{ Form::text('billing_address[street_1]', null, array('id' => 'billing_address_street_1', 'class' => 'form-control', 'required' => true, 'placeholder' => '14 rue Colin')) }}
            </div>
            <div class="form-group">
                {{ Form::label('billing_address[street_2]', 'Adresse 2', array('class' => 'form-label')) }}
                {{ Form::text('billing_address[street_2]', null, array('id' => 'billing_address_street_2', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Appartement, studio...')) }}
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    {{ Form::label('billing_address[city]', 'Ville', array('class' => 'form-label')) }}
                    {{ Form::text('billing_address[city]', null, array('id' => 'billing_address_city', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Ville')) }}
                </div>
                <div class="form-group col-md-2">
                    {{ Form::label('billing_address[zip_code]', 'Code postal', array('class' => 'form-label')) }}
                    {{ Form::text('billing_address[zip_code]', null, array('id' => 'billing_address_zip_code', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Code postal')) }}
                </div>
                <div class="form-group col-md-4">
                    {{ Form::label('billing_address[country]', 'Pays', array('class' => 'form-label')) }}
                    {{ Form::text('billing_address[country]', null, array('id' => 'billing_address_country', 'class' => 'form-control', 'required' => true, 'placeholder' => 'Pays')) }}
                </div>
            </div>
        </div>

        <div id="same-address-checkbox-container">
            <label class="switch">
                <input id="same-address-checkbox" type="checkbox">
                <span class="slider"></span>
            </label>
            <span>Identique à l'adresse de livraison</span>
        </div>

        @if(Auth::user())
            <div id="use-address-billing-checkbox-container">
                <label class="switch">
                    <input id="use-address-billing-checkbox" data-href="{{ route('client.use_address') }}" type="checkbox">
                    <span class="slider"></span>
                </label>
                <span>Utiliser votre adresse</span>
            </div>
        @endif

        <button type="submit" class="btn btn-primary my-5 float-right">
            Passer au paiement
        </button>

        {{ Form::close() }}
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/fill_addresses.js') }} " defer></script>
@endsection