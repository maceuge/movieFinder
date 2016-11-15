<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use \App\Genre;

class GeneroController extends Controller
{
    public function ver ($id) {
        $movie = Movie::find($id);

//        ret urn view('/generos/generopel', [
//            'movie' => $movie,
//        ]);

        return view('/movies/show', [
            'movie' => $movie,
        ]);
    }

    public  function todos () {
        $generos = Genre::all();
        return view('/generos/generos', ['generos' => $generos]);
    }

    public function buscarpelis (Request $request) {
        $id = $request->input('genresel');
        $gen = Genre::find($id);
        $pelis = $gen->movies;

        return view('/generos/peligenero', ['pelis' => $pelis, 'genero' => $gen]);

    }
}
