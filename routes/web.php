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

Route::get('/bonjour/{nom}', function () {
    return view('bonjour');
});