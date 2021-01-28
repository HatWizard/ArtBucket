<?php

namespace App\Http\Controllers;

use App\Helpers\TagsHandler;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Tag;

class HomeController extends Controller
{
    public function index(){


        $img_query = Image::orderBy('created_at', 'desc');

        if(isset($_GET['tags'])){
            if(!is_array($_GET['tags'])) $tags =TagsHandler::explodeTags($_GET['tags']);

           

            $img_query = Image::whereNotExists(function ($query1){
                $query1->select('id')->from('users')->where('id','users.id')->whereHas('tags', function($query) use(&$tags) {
                    return $query->whereNotIn('name',$tags);
                });
            }); 
           // $img_query = Image::with('tags')->Has('tags','=', $tags);

            //$img_query= Image::with('tags')->where('tags.name', $tags);
        }


        $images = $img_query->with('user')->paginate(10);

        return view('home')->with('images', $images); 
    }
}
