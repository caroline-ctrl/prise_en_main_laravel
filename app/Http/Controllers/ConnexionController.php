<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{
    public function formulaire() {
        return view('connexion');
    }

    public function traitement() {
        return 'Traitement de formulaire de connexion';
    }
}
