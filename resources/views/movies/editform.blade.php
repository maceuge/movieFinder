@extends('layouts.home')
@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Editar Pelicula</h2>
            @if(isset($movie))
            <form action="/editado/{{ $movie->id }}" class="form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input class="form-control" type="text" name="title" value="{{ $movie->title }}" placeholder="Titulo">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="rating" value="{{ $movie->rating }}" placeholder="Rating">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="awards" value="{{ $movie->awards }}" placeholder="Awards">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="length" value="{{ $movie->length }}" placeholder="Duracion">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="release_date" value="{{ $movie->release_date }}" placeholder="Fecha de Estreno">
                </div>
                <div class="form-group">
                    <select class="form-control" name="genre_id">
                        @foreach($generos as $genero)
                            @if($genero->id == $movie->genre_id)
                              <option value="{{ $genero->id }}" selected >{{ $genero->name }}</option>
                            @else
                              <option value="{{ $genero->id }}">{{ $genero->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{-- @if($errors->has('cover')) has-error @else @endif --}}">
                    <input class="form-control" type="file" name="cover">
                </div>
                <button type="submit" class="btn btn-warning center-block">Modificar</button>
            </form>
             @else
               <h3 class="text-center">Nada para editar</h3>
             @endif
        </div>
    </div>

@endsection