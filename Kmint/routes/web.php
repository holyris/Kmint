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
    return view('index');
});

Route::get('/Connexion.php', function () {
    return view('auth/login');
});

Route::get('/Connected.php', function () {
    return view('Connected');
});

Route::get('/Favoris.php', function () {
    return view('Favoris');
});

Route::get('/InformationsPerso.php', function () {
    return view('InformationsPerso');
});

Route::get('/Inscription.php', function () {
    return view('Inscription');
});

Route::resource('user', 'UserController');

Route::get('/MdpOublie.php', function () {
    return view('MdpOublie');
});

Route::get('/MonCompte.php', function () {
    return view('MonCompte');
});

Route::get('/Abonnements.php', function () {
    return view('Abonnements');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
