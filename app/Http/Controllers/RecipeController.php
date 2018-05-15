<?php
namespace App\Http\Controllers;

use App\Allergy;
use App\Listable;
use App\UserAllergy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Recipe;
use App\User;
use App\Lists;
use GuzzleHttp\Client;

class RecipeController extends Controller
{

    public function index()
    {

    }

    public function allRecipes() {

        $user = Auth::user();
        $user_allergies = UserAllergy::all()->where('user_id', Auth::id());

        // All Libelle Lekker Recipes

        $all_recipes = Recipe::recipes();

        // Recipes that take the users allergies into account

        $recipes = $all_recipes;
        foreach ($all_recipes as $key => $a) {
            foreach ($user_allergies as $u) {
                if (str_contains(strtolower($a->ingredienten), $u->allergies()->first()->name)) {
                    unset($recipes[$key]);
                }
            }
        }

        // Saved Recipes

        $recipe_lists = Lists::where('type', 'recipe')->get()->sortByDesc('id');

        return view('recipelist.recipes', compact('recipes', 'recipe_lists', 'all_recipes', 'user', 'user_allergies'));

    }

    public function addList() {


        $list = new Lists();
            $list->user_id = Auth::id();
            $list->type = "recipe";
            $list->name = $_REQUEST['name_list'];
            $list->img = $_REQUEST['img_list'];
            $list->save();

            return redirect('/recipes');

    }

    public function showRecipe($id) {

        // One Libelle Lekker Recipes

        $recipe = Recipe::recipe($id);

        $user = Auth::user();

        return view('recipelist.recipe', compact('recipe', 'user'));

    }

    public function addToList($recipeId, $listId) {

        $listable_count = Listable::where('list_id', $listId)->count();

        if ($listable_count != 0){
            $listable_old = Listable::where('list_id', $listId)->get();
            foreach ($listable_old as $item) {
                if ($item->listable_id == $recipeId){
                    Session::flash('message', 'Het recept bestaat al in jouw lijstje');
                    Session::flash('class', 'error');
                } else {
                    $listable = Listable::firstOrNew(['list_id' => $listId, 'listable_id' => $recipeId]);
                    $listable->list_id = $listId;
                    $listable->listable_id = $recipeId;
                    $listable->save();

                    $recipe = Recipe::recipe($recipeId);

                    $list = Lists::find($listId);
                    $list->img = $recipe->img;
                    $list->save();
                    Session::flash('message', 'Het recept is toegevoegd aan jouw lijstje');
                    Session::flash('class', 'succes');
                }
            }
        } else {
            $listable = new Listable();
            $listable->list_id = $listId;
            $listable->listable_id = $recipeId;
            $listable->save();

            $recipe = Recipe::recipe($recipeId);

            $list = Lists::find($listId);
            $list->img = $recipe->img;
            $list->save();
            Session::flash('message', 'Het recept is toegevoegd aan jouw lijstje');
            Session::flash("class", "succes");
        }

        return redirect("/recipe/$recipeId");

    }

    public function getCustomRecipes(Request $request)
    {
        $allergies = $request->allergies;
        $all_recipes = Recipe::recipes();
        $recipes = $all_recipes;

        foreach ($all_recipes as $key => $a){
            foreach ($allergies as $allergy){
                if (str_contains(strtolower($a->ingredienten), $allergy)) {
                    unset($recipes[$key]);
                }
            }
        }

        return $recipes;

    }

}