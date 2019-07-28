<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images/';

    protected $fillable = ['file'];


    public function getFileAttribute($value)
    {
        # code...
        return $this->uploads . $value;
    }

    // public function user()
    // {
    //     # code...
    //     return $this->hasMany('App\User');
    // }

    // public function post()
    // {
    //     # code...
    //     return $this->hasOneThrough('App\Post');
    // }

    
    
}
