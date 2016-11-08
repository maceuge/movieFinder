@extends('layouts.movieWeb')
@section('buscador')


    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h4>Resultados de la Busqueda:</h4>
            <ul>
                @forelse($movies as $movie)
                    <li><a href="/movieDetail/{{ $movie->id }}">{{ $movie->title }}</a></li>
                @empty
                    <h4>No se encontraron los resultados</h4>
                @endforelse
            </ul>

        </div>
    </div>
</div>

@endsection
