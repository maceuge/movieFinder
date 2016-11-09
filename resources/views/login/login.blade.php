@extends('layouts.loginapp')

@section('container')
    {{-- div.container>div.row>div.col-md-6.col-md-offset-3>form>div.form-group*2>input.form-control[placeholder=Usuario]^^^button.btn.btn-info --}}

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form action="/validarlogin" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" name="user" placeholder="Usuario...">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pass" placeholder="Contraseña...">
                    </div>
                        <button class="btn btn-info btn-block" type="submit">Ingresar</button>
                </form>
            </div>
        </div>

@endsection