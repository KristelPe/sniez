<?php
namespace App\Http\Controllers;

use App\Allergy;
use App\Product;
use App\Recipe;
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
        $allergies = Allergy::all();
        $user = Auth::user();
        $user_allergies = UserAllergy::where('user_id', Auth::id())->get();

        return view('login.allergy', compact('allergies', 'user', 'user_allergies'));
    }

    /*
     * Save allergies to user
     * */
    public function store(Request $request){
        $user = Auth::user();

        foreach ($request->allergies as $allergy) {
            UserAllergy::where('user_id', Auth::id())->where('allergy_id', '!=', $allergy)->delete();
        }

        foreach ($request->allergies as $allergy) {
            $user_allergy = UserAllergy::firstOrNew(['user_id' => Auth::id(), 'allergy_id' => $allergy]);
            $user_allergy->user_id = Auth::id();
            $user_allergy->allergy_id = $allergy;
            $user_allergy->save();
        }

        return redirect('/home');
    }
}