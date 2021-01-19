<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use App\Alumne;
use App\Empresa;
use App\Offer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    public function dashboard(){
        $offers = Offer::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('offers'));
    }

    public function empreses(){
        $empreses = Empresa::all()->sortByDesc("created_at");
        return view('admin.empreses', compact('empreses'));
    }

    public function alumnes(){
        $alumnes = Alumne::all()->sortByDesc("created_at");
        return view('admin.alumnes', compact('alumnes'));

    }

    public function edit(){
        $admin = Admin::first();
        $user = Auth::user();
        return view('admin.edit', compact('admin', 'user'));

    }

    public function update(Request $request){
        $admin = Admin::first();
        $user = Auth::user();

        if($request->password != NULL){
          if ($request->email === $user->email) {
              $data_user = $request->validate([
                  'email' => 'required|email',
                  'password' => 'required',
              ]);
          } else {
              $data_user = $request->validate([
                  'email' => 'required|email|unique:users',
                  'password' => 'required',
              ]);
          }
          $user->password = bcrypt($data_user['password']);
        } else {
           if ($request->email === $user->email) {
               $data_user = $request->validate([
                   'email' => 'required|email',
               ]);
           } else {
                $data_user = $request->validate([
                   'email' => 'required|email|unique:users',
               ]);
           }
        }

        $user->email = $data_user['email'];
        $user->save();

        $data_admin = $request->validate([
            'name' => 'required',
        ]);

        $admin->update($data_admin);
        $request->session()->flash('success', 'Detalls desats correctament');

        return redirect()->back();

    }

       public function alumnesShow($alumne_id) {
           $alumne = Alumne::find($alumne_id);
           return view('admin.alumne-show', compact('alumne'));
        }

        public function empresesShow($empresa_id) {
           $empresa = Empresa::find($empresa_id);
           return view('admin.empresa-show', compact('empresa'));
        }

         public function offersShow($offer_id) {
           $offer = Offer::find($offer_id);
           return view('admin.offer-show', compact('offer'));
        }

        public function offersRemove($offer_id){
          Offer::find($offer_id)->delete();
          return redirect()->route('admin.dashboard');
        }
}
