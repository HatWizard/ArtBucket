<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImagesCommentController extends Controller
{
    public function index(){

    }

    public function store(Image $image){
        $comment = $this->validate(request(),
        [
            'body'=>'required'
        ]
        );
        $comment['user_id']=request()->user()->id;

        $image->comments()->create($comment)->save();

        return back();
    }
}
