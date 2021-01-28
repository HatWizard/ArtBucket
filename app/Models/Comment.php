<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'body'
    ];


    public function commentable(){
        return $this->morphTo();
    }

    public function likes(){
        return $this->morphMany(Like::class, "likeable");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likedBy($user){
        return $user!=null and $this->likes->contains('user_id', $user->id);
    }

}
