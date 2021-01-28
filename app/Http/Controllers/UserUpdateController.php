<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserUpdateController extends Controller
{
    public function index($id)
    {
        $user=User::find($id);
        return view('Users.update')->with('user', $user);
    }

    public function update($id)
    {
        $request = request();
        $user=User::find($id);

        $formData = $this->validate($request,[
            'avatar'=>'required'
        ]);
        $avatar = $request['avatar'];
        $user->set_avatar($avatar);
        $user->update();
        return redirect()->route('Users.index', ['id'=>$id]);
    }
}
