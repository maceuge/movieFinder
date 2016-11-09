<?php
/*Route::get('/', function () {
    return view('welcome');
}); */

//Route::get('showMovies', 'BestMoviesController@bestMovies');
Route::get('/', 'PeliculasController@bestTen');
Route::get('/movies', 'PeliculasController@search');
Route::get('/movieDetail/{id}', 'PeliculasController@detalle');

Route::get('/pelicula', 'PeliculasController@todasId');
Route::get('/peliculas', 'PeliculasController@todas');

Route::get('/addmovie', 'PeliculasController@form');
Route::post('/agregar', 'PeliculasController@addFilm');
// Route::post('/agregar', 'PeliculasController@addFilmRequest');

Route::get('/borrar/{id}', 'PeliculasController@borrar');
Route::get('/editar/{id}', 'PeliculasController@editar');
Route::get('/editform', function () { return view('editform'); });
Route::get('/editado/{id}', 'PeliculasController@editado');

Route::get('/primero', 'PeliculasController@primero');
Route::get('/ordtit/{ord}', 'PeliculasController@ordenar');
Route::get('/ordazar', 'PeliculasController@ordazar');
Route::get('/duracionm', 'PeliculasController@duracionm');
Route::get('/duracionmr', 'PeliculasController@duracionmr');
Route::get('/premios', 'PeliculasController@premios'); // ver esto

//Route::get('/peliculasprem', function () { return view('peliprem'); });

//- generos

Route::get('/genero/{id}', 'GeneroController@ver');
Route::get('/generopel', function () { return view('generopel'); });
Route::get('/generos', 'GeneroController@todos');
Route::get('/buscarpelis', 'GeneroController@buscarpelis');
Route::get('/peligenero', function () { return view('peligenero'); });

/*Route::group(['middleware' => ['filter_ip']], function () {
    Route::post('/agregar', 'PeliculasController@addFilm');
});*/
