<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'role_id', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {

        # code...
        return $this->belongsTo('App\Role');

    }

    public function photo()
    {

        return $this->belongsTo('App\Photo');

    }

    //creating middleware auth
    public function isAdmin()
    {

        # code...
        if ($this->role->name == 'Administrator' && $this->is_active == 1) {
            
            # code...
            return true;

        } else {

            return false;

        }

    }

    public function posts()
    {
        
        # code...
        return $this->hasMany('App\Post');
    }

    public function comments()
    {
        # code...
        return $this->hasMany('App\Comment');
    }
}
