<?php

namespace App\Http\Controllers;

use App\Notifications\Salackmessagee;
use App\Notifications\SlackGenMsg;
use Illuminate\Http\Request;
use App\Movie;
use App\User;
use App\Notifications\Avisopelicula;
use Illuminate\Support\Facades\Auth;

class NotificationContoller extends Controller
{
    public function notifMovie () {
        //$user = User::find(3);
        $user = Auth::user();
        $movie = Movie::find(7);
        $user->notify(new Avisopelicula($movie));

        return redirect('/');
    }

    public function slackmessage () {
        $user = User::find(3);
        $movie = Movie::find(7);
        $user->notify(new Salackmessagee($movie));

        return redirect('/');
    }

    public function slackmsg ($id) {
        $user = Auth::user();
        $movie = Movie::find($id);
        $user->notify(new SlackGenMsg($movie));
        return redirect('/movieList');
    }
}
