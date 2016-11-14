<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/2cd639662e.js"></script>

    <style>
        .title {
            color: #7a43b6;
            font-family: 'Raleway', sans-serif;
            font-size: 22px;
            font-weight: 600;
        }
        .color {
            color: #009926;
        }

        body {
            background-color: #e2e2e2;
        }
        .tithead {
            color: #0D3349;
            font-family: 'Raleway', sans-serif;
            font-size: 22px;
            font-weight: 600;
        }

        .table-bordered {
            border-color: #636163;
        }
    </style>
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top navbar-danger">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><span class="title">Movie<span class="color">Finder</span></span></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
            </ul>

                <form class="navbar-form navbar-left" action="/searchmovies" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="query" placeholder="Buscar Pelicula...">
                        <span class="input-group-btn">
                            <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                    </div>
                </form>


            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-file-text fa-lg"></i> Colecciones<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/primero') }}">Primero</a></li>
                        <li><a href="{{ url('/ordtit/title') }}">Ordenar por Titulo</a></li>
                        <li><a href="{{ url('/ordtit/length') }}">Ordenar por Duracion</a></li>
                        <li><a href="{{ url('/ordazar') }}">Ordenar al azar</a></li>
                        <li><a href="{{ url('/duracionm') }}">Duracion +90 min</a></li>
                        <li><a href="{{ url('/duracionmr') }}">Duracion +90&r5</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/generos') }}">Pelis por Genero</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/api/moviesapi') }}">Format JASON</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ url('/notif') }}"><i class="fa fa-paper-plane"></i> Enviar Notificacion</a></li>
                        <li><a href="{{ url('/notislack') }}"><i class="fa fa-slack"></i> Enviar Slack</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/bestten') }}"><i class="fa fa-trophy fa-lg"></i> 10 Mejores</a></li>
                <li><a href="{{ url('/movieList') }}"><i class="fa fa-list fa-lg"></i> Lista Peliculas</a></li>
                <li><a href="{{ url('/addmovieform') }}"><i class="fa fa-plus-circle fa-lg"></i> Pelicula</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <i class="fa fa-user-circle-o fa-lg"></i>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Salir
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container" style="margin-top: 40px;">
     <!-- div class="row">
          <div class="col-md-6 col-md-offset-3">
               <h3 class="text-center">Buscar Pelicula</h3>
                    <form class="form" action="/movies" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Buscar Pelicula...">
                            <span class="input-group-btn">
                            <button class="btn btn-info" type="submit">Buscar</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div -->
    <br>
{{-- contenido --}}
    @yield('content')
{{-- contenido --}}

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<!--script src="/js/app.js"></script -->
<!-- script src="{{-- asset('assets/global/plugins/amcharts/amcharts/serial.js') --}}" type="text/javascript"></script -->
</body>
</html>