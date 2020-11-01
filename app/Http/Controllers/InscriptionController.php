<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function formulaire() {
        return view('inscription');
    }

    public function traitement() {
        // mise en place de régles pour le formulaire
        // https://laravel.com/docs/5.5/validation#available-validation-rules
        request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:2'],
            'password_confirmation' => ['required']
        ], [ // permet de personnaliser le message d'erreur
            'password.min' => 'Pour des raisons de sécurité, votre mot de passe doit faire :min caractères.'
        ]);

        // j'instancie un objet
        // j'utilise la methode statique create() de Eloquent
        // cette méthode statique enregistre automatique l'utilisateur en bdd
        Users::create([
            'email' => request('email'), // je recupère le contenu de l'input
            'mot_de_passe' => bcrypt(request('password')) // je recupère le contenu de l'input et je le hash
        ]);

        return 'votre email est ' . request('email');
    }
}



