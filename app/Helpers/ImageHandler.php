<?php

namespace App\Helpers;

class ImageHandler
{

    public static function save($image, $publisher){
       
       $path=$image->store("images/".$publisher);
       
       return $path;
    }

}


?>