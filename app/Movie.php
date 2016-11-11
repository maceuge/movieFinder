<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];
   // protected $hidden = ['id', 'genre_id', 'created_at', 'updated_ad'];
    protected $visible = ['id', 'title', 'url', 'rating', 'release_date', 'genre', 'has_awards'];
    protected $appends = ['url', 'has_awards'];
    protected $casts = [
        'rating' => 'float',
        'release_date' => 'date',
       // 'awards' => 'boolean',
    ];

    public function genre () {
        return $this->belongsTo(Genre::class);
    }

    public function actors () {
        return $this->belongsToMany(Actor::class);
    }

    public function getUrlAttribute (){
        return "/movies/" .$this->id;
    }

    public function getHasAwardsAttribute () {
        return $this->awards;
    }


}
