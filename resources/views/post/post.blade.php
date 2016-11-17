@extends('layouts.home')

@section('content')

    <div class="row" style="margin-top: 60px; color: #5c5c5c">
        <div class="col-md-6 col-md-offset-3">
            <h1>Enviar post</h1>
            <form action="/" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="" placeholder="Twitter User">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="" placeholder="Email">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="" id=""  rows="5" maxlength="200"></textarea>
                </div>
                <button class="btn btn-info center-block" type="submit">Post</button>
            </form>
        </div>
    </div>

@endsection