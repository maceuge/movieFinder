@extends('layouts.home')

@section('content')

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-4 col-md-offset-1">
            @if(isset($movie->cover))
                <img class="img-responsive" src="{{ asset('/'.$movie->cover) }}" width="300" height="400">
            @else
                <p>Esta pelicula no tiene imagen asignada</p>
            @endif
        </div>
        <div class="col-md-7">
            <h1 class="title">Pelicula: <span class="pardet">{{ $movie->title }}</span></h1>
            <p class="paraf">Rating: <span class="pardet">{{ $movie->rating }}</span></p>
            <p class="paraf">Awards: <span class="pardet">{{ $movie->awards }}</span></p>
            <p class="paraf">Fecha Lanzamiento: <span class="pardet">{{ $movie->release_date->format('d-m-Y') }}</span></p>
            <p class="paraf">Duracion: <span class="pardet">{{ $movie->length }}</span></p>
            <p class="paraf">Genero: <span class="pardet">{{ $movie->genre->name }}</span></p>
            <p class="paraf">Actores: <span class="pardet">
            @forelse($movie->actors as $actor)
                 {{ $actor->first_name .' '. $actor->last_name. ' - '  }}
            @empty
                No actuo nadie en la pelicula!
            @endforelse
            </span></p>
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