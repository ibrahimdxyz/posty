<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     * (post doesn't know its owner [User])
     * @var array
     */
    protected $fillable = [
        'body',
    ];

    
}
