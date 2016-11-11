<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $visible = ['id', 'name'];

   public function movies () {
       return $this->hasMany(Movie::class);
   }
}
