@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::open(array('route' => 'client.post_fill_addresses')) }}
        <h3>Adresse de livraison</h3>
        <hr>

        <div class="form-row mt-4">
            <div class="form-group col-md-6">
                {{ Form::label('shipping_address[first_name]', 'Prénom', array('class' => 'form-label')) }}
                {{ Form::text('shipping_address[first_name]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Prénom')) }}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('shipping_address[last_name]', 'Nom', array('class' => 'form-label')) }}
                {{ Form::text('shipping_address[last_name]', null,array('class' => 'form-control', 'required' => true, 'placeholder' => 'Nom')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('shipping_address[street_1]', 'Adresse 1', array('class' => 'form-label')) }}
            {{ Form::text('shipping_address[street_1]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => '14 rue Colin')) }}
        </div>
        <div class="form-group">
            {{ Form::label('shipping_address[street_2]', 'Adresse 2', array('class' => 'form-label')) }}
            {{ Form::text('shipping_address[street_2]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Appartement, studio...')) }}
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {{ Form::label('shipping_address[city]', 'Ville', array('class' => 'form-label')) }}
                {{ Form::text('shipping_address[city]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Ville')) }}
            </div>
            <div class="form-group col-md-2">
                {{ Form::label('shipping_address[zip_code]', 'Code postal', array('class' => 'form-label')) }}
                {{ Form::text('shipping_address[zip_code]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Code postal')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('shipping_address[country]', 'Pays', array('class' => 'form-label')) }}
                {{ Form::text('shipping_address[country]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Pays')) }}
            </div>
        </div>

        <h3 class="mt-3">Adresse de facturation</h3>
        <hr>

        <div class="form-row mt-4">
            <div class="form-group col-md-6">
                {{ Form::label('billing_address[first_name]', 'Prénom', array('class' => 'form-label')) }}
                {{ Form::text('billing_address[first_name]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Prénom')) }}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('billing_address[last_name]', 'Nom', array('class' => 'form-label')) }}
                {{ Form::text('billing_address[last_name]', null,array('class' => 'form-control', 'required' => true, 'placeholder' => 'Nom')) }}
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('billing_address[street_1]', 'Adresse 1', array('class' => 'form-label')) }}
            {{ Form::text('billing_address[street_1]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => '14 rue Colin')) }}
        </div>
        <div class="form-group">
            {{ Form::label('billing_address[street_2]', 'Adresse 2', array('class' => 'form-label')) }}
            {{ Form::text('billing_address[street_2]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Appartement, studio...')) }}
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {{ Form::label('billing_address[city]', 'Ville', array('class' => 'form-label')) }}
                {{ Form::text('billing_address[city]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Ville')) }}
            </div>
            <div class="form-group col-md-2">
                {{ Form::label('billing_address[zip_code]', 'Code postal', array('class' => 'form-label')) }}
                {{ Form::text('billing_address[zip_code]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Code postal')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('billing_address[country]', 'Pays', array('class' => 'form-label')) }}
                {{ Form::text('billing_address[country]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Pays')) }}
            </div>
        </div>

        <button type="submit" class="btn btn-primary my-4 float-right">
            Passer au paiement
        </button>

        {{ Form::close() }}
    </div>
@endsection
