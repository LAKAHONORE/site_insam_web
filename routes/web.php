<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RouteController::class, 'accueil'])->name('accueil');
Route::get('/dashboard', [RouteController::class, 'dashboard'])->name('dashboard');

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
Route::fallback([RouteController::class, 'notfound'])->name('notfound');
