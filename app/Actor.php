<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    //protected $primaryKey = 'actor_id';
    //public $timestamps = false;

    public function movies () {
        return $this->belongsToMany(Movie::class);
    }
}
