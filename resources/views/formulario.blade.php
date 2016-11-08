@extends('layouts.movieWeb')
@section('formpeli')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Ingresar Pelicula</h2>
            <form action="/agregar" class="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <input class="form-control" type="text" name="title" placeholder="Titulo">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="rating" placeholder="Rating">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="awards" placeholder="Awards">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="length" placeholder="Duracion">
                </div>
                <div class="form-group">
                    <input class="form-control" type="date" name="date">
                </div>
                <div class="form-group">
                    <select class="form-control" name="genero">
                        @foreach($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success center-block">Ingresar</button>
            </form>

        </div>
    </div>

@endsection