<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// la route prend en parametre un chiffre compris entre 1 et 3
// laravel met a disposition la fonction request() qui recupère le chiffre fourni par l'utilisateur a traver l'url
Route::get('{n}', function () {
    return 'je suis la page ' . request('n');
})->where('n', '[1, 2, 3]');

// route qui recupère le prenom renseigné par l'utilisateur
// l'url ressemblera a : http://localhost:8000/bonjour/oxie
Route::get('/salut/{prenom}', function() {
    return 'Salut ' . request('prenom');
});

// pour garder la vue propre et organisé, il faut éviter de faire des appels de fonction dans la vue
Route::get('/bonjour/{name_url}', function () {
    // j'enregistre dans ma variable le contenu récupéré de mon url
    $name_function = request('name_url');
    // pour que la vue est accés au contenu de la variable, je la passe dans le return
    // dans la vue j'appelerai name_view
    return view('bonjour', [
        'name_view' => $name_function
    ]);
});

Route::get('/inscription', function () {
    return view('inscription');
});

Route::post('/inscription', function () {
    return 'formulaire recu';
});;