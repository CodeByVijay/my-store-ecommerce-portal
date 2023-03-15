<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required',
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->intended('admin/dashboard');
        }
        return redirect()->back()->with('failed','Username or Password not match.');
    }

    public function forgot_passwordView(){
        return view('auth.forgot_password');
    }
}
