<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    //
    public function register(){
        $this->validate(request(), [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $data = request(['name', 'username', 'email', 'password']);
        $data += array('admin' => true);
        $data += array('provider' => 'none');
        $data += array('provider_id' => 0);

        $user = User::create($data);
        
        auth()->login($user);
        
        return redirect()->to('/');
    }
}
