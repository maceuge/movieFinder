@extends('layouts.home')
@section('generopel')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Detalle de la Pelicula: <small>{{ $movie->title }}</small></h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Titulo</td>
                    <td>Rating</td>
                    <td>Date</td>
                    <td>Awards</td>
                    <td>Duracion</td>
                    <td>Genero</td>
                </tr>
                </thead>
                <tbody>
                @if(isset($movie))
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->rating }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->awards }}</td>
                        <td>{{ $movie->length }}</td>
                        @if(isset($genero))
                            <td>{{ $genero }}</td>
                        @else
                            <td>No tiene Genero</td>
                        @endif
                    </tr>
                @else
                    <tr>
                        <td colspan="5" class="text-center">No encontro ningun registro</td>
                    </tr>
                @endif
                </tbody>
            </table>

        </div>
    </div>

@endsection