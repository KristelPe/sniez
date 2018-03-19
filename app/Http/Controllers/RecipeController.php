<?php
namespace App\Http\Controllers;

use App\Allergy;
use App\UserAllergy;
use Illuminate\Http\Request;
use App\Recipe;
use App\User;

class RecipeController extends Controller
{

    public function index()
    {

        $recipe = Recipe::find(1);
        $user = User::find(1);
        return view('recipelist.recipe', compact('recipe', 'user'));
    }

    public function allRecipes()
    {
        $recipe = Recipe::find(1);
        $user = User::find(1);
        $user_allergies = UserAllergy::all()->where('user_id', 1);

        foreach ($user_allergies as $user_allergy) {

            $allergy = Allergy::all()->where('allergy_id', $user_allergy);

        }


        return view('recipelist.recipes', compact('recipe', 'user', 'allergy'));
    }

}