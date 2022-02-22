<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('add-blog-post-form');

    }
    public function store(Request $request)
    // envoi les infos en BDD
    {
        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category = $request->category;
        $post->paragraph = $request->paragraph;
        $post->save();
    }

}
//https://www.youtube.com/watch?v=X_Q-_7_X_zY
