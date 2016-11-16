<?php

namespace App\Http\Controllers;

use App\Notifications\Notifnuevapeli;
use App\User;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Http\Request;
use App\Movie;
use App\Genre;
use App\Http\Requests\CreateMovieRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PeliculasController extends Controller
{
    /*public function bestTen () {
        $builder = \App\Movie::orderBy('rating', 'desc')->take(10)->paginate(5);
        return view('showMovies', ['movies' => $builder]);
    }*/ // funcion ejemplo de Paginate

    // funcion que trae las 10 mejores peliculas
    public function bestten () {
        $builder = Movie::orderBy('rating', 'desc')->take(10)->get();
        return view('/movies/bestten', ['movies' => $builder]);
    }

    // funcion que trae la lista de todas las peliculas
    public  function movieList () {
        // $user = \Auth::user(); // aqui trae al usuario si esta logeado
        // $movie = Movie::all();
        $movie = Movie::paginate(7);
        $generos = Genre::all();

        return view('/movies/peliculas', [
            'movies' => $movie,
            'generos' => $generos
        ]);
    }

    // funcion que trae el formulario de la pelicula con los generos en un select
    public function addmovieform (){
        $generos = Genre::all();
        return view('/movies/formulario', ['generos' => $generos]);
    }

    // funcion que agrega la pelicula a la base de datos pasando por el validador personalizado
    // dentro del mismo controller
    public function addmovie (Request $request) {

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
            return redirect('/addmovieform')->withInput()->withErrors($valid->errors());
        }

        /* forma corta de grabar los campos del form en la base de datos siempre y cuando esta
         * todo laravelizado es decir: si los name de los input se llaman igual que las columnas
         * de la base de datos a la que se esta referiendo
         */
        $data = $request->only(['title', 'rating', 'awards', 'release_date', 'length', 'genre_id']);
        $film = Movie::create($data);

        // si no se utiliza la forma mas larga aclarando cada campo del input
        /*$film = Movie::create([
            'title' => $request->input('title'),
            'rating' => $request->input('rating'),
            'awards' => $request->input('awards'),
            'release_date' => $request->input('release_date'),
            'length' => $request->input('length'),
            'genre_id' => $request->input('genre_id')
        ]);*/

        $film->save();

        // voy a notificar al cliente que se ingreso una nueva pelicula
        $user = Auth::user();
        //$movie = Movie::all();
        //$lastmovie = $movie->last();
        $user->notify(new Notifnuevapeli($film));

        return redirect('/movieList');
        // return redirect()->action('PeliculasController@all'); es solo un ejemplo de redireccionar a otro controller
    }

    // funcion simplificada de validar y agregar una pelicula
    // para usarla hay que redirigir las rutas a este controller
    public function addmovieRequest (CreateMovieRequest $request) {

        $data = $request->only(['title', 'rating', 'awards', 'release_date', 'length', 'genre_id']);
        $movie = Movie::create($data);

        if ($request->hasFile('cover')) {

            $file = $request->file('cover');
            $filename = str_slug($movie->title).'-'.$movie->id.'.'.$file->extension();
            $filestorage = $file->storeAs('movies', $filename, env('PUBLIC_STORAGE', 'public'));
            $movie->cover = $filestorage;
            $movie->save();

           // $filename = $file->store('movies', 'public');
           // $filename = $file->storeAs('movies', str_slug($film->title).'-'.$film->id.''.$file->extension(),'public');
          //  $filename = $file->storeAs('movies', $filename, 'public'); otra forma de hacer
          //  Storage::disk('public')->putFileAs("movies", $file, $filename); // es la forma manual de
          //  env('PUBLIC_STORAGE'); lo agreg en arch env para luego configurar de ahi en donde quiero guardar mi archov
        }
        return redirect('/movieList');
    }

    // funcion de busqueda de las peliculas que recibe por el input del buscador
    public function searchmovies(Request $request) {
        $query = Movie::where(
            'title',
            'LIKE',
            '%' .$request->input('query'). '%'
        )->get();
        return view('/movies/searchmovies', ['movies' => $query]);
    }

    // funcion que trae el detalle de la consulta echa por el campo de la busqueda
    public function moviedetail ($id) {
        $movie = Movie::find($id);
        if (!$movie) {
            abort(404); // si no encuentra id deseado redirige a la pagina 404
        }
        return view('/movies/moviedetail', ['movies' => $movie]);
    }

    // funcion borrar la pelicula dentro de la lista de peliculas
    // tiene una condicion programada para que un usuario espesifico pueda borrar la pelicula
    public function borrar ($id, Gate $gate) {
        if ($gate->allows('movie-delete')) {
            abort(403);
        }
        $movie = Movie::find($id);
        $movie->delete();
        return redirect('/movieList');
    }

    // funcion editar una pelicula que trae el formulario de edicion con todos sus campos
    public function editar ($id) {
        $movie = Movie::find($id);
        $generos = Genre::all();
        return view('/movies/editform', [
            'movie' => $movie,
            'generos' => $generos
        ]);
    }

    // funcion editar una pelicula sobre las tablas de los campos
    public function editarlinea ($id) {
        $linea = Movie::find($id);
        $movies = Movie::paginate(7);
        $generos = Genre::all();

        return view('/movies/peliculas', [
            'linea' => $linea,
            'movies' => $movies,
            'generos' => $generos,
        ]);
    }

    public function editadolinea ($id, Request $request) {
        $movie = Movie::find($id);
        $movie->title = $request->input('title');
        $movie->rating = $request->input('rating');
        $movie->awards = $request->input('awards');
        $movie->release_date = $request->input('release_date');
        $movie->length = $request->input('length');

        $movie->save();
        return redirect('/movieList');
    }

    // funcion que edita la pelicula seleccionada
    public function editado ($id, Request $request) {
        $movie = Movie::find($id);
        $movie->update($request->except('_token', 'cover'));

        if ($request->hasFile('cover')) {

            $file = $request->file('cover');
            $filename = str_slug($movie->title).'-'.$movie->id.'.'.$file->extension();
            $filestorage = $file->storeAs('movies', $filename, env('PUBLIC_STORAGE', 'public'));
            $movie->cover = $filestorage;
            $movie->save();
        }
        return redirect('/movieList');
    }


    // finciones varias para ordenar la lista de peliculas
    public  function primero () {
        $movie = Movie::all();
        $movie = $movie->first();
        return view('/movies/moviedetail', ['movies' => $movie]);
    }

    public function ordenar ($ord) {
        $movie = Movie::orderBy($ord);
        $movie = $movie->paginate(7);
        $generos = Genre::all();

        return view('/movies/peliculas', [
            'movies' => $movie,
            'generos' => $generos
        ]);
    }

    public function ordazar () {
        $movie = Movie::all();
        $movie = $movie->shuffle();
        $generos = Genre::all();

        return view('/movies/peliculas', [
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

        return view('/movies/peliculas', [
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

        return view('/movies/peliculas', [
            'movies' => $movie,
            'generos' => $generos
        ]);
    }
























    /*******************************************************************/

    // funciones sin uso solo para prueba
    /*
    public function todasId () {
        $movie = Movie::find(19);
        dd($movie);
    }
    */


    /*public function premios () {
        $movie = Movie::all();
        $movie = $movie->map(function ($pelicula) {
            $premio = $pelicula->awards * $pelicula->length;
            return $premio;
        });
        $generos = Genre::all();

        return view('/premios', ['movies' => $movie]);
    }*/



}
