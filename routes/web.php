<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlumneController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyController;
use App\Mail\WelcomeAlumne;
use App\Mail\WelcomeEmpresa;
use App\Mail\AdminSurveyAlumne;
use App\Models\Alumne;
use App\Models\Empresa;
use App\Models\Survey_alumne;
use App\Mail\AlumneSurveyMail;
use App\Models\Survey_empresa;
use App\Mail\AdminSurveyEmpresa;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/home/alumnes', [HomeController::class, 'home_alumnes'])->name('home.alumnes');
Route::get('/home/empreses', [HomeController::class, 'home_empreses'])->name('home.empreses');
Route::get('/home/auth-alumnes', [HomeController::class, 'auth_alumnes'])->name('auth.alumnes');
Route::get('/home/auth-empreses', [HomeController::class, 'auth_empreses'])->name('auth.empreses');
Route::get('/admin', [HomeController::class, 'auth_admin'])->name('auth.admin');


///Alumne
Route::get('/alumnes/create', [AlumneController::class, 'create'])->name('alumnes.create');
Route::post('/alumnes', [AlumneController::class, 'store'])->name('alumnes.store');
Route::get('/alumnes/dashboard', [AlumneController::class, 'dashboard'])->name('alumnes.dashboard')->middleware('auth');
Route::get('/alumnes/edit', [AlumneController::class, 'edit'])->name('alumnes.edit')->middleware('auth');
Route::patch('/alumnes/update', [AlumneController::class, 'update'])->name('alumnes.update')->middleware('auth');
Route::patch('/alumnes/update-avatar', [AlumneController::class, 'updateAvatar'])->name('alumnes.update-avatar');
Route::get('/alumnes/applications/index', [AlumneController::class, 'applicationsIndex'])->middleware('auth')->name('alumnes.applications.index');
Route::get('/alumnes/applications/{offer_id}', [AlumneController::class, 'applicationsShow'])->middleware('auth')->name('alumnes.applications.show');
Route::patch('/alumnes/applications/{offer_id}', [AlumneController::class, 'applicationsStore'])->middleware('auth')->name('alumnes.applications.store');
Route::patch('/alumnes/survey', [AlumneController::class, 'activateSurvey'])->middleware('auth')->name('alumnes.activate-survey');
Route::view('/alumnes/create-success', 'alumnes.create-success')->name('alumnes.create-success');
Route::get('/alumnes/verify', [AlumneController::class, 'verifyUser'])->name('alumnes.verify');
Route::delete('/alumnes/{alumne_id}', [AlumneController::class, 'delete'])->name('alumnes.destroy');

//Empresa
Route::get('/empreses/create', [EmpresaController::class, 'create'])->name('empreses.create');
Route::post('/empreses/store', [EmpresaController::class, 'store'])->name('empreses.store');
Route::get('/empreses/dashboard', [EmpresaController::class, 'dashboard'])->name('empreses.dashboard')->middleware('auth');
Route::get('/empreses/edit', [EmpresaController::class, 'edit'])->name('empreses.edit')->middleware('auth');
Route::patch('/empreses/update', [EmpresaController::class, 'update'])->name('empreses.update')->middleware('auth');
Route::get('/empreses/candidates/{alumne_id}', [EmpresaController::class, 'candidatesShow'])->middleware('auth')->name('empreses.candidates.show');
Route::get('/empreses/offers/create', [EmpresaController::class, 'offersCreate'])->middleware('auth')->name('empreses.offers.create');
Route::post('/empreses/offers/store', [EmpresaController::class, 'offersStore'])->middleware('auth')->name('empreses.offers.store');
Route::get('/empreses/offers/edit/{offer_id}', [EmpresaController::class, 'offersEdit'])->middleware('auth')->name('empreses.offers.edit');
Route::patch('/empreses/offers/update/{offer_id}', [EmpresaController::class, 'offersUpdate'])->middleware('auth')->name('empreses.offers.update');
Route::delete('/empreses/offers/delete/{offer_id}', [EmpresaController::class, 'offersRemove'])->middleware('auth')->name('empreses.offers.remove');
Route::patch('/empreses/survey', [EmpresaController::class, 'activateSurvey'])->middleware('auth')->name('empreses.activate-survey');
Route::view('/empreses/create-success', 'empreses.create-success')->name('empreses.create-success');
Route::get('/empreses/verify', [EmpresaController::class, 'verifyUser'])->name('empreses.verify');
Route::delete('/empreses/{empresa_id}', [EmpresaController::class, 'delete'])->name('empreses.destroy');

//ADMIN
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth')->name('admin.dashboard');
Route::get('/admin/empreses', [AdminController::class, 'empreses'])->middleware('auth')->name('admin.empreses');
Route::get('/admin/empreses/{empresa_id}', [AdminController::class, 'empresesShow'])->middleware('auth')->name('admin.empreses.show');
Route::get('/admin/alumnes', [AdminController::class, 'alumnes'])->middleware('auth')->name('admin.alumnes');
Route::get('/admin/alumnes/{alumne_id}', [AdminController::class, 'alumnesShow'])->middleware('auth')->name('admin.alumnes.show');
Route::get('/admin/offers/{offer_id}', [AdminController::class, 'offersShow'])->middleware('auth')->name('admin.offers.show');
Route::get('/admin/edit', [AdminController::class, 'edit'])->middleware('auth')->name('admin.edit');
Route::patch('/admin/update', [AdminController::class, 'update'])->middleware('auth')->name('admin.update');
Route::delete('/admin/offers/delete/{offer_id}', [AdminController::class, 'offersRemove'])->middleware('auth')->name('admin.offers.remove');

///Survey
Route::get('/survey/alumne', [SurveyController::class, 'createSurveyAlumne'])->middleware('auth')->name('survey.alumne.create');
Route::post('/survey/alumne', [SurveyController::class, 'storeSurveyAlumne'])->middleware('auth')->name('survey.alumne.store');
Route::get('/survey/empresa', [SurveyController::class, 'createSurveyEmpresa'])->middleware('auth')->name('survey.empresa.create');
Route::post('/survey/empresa', [SurveyController::class, 'storeSurveyEmpresa'])->middleware('auth')->name('survey.empresa.store');


///Email display
Route::get('/survey-alumne', 
	function(){
		$data = ['name' => 'Maria Serra', 
			'email' => 'maria@serra.com', 
			'alumne' => Alumne::first(),
			'survey-alumne' => Survey_alumne::first()];
		return (new AdminSurveyAlumne($data))->render();
	});

Route::get('/survey-button', 
	function(){
		$data = ['name' => 'Albert', 
			'email' => 'albert@test.com', ];
		return (new AlumneSurveyMail($data))->render();
	});

Route::get('/survey-empresa', 
	function(){
		$data = ['name' => 'Maria Serra', 
			'email' => 'maria@serra.com', 
			'empresa' => Empresa::first(),
			'survey-empresa' => Survey_empresa::first()];
		return (new AdminSurveyEmpresa($data))->render();
	});



