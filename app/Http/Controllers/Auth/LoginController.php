<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/home';

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
        $user = User::all()->where('email', $facebookUser->email)->first();

        if ($user === null) {

            $user = new User;
            $user->name = $facebookUser -> name;
            $user->email = $facebookUser -> email;
            $user->avatar = $facebookUser -> avatar;
            $user->save();
        }

        Auth::login(User::where('email', $user->email)->first());

        return redirect('/allergy');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
