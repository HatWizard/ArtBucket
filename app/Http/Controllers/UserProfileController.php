<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{

    public function index($id)
    {
        $user=User::find($id);
        return view('Users.index')->with('user', $user);
    }

}
