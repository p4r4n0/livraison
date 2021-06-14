<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantController extends Controller
{
    //

    public function list() {
        $restaurants = Restaurant::all();
        return view('Admin.inc.restaurants',['restaurants'=>$restaurants]);
    }

    public function ajouter() {
        return view('Admin.inc.restaurant');
    }


    public function store(){
        $this->validate(request(), [
            'nom' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'fraislivraison' => 'required'
        ]);
        $imageName = time().'.'.request()->logo->getClientOriginalExtension();

        request()->logo->move(public_path('images'), $imageName);
        $data= array('nom'=>request()->nom);
        $data += array('logo'=>'images/'.$imageName);    
        $data += array('fraislivraison'=>request()->fraislivraison);    
        Restaurant::create($data);

        return back()->with('success','Le restaurant a été ajouté avec success.')
                     ->with( 'image',$imageName);

    }

    public function update($id) {
        $this->validate(request(), [
            'nom' => 'required',
            'fraislivraison' => 'required'
        ]);

        $restaurant = Restaurant::findOrFail($id);

        if(request()->hasFile('logo')) {
            $imageName = time().'.'.request()->logo->getClientOriginalExtension();

            request()->logo->move(public_path('images'), $imageName);
            $data= array('nom'=>request()->nom);
            $data += array('logo'=>'images/'.$imageName);   
            $data += array('fraislivraison'=>request()->frais_livraison);    

            $restaurant->update($data);
        }else{
            $restaurant->update(request(['nom','fraislivraison']));
        }
        return back()->with('success','Le restaurant été edité avec succés.');
    }

    public function destroy($id) {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return back()->with('success','Le restaurant a été supprimer avec succés.');
    }
    
    public function getRestaurants() {
        $restaurants = Restaurant::all();

        return response()->json($restaurants);
    }
}
