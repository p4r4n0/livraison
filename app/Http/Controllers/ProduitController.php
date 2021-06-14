<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Categorie;
use App\Restaurant;

class ProduitController extends Controller
{
    public function list() {
        $categories = Categorie::all();
        $restaurants = Restaurant::all();
        $produits = Produit::all();
        return view('Admin.inc.produits',['produits'=>$produits,'categories'=>$categories,'restaurants'=>$restaurants]);
    }

    public function ajouter() {
        $categories = Categorie::all();
        $restaurants = Restaurant::all();
        return view('Admin.inc.produit',['categories'=>$categories,'restaurants'=>$restaurants]);
    }

    public function index() {
        // $produits = Produit::all();
        // $response['produits'] = $produits;
        // $response['success'] = 'true';
        // return return response()->json($produits);
    }

    public function store(){
        $this->validate(request(), [
            'nom' => 'required',
            'categorie_id' => 'required',
            'restaurant_id' => 'required',
            'description' => 'required',
            'prix' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);
        $data= array('nom'=>request()->nom);
        $data += array('categorie_id'=>request()->categorie_id);
        $data += array('restaurant_id'=>request()->restaurant_id);
        $data += array('description'=>request()->description);
        $data += array('prix'=>request()->prix);
        $data += array('image'=>'images/'.$imageName);    
        Produit::create($data);

        return back()->with('success','Le produit a été ajouté avec success.');

    }
    public function update($id) {
        $this->validate(request(), [
            'nom' => 'required',
            'categorie_id' => 'required',
            'restaurant_id' => 'required',
            'description' => 'required',
            'prix' => 'required'
        ]);
        $produit = Produit::findOrFail($id);

        if(request()->hasFile('image')) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $imageName);
            $data= array('nom'=>request()->nom);
            $data += array('categorie_id'=>request()->categorie_id);
            $data += array('restaurant_id'=>request()->restaurant_id);
            $data += array('description'=>request()->description);
            $data += array('prix'=>request()->prix);
            $data += array('image'=>'images/'.$imageName);     
            $produit->update($data);
        }else{
            $produit->update(request(['nom','categorie_id','restaurant_id','description','prix']));
        }


        return back()->with('success','Le produit été edité avec succés.');
    }
    public function destroy($id) {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return back()->with('success','Le produit a été supprimer avec succés.');
    }
    
}
