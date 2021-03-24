<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    /** 
     * 
     * specifies the relationship with Post, adds an attribute 'posts' 
     * which returns an @var array posts, with all user posts.
     * 
     * @var object
     *  */ 
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    public function likes() // likes made by user
    {
        return $this->hasMany(Like::class);
    }

    public function receivedLikes()
    {
        return $this->hasManyThrough(Like::class, Post::class);
    }

}
