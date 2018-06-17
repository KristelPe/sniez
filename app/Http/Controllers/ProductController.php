<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\UserAllergy;
use App\Lists;
use App\Listable;
use Illuminate\Support\Facades\Auth;
use App\Recipe;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function allProducts()
    {

        $user = Auth::user();
        $user_allergies = UserAllergy::all()->where('user_id', Auth::id());

        // All Carrefour Products

        $all_products = Product::products();

        // Products that take the users allergies into account

        $products = $all_products;
        foreach ($all_products as $key => $a) {
            foreach ($user_allergies as $u){
                if (str_contains(strtolower($a->alerts), $u->allergies()->first()->name)) {
                    unset($products[$key]);
                }
            }
        }

        // Saved Products

        $products_lists = Lists::where('type', 'product')->where('user_id', Auth::id())->get()->sortByDesc('id');

        return view('productlists.products', compact('products', 'products_lists', 'all_products', 'user', 'user_allergies'));
    }

    public function addList() {


        $list = new Lists();
        $list->user_id = Auth::id();
        $list->type = "product";
        $list->name = $_REQUEST['name_list'];
        $list->img = $_REQUEST['img_list'];
        $list->save();

        return redirect('/products');

    }

    public function showProduct($id) {

        // One Carrefour Product

        $product = Product::product($id);

        $user_allergies = UserAllergy::all()->where('user_id', Auth::id());

        $alerts = array();
        foreach ($user_allergies as $u){
            if (str_contains($product->alerts, $u->allergies()->first()->name)) {
                array_push($alerts, $u->allergies()->first()->name);
            }
        }

        $user = Auth::user();

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
        $all_recipes = array_slice($random, 0, 5);

        // Saved Products

        $products_lists = Lists::where('type', 'product')->where('user_id', Auth::id())->get()->sortByDesc('id');

        return view('productlists.product', compact('product', 'all_recipes', 'user', 'products_lists', 'alerts'));

    }

    public function addToList($productId, $listId) {

        $listable_count = Listable::where('list_id', $listId)->count();

        if ($listable_count != 0){
            $listable_old = Listable::where('list_id', $listId)->get();
            foreach ($listable_old as $item) {
                if ($item->listable_id == $productId){
                    Session::flash('message', 'Het product bestaat al in jouw lijstje');
                    Session::flash('class', 'error');
                } else {
                    $listable = Listable::firstOrNew(['list_id' => $listId, 'listable_id' => $productId]);
                    $listable->list_id = $listId;
                    $listable->listable_id = $productId;
                    $listable->save();

                    $product = Product::product($productId);

                    $list = Lists::find($listId);
                    $list->img = $product->img;
                    $list->save();
                    Session::flash('message', 'Het product is toegevoegd aan jouw lijstje');
                    Session::flash('class', 'succes');
                }
            }
        } else {
            $listable = new Listable();
            $listable->list_id = $listId;
            $listable->listable_id = $productId;
            $listable->save();

            $product = Product::product($productId);

            $list = Lists::find($listId);
            $list->img = $product->img;
            $list->save();
            Session::flash('message', 'Het product is toegevoegd aan jouw lijstje');
            Session::flash('class', 'succes');
        }

        return redirect("/product/$productId");

    }

    public function getCustomProducts(Request $request)
    {
        $allergies = $request->allergies;
        $all_products = Product::products();
        $products = $all_products;

        foreach ($all_products as $key => $a){
            foreach ($allergies as $allergy){
                if (str_contains(strtolower($a->ingredienten), $allergy)) {
                    unset($products[$key]);
                }
            }
        }

        return $products;

    }
}
