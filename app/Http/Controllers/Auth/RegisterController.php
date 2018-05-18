<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    //use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);


    }

    public function emailRegistration(Request $request){
        $user = User::where('email', $request->email)->first();

        if ($user == null){
            $user = new User();
            $user->name = $request->firstname . ' ' . $request->lastname;
            $user->email = $request->email;

            if ($request->hasFile('avatar')) {
                $filename = $request->file('avatar')->hashName();
                $user->avatar =  '/uploads/' . $filename;
                $destinationPath = 'uploads/';
                $request->file('avatar')->move($destinationPath, $filename);
            }

            $user->password = Hash::make($request->password);
            $user->save();

            Auth::login(User::where('email', $user->email)->first());

            return redirect('/allergy');
        } else {
            if ($user->password == null){

                $user->name = $request->firstname . ' ' . $request->lastname;
                $user->email = $request->email;
                if ($request->hasFile('avatar')) {
                    $filename = $request->file('avatar')->hashName();
                    $user->avatar =  '/uploads/' . $filename;
                    $destinationPath = 'uploads/';
                    $request->file('avatar')->move($destinationPath, $filename);
                }
                $user->password = Hash::make($request->password);
                $user->save();

                Auth::login(User::where('email', $user->email)->first());

                return redirect('/allergy');
            } else {
                Session::flash("message", "Dit e-mailadres is al reeds in gebruik");
                Session::flash("class", "error");
                return redirect('/register');
            }
        }

    }

}
