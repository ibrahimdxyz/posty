<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{   
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }


    public function index()
    {
        return view('posts.index');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'body' => 'required'
        ]);


        //  Not ideal: the post doesn't need to know the user.
        //             It's better to create the posts **via** the user.
        // Post::create([
        //     'user_id' => Auth::user()->id,
        //     'body' => $request->body
        // ]);
        

        // a better, cleaner one liner, via eloquent
        $request->user()->posts()->create($request->only('body'));

        return back();
    }

    public function destroy() 
    {

    }
}
