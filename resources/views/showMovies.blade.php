@extends('layouts.movieWeb')
@section('bestMovies')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Las 10 Mejores Peliculas</h1>
            <ul>
                @foreach($movies as $movie)
                    <li>{{ $movie->title }}</li>
                @endforeach
            </ul>
            {{-- $movie->links() --}}
        </div>
    </div>
</div>

@endsection
