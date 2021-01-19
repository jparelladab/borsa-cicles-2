<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Offer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $offers = Offer::all()->sortByDesc("created_at")->take(5);
        return view('pages.home', compact('offers'));
    }

    public function home_alumnes() {
        return view('pages.home-alumnes');
      }

    public function auth_alumnes() {
      return view('pages.auth-alumnes');
    }

    public function home_empreses() {
        return view('pages.home-empreses');
    }

    public function auth_empreses() {
        return view('pages.auth-empreses');
    }

    public function auth_admin() {
        return view('pages.auth-admin');
    }
}
