<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;


   protected $fillable = 
    [
       'path',
       'source_url',
       'user_id', 
       'author_name',
       'title',
       'body'
    ];


    protected $attributes =['source_url'=>'unknown'];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->morphMany(Like::class, "likeable");
    }

    public function comments(){
        return $this->morphMany(Comment::class, "commentable");
    }

    public function downloads(){
        return $this->hasMany(Download::class);   
    }

    public function downloadedBy($user){
        return $user!=null and $this->downloads->contains('user_id', $user->id);
    }

    public function likedBy($user){
        
        return $user!=null and $this->likes->contains('user_id', $user->id);
    }

    public function commentedBy($user){
        return $user!=null and $this->comments->contains('user_id', $user->id);
    }


    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }


}
