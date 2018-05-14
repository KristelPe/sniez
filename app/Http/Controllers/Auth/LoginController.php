<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\User;

class LoginController extends Controller
{
    /*
     |--------------------------------------------------------------------------
     | Login Controller
     |--------------------------------------------------------------------------
     |
     | This controller handles authenticating users for the application and
     | redirecting them to your home screen. The controller uses a trait
     | to conveniently provide its functionality to your applications.
     |
     */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return Response
     */

    public function handleProviderCallback()
    {

        $facebookUser = Socialite::driver('facebook')->user();
        $user = User::where('email', $facebookUser->email)->first();

        $u = User::firstOrNew(['email' => $facebookUser->email]);
        $u->token = $facebookUser->token;
        $u->name = $facebookUser->name;
        $u->email = $facebookUser->email;
        $u->avatar = $facebookUser->avatar;
        $u->save();

        Auth::login(User::where('email', $u->email)->first());

        if ($user === null) {
            return redirect('/allergy');
        } else {
            return redirect('/scan')->with('user', $u);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
