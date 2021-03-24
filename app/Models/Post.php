<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'body',
    ];

    /**
     * return the owner of the Post
     * @var User
     */  
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    /**
     * return whether post is liked by a certain user or not
     * @return boolean
     */  
    public function isLikedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

}
