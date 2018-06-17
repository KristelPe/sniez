<?php

namespace App\Http\Controllers;

use App\Product;
use App\Recipe;
use Illuminate\Http\Request;
use App\User;
use App\UserAllergy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $recipes = array_slice($random, 5);

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

    public function editProfile() {

        $user = Auth::user();
        $user_allergies = UserAllergy::all()->where('user_id', Auth::id());

        return view('profile.edit', compact('user', 'user_allergies'));
    }

    public function updateProfile(Request $request) {

        $user = Auth::user();


        if ($request == null) {
            Session::flash("message", "Er werden geen gegevens gevonden om aan te passen");
            Session::flash("class", "error");
            return redirect('/edit');
        } else {
            if ($request->firstname == null || $request->lastname == null) {
                Session::flash("message", "Gelieve een voor- en achternaam in te vullen");
                Session::flash("class", "error");
                Session::flash("name", "error-border");
                if ($request->email != null) {
                    $user->email = $request->email;
                    $user->save();
                    Session::flash("message2", "Email succesvol gewijzigd");
                    Session::flash("class2", "succes");
                }
                return redirect('/edit');
            } else {
                $user->name = $request->firstname . " " . $request->lastname;
                Session::flash("message", "Naam succesvol gewijzigd");
                Session::flash("class", "succes");
                if ($request->email != null) {
                    $user->email = $request->email;
                    Session::flash("message2", "Email succesvol gewijzigd");
                    Session::flash("class2", "succes");
                }
                $user->save();
                return redirect('/edit');
            }


        }

    }
}
