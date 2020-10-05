<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
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

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::INDEX;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function facebook(){

        return Socialite::driver('facebook')->redirect();

    }

    public function facebookRedirect(){

    }

    public function github(){

        return Socialite::driver('github')->redirect();

    }

    public function githubRedirect(){

         $user = Socialite::driver('github')->user();

         //dd($user->getEmail());

         $user = User::firstOrCreate([

             'email' =>$user->getEmail() ,
         ],[
             'first_name' =>$user->getNickname(),
             'last_name' =>$user->getNickname(),
             'slug'=>time()."@".str_slug($user->getName(), "-")."-".str_slug($user->getNickname(),"-"),
             'password' => Hash::make(Str::random(20)),
         ]);

         Auth::login($user,true);

         return redirect('/');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }
    public function googleRedirect(){

        $user = Socialite::driver('google')->user();

        //dd($user->getEmail());

        $user = User::firstOrCreate([

            'email' =>$user->getEmail() ,
        ],[
            'first_name' =>$user->getName(),
            'last_name' =>$user->getName(),
            'slug'=>time()."@".str_slug($user->getName(), "-")."-".str_slug($user->getName(),"-"),
            'password' => Hash::make(Str::random(20)),
        ]);

        Auth::login($user,true);

        return redirect('/');
    }

}
