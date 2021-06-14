<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    //
    // protected $filleable = [
    //     'nom',
    //     'logo'
    // ];
    protected $guarded = ['id'];  

}
