<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Post $post, Request $request) {
        
        // user can't like something more than once
        if ($post->isLikedBy($request->user()))
        {
            return response(null, 409); // Conflict HTTP code 
        }

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Post $post, Request $request) 
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }


}
