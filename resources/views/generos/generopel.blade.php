@extends('layouts.home')
@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Detalle de la Pelicula: <small>{{ $movie->title }}</small></h1>
            <table class="table table-bordered">
                <thead class="tithead text-center">
                <tr>
                    <td>Titulo</td>
                    <td>Rating</td>
                    <td>Date</td>
                    <td>Awards</td>
                    <td>Duracion</td>
                    <td>Genero</td>
                    <td>Accion</td>
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
                        @if(isset($movie->genre))
                            <td>{{ $movie->genre->name }}</td>
                        @else
                            <td>No tiene Genero</td>
                        @endif
                        <td><a class="btn btn-default" href="/slackmsg/{{ $movie->id }}"><i class="fa fa-slack"></i></a></td>
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