<?php
namespace App\Http\Controllers;

use App\Allergy;
use App\UserAllergy;
use Illuminate\Http\Request;
use App\Recipe;
use App\User;
use GuzzleHttp\Client;

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

        $user = User::find(1);
        $user_allergies = UserAllergy::all()->where('user_id', 1);

        $json_string=file_get_contents("https://getbridgeapp.co/api/testsniezapi/snieztest/");
        $recipes = json_decode($json_string);

        return view('recipelist.recipes', compact('recipes', 'user', 'user_allergies'));
    }

}