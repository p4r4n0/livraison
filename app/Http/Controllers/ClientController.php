<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    //
    public function list() {
        $clients = Client::all();
        return view('Admin.inc.clients',['clients'=>$clients]);
    }

    
    public function getClient($firebase_id) {
        
        $client = Client::where('firebase_id','=',$firebase_id)->firstOrFail();
           
        return response()->json($client);
    }

    
    public function ajouterClient() {
        $this->validate(request(), [
            'nom' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'firebase_id' => 'required'
        ]);
        $client = Client::create(request()->all());
        
        
        return response()->json($client);

    }

}
