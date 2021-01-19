<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Survey_alumne;
use App\Survey_empresa;
use App\Admin;
use Illuminate\Support\Facades\Input;

class SurveyController extends Controller
{
    public function createSurveyAlumne(){
        $alumne = Auth::user()->alumne();
        return view('surveys.survey-alumne', compact('alumne'));
    }
    public function storeSurveyAlumne(Request $request){
        $rules = [
            'Q1_num' => 'required',
            'Q1_text' => 'max:1024',
            'Q2_num' => 'required',
            'Q2_text' => 'max:1024',
            'Q3_num' => 'required',
            'Q3_text' => 'max:1024',
            'Q4_num' => 'required',
            'Q4_text' => 'max:1024',
            'Q5' => 'max:1024',
        ];
        $customMessages = [
            'required' => 'Camp obligatori',
            'max:1024' => 'L\'extensió màxima és de 1024 caràcters',
        ];
        $data = $this->validate($request, $rules, $customMessages);

        $survey = Survey_alumne::create($data);
        if ($survey){
            MailController::sendAdminSurveyAlumne(Admin::first()->name, Admin::first()->user()->email, Auth::user()->alumne(), $survey);
            $request->session()->flash('message', 'Gràcies! L\'enquesta s\'ha enviat correctament');
            $request->session()->flash('alert-class', 'alert-success');
            $alumne = Auth::user()->alumne();
            $alumne->pending_survey = false;
            $alumne->save();
        } else {
            $request->session()->flash('danger', 'Ha hagut un problema inesperat! Intenteu-ho de nou més tard.');
        }
        return redirect()->route('alumnes.dashboard');
    }
    public function createSurveyEmpresa(){
         $empresa = Auth::user()->empresa();
        return view('surveys.survey-empresa', compact('empresa'));
    }
    public function storeSurveyEmpresa(Request $request){
        $rules = [
            'Q1' => 'required',
            'Q2_num' => 'required',
            'Q2_text' => 'max:1024',
            'Q3_Coneixements' => 'min:1|max:4|required|integer',
            'Q3_Experience' => 'min:1|max:4|required|integer',
            'Q3_Soft_skills' => 'min:1|max:4|required|integer',
            'Q3_text' => 'max:1024',
            'Q4_num' => 'required',
            'Q4_text' => 'max:1024',
            'Q5_num' => 'required',
            'Q5_Si_text' => 'max:1024',
            'Q5_No_text' => 'max:1024',
            'Q6' => 'max:1024',
        ];

        $customMessages = [
            'required' => 'Camp obligatori',
            'max' => 'L\'extensió màxima és de 1024 caràcters',
            'min' => 'Siusplau, puntueu de l\'1 al 4',
            'max' => 'Siusplau, puntueu de l\'1 al 4',

        ];

        $data = $this->validate($request, $rules, $customMessages);

        $survey = Survey_empresa::create($data);
        if ($survey){
            MailController::sendAdminSurveyEmpresa(Admin::first()->name, Admin::first()->user()->email, Auth::user()->empresa(), $survey);
            $request->session()->flash('message', 'Gràcies! L\'enquesta s\'ha enviat correctament');
            $request->session()->flash('alert-class', 'alert-success');
            $empresa = Auth::user()->empresa();
            $empresa->pending_survey = false;
            $empresa->save();
        } else {
            $request->session()->flash('danger', 'Ha hagut un problema inesperat! Intenteu-ho de nou més tard.');
        }
        return redirect()->route('empreses.dashboard');
    }
}
