@extends('layouts.movieWeb')
@section('editform')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Editar Pelicula</h2>
            @if(isset($movie))
            <form action="/editado/{{ $movie->id }}" class="form">
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
                    <input class="form-control" type="text" name="date" value="{{ $movie->release_date }}" placeholder="Fecha de Estreno">
                </div>
                <div class="form-group">
                    <select class="form-control" name="genero">
                        @foreach($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-warning center-block">Modificar</button>
            </form>
             @else
               <h3 class="text-center">Nada para editar</h3>
             @endif
        </div>
    </div>

@endsection