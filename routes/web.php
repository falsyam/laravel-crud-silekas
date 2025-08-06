<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LksRegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatusController;

Route::get('/', function () {
    return view('index');
});



// dashboard

Route::get('/admin', [AdminController::class, 'dashboard'])->middleware('auth')->name('admin');

// daftar pengajuan
Route::get('/daftar-pengajuan', [AdminController::class, 'daftarpengajuan'])->name('daftar-pengajuan');
Route::get('/admin/search', [AdminController::class, 'search'])->name('admin.search');




// cek status
Route::get('/cek-admin', [AdminController::class, 'cekadmin'])->name('cekadmin');
Route::post('/hasil', [StatusController::class, 'proses'])->name('cek-status.proses');



// daftar surat terbit
Route::get('/surat-terbit', [AdminController::class, 'suratterbit'])->name('surat-terbit');





// Login & Register

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');       // menampilkan form
Route::post('/login', [AuthController::class, 'login'])->name('login.process'); 

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::middleware('auth')->group(function () {
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('/settings/password', [AuthController::class, 'updatePassword'])->name('password.update');
});


// Proses Verifikasi
Route::get('/verifikasi', [AdminController::class, 'verifikasi'])->name('verifikasi');
Route::get('/verifikasi-step1/{id}', [AdminController::class, 'verifikasiDetail'])->name('verifikasi.detail');

Route::post('/verifikasi/{id}/tolakProses', [AdminController::class, 'prosesTolak'])->name('tolak.proses');
Route::post('/verifikasi/{id}/verifikasiProses', [AdminController::class, 'prosesVerifikasi'])->name('verifikasi.proses');
Route::post('/admin/tolak/{id}', [AdminController::class, 'tolakProses'])->name('tolak.proses');



// Surat
Route::get('/template', function () {
    return view('templatesurat');
});
Route::get('/surat/preview/{id}', [AdminController::class, 'previewSurat'])->name('surat.preview');

Route::get('/pengajuan/{id}/export', [AdminController::class, 'exportPdf'])->name('pengajuan.export');

Route::get('/surat/download/{id}', [AdminController::class, 'downloadSurat'])->name('surat.download');



Route::view('/test-form-warning', 'test')->name('form.warning');










// User Panel

// Halaman awal (form step 1)
// GET
Route::get('/pendaftaran/step1', [LksRegistrationController::class, 'editStep1'])->name('form.step1');
Route::get('/pendaftaran/step2', [LksRegistrationController::class, 'editStep2'])->name('form.step2');
Route::get('/pendaftaran/step3', [LksRegistrationController::class, 'editStep3'])->name('form.step3');
Route::get('/pendaftaran/step4', [LksRegistrationController::class, 'editStep4'])->name('form.step4');
Route::get('/pendaftaran/step5', [LksRegistrationController::class, 'editStep5'])->name('form.step5');

// POST
Route::post('/pendaftaran/step1', [LksRegistrationController::class, 'postStep1'])->name('form.step1.post');
Route::post('/pendaftaran/step2', [LksRegistrationController::class, 'postStep2'])->name('form.step2.post');
Route::post('/pendaftaran/step3', [LksRegistrationController::class, 'postStep3'])->name('form.step3.post');
Route::post('/pendaftaran/step4', [LksRegistrationController::class, 'postStep4'])->name('form.step4.post');
Route::post('/pendaftaran/step5', [LksRegistrationController::class, 'postStep5'])->name('form.step5.post');





// cek status user
Route::get('/cek-status', function () {
    return view('cek-status');
})->name('cekstatus-user');

Route::post('/cek-status-step1', [StatusController::class, 'userProses'])->name('cek-status-user.userProses');