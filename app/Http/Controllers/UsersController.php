<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function liste()
    {
        // j'instancie un objet
        // j'utilise la methode statique all() qui retourn un tableau
        $users = Users::all();

        // je renvoie a la vue la variable
        return view('users', [
            'users' => $users
        ]);
    }
}
