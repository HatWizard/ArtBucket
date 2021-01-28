<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function store(Request $request)
    {
        $form_array = $this->validate($request, 
        [
            'email'=>'required',
            'password'=>'required'
        ]);

        $remember = $request['remember_me']=='on'? true:false;   
        $credentials = $request->only('email', 'password');

        if(!Auth::check() and Auth::attempt($credentials, $remember))
        {
            $user=User::where('email', '=', $credentials['email'])->first();

            Auth::login($user, $remember);
            return back();
        }
        return back();
    }
}
