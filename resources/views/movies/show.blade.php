@extends('layouts.home')

@section('content')

    <div class="row">
        <div class="col-md-4">
            @if(isset($movie->cover))
                <img class="img-responsive" src="{{ asset('storage/'.$movie->cover) }}">
            @else
                <p>Esta pelicula no tiene imagen asignada</p>
            @endif
        </div>
        <div class="col-md-8">
            <h1 class="title">Pelicula: {{ $movie->title }}</h1>
            <p>Rating: {{ $movie->rating }}</p>
            <p>Awards: {{ $movie->awards }}</p>
            <p>Fecha Lanzamiento: {{ $movie->release_date->format('d-m-Y') }}</p>
            <p>Duracion: {{ $movie->length }}</p>
            <p>Genero: {{ $movie->genre->name }}</p>
            {{--@forelse($movie->actor as $actors)--}}
            {{--<p>Actores: {{ $actors->first_name }}</p>--}}
            {{--@empty--}}
                {{--<p>Actores: No actuo nadie en la pelicula</p>--}}
            {{--@endforelse--}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <a href="/movieList" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
            <a href="" class="btn btn-info"><i class="fa fa-slack"></i> Enviar a Slack</a>
            <a href="/" class="btn btn-default"><i class="fa fa-close"></i> Cancelar</a>
        </div>
    </div>



@endsection