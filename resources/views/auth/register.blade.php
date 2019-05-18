@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Inscription</div>

                    <div class="card-body">
                        {{ Form::model(array('route' => 'register')) }}
                        @csrf

                        <div class="form-group row">

                            {{ Form::label('first_name', 'Prénom', array('class' => 'col-md-4 col-form-label text-md-right')) }}

                            <div class="col-md-6">
                                {{ Form::text('first_name', old('first_name'), array('class' => 'form-control'.($errors->has('first_name') ? ' is-invalid' : ""),
                            'required' => true, 'autocomplete' => 'first_name', 'focus' => true)) }}

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('last_name', 'Nom', array('class' => 'col-md-4 col-form-label text-md-right')) }}

                            <div class="col-md-6">
                                {{ Form::text('last_name', old('last_name'), array('class' => 'form-control'.($errors->has('last_name') ? ' is-invalid' : ""),
                            'required' => true, 'autocomplete' => 'last_name', 'focus' => true)) }}
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('email', 'E-mail', array('class' => 'col-md-4 col-form-label text-md-right')) }}

                            <div class="col-md-6">
                                {{ Form::email('email', old('email'), array('class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ""),
                            'required' => true, 'autocomplete' => 'email')) }}

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password', 'Mot de passe', array('class' => 'col-md-4 col-form-label text-md-right')) }}

                            <div class="col-md-6">
                                {{ Form::password('password', array('class' => 'form-control'.($errors->has('password') ? ' is-invalid' : ""),
                            'required' => true, 'autocomplete' => 'new-password')) }}

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label('password-confirm', 'Confirmez le mot de passe', array('class' => 'col-md-4 col-form-label text-md-right')) }}

                            <div class="col-md-6">
                                {{ Form::password('password_confirmation', array('id' => 'password-confirm', 'class' => 'form-control',
                            'required' => true, 'autocomplete' => 'new-password')) }}
                            </div>
                        </div>

                        {{ Form::label('address[street_1]', 'Street 1', array('class' => 'form-label')) }}
                        {{ Form::text('address[street_1]') }}

                        {{ Form::label('address[street_2]', 'Street 2', array('class' => 'form-label')) }}
                        {{ Form::text('address[street_2]') }}

                        {{ Form::label('address[street_3]', 'Street 3', array('class' => 'form-label')) }}
                        {{ Form::text('address[street_3]') }}

                        {{ Form::label('address[zip_code]', 'Code postal', array('class' => 'form-label')) }}
                        {{ Form::text('address[zip_code]') }}

                        {{ Form::label('address[city]', 'Ville', array('class' => 'form-label')) }}
                        {{ Form::text('address[city]') }}

                        {{ Form::label('address[country]', 'Pays', array('class' => 'form-label')) }}
                        {{ Form::text('address[country]') }}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Valider l'inscription
                                </button>
                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
