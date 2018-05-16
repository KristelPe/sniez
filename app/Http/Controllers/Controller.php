<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {

        return view('login.login');

    }

    public function noAuth(){

        Session::flash("message", "Login of registeer alvorens naar deze pagina te surfen");
        Session::flash("class", "error");
        return redirect('/');

    }

    public function register() {

        return view('login.registration');
    }
}
