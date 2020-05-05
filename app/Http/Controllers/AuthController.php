<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
    	if (Auth::attempt($request->only('email','password'))) {
    		return redirect()->route('home');
    	}

    	return redirect()->back();
    }
}
