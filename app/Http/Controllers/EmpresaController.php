<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Offer;
use App\Models\Alumne;
use App\Models\User;
use App\Models\Admin;
use App\Models\Study;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Mail\WelcomeMail;

class EmpresaController extends Controller
{

  public function dashboard(Request $request) {
    $empresa = Empresa::find($request->user()->empresa()->id);
    $offers = $empresa->offers()->get()->sortByDesc('created_at');

    return view('empreses.dashboard', compact('empresa', 'offers'));
  }

  public function create() {
    return view('empreses.create');
  }

  public function store(Request $request) {

    $rules = [
      'email' => 'required|email|unique:users',
      'password' => 'required',
      'company_name' => 'required',
      'website' => 'required',
      'contact_person' => 'required',
      'phone_number' => 'required',
      'description' => 'required',
    ];
    $customMessages = [
      'required' => 'Camp obligatori',
      'email' => 'Introduïr adreça vàlida',
      'unique' => 'L\'adreça introduïda ja existeix',
      'max:1024' => 'L\'extensió màxima és de 1024 caràcters',
    ];

      $data = $this->validate($request, $rules, $customMessages);

      $user = new User;
      $user->email = $data['email'];
      $user->password = bcrypt($data['password']);
      $user->role_id = 3;
      $user->verification_code = sha1(time());
      $user->save();



      $empresa = new Empresa;
      $empresa->company_name = $data['company_name'];
      $empresa->website = $data['website'];
      $empresa->contact_person = $data['contact_person'];
      $empresa->phone_number = $data['phone_number'];
      $empresa->description = $data['description'];
      $empresa->user_id = $user['id'];

      $saved = $empresa->save();

      if($saved) {
        MailController::sendEmpresaSignupEmail($empresa->company_name, $empresa->user()->email, $empresa->user()->verification_code);
        MailController::sendAdminNewEmpresa(Admin::first()->name, Admin::first()->user()->email, $empresa);
        $request->session()->flash('message', 'Els detalls s\'han desat correctament');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect()->route('empreses.create-success')->withInput();
      }else {
        $request->session()->flash('message', 'Oops, something went wrong!');
        $request->session()->flash('alert-class', 'alert-danger');
        return redirect()->back()->withInput();
      }
  }


  public function edit() {
    if (Auth::user()){
      $user = User::find(Auth::user()->id);
      $empresa = $user->empresa();
      if ($empresa){
        return view('empreses.edit', compact('empresa', 'user'));
      } else {
        return redirect()->back();
      }
    } else {
      return redirect()->back();
    }
  }

  public function update(Request $request) {

      $user = Auth::user();
      $empresa = $user->empresa();

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

        $data_empresa = $request->validate([
          'company_name' => 'required',
          'website' => 'required',
          'contact_person' => 'required',
          'phone_number' => 'required',
          'description' => 'required',
        ]);

        $empresa->update($data_empresa);
        $request->session()->flash('success', 'Detalls desats correctament');

        return redirect()->back()->withInput();

  }

  public function candidatesShow($alumne_id) {
    $empresa = Auth::user()->empresa();
    $candidate = Alumne::find($alumne_id);

    return view('empreses.candidate-show', compact('empresa', 'candidate'));
  }

  public function offersCreate(){
    $empresa = Auth::user()->empresa();

    return view('empreses.offer-create', compact('empresa'));
  }

  public function offersStore(Request $request){

    $rules = [
        'title' => 'required',
        'description' => 'required',
        'study_id' => 'required',
        'requirements' => 'required',
        'jornada' => 'required',
        'contract_type' => 'required',
        'salary' => 'required',
      ];
    $customMessages = [
      'required' => 'Camp obligatori',
    ];

      $data = $this->validate($request, $rules, $customMessages);

      if ($data){
        $offer = new Offer;
        $offer->title = $data['title'];
        $offer->description = $data['description'];
        $offer->study_id = $data['study_id'];
        $offer->requirements = $data['requirements'];
        $offer->jornada = $data['jornada'];
        $offer->contract_type = $data['contract_type'];
        $offer->salary = $data['salary'];
        $offer->empresa_id = Auth::user()->empresa()->id;

        $saved = $offer->save();
      }

      if($saved) {
        MailController::sendAdminNewOffer(Admin::first()->name, Admin::first()->user()->email, $offer);
        foreach(Study::find($offer->study_id)->alumnes as $alumne){
          MailController::sendAlumneOfferMail($alumne->first_name, $alumne->user()->email, $offer);
        }
        $request->session()->flash('message', 'Els detalls s\'han desat correctament');
        $request->session()->flash('alert-class', 'alert-success');
        return redirect()->route('empreses.dashboard');
      }else {
        $request->session()->flash('message', 'Oops, something went wrong!');
        $request->session()->flash('alert-class', 'alert-danger');
        return redirect()->back()->withInput();
      }
  }

   public function offersEdit($offer_id){
     $empresa = Auth::user()->empresa();
     $offer = Offer::find($offer_id);
    return view('empreses.offer-edit', compact('empresa', 'offer'));
  }

   public function offersUpdate($offer_id, Request $request ){
    $offer = Offer::find($offer_id);
    $rules = [
      'title' => 'required',
      'description' => 'required',
      'study_id' => 'required',
      'requirements' => 'required',
      'jornada' => 'required',
      'contract_type' => 'required',
      'salary' => 'required',
    ];

    $customMessages = [
      'required' => 'Camp obligatori',
    ];

    $data = $this->validate($request, $rules, $customMessages);

    if ($data){
      $offer->title = $data['title'];
      $offer->description = $data['description'];
      $offer->study_id = $data['study_id'];
      $offer->requirements = $data['requirements'];
      $offer->jornada = $data['jornada'];
      $offer->contract_type = $data['contract_type'];
      $offer->salary = $data['salary'];
      $saved = $offer->save();
    }

    if($saved) {
      $request->session()->flash('message', 'Els detalls s\'han desat correctament');
      $request->session()->flash('alert-class', 'alert-success');
      return redirect()->back();
    }else {
      $request->session()->flash('message', 'Oops, something went wrong!');
      $request->session()->flash('alert-class', 'alert-danger');
      return redirect()->back();
    }
  }



  public function offersRemove($offer_id){
    Offer::find($offer_id)->delete();
    return redirect()->route('empreses.dashboard');
  }

  public function activateSurvey(Request $request){
    $empresa = Empresa::find($request->empresa_id);
    $empresa->pending_survey = true;
    $empresa->save();
    $data = [
      'company_name' => $empresa->company_name,
    ];
    MailController::sendEmpresaSurveyMail($empresa->company_name, $empresa->user()->email);
    Session::flash('message', 'Enquesta enviada correctament');
    Session::flash('alert-class', 'alert-success');

    return redirect()->route('admin.dashboard');
  }

  public function verifyUser(Request $request){
    $verification_code = $request->get('code');
    $user = User::where('verification_code', $verification_code)->first();
    if ($user != null){
      if (!$user->is_verified){
        $user->is_verified = true;
        $user->save();
        Session::flash('message', 'El teu compte ha estat validat correctament');
        Session::flash('alert-class', 'alert-success');
        return redirect()->route('auth.empreses')->withInput();
      } else {
        Session::flash('message', 'El teu compte ja ha estat validat');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('auth.empreses')->withInput();
      }
    } else {
      Session::flash('message', 'Verificació invàlida.');
      Session::flash('alert-class', 'alert-danger');
      return redirect()->route('auth.empreses')->withInput();
    }
  }

  public function delete($empresa_id){
    Empresa::find($empresa_id)->user()->delete();
    return redirect()->route('admin.empreses');
  }

  protected function validateData(){
      //validate common form fields, good for refactor
  }

}
