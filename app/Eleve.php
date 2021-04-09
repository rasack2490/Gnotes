<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    //
    protected $fillable = [
        'nom','prenom', 'email', 'password','image','numero', 'role'
    ];
}
