<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function formulaire() {
        return view('connexion');
    }

    public function traitement() {

        $result = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        var_dump($result);
        
        return 'Traitement de formulaire de connexion';
    }
}
