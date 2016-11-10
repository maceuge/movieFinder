<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/2cd639662e.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/2cd639662e.js"></script>
    <title>Error 404</title>

    <style>
        .margen {
            margin-top: 150px;
        }

        h1 {
            font-size: 65px;
        }
    </style>
</head>
<body>
<!-- div class="jumbotron">
    <h1 class="text-center">< 404 ></h1>
    <p class="text-center text-info">Opps, algo paso!</p>
    <p><a class="btn btn-primary center-block" href="/" role="button">HOME</a></p>
</div -->

<div class="container margen">
    <div class="col-lg-8 col-lg-offset-2 text-center">
        <div class="logo">
            <h1 class="text-danger">Ups!, Error 404 !</h1>
        </div>
        <h3>Parece que hay algun error en la pagina.</h3>
        <br>
        <p class="text-info">Puede volver a intentar con la busqueda o ...</p>
        <div class="clearfix"></div>
        <div class="col-lg-8  col-lg-offset-2">
            <form action="/searchmovies" method="get">
                <div class="input-group">
                    <input type="text" placeholder="Buscar Pelicula..." class="form-control" />
                    <span class="input-group-btn">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <div class="clearfix"></div>
            <br /><br />
            <p class="text-muted">puede dirigirse directamente a los siguentes links.</p>
        <div class="clearfix"></div>

        <!-- div class="col-lg-6 col-lg-offset-3">
            <form action="#">
                <div class="input-group">
                    <input type="text" placeholder="search ..." class="form-control" />
                        <span class="input-group-btn">
			                <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
		                </span>
                </div>
            </form>
        </div -->

        <div class="clearfix"></div>
        <div class="col-lg-6  col-lg-offset-3">
            <div class="btn-group btn-group-justified">
                <a href="/" class="btn btn-info">Pagina Principal</a>
                <a href="/movieList" class="btn btn-success">Lista de Peliculas</a>
            </div>
        </div>
    </div> <!-- fin del div columnas -->
</div> <!-- fin del div contenedor -->

</body>
</html>
