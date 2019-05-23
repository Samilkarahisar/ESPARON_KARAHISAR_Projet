@extends('layouts.app')

@section('content')
    <div class="container">
        {{ Form::open(array('route' => 'register')) }}
        @csrf

        <div class="form-row">
            <div class="form-group col-md-4">
                {{ Form::label('first_name', 'Prénom', array('class' => 'form-label')) }}
                {{ Form::text('first_name', old('first_name'), array('class' => 'form-control'.($errors->has('first_name') ? ' is-invalid' : ""),
            'placeholder' => 'Prénom', 'required' => true, 'autocomplete' => 'first_name', 'focus' => true)) }}
                @if ($errors->has('first_name'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('last_name', 'Nom', array('class' => 'form-label')) }}
                {{ Form::text('last_name', old('last_name'), array('class' => 'form-control'.($errors->has('last_name') ? ' is-invalid' : ""),
            'placeholder' => 'Nom','required' => true, 'autocomplete' => 'last_name', 'focus' => true)) }}
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('email', 'E-mail', array('class' => 'form-label')) }}
                {{ Form::email('email', old('email'), array('class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ""),
            'placeholder' => 'Email', 'required' => true, 'autocomplete' => 'email')) }}
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                {{ Form::label('password', 'Mot de passe', array('class' => 'form-label')) }}
                {{ Form::password('password', array('class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ""),
            'placeholder' => 'Mot de passe', 'required' => true, 'autocomplete' => 'new-password')) }}

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('password-confirm', 'Confirmez le mot de passe', array('class' => 'form-label')) }}
                {{ Form::password('password_confirmation', array('id' => 'password-confirm', 'class' => 'form-control',
            'placeholder' => 'Confirmez le mot de passe', 'required' => true, 'autocomplete' => 'new-password')) }}
            </div>
        </div>

        <h4 class="my-4">Votre adresse</h4>

        <div class="form-group">
            {{ Form::label('address[street_1]', 'Adresse 1', array('class' => 'form-label')) }}
            {{ Form::text('address[street_1]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => '14 rue Colin')) }}
        </div>
        <div class="form-group">
            {{ Form::label('address[street_2]', 'Adresse 2', array('class' => 'form-label')) }}
            {{ Form::text('address[street_2]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Appartement, studio...')) }}
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                {{ Form::label('address[city]', 'Ville', array('class' => 'form-label')) }}
                {{ Form::text('address[city]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Ville')) }}
            </div>
            <div class="form-group col-md-2">
                {{ Form::label('address[zip_code]', 'Code postal', array('class' => 'form-label')) }}
                {{ Form::text('address[zip_code]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Code postal')) }}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('address[country]', 'Pays', array('class' => 'form-label')) }}
                {{ Form::text('address[country]', null, array('class' => 'form-control', 'required' => true, 'placeholder' => 'Pays')) }}
            </div>
        </div>

        <button type="submit" class="btn btn-primary my-4 float-right">
            Valider l'inscription
        </button>

        {{ Form::close() }}
    </div>
@endsection
