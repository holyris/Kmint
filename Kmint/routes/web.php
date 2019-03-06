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

Route::get('/', 'Controller@getData');
Route::get('/home', 'Controller@getData');
Route::post('/', 'Controller@getParticularData');
Route::post('/home', 'Controller@getParticularData');

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

Auth::routes();
