<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable = [

        'author',
        'comment_id',
        'photo',
        'email',
        'body',
        'comment_id',
        'user_id',
        'is_active'

    ];

    public function comment()
    {
        # code...
        return $this->belongsTo('App\Comment');
    }
}
