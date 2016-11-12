<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class ApiController extends Controller
{

    public function apiIndex () {
        //return Movie::with('genre')->get();
        return Movie::with('genre')->paginate(10);
    }

    public function apiShow ($id) {
        return Movie::find($id);
    }

}
