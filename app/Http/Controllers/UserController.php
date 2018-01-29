<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index() {

        $users = User::all();
        return view('users/index', compact('users'));
    }

    public function profile() {

        $user = User::find(1);
        return view('partials/registration', compact('user'));

    }

    public function getUser($id) {


    }
}
