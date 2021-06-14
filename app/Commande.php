<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //
    // protected $filleable = [
    //     'firebase_id',
    //     'nom',
    //     'adresse',
    //     'quantité',
    //     'produit_id',
    //     'statut_id'
    // ];
    protected $guarded = ['id'];  

}
