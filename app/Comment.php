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
        'is_active',
        'photo'

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

    public function user()
    {
        # code...
        return $this->belongsTo('App\User');
    }
}
