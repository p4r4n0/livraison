<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commande;
use App\Produit;
use App\Restaurant;
use App\Statut;

class CommandeController extends Controller
{
    //
    public function list() {
        $commandes = Commande::all();
        $produits = Produit::all();
        $restaurants = Restaurant::all();
        $statuts = Statut::all();
        return view('Admin.inc.commandes',['commandes'=>$commandes,'produits'=>$produits,'restaurants'=>$restaurants,'statuts'=>$statuts]);
    }
    public function index(){

    }
    public function store(){
        $this->validate(request(), [
            'firebase_id',
            'nom',
            'adresse',
            'quantité',
            'produit_id',
            'statut_id'
        ]);
   
        Commande::create(request(['firebase_id','nom','adresse','quantité','produit_id','statut_id']));
        $response['success'] = 'true';
        return response()->json($response);

    }
    public function update() {
        $this->validate(request(), [
            'id' => 'required',
            'statut_id' => 'required'
        ]);
        $commande = Commande::findOrFail(request()->id);
        $commande->update(request(['statut_id']));

        return back()->with('success','La commande a été edité avec succés.');
    }

    public function destroy($id) {
        $commande = Commande::findOrFail($id);
        $commande->delete();
  
        return back()->with('success','La commande a été supprimer avec succés.');
    }

    public function getCommandes($id) {

        $commandes = Commande::where('client_id','=',$id)->get();
        if(count($commandes)>0){
            return response()->json($commandes);
        }
        return abort(404);
    }
}
