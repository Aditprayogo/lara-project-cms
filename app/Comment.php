<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [

        'author',
        'email',
        'body',
        'post_id',
        'is_active'

    ];

    public function post()
    {
        # code...
        return $this->belongsTo('App\Post');
    }

    public function replies()
    {
        # code...
        return $this->hasMany('App\CommentReply');
    }
}
