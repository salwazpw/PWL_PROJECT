<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }

    public function postLogin(Request $request){
        if(Auth::attempt($request->only('username', 'password'))){
            return redirect('/dashboard');
        }
        return redirect('/login');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
