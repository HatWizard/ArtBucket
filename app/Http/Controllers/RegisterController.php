<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $form_array = $this->validate($request, 
        [
            'username'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|confirmed'
        ]);

        $remember = $request['remember_me']=='on'? true:false;   
        $form_array['password']=Hash::make($form_array['password']);
        $user = User::create($form_array);
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials, $remember))
        {
            Auth::login($user, $remember);
            return back();
        }
        
    }

}
