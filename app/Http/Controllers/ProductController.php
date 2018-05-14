<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\UserAllergy;
use App\Lists;
use App\Listable;
use App\Recipe;

class ProductController extends Controller
{
    public function allProducts()
    {

        $user = User::find(1);
        $user_allergies = UserAllergy::all()->where('user_id', 1);

        // All Carrefour Products

        $all_products = Product::products();

        // Products that take the users allergies into account

        $products = $all_products;
        foreach ($all_products as $key => $a) {
            foreach ($user_allergies as $u){
                if (str_contains(strtolower($a->ingredienten), $u->allergies()->first()->name)) {
                    unset($products[$key]);
                }
            }
        }

        // Saved Products

        $products_lists = Lists::where('type', 'product')->get()->sortByDesc('id');

        return view('productlists.products', compact('products', 'products_lists', 'all_products', 'user', 'user_allergies'));
    }

    public function addList() {


        $list = new Lists();
        $list->user_id = 1;
        $list->type = "product";
        $list->name = $_REQUEST['name_list'];
        $list->img = $_REQUEST['img_list'];
        $list->save();

        return redirect('/products');

    }

    public function showProduct($id) {

        // One Carrefour Product

        $product = Product::product($id);

        $user = User::find(1);

        $all_recipes = Recipe::recipes();

        return view('productlists.product', compact('product', 'all_recipes', 'user', 'msgError', 'msgSucces'));

    }

    public function addToList($productId, $listId) {

        $listable_count = Listable::where('list_id', $listId)->count();

        if ($listable_count != 0){
            $listable_old = Listable::where('list_id', $listId)->get();
            foreach ($listable_old as $item) {
                if ($item->listable_id == $productId){
                    Session::flash('message', 'Recipe already exists');
                } else {
                    $listable = new Listable();
                    $listable->list_id = $listId;
                    $listable->listable_id = $productId;
                    $listable->save();

                    $product = Product::product($productId);

                    $list = Lists::find($listId);
                    $list->img = $product->img;
                    $list->save();
                    Session::flash('message', 'Recipe added to list');
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
            Session::flash('message', 'Recipe added to list');
        }

        return redirect("/recipe/$productId");

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
