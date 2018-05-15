<?php

namespace App\Http\Controllers;

use App\Listable;
use App\Product;
use App\Recipe;
use Illuminate\Http\Request;
use App\Lists;
use App\User;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function openList($id) {

        $user = Auth::user();

        // get list
        $list = Lists::find($id);

        // get id's from alle recipes that belong to the above list
        $listables = Listable::where('list_id', $id)->get();


        $listItems = array();

        if ($list->type == 'recipe'){

            //get all recipes
            $recipes = Recipe::recipes();

            //add recipes where id = listable_id to array
            foreach ($listables as $l) {
                foreach ($recipes as $recipe){
                    if ($l->listable_id == $recipe->id){
                        array_push($listItems, $recipe);
                    }
                }
            }

        } else if($list->type == 'product') {

            //get all products
            $products = Product::products();

            //add products where id = listable_id to array
            foreach ($listables as $l) {
                foreach ($products as $product){
                    if ($l->listable_id == $product->id){
                        array_push($listItems, $product);
                    }
                }
            }
        }

        return view('list.list', compact('user', 'listItems', 'recipes', 'list'));
    }
}
