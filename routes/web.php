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

Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('/login/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/', 'Controller@index');

Route::get('/registration', 'UserController@profile');

Route::get('/logout', 'Auth\LoginController@logout');

/*
=================
    ALLERGY
=================
*/

Route::get('/allergy', 'AllergyController@index');
Route::post('/home', 'AllergyController@store');


/*
=================
    RECIPE GET
=================
*/

Route::get('/recipes', 'RecipeController@allRecipes');
Route::get('/recipe/{id}', 'RecipeController@showRecipe');
Route::get('/recipe/{recipeId}/addToList/{listId}', 'RecipeController@addToList');

/*
=================
    RECIPE POST
=================
*/

Route::post('/recipes', 'RecipeController@addList');
Route::post('/recipesFiltered', 'RecipeController@getCustomRecipes');


/*
==================
    PROFILE
==================
*/

Route::get('/home', 'UserController@profile');


/*
==================
    QR SCANNER
==================
*/

Route::get('/scan', 'QrController@index');
Route::post('/scan', 'QrController@test');


/*
=================
    LIST
=================
*/

Route::get('/list/{id}', 'ListController@openList');
