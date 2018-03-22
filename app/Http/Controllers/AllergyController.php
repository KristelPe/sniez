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
        if (Auth::check()) {
            $allergies = Allergy::all();
            $user = Auth::user();
            return view('login.registration', compact('allergies', 'user'));
        } else {
            redirect('/');
        }
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

        return view('profile.profile', compact('user'));
    }

    /*
     * LATER: Update allergies on profilepage
     * */
    public function update(){

    }
}