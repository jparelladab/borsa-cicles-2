<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\Alumne;
use App\Study;
use App\Offer;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use App\Other_study;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Session;






class AlumneController extends Controller
{

  public function __construct() {
    // $this->middleware('auth');
    // $this->middleware('check_user');
  }


  public function dashboard(Request $request) {
    $alumne = Alumne::find($request->user()->alumne()->id);
    $offers = $alumne->offers()->get()->sortbyDesc('created_at');
    return view('alumnes.dashboard', compact('alumne', 'offers'));
  }

   public function create() {
    return view('alumnes.create');
  }

  public function store(Request $request) {

    $rules = [
      'email' => 'required|email|unique:users',
      'password' => 'required',
      'first_name' => 'required',
      'last_name_1' => 'required',
      'last_name_2' => 'required',
      'DNI' => 'required',
      'address' => 'required',
      'location' => 'required',
      'zip_code' => 'required',
      'date_of_birth' => 'required|date',
      'phone_number' => 'required',
      'study_end' => 'required|digits:4',
      'cv' => 'required|mimes:pdf',
    ];
    $customMessages = [
      'required' => 'Camp obligatori',
      'email' => 'Introduïr adreça vàlida',
      'unique' => 'L\'adreça introduïda ja existeix',
      'max:1024' => 'L\'extensió màxima és de 1024 caràcters',
      'digits' => 'Any de finalització no vàlid',
      'mimes' => 'El Currículum ha d\'estar en format PDF',
    ];

    $data = $this->validate($request, $rules, $customMessages);

    $user = new User;
    $user->email = $data['email'];
    $user->password = bcrypt($data['password']);
    $user->role_id = 2;
    $user->verification_code = sha1(time());
    $user->save();

    $alumne = new Alumne;
    $alumne->first_name = $data['first_name'];
    $alumne->last_name_1 = $data['last_name_1'];
    $alumne->last_name_2 = $data['last_name_2'];
    $alumne->DNI = $data['DNI'];
    $alumne->address = $data['address'];
    $alumne->location = $data['location'];
    $alumne->zip_code = $data['zip_code'];
    $alumne->date_of_birth = $data['date_of_birth'];
    $alumne->phone_number = $data['phone_number'];
    $alumne->study_end = $data['study_end'];
    $alumne->user_id = $user['id'];

    if($request['cv']) {
      $alumne->cv = $request->cv->store('CVs', 'public');
    }

    $saved = $alumne->save();

    //Add studies and Other_studies

    for($i=1; $i<12; $i++){
      if ($request->input('study_' . $i)){
        $alumne->studies()->attach(Study::find($i));
      }
    }
    if($alumne->studies->count() < 1){
      Session::flash('error_studies', 'Afegir mínim 1 estudi');
      Session::flash('alert-class', 'alert-danger');
      return redirect()->back()->withInput();
    }
    if ($request['other_studies']) {
      Other_study::create([
        'title' => $request['other_studies'],
        'alumne_id' => $alumne->id,
      ]);
    }

    if($saved) {
      MailController::sendAlumneSignupEmail($alumne->first_name, $alumne->user()->email, $alumne->user()->verification_code);
      MailController::sendAdminNewAlumne(Admin::first()->name, Admin::first()->user()->email, $alumne);
      $request->session()->flash('message', 'Detalls desats correctament');
      $request->session()->flash('alert-class', 'alert-success');
      return redirect()->route('alumnes.create-success');
    }else {
      $request->session()->flash('message', 'Oops, something went wrong!');
      $request->session()->flash('alert-class', 'alert-danger');
      return redirect()->back();
    }
  }

  public function updateAvatar(Request $request){
    $alumne = Auth::user()->alumne();
    $data = $request->validate([
      'avatar' => 'image|max:1024',
    ]);
    if($data){
      Storage::delete($alumne->avatar);
      $alumne->avatar = $request->avatar->store('avatars', 'public');
      $alumne->save();
    }
    return redirect()->back();
  }



  public function edit() {
    if (Auth::user()){
      $user = User::find(Auth::user()->id);
      $alumne = $user->alumne();
      if ($alumne){
        return view('alumnes.edit', compact('alumne', 'user'));
      } else {
        return redirect()->back();
      }
    } else {
      return redirect()->back();
    }
  }

  public function update(Request $request) {
    $user = Auth::user();
    $alumne = $user->alumne();

    $customMessages = [
      'required' => 'Camp obligatori',
      'email' => 'Introduïr adreça vàlida',
      'unique' => 'L\'adreça introduïda ja existeix',
      'max:1024' => 'L\'extensió màxima és de 1024 caràcters',
      'mimes' => 'El Currículum ha d\'estar en format PDF',
    ];

    if($request->password != NULL){
        if ($request->email === $user->email) {
          $data_user = $request->validate([
              'email' => 'required|email',
              'password' => 'required',
          ], $customMessages);
        } else {
            $data_user = $request->validate([
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ], $customMessages);
        }
      $user->password = bcrypt($data_user['password']);
    } else {
        if ($request->email === $user->email) {
            $data_user = $request->validate([
                'email' => 'required|email',
            ], $customMessages);
        } else {
            $data_user = $request->validate([
                'email' => 'required|email|unique:users',
            ], $customMessages);
        }
    }
    $user->email = $data_user['email'];
    $user->save();
    $data_alumne = $request->validate([
      'address' => 'required',
      'location' => 'required',
      'zip_code' => 'required',
      'phone_number' => 'required',
      'languages' => 'max:255',
      'valoracio' => 'max:1000',
    ]);

    $alumne->update($data_alumne);

    if($request->cv){
      $data_cv = $request->validate([
        'cv' => 'mimes:pdf',
      ], $customMessages);
      Storage::delete($alumne->cv);
      $alumne->cv = $request->cv->store('CVs', 'public');
      $alumne->save();
    }

    if($request->other_studies1 != NULL && $alumne->otherStudies->count() === 0){
      Other_study::create(['title' => $request->other_studies1, 'alumne_id' => $alumne->id ]);
    }
    if($request->other_studies1 != NULL && $alumne->otherStudies->count() > 0){
      $alumne->otherStudies[0]->title = $request->other_studies1;
      $alumne->otherStudies[0]->save();
    }
    if ($request->other_studies2 != NULL && $alumne->otherStudies->count() >= 2){
      $alumne->otherStudies[1]->title = $request->other_studies2;
      $alumne->otherStudies[1]->save();
    }
    if ($request->other_studies2 != NULL && $alumne->otherStudies->count() < 2) {
      Other_study::create(['title' => $request->other_studies2, 'alumne_id' => $alumne->id ]);
    }
    if($request->other_studies1 === NULL && $alumne->otherStudies->count() > 0){
      $alumne->otherStudies[0]->delete();
    }
    if($request->other_studies2 === NULL && $alumne->otherStudies->count() > 1){
      $alumne->otherStudies[1]->delete();
    }
    if($request->other_studies3 === NULL && $alumne->otherStudies->count() > 2){
      $alumne->otherStudies[2]->delete();
    }

    $request->session()->flash('success', 'Detalls desats correctament');

    return redirect()->back();

  }



  public function applicationsIndex () {
    $alumne = Auth::user()->alumne();
    $applications = $alumne->applications()->get()->sortByDesc('created_at');
    return view('alumnes.applications-index', compact('alumne', 'applications'));
  }


  public function applicationsShow($offer_id) {
    $alumne = Auth::user()->alumne();
    $offer = Offer::find($offer_id);
    return view('alumnes.applications-show', compact('alumne', 'offer'));
  }

  public function applicationsStore($offer_id) {
    $alumne = Auth::user()->alumne();
    $offer = Offer::find($offer_id);
    $empresa = Offer::find($offer_id)->empresa();
    if ($alumne->hasAppliedTo($offer_id)){
      $alumne->removeApplication($offer_id);
      Session::flash('message', 'La teva candidatura ha estat retirada correctament.');
      Session::flash('alert-class', 'alert-success');
    } else {
      $alumne->applyTo($offer_id);
      MailController::sendEmpresaNewApplication($empresa->company_name, $empresa->user()->email, $offer);
      Session::flash('message', 'La teva candidatura ha estat enviada correctament.');
      Session::flash('alert-class', 'alert-success');
    }

    return redirect()->back();
  }

    public function activateSurvey(Request $request){
      $alumne = Alumne::find($request->alumne_id);
      $alumne->pending_survey = true;
      $alumne->save();
      $data = [
        'name' => $alumne->first_name,
      ];
      MailController::sendAlumneSurveyMail($alumne->first_name, $alumne->user()->email);
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
        return redirect()->route('auth.alumnes');
      } else {
        Session::flash('message', 'El teu compte ja ha estat validat');
        Session::flash('alert-class', 'alert-warning');
        return redirect()->route('auth.alumnes');
      }
    } else {
      Session::flash('message', 'Verificació invàlida.');
      Session::flash('alert-class', 'alert-danger');
      return redirect()->route('auth.alumnes');
    }
  }

  public function delete($alumne_id){
    Alumne::find($alumne_id)->user()->delete();
    return redirect()->route('admin.alumnes');
  }
}
