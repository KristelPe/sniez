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

/* Socialite : Facebooklogin */

Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'Controller@index');

Route::get('/registration', 'UserController@profile');


/*
=================
    MENU
=================
*/
Route::get('/nav', function (){
    return view('partials.nav');
});
/*
=================
    ALLERGY
=================
*/

Route::get('/allergy', 'AllergyController@index');
Route::post('/profile', 'AllergyController@store');

/*
=================
    RECIPE
=================
*/

Route::get('/recipe', 'RecipeController@index');


/*
==================
    PROFILE
==================
*/

Route::get('/profile', 'UserController@profile');

/*
==================
    QR SCANNER
==================
*/
//Route::post('/scan', 'QrController@index');

Route::get('/scan', function (){
    return view('scan');
});

Route::post('/scan', 'QrController@test');