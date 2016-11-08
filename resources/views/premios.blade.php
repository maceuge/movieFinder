@extends('layouts.movieWeb')
@section('peliprem')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Lsta de Peliculas</h1>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <td><h4><b>Titulo</b></h4></td>
                    <td><h4><b>Date</b></h4></td>
                    <td><h4><b>Rating</b></h4></td>
                    <td><h4><b>Awards</b></h4></td>
                    <td><h4><b>Premio</b></h4></td>
                    <td><h4><b>Duracion</b></h4></td>
                    <td><h4><b>Accion</b></h4></td>
                </tr>
                </thead>
                <tbody>
                @forelse($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->rating }}</td>
                        <td><span class="badge">{{ $movie->awards }}</span></td>
                        <td>{{ $movie->premio }}</td>
                        <td>{{ $movie->length }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <a href="/movieDetail/{{ $movie->id }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="/editar/{{ $movie->id }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="/borrar/{{ $movie->id }}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
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