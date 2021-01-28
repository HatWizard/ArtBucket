<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

use function Symfony\Component\String\b;

class LikeController extends Controller
{
    public function index(){
        
    }

    public function store(Image $image){
        if($image->likedBy(request()->user())){
            return back();
        }

        $image->likes()->create(
        [
            'user_id'=>request()->user()->id
        ]
        )->save();
        return back();
    }

    public function destroy(Image $image){
        $image->likes()->where('user_id', request()->user()->id)->delete();
        return back();
    }
}
