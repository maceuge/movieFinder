@extends('layouts.home')
@section('content')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Ingresar Pelicula</h2>

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
                <button type="submit" class="btn btn-success center-block">Ingresar</button>
            </form>

        </div>
    </div>

@endsection