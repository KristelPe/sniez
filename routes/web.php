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
Route::get('/login', 'Controller@noAuth')->name('login');

Route::post('/login', 'Auth\LoginController@emailLogin');
Route::post('/register', 'Auth\RegisterController@emailRegistration');

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/register', 'Controller@register');


//group containing all routes that need authentication before access
Route::group(['middleware' => ['auth']], function() {
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
    =================
        PRODUCT GET
    =================
    */

    Route::get('/products', 'ProductController@allProducts');
    Route::get('/product/{id}', 'ProductController@showProduct');
    Route::get('/product/{productId}/addToList/{listId}', 'ProductController@addToList');

    /*
    =================
        PRODUCT POST
    =================
    */

    Route::post('/products', 'ProductController@addList');
    Route::post('/productsFiltered', 'ProductController@getCustomProducts');


    /*
    ==================
        PROFILE
    ==================
    */

    Route::get('/home', 'UserController@profile');
    Route::get('/edit', 'UserController@editProfile');

    /*
    ==================
        QR SCANNER
    ==================
    */

    Route::get('/scan', 'QrController@index');
    Route::post('/scan', 'QrController@getProduct');


    /*
    =================
        LIST
    =================
    */

    Route::get('/list/{id}', 'ListController@openList');

});
