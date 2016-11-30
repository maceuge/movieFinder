@extends('layouts.home')

@section('content')

    <div class="row" style="margin-top: 60px; color: #5c5c5c">
        <div class="col-md-6 col-md-offset-3">
            <h1>Enviar post</h1>
            <form action="/post" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input class="form-control" type="text" name="user" placeholder="Twitter User">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="post" rows="5" maxlength="200"></textarea>
                </div>
                <button class="btn btn-info center-block" type="submit">Post</button>
            </form>
        </div>
    </div>

@endsection