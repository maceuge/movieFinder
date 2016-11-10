@extends('layouts.home')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="text text-success text-center">Hola {{ Auth::user()->name }} <i class="fa fa-thumbs-o-up fa-2x"></i></h1>
        </div>
    </div>
@endsection