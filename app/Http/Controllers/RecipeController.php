<?php
namespace App\Http\Controllers;

use App\Allergy;
use App\UserAllergy;
use Illuminate\Http\Request;
use App\Recipe;
use App\User;
use App\RecipesLists;
use GuzzleHttp\Client;

class RecipeController extends Controller
{

    public function index()
    {

    }

    public function allRecipes()
    {

        $user = User::find(1);
        $user_allergies = UserAllergy::all()->where('user_id', 1);

        // All Libelle Lekker Recipes

        $json_string=file_get_contents("https://bridge.buddyweb.fr/api/testsniezapi/snieztest");
        $recipes = json_decode($json_string);

        // Saved Recipes

        $recipe_lists = RecipesLists::all()->sortByDesc('id');

        return view('recipelist.recipes', compact('recipes', 'recipe_lists', 'user', 'user_allergies'));
    }

    public function addList() {

        $list = new RecipesLists();
            $list->name=$_REQUEST['name_list'];
            $list->img=$_REQUEST['img_list'];
            $list->save();

            return redirect('/recipes');

    }

    public function showRecipe($id) {

        // All Libelle Lekker Recipes

        $json_string=file_get_contents("https://bridge.buddyweb.fr/api/testsniezapi/snieztest/$id");
        $recipe = json_decode($json_string);


        $user = User::find(1);
        return view('recipelist.recipe', compact('recipe', 'user'));

    }

}