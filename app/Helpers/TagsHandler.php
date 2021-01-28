<?php

namespace App\Helpers;
use App\Models\Tag;

class TagsHandler{

    public static function explodeTags($tags){
        return explode(',', str_replace(' ',',',$tags));
    }

    public static function isExlodedTags($tags){
        return !str_contains($tags[0], ' ');
    }

    public static function AddTags($resource, $tags){
        $separatedTags= TagsHandler::explodeTags($tags);
        

        //TODO add tags limit constant

        $counter=0;
        foreach($separatedTags as $tag){
            //tags limit
            if($counter>10) break;
            $tag_record = Tag::where('name', '=', $tag)->first();

            //if tag already existed
            if($tag_record===null){
                //creates new
                $resource->tags()->create(['name'=>$tag]);
            }
            else
            {
                //or attach existed
                $resource->tags()->attach($tag_record);
            }
        }
        $resource->save();
    }



}

?>