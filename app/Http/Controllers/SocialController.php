<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
class SocialController extends Controller
{
    //
    public function redirect()
    {
        return Socialite::driver("facebook")->redirect();
    }
    public function callback()
    {
      $getInfo = Socialite::driver("facebook")->user(); 
      $user = $this->createUser($getInfo,"facebook"); 
      auth()->login($user); 
      return redirect()->to('/');
    }
    function createUser($getInfo,$provider){
    $user = User::where('provider_id', $getInfo->id)->first();
    if (!$user) {
         $user = User::create([
            'name'     => $getInfo->name,
            'email'    => $getInfo->email,
            'avatar'    => $getInfo->avatar,
            'admin'    => false,
            'provider' => $provider,
            'provider_id' => $getInfo->id
        ]);
      }
      return $user;
    }
}
