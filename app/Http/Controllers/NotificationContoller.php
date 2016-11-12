<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\User;
use App\Notifications\NotifiNewFilm;

class NotificationContoller extends Controller
{
    public function notifMovie () {
        $user = User::find(3);
        $movie = Movie::find(7);
        //dd($movie->title);
        //$movie = $movie->title;
        $user->notify(new NotifiFilm($movie));

        return redirect('/');
    }
}
