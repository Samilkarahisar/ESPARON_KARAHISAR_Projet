@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="list-group">
                    </div>
                    @foreach ($orders as $order)
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection