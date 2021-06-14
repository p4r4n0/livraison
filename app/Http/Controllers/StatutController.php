<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Statut;

class StatutController extends Controller
{
    //
    public function list() {
        $statuts = Statut::all();
        return view('Admin.inc.statuts',['statuts'=>$statuts]);
    }
    public function ajouter() {
        return view('Admin.inc.statut');
    }
    public function index() {
        $statuts = Statut::all();
        // $response['statuts'] = $statuts;
        // $response['success'] = 'true';

        return response()->json($statuts);
    }
    public function store(){
        $this->validate(request(), [
            'statut' => 'required'
        ]);
   
        Statut::create(request(['statut']));

        return back()->with('success','Le statut a été ajouté avec success.');

    }

    public function update($id) {
        $this->validate(request(), [
            'statut' => 'required'
        ]);
        $statut = Statut::findOrFail($id);
        $statut->update(request(['statut']));

        return back()->with('success','Le statut a été edité avec succés.');
    }

    public function destroy($id) {
        $statut = Statut::findOrFail($id);
        $statut->delete();
  
        
        return back()->with('success','Le statut a été supprimer avec succés.');
    }
}
