@extends('layouts.home')

@section('content')

    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            @if(isset($movie->cover))
                <img class="img-responsive" src="{{ asset('/'.$movie->cover) }}">
            @else
                <p>Esta pelicula no tiene imagen asignada</p>
            @endif
        </div>
        <div class="col-md-7">
            <h1 class="title">Pelicula: {{ $movie->title }}</h1>
            <p class="paraf">Rating: {{ $movie->rating }}</pcla>
            <p class="paraf">Awards: {{ $movie->awards }}</p>
            <p class="paraf">Fecha Lanzamiento: {{ $movie->release_date->format('d-m-Y') }}</p>
            <p class="paraf">Duracion: {{ $movie->length }}</p>
            <p class="paraf">Genero: {{ $movie->genre->name }}</p>
            <p class="paraf">Actores:
            @forelse($movie->actors as $actor)
                 {{ $actor->first_name .' '. $actor->last_name. ' - '  }}
            @empty
                No actuo nadie en la pelicula!
            @endforelse
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-5">
            <a href="/" class="btn btn-primary"><i class="fa fa-home"></i> Home</a>
            <a href="/slackmsg/{{ $movie->id }}" class="btn btn-info"><i class="fa fa-slack"></i> Slack Post</a>
            <a href="/movieList" class="btn btn-default"><i class="fa fa-close"></i> Volver</a>
        </div>
    </div>



@endsection