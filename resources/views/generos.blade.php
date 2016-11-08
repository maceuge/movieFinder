@extends('layouts.movieWeb')
@section('generos')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Selecione el Genero</h2>
            <form action="/buscarpelis" class="form">
                {{ csrf_field() }}
                <div class="form-group">
                    <select class="form-control" name="genresel">
                        @foreach($generos as $genero)
                            <option value="{{ $genero->id }}">{{ $genero->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success center-block">Buscar</button>
            </form>

        </div>
    </div>

@endsection