<?php

use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SistemTrialKids\SistemTrialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\trainer\subotAcademy\auth;
// Route::get('/', function () {
//     return view('home');
// });

// === auth login === //
Route::get('/', function() {
    return view('maintenance.index');
})->name('auth.trainer');
Route::get('/ujicoba', [auth::class, 'index'])->name('auth.trainer');

// register hidden
Route::get('/registerPrivate', [RegisterController::class, 'index'])->name('registerprivate');
Route::post('/registerPrivate/register', [ RegisterController::class, 'create'])->name('create');


// === route sistem trial === //
Route::get('/registerTrial', [SistemTrialController::class, 'indexForm'])->name('registerTrial');
Route::get('/previewTrial', [SistemTrialController::class, 'previewTrial'])->name('previewTrial');
Route::get('/confirmationTrial', [SistemTrialController::class, 'confirmation'])->name('confirmationTrial');
Route::post('/storeTrial', [SistemTrialController::class, 'storeTrial'])->name('store.trial');
Route::get('/api/search-trial', [SistemTrialController::class, 'searchTrial'])->name('api.search.trial');

// auth role login admin
Route::get('/login/Admin', [LoginAdminController::class, 'index'])->name('loginAdmin');
Route::post('/login/Admin', [LoginAdminController::class, 'store'])->name('loginAdmin');
// Route::get('/login/Trainer', [LoginAdminController::class, 'index'])->name('loginTrainer');

require __DIR__.'/admin.php';
require __DIR__.'/trainer.php';
require __DIR__.'/sistemLaporan.php';
