<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AdminController extends Controller
{
    //
    public function index(){
        $x;
        $users = User::where('admin', '=', '1')->get();
        $usersCount = $users->count();
        if($usersCount==0){
            if($user = Auth::user()){
                auth()->logout();
                return view('Admin.register');
            } 
            return view('Admin.register');
        }else {
            if(Auth::check()){
                $user=auth()->user();
                if($user->admin){
                    $x = '1';
                    return view('Admin.admin')->with('x',$x);
                } else {
                    auth()->logout();
                    return view('Admin.admin');
                }
            } else {
                return view('Admin.admin');
            }            
        } 


    }

    public function logout(){
        auth()->logout();

    }



}
