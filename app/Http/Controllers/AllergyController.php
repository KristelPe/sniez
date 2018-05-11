<?php
namespace App\Http\Controllers;

use App\Allergy;
use App\User;
use App\UserAllergy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllergyController extends Controller
{
    /*
     * Shows all allergies on allergy page
     * */
    public function index()
    {
        /*if (Auth::check()) {
            $allergies = Allergy::all();
            $user = Auth::user();
            return view('login.registration', compact('allergies', 'user'));
        } else {
            redirect('/');
        }*/
        $allergies = Allergy::all();
        $user = User::first();
        return view('login.registration', compact('allergies', 'user'));
    }

    /*
     * Save allergies to user
     * */
    public function store(Request $request){
        $user = Auth::user();

        foreach ($request->allergies as $allergy) {
            $user_allergy = new UserAllergy();
            $user_allergy->user_id = $user->id;
            $user_allergy->allergy_id = $allergy;
            $user_allergy->save();
        }

        $user_allergies = UserAllergy::all()->where('user_id', 1);
        // Some recipes to show

        $json_string=file_get_contents("https://bridge.buddyweb.fr/api/testsniezapi/snieztest");
        $recipes = json_decode($json_string);

        return view('profile.profile', compact('user', 'user_allergies', 'recipes'));
    }

    /*
     * LATER: Update allergies on profilepage
     * */
    public function update(){

    }
}