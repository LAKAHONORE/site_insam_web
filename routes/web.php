<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\ComposerController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SpecialiteController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;


Route::get('/', [RouteController::class, 'accueil'])->name('accueil');


Route::get('/auth', [RouteController::class, 'connexion'])->name('connexion');


Route::get('/test', function () {
    return view('admin.dash');
});


Route::get('/table', function () {
    return view('admin.table');
});

Route::get('/form', function () {
    return view('admin.form');
});

Route::get('/about', [RouteController::class, 'about'])->name('about');

Route::get('/news', [RouteController::class, 'actualite'])->name('actualite');

Route::get('/pre-registration', [RouteController::class, 'pre_registration'])->name('pre_registration');



/*Route::get('/', function () {
    return view('Home');
});
Route::fallback(function () {
    return view('NotFound');
})->name('404');
*/

Route::resource('ecoles', EcoleController::class);
Route::resource('cycles', CycleController::class);
Route::resource('filieres', FiliereController::class);

Route::resource('specialites', SpecialiteController::class);
Route::get('/specialites/{option}/{specialite_id}/{niveau_id}',[SpecialiteController::class, 'option'])->name('option'); 

Route::resource('matieres', MatiereController::class);

Route::get('/notes/filtre-releve',[ComposerController::class, 'filtreReleve'])->name('notes.filtreReleve'); 
Route::post('/notes/etudiants',[ComposerController::class, 'etudiants'])->name('notes.etudiants');
Route::get('/notes/releve/{specialite_id}/{niveau_id}/{semestre}/{etudiant_id}',[ComposerController::class, 'releve'])->name('notes.releve');
Route::get('/notes/pv/{specialite_id}/{niveau_id}/{semestre}/{etudiant_id}',[ComposerController::class, 'pv'])->name('notes.pv');

Route::get('/notes/import',[ComposerController::class, 'import'])->name('notes.import'); 
Route::post('/notes/save',[ComposerController::class, 'save'])->name('notes.save'); 

Route::get('/notes/filtre-mastership',[ComposerController::class, 'filtreMastership'])->name('notes.filtreMastership'); 
Route::post('/notes/mastership',[ComposerController::class, 'mastership'])->name('notes.mastership');


Route::resource('notes', ComposerController::class);

Route::resource('etudiants', EtudiantController::class);
Route::resource('modules', ModuleController::class);

Route::post('filtre',[AjaxController::class, 'filtre']); 





Route::fallback([RouteController::class, 'notfound'])->name('notfound');
