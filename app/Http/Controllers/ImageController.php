<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ImageHandler;
use App\Models\Image;

use App\Helpers\TagsHandler;


class ImageController extends Controller
{

    public function index(){
        
    }

    public function show($id){
        $image = Image::find($id);
        if(!$image) return abort(404);

        $comments = $image->comments()->paginate(10);
        $tags = array_column($image->tags()->take(10)->select('name')->get()->toArray(), 'name');
        return view("Images.index")->with(["image" =>$image, 'comments'=>$comments, 'tags'=>$tags]);
    }

    public function create(){
        return view('Images.create');
    }

    public function store(Request $request){
        
        //dd($request);

        $formArray= $this->validate($request,
        [
            'image'=>'required|image',
            'author_name'=>'required',
            'title'=>'required',
            'body'=>'required'
        ]
        );



        $object = $request->only(['author_name', 'source_url', 'title', 'body']);    
        $object['path'] = ImageHandler::save($formArray['image'], auth()->user()->username);
        $object['user_id']=auth()->user()->id;

        $img = Image::create($object);
        
        $img->save();


        //tags handling

        $tags = $request->only('tags');
        if(array_count_values($tags)>0){
            TagsHandler::addTags($img, $tags['tags']);
        }

        return redirect()->route('mainhome');
    }
}
