@extends('layouts.movieWeb')
@section('detalleMovie')

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>Detalle de la Pelicula: <small>{{ $movies->title }}</small></h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>Titulo</td>
                            <td>Rating</td>
                            <td>Date</td>
                            <td>Awards</td>
                            <td>Duracion</td>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($movies))
                        <tr>
                            <td>{{ $movies->title }}</td>
                            <td>{{ $movies->rating }}</td>
                            <td>{{ $movies->release_date }}</td>
                            <td>{{ $movies->awards }}</td>
                            <td>{{ $movies->length }}</td>
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