<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmpresa;
use App\Mail\WelcomeAlumne;
use App\Mail\AdminNewAlumne;
use App\Mail\AdminNewEmpresa;
use App\Mail\AdminSurveyAlumne;
use App\Mail\AdminSurveyEmpresa;
use App\Mail\AlumneNewOffer;
use App\Mail\EmpresaNewApplication;
use App\Mail\EmpresaSurveyMail;
use App\Mail\AlumneSurveyMail;
use App\Mail\AdminNewOffer;

class MailController extends Controller
{
    public static function sendEmpresaSignupEmail($name, $email, $verification_code){
    	$data = [
    		'name' => $name,
    		'email' => $email,
    		'verification_code' => $verification_code,
    	];
    	Mail::to($email)->send(new WelcomeEmpresa($data));
    }

    public static function sendAlumneSignupEmail($name, $email, $verification_code){
    	$data = [
    		'name' => $name,
    		'email' => $email,
    		'verification_code' => $verification_code,
    	];
    	Mail::to($email)->send(new WelcomeAlumne($data));
    }

    public static function sendAdminNewAlumne($name, $email, $alumne){
        $data = [
            'name' => $name,
            'email' => $email,
            'alumne' => $alumne,
        ];
        Mail::to($email)->send(new AdminNewAlumne($data));
    }

    public static function sendAdminNewEmpresa($name, $email, $empresa){
        $data = [
            'name' => $name,
            'email' => $email,
            'empresa' => $empresa,
        ];
        Mail::to($email)->send(new AdminNewEmpresa($data));
    }

    public static function sendAdminNewOffer($name, $email, $offer){
        $data = [
            'name' => $name,
            'email' => $email,
            'offer' => $offer,
        ];
        Mail::to($email)->send(new AdminNewOffer($data));
    }

    public static function sendAdminSurveyAlumne($name, $email, $alumne, $surveyAlumne){
        $data = [
            'name' => $name,
            'email' => $email,
            'alumne' => $alumne,
            'survey-alumne' => $surveyAlumne,
        ];
        Mail::to($email)->send(new AdminSurveyAlumne($data));
    }

    public static function sendAdminSurveyEmpresa($name, $email, $empresa, $surveyEmpresa){
        $data = [
            'name' => $name,
            'email' => $email,
            'empresa' => $empresa,
            'survey-empresa' => $surveyEmpresa,
        ];
        Mail::to($email)->send(new AdminSurveyEmpresa($data));
    }

    public static function sendAlumneOfferMail($name, $email, $offer){
        $data = [
            'name' => $name,
            'email' => $email,
            'offer' => $offer,
        ];
        Mail::to($email)->send(new AlumneNewOffer($data));
    }

    public static function sendEmpresaNewApplication($name, $email, $offer){
        $data = [
            'name' => $name,
            'email' => $email,
            'offer' => $offer,
        ];
        Mail::to($email)->send(new EmpresaNewApplication($data));
    }

    public static function sendAlumneSurveyMail($name, $email){
        $data = [
            'name' => $name,
            'email' => $email,
        ];
        Mail::to($email)->send(new AlumneSurveyMail($data));
    }

    public static function sendEmpresaSurveyMail($name, $email){
        $data = [
            'name' => $name,
            'email' => $email,
        ];
        Mail::to($email)->send(new EmpresaSurveyMail($data));
    }
}
