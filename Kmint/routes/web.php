<?php

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
    return view('home');
});

Route::get('/', 'Controller@getPetition');
Route::get('/home', 'Controller@getPetition');
Route::get('//recherchePetition', 'Controller@getParticularPetition');
Route::get('/home/recherchePetition', 'Controller@getParticularPetition');


Route::get('/crowdfunding', function () {
    return view('crowdfunding');
});

Route::get('/crowdfunding', 'Controller@getCF');
Route::get('/crowdfunding/rechercheCF', 'Controller@getParticularCF');

Route::get('monCompte', function () {
    return view('monCompte');
});

Route::get('informationsPerso', function () {
    return view('informationsPerso');
});

Route::get('favoris', function () {
    return view('favoris');
});

Route::get('abonnements', function () {
    return view('abonnements');
});

Route::get('/favoris/petition', 'Controller@getFavorisPetition');

Route::get('/favoris/crowdfunding', 'Controller@getFavorisCf');

Route::get('/favoris/ajouterFavoris', 'Controller@addFavoris');

Route::get('/favoris/supprFavoris', 'Controller@supprFavoris');

Route::get('/abonnements/activerAbonnements', 'Controller@createAbonnements');

Route::get('/abonnements/desactiverAbonnements', 'Controller@deleteAbonnements');

Route::get('/abonnements/updateAbonnements', 'Controller@updateAbonnements');

Route::get('/abonnements', 'Controller@getAbonnements');

Auth::routes();
