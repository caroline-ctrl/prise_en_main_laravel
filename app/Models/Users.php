<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {
    // laravel exige que l'on indique les colonnes autorisées a etre remplies via un formulaire
    // donc utilisation de $fillable + le tableau
    protected $fillable = [
        'email',
        'mot_de_passe'
    ];
}
