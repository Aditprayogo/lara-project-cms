<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    protected $fillable = ['user_id', 'category_id', 'photo_id', 'title', 'body'];
    
    public function user()
    {
        # code...
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        # code...
        return $this->belongsTo('App\Photo');
    }

    public function category()
    {
        # code...
        return $this->belongsTo('App\Category');
        
    }

    public function comments()
    {
        # code...
        return $this->hasMany('App\Comment');
    }
}
