<?php

use App\Http\Controllers\form\FormulirController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SistemKidsCoontroller;
use App\Http\Controllers\SistemTrialKids\SistemTrialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\trainer\subotAcademy\auth;

Route::get('/', [auth::class, 'index'])->name('auth.trainer');

// register hidden
Route::get('/registerPrivate', [RegisterController::class, 'index'])->name('registerprivate');
Route::post('/registerPrivate/register', [ RegisterController::class, 'create'])->name('create');


// === route sistem trial === //
Route::get('/DaftarTrial', [SistemTrialController::class, 'indexForm'])->name('registerTrial');
Route::get('/previewTrial', [SistemTrialController::class, 'previewTrial'])->name('previewTrial');
Route::get('/confirmationTrial', [SistemTrialController::class, 'confirmation'])->name('confirmationTrial');
// Route::post('/prosses', [SistemTrialController::class, 'addSchool'])->name('school.trial');
Route::post('/storeTrial', [SistemTrialController::class, 'storeTrial'])->name('store.trial');
Route::get('/api/search-trial', [SistemTrialController::class, 'searchTrial'])->name('api.search.trial');

// auth role login admin
Route::get('/login/Admin', [LoginAdminController::class, 'index'])->name('loginAdmin');
Route::post('/login/Admin', [LoginAdminController::class, 'store'])->name('loginAdmin');
// Route::get('/login/Trainer', [LoginAdminController::class, 'index'])->name('loginTrainer');

// === dataKidsRoute === //
Route::get('/daftar', [FormulirController::class, 'index'])->name('formulir.index');
Route::post('daftar/post',[FormulirController::class, 'store'])->name('formulir.post');
Route::get('/formulirPendaftaran/selesai', [FormulirController::class, 'done'])->name('formulir.done');
Route::get('/trainerForm', [FormulirController::class, 'trainer'])->name('trainer.form');
Route::get('/selesai', [FormulirController::class, 'trainerDone'])->name('done.form');
Route::post('/trainerForm/prosses', [FormulirController::class, 'postTrainerData'])->name('trainer.post');

Route::get('/tambah/sekolah', function() {
     return view('p_create_sekolah');
 })->name('page.sekolah');


Route::post('/daftar/prosses/', [SistemKidsCoontroller::class, 'addSchool'])->name('add.school');

require __DIR__.'/admin.php';
require __DIR__.'/trainer.php';
require __DIR__.'/sistemLaporan.php';
