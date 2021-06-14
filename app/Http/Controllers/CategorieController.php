<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;

class CategorieController extends Controller
{
    //

    public function list() {
        $categories = Categorie::all();
        return view('Admin.inc.categories',['categories'=>$categories]);
    }
    public function ajouter() {
        return view('Admin.inc.categorie');
    }

    public function store(){
        $this->validate(request(), [
            'nom' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images'), $imageName);
        $data= array('nom'=>request()->nom);
        $data += array('image'=>'images/'.$imageName);    

        Categorie::create($data);

        return back()->with('success','La categorie a été ajouté avec success.')
                     ->with( 'image',$imageName);


    }

    public function update($id) {
        $this->validate(request(), [
            'nom' => 'required'
        ]);

        $categorie = Categorie::findOrFail($id);

        if(request()->hasFile('image')) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $imageName);
            $data= array('nom'=>request()->nom);
            $data += array('image'=>'images/'.$imageName);   

            $categorie->update($data);
        }else{
            $categorie->update(request(['nom']));
        }

        return back()->with('success','La categorie a été edité avec succés.');
    }

    public function destroy($id) {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
  
        return back()->with('success','La categorie a été supprimer avec succés.');
    }

    public function getCategories(){
        $categories = Categorie::all();

        return response()->json($categories);

    }

}
