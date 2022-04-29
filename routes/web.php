<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\DemandefrontController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\RenouvellementController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ValeurController;
use App\Http\Controllers\DirectionController;
use Illuminate\Support\Facades\Route;

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

//ROUTES ACCES PUBLIC

Route::get('/', function () {
    return view('welcomefront');
})->name('acceuil');
Route::resource('demandesfront', DemandefrontController::class);
Route::get('/contact', function () {
    return view('front-office.contact.index');
})->name('contact');
Route::get('formconsulter', [DemandefrontController::class, 'formconsulter'])->name('formconsulter');

Route::post('consulter', [DemandefrontController::class, 'consulter'])->name('consulter');
Route::get('enregistrerPiece/{id}', [PieceController::class, 'enregistrerPiece']);

//ROUTES ACCES ADMIN
Route::middleware(['auth'])->group(function () {
    // Seul les utilisateurs connectés peuvent avoir accès a ces routes
    Route::get('/admin', [DemandeController::class, 'dashboard'])->name('admin');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::resource('parametres', ParametreController::class);
    Route::resource('directions', DirectionController::class);
    Route::resource('valeurs', ValeurController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('piece', PieceController::class);
    Route::resource('renouvellement', RenouvellementController::class);
    Route::resource('themes', ThemeController::class);
    Route::resource('demandes', DemandeController::class);
    Route::resource('register', RegisteredUserController::class);
    Route::get('listeUser', [RegisteredUserController::class, 'index'])->name('listeUser');
    Route::get('users/responsable', [RegisteredUserController::class, 'updateStatus'])->name('user.updateStatus');
    Route::get('demandesreport/{id}', [DemandeController::class, 'formreporter'])->name('formreporter');
    Route::get('formaffecter/{id}', [DemandeController::class, 'formaffecter'])->name('formaffecter');
    Route::post('affecter', [DemandeController::class, 'affecter'])->name('affecter');
    Route::post('reporter', [DemandeController::class, 'reporter'])->name('reporter');
    Route::get('validerstage/{id}', [DemandeController::class, 'validerstage'])->name('validerstage');
    Route::get('stageencours', [DemandeController::class, 'stageencours'])->name('stageencours');
    Route::get('stagetermines', [DemandeController::class, 'stagetermines'])->name('stagetermines');
    Route::get('stagevalides', [DemandeController::class, 'stagevalides'])->name('stagevalides');
    Route::get('voirStage/{id}', [DemandeController::class, 'voirStage'])->name('voirStage');
    Route::get('stagefini/{id}', [DemandeController::class, 'stagefini'])->name('stagefini');
    Route::get('formnoter/{id}', [DemandeController::class, 'formnoter'])->name('formnoter');
    Route::post('noter', [DemandeController::class, 'noter'])->name('noter');
    Route::get('formtheme/{id}', [DemandeController::class, 'formtheme'])->name('formtheme');
    Route::post('theme', [DemandeController::class, 'theme'])->name('theme');
    Route::delete('supprimerpiece/{id}', [DemandeController::class, 'supprimerpiece'])->name('supprimerpiece');
    Route::get('enregistrerRenouvellement/{id}', [RenouvellementController::class, 'enregistrerRenouvellement'])->name('renouveller');
    Route::get('download/{id}', [DemandeController::class, 'download'])->name('download');
    Route::get('encours/{id}', [DemandeController::class, 'encours'])->name('encours');
});

require __DIR__.'/auth.php';

// Route::get('consulter/{code}', [DemandefrontController::class, 'consulter'])->name('consulter');

// Route::get('/admin', function () {
//     return view('welcome');
// })->middleware(['auth'])->name('admin');
