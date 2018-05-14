<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use App\User;
use App\UserAllergy;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index() {

        $users = User::all();
        return view('users/index', compact('users'));
    }

    public function profile() {

        $user = Auth::user();
        $user_allergies = UserAllergy::all()->where('user_id', Auth::id());

        // Some recipes to show

        $recipes = Recipe::recipes();

        return view('profile.profile', compact('user', 'user_allergies', 'recipes'));

    }

    public function getUser($id) {


    }

    public function editProfile() {

        $user = Auth::user();
        $user_allergies = UserAllergy::all()->where('user_id', Auth::id());

        return view('profile.edit', compact('user', 'user_allergies'));
    }
}
