<?php
namespace App\Http\Controllers;

use App\Allergy;
use App\UserAllergy;
use Illuminate\Http\Request;


class AllergyController extends Controller
{
    /*
     * Shows all allergies on allergy page
     * */
    public function index()
    {
        $allergies = Allergy::all();
        return view("login.registration", compact("allergies"));
    }

    /*
     * Save allergies to user
     * */
    public function store(Request $request){
        foreach ($request->allergies as $allergy) {
            $user_allergy = new UserAllergy();
            $user_allergy->user_id = 1; //moet nadien door session_id vervangen worden
            $user_allergy->allergy_id = $allergy;
            $user_allergy->save();
        }
        //return view() -> moet nog toegevoegd worden eens volgende pagina af is
    }

    /*
     * LATER: Update allergies on profilepage
     * */
    public function update(){

    }
}