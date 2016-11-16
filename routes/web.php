<?php
/*Route::get('/', function () {
    return view('login.login');
}); */ // Ruta ejemplo del Welcome

Route::get('/notif', 'NotificationContoller@notifMovie');
Route::get('/notislack', 'NotificationContoller@slackmessage');
Route::get('/slackmsg/{id}', 'NotificationContoller@slackmsg');

// -- Este es un middleware que
Route::group(['middleware' => ['auth']], function () {

//------- aqui empiezan las rutas creadas
//---- ruta de la pagina principal despues del logeo
Route::get('/', function () { return view('indexp.init');  });

//-- ruta de las mejores 10 peliculas
Route::get('/bestten', 'PeliculasController@bestten');

//-- ruta lista de peliculas
Route::get('/movieList', 'PeliculasController@movieList');

// -- ruta agregar pelicula
Route::get('/addmovieform', 'PeliculasController@addmovieform');
//Route::post('/addmovie', 'PeliculasController@addmovie');
Route::post('/addmovie', 'PeliculasController@addmovieRequest');

// -- ruta que busca las peliculas filtradas por mysql
Route::get('/searchmovies', 'PeliculasController@searchmovies');

// -- ruta del detalle de la pelicula dentro de la busqueda pasando el id como parametro por url
Route::get('/moviedetail/{id}', 'PeliculasController@moviedetail');

// rutas de edicion de peliculas dentro de la lista
Route::get('/borrar/{id}', 'PeliculasController@borrar');
Route::get('/editar/{id}', 'PeliculasController@editar');
Route::get('/editform', function () { return view('movies/editform'); });
Route::post('/editado/{id}', 'PeliculasController@editado');

// ruta para editar la linea sobre la tabla
Route::get('/editarlinea/{id}', 'PeliculasController@editarlinea');
Route::post('/editadolinea/{id}', 'PeliculasController@editadolinea');

// rutas de orden de la lista de peliculas
Route::get('/primero', 'PeliculasController@primero');
Route::get('/ordtit/{ord}', 'PeliculasController@ordenar');
Route::get('/ordazar', 'PeliculasController@ordazar');
Route::get('/duracionm', 'PeliculasController@duracionm');
Route::get('/duracionmr', 'PeliculasController@duracionmr');

//-- rutas de genero
Route::get('/genero/{id}', 'GeneroController@ver');
Route::get('/generopel', function () { return view('generopel'); });
Route::get('/generos', 'GeneroController@todos');
Route::get('/buscarpelis', 'GeneroController@buscarpelis');
Route::get('/peligenero', function () { return view('peligenero'); });


});



// rutas de logeo
Auth::routes();
Route::get('/home', 'HomeController@index');



// ----------- RUTAS OBSOLETAS O SIN USO del tipo ejemplo
//Route::post('/validarlogin', 'PeliculasController@validarlogin');
//Route::get('showMovies', 'BestMoviesController@bestMovies');
//Route::get('/pelicula', 'PeliculasController@todasId');
//Route::get('/premios', 'PeliculasController@premios'); // ver esto
//Route::get('/peliculasprem', function () { return view('peliprem'); });

/*Route::group(['middleware' => ['filter_ip']], function () {
    Route::post('/agregar', 'PeliculasController@addFilm');
});*/  // este es un ejemplo de middleware personal




