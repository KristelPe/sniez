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


}