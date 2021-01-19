<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson()) {
    //         return route('login');
    //     }
    // }

        protected function redirectTo($request)
    {
      // dd('hitting the authenticate middleware redirect');
      // dd($request->get('role'));
      if (Auth::check()) {
        return $next;
      } else {
        if ($request->get('role') === '2'){
          return route('auth.alumnes');
        } else {
          return route('auth.empreses');

        }
      }

    }
}
