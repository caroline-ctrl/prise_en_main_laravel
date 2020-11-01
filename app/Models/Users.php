<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class Users extends Model implements Authenticatable {
    
    use BasicAuthenticatable;

    // laravel exige que l'on indique les colonnes autorisées a etre remplies via un formulaire
    // donc utilisation de $fillable + le tableau
    protected $fillable = [
        'email',
        'mot_de_passe'
    ];


    /**
     * Get the password for the user
     * 
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->mot_de_passe;
    }
}
