<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Http\File;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function set_avatar($image_file)
    {
        $extension = $image_file->getClientOriginalExtension();
        $temp_path = 'images\temporary\\'.$this->id.'.jpg';

        $image_resize = ImageManagerStatic::make($image_file->getRealPath())->resize(300,300)->encode('jpg')->save($temp_path ,60,'jpg');; 

        $instance_image_data = new File($temp_path);
        $path=Storage::putFileAs('public/users/'.$this->id.'/avatar', $instance_image_data, $this->id.'_avtr.'.$extension);
        $this->avatar_path=$path;
        unlink(public_path($temp_path));
    }


    public function get_avatar_url()
    {
       if(isset($this->avatar_path)) return Storage::url($this->avatar_path);
       return null;
    }

    public function posts(){
        return $this->HasMany(Image::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function downloads(){
        return $this->hasMany(Download::class);
    }
}
