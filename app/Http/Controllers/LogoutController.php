<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check()){
            Auth::logout();
            return redirect()->route('mainhome');
        }   
        return back();
    }
}
