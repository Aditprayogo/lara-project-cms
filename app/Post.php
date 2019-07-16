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
}
