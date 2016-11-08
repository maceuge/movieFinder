@extends('layouts.movieWeb')
@section('peliculas')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <h1>Lista de Peliculas
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-plus-circle fa-lg"></i>
                </button>
            </h1>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <td><h4><b>Titulo</b></h4></td>
                    <td><h4><b>Rating</b></h4></td>
                    <td><h4><b>Date</b></h4></td>
                    <td><h4><b>Awards</b></h4></td>
                    <td><h4><b>Duracion</b></h4></td>
                    <td><h4><b>Accion</b></h4></td>
                </tr>
                </thead>
                <tbody>
                @forelse($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>{{ $movie->rating }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td><span class="badge">{{ $movie->awards }}</span></td>
                        <td>{{ $movie->length }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                            <a href="/movieDetail/{{ $movie->id }}" class="btn btn-info btn-sm">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="/genero/{{ $movie->id }}" class="btn btn-success btn-sm">
                                <i class="fa fa-navicon"></i>
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
            {{-- $movie->links() --}}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Ingresar Pelicula</h4>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
                    </form>
            </div>
        </div>
    </div>

@endsection