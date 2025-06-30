<?php

// === controller === //
use App\Http\Controllers\admin\DataTrainerController;
use App\Http\Controllers\admin\googleDriveController;
use App\Http\Controllers\admin\LaporanPDFController;
use App\Http\Controllers\admin\LaporanTrainer;
use App\Http\Controllers\api\nodeWaApi;
use App\Http\Controllers\bigDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\profileAdmin\profile;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SistemKidsCoontroller;
use App\Http\Controllers\SistemTrialKids\ExportPdf;
use App\Http\Controllers\SistemTrialKids\SistemTrialController;
use App\Http\Controllers\superAdmin\StaffController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // === role admin === //        
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/data-siswa', [DashboardController::class, 'getDataSiswaPerTahun']);
    Route::get('/dataTrainer', [DataTrainerController::class, 'index'])->name('trainer.index');
    Route::middleware(['auth', 'pin.verified'])->group(function () {
        Route::get('/dataTrainer/private/{nama}', [DataTrainerController::class, 'dataPrivate'])->name('trainer.dataPrivate');
    });

    // === email add trainer === //
    Route::post('/dataTrainer/private/email/{nama}', [DataTrainerController::class, 'emailAdd'])->name('emailAdd.code');

    // === post trainer === //
    Route::post('/dataTrainer/add', [DataTrainerController::class, 'store'])->name('trainer.add');
    Route::post('/dataTrainer/edit/{nama}', [DataTrainerController::class, 'edited'])->name('trainer.edit');
    Route::get('/dataTrainer/delete/{nama}', [DataTrainerController::class, 'delete'])->name('trainer.delete');

    // === pin password trainer === //
    Route::post('/dataTrainer/verifyPin/{id}', [DataTrainerController::class, 'verifyPIN'])->name('trainer.verifyPIN');
    Route::post('dataTrainer/private/custom/{nama}', [DataTrainerController::class, 'custom'])->name('trainer.custom');

    // === export route data trainer === //
    Route::get('dataTrainer/export', [DataTrainerController::class, 'export'])->name('trainer.export');
    Route::get('/dataKids', [SistemKidsCoontroller::class, 'index'])->name('index.kids');
    Route::post('/datakids/delete/{nama_lengkap}', [SistemKidsCoontroller::class, 'delete'])->name('delete.kids');
    Route::post('/dataKids/edit/{id}', [SistemKidsCoontroller::class, 'edit'])->name('edit.kids');
    // Route::post('/datakids/loading', [SistemKidsCoontroller::class, 'store'])->name('input.kids');
    Route::post('/datakids/loading/admin', [SistemKidsCoontroller::class, 'storeAdmin'])->name('admin.kids');

    // === datakidsroute === //
    Route::get('/datakids/privateData/{nama_lengkap}', [SistemKidsCoontroller::class, 'privateData'])->name('private.kids');
    Route::get('/datakids/allExport', [SistemKidsCoontroller::class, 'exportDataKids'])->name('excel.kids');

    // === bigData Route === //
    Route::get('/bigData', [bigDataController::class, 'index'])->name('bigaData.index');
    Route::post('/bigData/program', [bigDataController::class, 'storeProgram'])->name('bigaData.program');
    Route::post('/bigData/level', [bigDataController::class, 'storeLevel'])->name('bigaData.level');
    Route::post('/bigData/class', [bigDataController::class, 'storeClass'])->name('bigaData.class');
    Route::post('/bigData/tools', [bigDataController::class, 'storeTools'])->name('bigaData.tools');
    Route::post('/bigData/materi', [bigDataController::class, 'storeMateri'])->name('bigaData.materi');
    Route::get('/bigData/deleteSekolah/{sekolah}', [bigDataController::class, 'deleteSekolah'])->name('sekolah.delete');
    Route::post('/bigData/editSekolah/{sekolah}', [bigDataController::class, 'editSekolah'])->name('sekolah.edit');

    // === route bigData program === //
    Route::get('/bigData/deleteProgram/{program}', [bigDataController::class, 'deleteProgram'])->name('program.delete');
    Route::post('/bigData/editProgram/{program}', [bigDataController::class, 'editProgram'])->name('program.edit');

    // === route bigData levels === //
    Route::get('/bigData/deleteLevel/{levels}', [bigDataController::class, 'deleteLevel'])->name('level.delete');
    Route::post('/bigData/editLevel/{levels}', [bigDataController::class, 'editLevel'])->name('level.edit');

    // === Route bigData Class === //
    Route::get('/bigData/deleteClass/{kelas}', [bigDataController::class, 'deleteClass'])->name('class.delete');
    Route::post('/bigData/editClass/{kelas}', [bigDataController::class, 'editClass'])->name('class.edit');

    // === route bigData Tools === //
    Route::get('/bigData/deleteTools/{alat}', [bigDataController::class, 'deleteTools'])->name('tools.delete');
    Route::post('/bigData/editTools/{alat}', [bigDataController::class, 'editTools'])->name('tools.edit');

    // === route bigData Materi === //
    Route::get('/bigData/deleteMateri/{materi}', [bigDataController::class, 'deleteMateri'])->name('materis.delete');
    Route::post('/bigData/editMateri/{materi}', [bigDataController::class, 'editMateri'])->name('materis.edit');

    // === Route jadwal admin === //
    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
    Route::post('/update-status/{id_schedule}', [ScheduleController::class, 'updateStatus']);
    Route::get('/schedule/create', [ScheduleController::class, 'indexCreate'])->name('schedule.create');
    Route::get('/schedule/edit/{id_schedules}', [ScheduleController::class, 'editSchedule'])->name('schedule.edit');
    Route::post('/schedule/prosess/{id_schedules}', [ScheduleController::class, 'prossesEdit'])->name('schedule.prossesEdit');
    Route::post('/schedule/create/prosses', [ScheduleController::class, 'post'])->name('schedule.post');
    Route::post('/schedule/replaceTrainer/{id_schedules}', [ScheduleController::class, 'replace'])->name('schedule.replace');
    Route::post('/schedule/replaceStatus/{id_schedules}', [ScheduleController::class, 'status'])->name('schedule.status');
    Route::get('/schedule/deleteSchedule/{id_schedules}', [ScheduleController::class, 'delete'])->name('schedule.delete');


    // === Route Google Drive Menu === //
    Route::get('/GoogleDrive', [googleDriveController::class, 'index'])->name('menu.googleDrive');
    Route::post('/GoogleDrive/post', [googleDriveController::class, 'post'])->name('menu.googleDrive.post');
    // === Route Edit Google Drive === //
    Route::delete('/GoogleDrive/delete/{id}', [googleDriveController::class, 'delete'])->name('menu.googleDrive.delete');
    // === Route edited google drive === //
    Route::post('/GoogleDrive/edited/{id}', [googleDriveController::class, 'edited'])->name('menu.googleDrive.edited');

    // === route data siswa trial === //
    Route::delete('/dataTrial/{id}', [SistemTrialController::class, 'delete'])->name('menu.siswaTrial.delete');

    // === route data siswa trial === //
    Route::post('/menu/siswaTrial/lanjutAll', [SistemTrialController::class, 'lanjutTrialAll'])->name('menu.siswaTrial.lanjutAll');
    Route::post('/menu/siswaTrial/{id_trials}/lanjut', [SistemTrialController::class, 'lanjutTrial'])->name('menu.siswaTrial.lanjut');
    Route::get('/dataTrial', [SistemTrialController::class, 'index'])->name('menu.siswaTrial');
    Route::get('/dataTrial/Edit/{id_trials}', [SistemTrialController::class, 'editedView'])->name('menu.edited.trial');
    Route::post('/menu/siswaTrial/update/{id}', [SistemTrialController::class, 'updateTrial'])->name('menu.siswaTrial.update');
    Route::post('/dataTrial/prossesNext/{id}', [SistemTrialController::class, 'next'])->name('menu.next.trial');
    Route::delete('/dataTrial/delete/{id}', [SistemTrialController::class, 'delete'])->name('menu.siswaTrial.delete');
    Route::get('/export/trial', [ExportPdf::class, 'ExportPDFTrial'])->name('export.pdf.trial');
    
    // === fitur superAdmin === //
    Route::get('/dataStaff', [StaffController::class, 'index'])->name('dataStaff.index');
    Route::post('/superadmin/update/{id}', [StaffController::class, 'update'])->name('superadmin.update');

    // === route profile admin === //
    Route::get('/profileAdmin', [profile::class, 'index'])->name('profileAdmin.index');

    // === route laporan trainer admin === //
    // Route::get('/laporanTrainerAdmin', [LaporanTrainer::class, 'index'])->name('laporan.trainer.admin');
    Route::get('/laporanTrainer/{id_schedules}', [LaporanTrainer::class, 'laporan'])->name('laporan.berkas');

    //  === route laporan excel === //
    Route::get('/laporanTrainer/Excel/{id_schedules}', [LaporanTrainer::class, 'excel'])->name('laporan.excel');

    // === route custom laporan === //
    Route::get('laporanTrainerAdmin', [LaporanTrainer::class, 'customLaporan'])->name('laporan.custom');
    Route::post('ExportLaporanCustom', [LaporanTrainer::class, 'exportCustom'])->name('export.custom');
    Route::post('ExportPDFLaporan', [LaporanPDFController::class, 'ExportPDFLaporan'])->name('admin.export.laporan.trainer');
    Route::post('ImportTemplate', [LaporanTrainer::class, 'ImportExcel'])->name('import.excel');

    // === privacyPin === //
    Route::get('/privacy', [PrivacyController::class, 'show'])->name('privacy.show');
    Route::post('/privacy/{nama}', [PrivacyController::class, 'checkPin'])->name('privacy.checkPin');
    Route::get('/privacy-content', [PrivacyController::class, 'content'])->name('privacy.content')->middleware('check.pin');

    // === backend node js wa === //
    Route::get('/qr-code', [nodeWaApi::class, 'getQrCode'])->name('qr-code');
    Route::get('/waApi', [nodeWaApi::class, 'ViewWaApi'])->name('wa-api');
    Route::post('/send-message', [nodeWaApi::class, 'sendMessage'])->name('sendMessage');
});