<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/2cd639662e.js"></script>

    <style>
        .title {
            color: #7a43b6;
            font-family: 'Raleway', sans-serif;
            font-size: 62px;
            font-weight: 200;
        }
        .color {
            color: #00b3ee;
        }
    </style>
</head>
<body>

    <div class="container" style="margin-top: 100px;">
        <h1 class="title text-center">Login to <span class="color">Laravel</span></h1>
        {{-- contenido --}}

        @yield('container')

        {{-- contenido --}}
    </div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- script src="{{-- asset('assets/global/plugins/amcharts/amcharts/serial.js') --}}" type="text/javascript"></script -->
</body>
</html>