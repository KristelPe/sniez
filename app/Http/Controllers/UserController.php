<?php

namespace App\Http\Controllers;

use App\Listable;
use App\Lists;
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
        $listables = Listable::all();

        // Some recipes to show

        $recipes_lists = Lists::where('type', 'recipe')->where('user_id', Auth::id())->get();
        $recipes_listables = array();
        foreach ($recipes_lists as $r){
            foreach ($listables as $l) {
                if ($l->list_id == $r->id){
                    array_push($recipes_listables, $l);
                }
            }
        }
        $recipes = array();
        foreach ($recipes_listables as $rl) {
            $recipe = Recipe::recipe($rl->listable_id);
            array_push($recipes, $recipe);
        }
        $recipes = array_slice(array_reverse($recipes),0, 5);

        // Some products to show

        $products_lists = Lists::where('type', 'product')->where('user_id', Auth::id())->get();
        $products_listables = array();
        foreach ($products_lists as $p){
            foreach ($listables as $l) {
                if ($l->list_id == $p->id){
                    array_push($products_listables, $l);

                }
            }
        }
        $products = array();
        foreach ($products_listables as $pl) {
            $product = Product::product($pl->listable_id);
            array_push($products, $product);
        }
        $products = array_slice(array_reverse($products),0, 5);

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
