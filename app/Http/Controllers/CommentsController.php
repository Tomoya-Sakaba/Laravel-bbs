<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(CommentRequest $request, $id)
    {
        Comment::create([
            'comment' => $request->input('comment'),
            'post_id' => $id
        ]);

        return redirect()->route('post.show', $id);
    }
}
