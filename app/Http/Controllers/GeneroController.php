<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use \App\Genre;

class GeneroController extends Controller
{
    public function ver ($id) {
        $movie = Movie::find($id);
        $genero = $movie->genre->name;

        return view('/generopel', [
            'movie' => $movie,
            'genero' => $genero
        ]);
    }

    public  function todos () {
        $generos = Genre::all();
        return view('/generos', ['generos' => $generos]);
    }

    public function buscarpelis (Request $request) {
        $id = $request->input('genresel');
        $gen = Genre::find($id);
        $pelis = $gen->movies;

        return view('/peligenero', ['pelis' => $pelis, 'genero' => $gen]);

    }
}
