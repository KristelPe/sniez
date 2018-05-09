<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserAllergy;

class UserController extends Controller
{

    public function index() {

        $users = User::all();
        return view('users/index', compact('users'));
    }

    public function profile() {

        $user = User::find(1);
        $user_allergies = UserAllergy::all()->where('user_id', 1);

        // Some recipes to show

        $json_string=file_get_contents("https://bridge.buddyweb.fr/api/testsniezapi/snieztest");
        $recipes = json_decode($json_string);

        return view('profile.profile', compact('user', 'user_allergies', 'recipes'));

    }

    public function getUser($id) {


    }
}
