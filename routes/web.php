<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Client\PermohonanSuratController;
use App\Http\Controllers\Client\ProfilController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LacakController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\UnduhanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
Route::get('/maintenance', function () {
    return view('errors.maintenance');
})->name('maintenance');
Route::get('/pdf/{spp}', [App\Http\Controllers\PdfController::class,'index'])->name('pdf-stream'); 
Route::get('/tes', [HomeController::class, 'hoho']);
Route::get('/berita', [HomeController::class, 'berita'])->name('berita');
Route::get('/berita/detail/{id}', [HomeController::class, 'detailBerita'])->name('detail');
Route::get('/profilenagari', [HomeController::class, 'profilenagari'])->name('nagari');
Route::get('/statistik', [HomeController::class, 'statistik'])->name('statistik');
Route::get('/perangkat', [HomeController::class, 'perangkat'])->name('perangkat');
Route::get('/bantuan', [HomeController::class, 'bantuan'])->name('bantuan');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified', 'isPenduduk'])->group(function () {
    // Profile
    Route::get('/profile', [ProfilController::class, 'index'])->name('profile');
    Route::get('/profile/data_diri', [ProfilController::class, 'dataDiri'])->name('data_diri');
    Route::post('/profile/syncronize', [ProfilController::class, 'nikSync'])->name('profile.syncronize');
    // Permohonan Surat
    Route::get('/surat/permohonan', [PermohonanSuratController::class, 'index'])->name('surat.jenis');
    Route::get('/surat/permohonan/{id}/form', [PermohonanSuratController::class, 'form'])->name('surat.form');
    Route::post('/surat/permohonan/{id}/pengajuan', [PermohonanSuratController::class, 'pengajuan'])->name('surat.mengajukan');
    // Status permohonan
    Route::get('/surat/status', [PermohonanSuratController::class, 'allstatus'])->name('surat.list.status');
    Route::get('/surat/status/{nomor}', [PermohonanSuratController::class, 'view'])->name('surat.view.status');
});

Route::get('/back', [ErrorController::class, 'index'])->name('back4eror');

Route::prefix('/screen')->group(function () {
    Route::get('/', [ScreenController::class, 'index'])->name('screen.index');
    Route::post('/mengajukan', [ScreenController::class, 'store'])->name('screen.insert');
});

Route::prefix('/ajax')->group(function () {
    Route::get('/penduduk/{nik}', [AjaxController::class, 'pendudukByNik'])->name('ajax.pdkbynik');
    Route::get('/jenissurat/{id}', [AjaxController::class, 'jenisSurat'])->name('ajax.jenissurat');
});


Route::get('download/suratpermohonan/{kode}/{byself?}', [UnduhanController::class, 'suratpermohonan'])->name('download.suratpermohonan');

Route::get('/lacak', [LacakController::class, 'scan'])->name('scan.camera');
Route::get('/lacak/{nomor}', [LacakController::class, 'view'])->name('scan.result');
