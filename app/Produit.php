<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    //
    // protected $filleable = [
    //     'nom',
    //     'description',
    //     'image',
    //     'prix',
    //     'categorie_id',
    //     'restaurant_id'
    // ];
    protected $guarded = ['id'];  

}
