@extends('layouts.movieWeb')
@section('pelisgenero')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Peliculas del Genero: <small>{{ $genero->name }}</small></h1>
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
                @forelse($pelis as $peli)
                    <tr>
                        <td>{{ $peli->title }}</td>
                        <td>{{ $peli->rating }}</td>
                        <td>{{ $peli->release_date }}</td>
                        <td>{{ $peli->awards }}</td>
                        <td>{{ $peli->length }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No encontro ningun registro</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
    </div>

@endsection