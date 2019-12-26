<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getCanManageAttribute()
    {
        return $this->user_id === auth()->id();
    }

    
  


}
