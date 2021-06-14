<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    //
    public function login(){
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(request(['username','password']))){
            return redirect()->to(route('admin'));   
        }else{
            return redirect()->to('/');   
        }
    }
}
