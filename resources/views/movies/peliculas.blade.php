@extends('layouts.home')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-film fa-lg"></i> Lista de Peliculas
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

                @if(isset($linea))


                    @forelse($movies as $movie)
                        @if ($linea->id == $movie->id)
                            <form action="/editadolinea/{{ $movie->id }}" method="post">
                                {{ csrf_field() }}
                                <tr>
                                    <td><input class="form-control" type="text" name="title" value="{{ $movie->title }}" placeholder="Titulo"></td>
                                    <td><input class="form-control" type="text" name="rating" value="{{ $movie->rating }}" placeholder="Rating"></td>
                                    <td><input class="form-control" type="text" name="release_date" value="{{ $movie->release_date }}"></td>
                                    <td><input class="form-control" type="text" name="awards" value="{{ $movie->awards }}" placeholder="Awards"></td>
                                    <td><input class="form-control" type="text" name="length" value="{{ $movie->length }}" placeholder="Duracion"></td>
                                    <td>
                                        <a href="/movieList" class="btn btn-danger"><i class="fa fa-times-circle"></i></a>
                                        <button type="submit" class="btn btn-primary">Editar</button>

                                    </td>
                                </tr>
                            </form>
                        @else
                            <tr>
                                <td>{{ $movie->title }}</td>
                                <td>{{ $movie->rating }}</td>
                                <td>{{ $movie->release_date }}</td>
                                <td><span class="badge">{{ $movie->awards }}</span></td>
                                <td>{{ $movie->length }}</td>
                                <td style="width: 155px">
                                    <div class="btn-group" role="group" aria-label="...">
                                        <!--a href="/moviedetail/{{ $movie->id }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a-->
                                        <a href="/genero/{{ $movie->id }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-navicon"></i>
                                        </a>
                                        <a href="/editar/{{ $movie->id }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/editarlinea/{{ $movie->id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-square"></i>
                                        </a>
                                        <a href="/borrar/{{ $movie->id }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No encontro ningun registro</td>
                        </tr>
                    @endforelse


                @else

                    @forelse($movies as $movie)
                            <tr>
                                <td>{{ $movie->title }}</td>
                                <td>{{ $movie->rating }}</td>
                                <td>{{ $movie->release_date }}</td>
                                <td><span class="badge">{{ $movie->awards }}</span></td>
                                <td>{{ $movie->length }}</td>
                                <td  style="width: 155px">
                                    <div class="btn-group" role="group" aria-label="...">
                                        <!--a href="/moviedetail/{{ $movie->id }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-eye"></i>
                                        </a-->
                                        <a href="/genero/{{ $movie->id }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-navicon"></i>
                                        </a>
                                        <a href="/editar/{{ $movie->id }}" class="btn btn-warning btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="/editarlinea/{{ $movie->id }}" class="btn btn-primary btn-sm">
                                            <i class="fa fa-pencil-square"></i>
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

                @endif


                </tbody>
            </table>
            <div class="center-block">{{-- $movies->links() --}}</div>
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
                    <form action="/addmovie" class="form" method="post">
                        {{ csrf_field() }}
                        @if($errors->has('title'))
                            @foreach($errors->get('title') as $error)
                                <div class="text text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="form-group @if($errors->has('title')) has-error @else @endif">
                            <input class="form-control" type="text" name="title" value="{{ old('title') }}" placeholder="Titulo">
                        </div>
                        @if($errors->has('rating'))
                            @foreach($errors->get('rating') as $error)
                                <div class="text text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="form-group @if($errors->has('rating')) has-error @else @endif">
                            <input class="form-control" type="number" name="rating" value="{{ old('rating') }}" placeholder="Rating">
                        </div>
                        @if($errors->has('awards'))
                            @foreach($errors->get('awards') as $error)
                                <div class="text text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="form-group @if($errors->has('awards')) has-error @else @endif">
                            <input class="form-control" type="number" name="awards" value="{{ old('awards') }}" placeholder="Awards">
                        </div>
                        @if($errors->has('length'))
                            @foreach($errors->get('length') as $error)
                                <div class="text text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="form-group @if($errors->has('length')) has-error @else @endif">
                            <input class="form-control" type="number" name="length" value="{{ old('length') }}" placeholder="Duracion">
                        </div>
                        @if($errors->has('release_date'))
                            @foreach($errors->get('release_date') as $error)
                                <div class="text text-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <div class="form-group @if($errors->has('release_date')) has-error @else @endif">
                            <input class="form-control" type="date" name="release_date" value="{{ old('release_date') }}">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="genre_id">
                                @foreach($generos as $genero)
                                    <option value="{{ $genero->id }}" @if(old('genre_id') == $genero->id) selected @endif>{{ $genero->name }}</option>
                                @endforeach
                            </select>
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