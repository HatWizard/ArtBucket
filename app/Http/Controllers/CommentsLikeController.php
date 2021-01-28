<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentsLikeController extends Controller
{
    public function store(Comment $comment)
    {
        if($comment->likedBy(request()->user())){
            return back();
        }

        $comment->likes()->create(['user_id'=>request()->user()->id])->save();

        return back();

    }


    public function destroy(Comment $comment)
    {
        $comment->likes()->where('user_id', request()->user()->id)->delete();
        return back();
    }
}
