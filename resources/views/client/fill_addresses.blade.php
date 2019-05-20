@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::open(array('route' => 'client.post_fill_addresses')) }}

        <h1>Adresse de livraison</h1>
        {{ Form::label('shipping_address[first_name]', 'Prénom', array('class' => 'col-md-4 col-form-label text-md-right')) }}

        <div class="col-md-6">
            {{ Form::text('shipping_address[first_name]', '',array('class' => 'form-control', 'required' => true, 'focus' => true)) }}
        </div>

        <div class="form-group row">
            {{ Form::label('shipping_address[last_name]', 'Nom', array('class' => 'col-md-4 col-form-label text-md-right')) }}

            <div class="col-md-6">
                {{ Form::text('shipping_address[last_name]', '',array('class' => 'form-control', 'required' => true, 'focus' => true)) }}
            </div>
        </div>

        {{ Form::label('shipping_address[street_1]', 'Street 1', array('class' => 'form-label')) }}
        {{ Form::text('shipping_address[street_1]') }}

        {{ Form::label('shipping_address[street_2]', 'Street 2', array('class' => 'form-label')) }}
        {{ Form::text('shipping_address[street_2]') }}

        {{ Form::label('shipping_address[street_3]', 'Street 3', array('class' => 'form-label')) }}
        {{ Form::text('shipping_address[street_3]') }}

        {{ Form::label('shipping_address[zip_code]', 'Code postal', array('class' => 'form-label')) }}
        {{ Form::text('shipping_address[zip_code]') }}

        {{ Form::label('shipping_address[city]', 'Ville', array('class' => 'form-label')) }}
        {{ Form::text('shipping_address[city]') }}

        {{ Form::label('shipping_address[country]', 'Pays', array('class' => 'form-label')) }}
        {{ Form::text('shipping_address[country]') }}

        <h1>Adresse de facturation</h1>
        {{ Form::label('billing_address[first_name]', 'Prénom', array('class' => 'col-md-4 col-form-label text-md-right')) }}

        <div class="col-md-6">
            {{ Form::text('billing_address[first_name]', '', array('class' => 'form-control', 'required' => true, 'focus' => true)) }}
        </div>

        <div class="form-group row">
            {{ Form::label('billing_address[last_name]', 'Nom', array('class' => 'col-md-4 col-form-label text-md-right')) }}

            <div class="col-md-6">
                {{ Form::text('billing_address[last_name]', '', array('class' => 'form-control', 'required' => true, 'focus' => true)) }}
            </div>
        </div>

        {{ Form::label('billing_address[street_1]', 'Street 1', array('class' => 'form-label')) }}
        {{ Form::text('billing_address[street_1]') }}

        {{ Form::label('billing_address[street_2]', 'Street 2', array('class' => 'form-label')) }}
        {{ Form::text('billing_address[street_2]') }}

        {{ Form::label('billing_address[street_3]', 'Street 3', array('class' => 'form-label')) }}
        {{ Form::text('billing_address[street_3]') }}

        {{ Form::label('billing_address[zip_code]', 'Code postal', array('class' => 'form-label')) }}
        {{ Form::text('billing_address[zip_code]') }}

        {{ Form::label('billing_address[city]', 'Ville', array('class' => 'form-label')) }}
        {{ Form::text('billing_address[city]') }}

        {{ Form::label('billing_address[country]', 'Pays', array('class' => 'form-label')) }}
        {{ Form::text('billing_address[country]') }}

        <button type="submit" class="btn btn-primary">
            Passer au paiement
        </button>

        {{ Form::close() }}
    </div>
@endsection
