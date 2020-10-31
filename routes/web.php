<?php

use App\Models\User;
use App\Models\Users;
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



// permet de créer un utilisateur
Route::post('/inscription', function () {
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
        'email' => request('email'),
        'mot_de_passe' => bcrypt(request('password'))
    ]);

    return 'votre email est ' . request('email');
});


// récupérer les données de la bdd
// grace a la methode statique all()
Route::get('/users', function () {
    // j'instancie un objet
    // j'utilise la methode statique all() qui retourn un tableau
    $users = Users::all();

    // je renvoie a la vue la variable
    return view('users', [
        'users' => $users
    ]);
});