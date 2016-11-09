<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use App\Http\Requests\CreateMovieRequest;

class PeliculasController extends Controller
{
    /*public function bestTen () {
        $builder = \App\Movie::orderBy('rating', 'desc')->take(10)->paginate(5);
        return view('showMovies', ['movies' => $builder]);
    }*/

    public function bestTen () {
        $builder = \App\Movie::orderBy('rating', 'desc')->take(10)->get();
        return view('showMovies', ['movies' => $builder]);
    }

    public function search(Request $request) {
        $builder = \App\Movie::where(
            'title',
            'LIKE',
            '%' .$request->input('query'). '%'
        )->get();
        return view('/movies', ['movies' => $builder]);
    }

    public function detalle($id) {
        $movie = \App\Movie::find($id);
        if (!$movie) {
            abort(404);
        }
        return view('/movieDetail', ['movies' => $movie]);
    }

    public function todasId () {
        $movie = Movie::find(19);
        dd($movie);
    }

    public  function todas () {
       // $movie = Movie::all();
       /* $movie = Movie::where(
            'title',
            'LIKE',
            '%'
        )->paginate(5);*/

        $movie = Movie::paginate(7);
        $generos = Genre::all();

        return view('/peliculas', [
            'movies' => $movie,
            'generos' => $generos
        ]);
    }

    public function form (){
        $generos = Genre::all();
        return view('/formulario', ['generos' => $generos]);
    }

    public function addFilmRequest (CreateMovieRequest $request) {
        $data = $request->only(['title', 'rating', 'awards', 'release_date', 'length', 'genre_id']);
        $film = Movie::create($data);
        $film->save();
        return redirect('/peliculas');
    }

    public function addFilm (Request $request) {

        $valid = \Validator::make(
            $request->all(),
            [
            'title' => 'required',
            'rating' => 'required|numeric|between:0,10',
            'awards' => 'required|numeric|between:0,10',
            'length' => 'required|numeric|between:10,400',
            'release_date' => 'required',
            'genre_id' => 'required'
            ]
        );

        if ($valid->fails()) {
            return redirect('/addmovie')->withInput()->withErrors($valid->errors());
        }

        $data = $request->only(['title', 'rating', 'awards', 'release_date', 'length', 'genre_id']);
        $film = Movie::create($data);

        /*$film = Movie::create([
            'title' => $request->input('title'),
            'rating' => $request->input('rating'),
            'awards' => $request->input('awards'),
            'release_date' => $request->input('release_date'),
            'length' => $request->input('length'),
            'genre_id' => $request->input('genre_id')
        ]);*/

        $film->save();
        return redirect('/peliculas');
       // return redirect()->action('PeliculasController@all'); es solo un ejemplo
    }

    public function borrar ($id) {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect('/peliculas');
    }

    public function editar ($id) {
        $movie = Movie::find($id);
        $generos = Genre::all();
        return view('/editform', [
            'movie' => $movie,
            'generos' => $generos
        ]);
    }

    public function editado ($id, Request $request) {
        $movie = Movie::find($id);
        $movie->title = $request->input('title');
        $movie->rating = $request->input('rating');
        $movie->awards = $request->input('awards');
        $movie->release_date = $request->input('date');
        $movie->length = $request->input('length');

        $movie->save();
        return redirect('/peliculas');
    }

    public  function primero () {
        $movie = Movie::all();
        $movie = $movie->first();

        return view('/movieDetail', ['movies' => $movie]);
    }

    public function ordenar ($ord) {
        $movie = Movie::all();
        $movie = $movie->sortBy($ord);
        $generos = Genre::all();

        return view('/peliculas', [
           'movies' => $movie,
           'generos' => $generos
        ]);
    }

    public function ordazar () {
        $movie = Movie::all();
        $movie = $movie->shuffle();
        $generos = Genre::all();

        return view('/peliculas', [
            'movies' => $movie,
            'generos' => $generos
        ]);
    }

    public function duracionm () {
        $movie = Movie::all();
        $movie = $movie->filter(function ($pelicula) {
            return $pelicula->length > 90;
        });
        $generos = Genre::all();

        return view('/peliculas', [
            'movies' => $movie,
            'generos' => $generos
        ]);
    }

    public function duracionmr () {
        $movie = Movie::all();
        $movie = $movie->filter(function ($pelicula) {
            return $pelicula->length > 90 || $pelicula->rating > 5;
        });
        $generos = Genre::all();

        return view('/peliculas', [
            'movies' => $movie,
            'generos' => $generos
        ]);
    }

    public function premios () {
        $movie = Movie::all();
        $movie = $movie->map(function ($pelicula) {
            $premio = $pelicula->awards * $pelicula->length;
            return $premio;
        });
        $generos = Genre::all();

        return view('/premios', ['movies' => $movie]);
    }



}
