<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    ublic function redirectTo() {
        $user = Auth::user();
        if ($user->is_verified){
        //redirect to dashboard according to their role_id
            if (Auth::user()->role_id === 2){
                return route('alumnes.dashboard');
            } elseif (Auth::user()->role_id === 3){
                return route('empreses.dashboard');
            } elseif (Auth::user()->role_id === 1){
                return route('admin.dashboard');
            } else {
                return route('home');
            }
        } else {
        // if user has not been verified redirect back with warning asking to verify
            Session::flash('message', 'El teu compte no ha estat validat. Revisa el teu correu.'); 
            Session::flash('alert-class', 'alert-warning'); 
            if ($user->role_id === 2){
                return route('auth.alumnes');
            } elseif ($user->role_id === 3){
                return route('auth.empreses');
            }
        }
        

      }
}
