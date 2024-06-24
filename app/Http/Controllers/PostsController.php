<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortByDesc('id');
        return view('posts', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = $post->comments()->orderBy('id', 'desc')->get();
        return view('show', ['post' => $post, 'comments' => $comments]);
    }

    public function store(PostRequest $request)
    {
        Post::create([
            'title' => $request->title,
            'message' => $request->message,
        ]);

        return redirect()->route('post');
    }
}
