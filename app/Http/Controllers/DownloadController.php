<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function store(Image $image){

        if($image->downloadedBy(request()->user())){
            return Storage::download($image->path);
        }

        $image->downloads()->create(
            [
                'user_id'=>request()->user()->id
            ]
        )->save();

        
        return Storage::download($image->path);
        
    }
}
