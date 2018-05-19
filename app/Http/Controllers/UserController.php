<?php

namespace App\Http\Controllers;

use App\Product;
use App\Recipe;
use Illuminate\Http\Request;
use App\User;
use App\UserAllergy;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index() {

        $users = User::all();
        return view('users/index', compact('users'));
    }

    public function profile() {

        $user = Auth::user();
        $user_allergies = UserAllergy::all()->where('user_id', Auth::id());

        // Some recipes to show
        $recipes = Recipe::recipes();
        $all_recipes = $recipes;
        foreach ($all_recipes as $key => $a) {
            foreach ($user_allergies as $u) {
                if (str_contains(strtolower($a->alerts), $u->allergies()->first()->name)) {
                    unset($all_recipes[$key]);
                }
            }
        }
        $keys = array_keys($all_recipes);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key) {
            $random[$key] = $all_recipes[$key];
        }
        $recipes = array_slice($random, 0, 5);

        // Some products to show

        $products = Product::products();
        $all_products = $products;
        foreach ($all_products as $key => $a) {
            foreach ($user_allergies as $u) {
                if (str_contains(strtolower($a->alerts), $u->allergies()->first()->name)) {
                    unset($all_products[$key]);
                }
            }
        }
        $keys = array_keys($all_products);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key) {
            $random[$key] = $all_products[$key];
        }
        $products = array_slice($random, 0, 5);

        return view('profile.profile', compact('user', 'user_allergies', 'products', 'recipes'));

    }

    public function getUser($id) {


    }

    public function editProfile() {

        $user = Auth::user();
        $user_allergies = UserAllergy::all()->where('user_id', Auth::id());

        return view('profile.edit', compact('user', 'user_allergies'));
    }
}
