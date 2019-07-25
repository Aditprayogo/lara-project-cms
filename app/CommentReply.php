<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    //
    protected $fillable = [

        'author',
        'email',
        'body',
        'comment_id',
        'is_active'

    ];

    public function comment()
    {
        # code...
        return $this->belongsTo('App\Comment');
    }
}
