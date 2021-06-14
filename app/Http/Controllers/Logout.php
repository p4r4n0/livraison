<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class Logout extends Controller
{
    public function logout () {
        auth()->logout();
        return redirect('/');
    }
}
