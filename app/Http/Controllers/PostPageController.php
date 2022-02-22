<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class PostPageController extends Controller
{
    public const HOME = '/add-blog-post/{id}';




    function PostIndex()
    {
        $post = DB::table('posts')->get();
        return view('post', ['posts' => $post]);
    }


    // function __construct()
    // {
    //     $this->middleware('auth');
    // to get authenticated by login }

    function detailPost($id, Request $request)

    {
        if ($request->isMethod('post')) {
            $comments = new Comment;
            $comments->name = $request->name;
            $comments->prenom = $request->prenom;
            $comments->comment = $request->comment;
            $comments->updated_at = date('Y-m-d H:i:s');
            $comments->post_id = $id;
            $comments->save();
        }
        $post = DB::table('posts')->where('id', $id)->first();
        $comments = DB::table('comments')->where('post_id', $id)->orderby('created_at', 'desc')->get(); // getting comment and by order(orderby)
        return view('comment', ['post' => $post, 'comments' => $comments]);
    }
}
