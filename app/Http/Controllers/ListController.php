<?php

namespace App\Http\Controllers;

use App\Listable;
use App\Recipe;
use Illuminate\Http\Request;
use App\Lists;

class ListController extends Controller
{
    public function openList($id) {

        $user = User::find(1);

        // get list
        $list = Lists::find($id);

        // get id's from alle recipes that belong to the above list
        $listables = Listable::where('list_id', $id)->get();

        if ($list->type == 'recipe'){

            //get all recipes
            $recipes = Recipe::recipes();
            $listItems = [];

            //add recipes where id = listable_id to array
            foreach ($listables as $l) {
                foreach ($recipes as $key => $recipe){
                    if ($l->list_id == $recipe->id){
                        $listItems =  array_add($listItems, $key, $recipe);
                    }
                }
            }

        } else if($list->type == 'product') {

        }

        dd($listItems);

    }
}
