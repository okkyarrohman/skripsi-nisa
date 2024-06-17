<?php

use App\Http\Controllers\Guru\DataSiswaController;
use App\Http\Controllers\Guru\Kuis\HasilKuisController;
use App\Http\Controllers\Guru\Kuis\KategoriKuisController;
use App\Http\Controllers\Guru\Kuis\OpsiKuisController;
use App\Http\Controllers\Guru\Kuis\SoalKuisController;
use App\Http\Controllers\Guru\MateriGuruController;
use App\Http\Controllers\Guru\ReferensiGuruController;
use App\Http\Controllers\Guru\TugasGuruController;
use App\Http\Controllers\Guru\TutorialGuruController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Murid\KuisController;
use App\Http\Controllers\Murid\MateriMuridController;
use App\Http\Controllers\Murid\ReferensiMuridController;
use App\Http\Controllers\Murid\TugasMuridController;
use App\Http\Controllers\Murid\TutorialMuridController;
use App\Http\Controllers\CppController;
use App\Http\Controllers\Guru\AbsenController;
use App\Http\Controllers\Guru\KelompokController;
use App\Http\Controllers\Guru\KelompokMuridController;
use App\Http\Controllers\Guru\NilaiGuruController;
use App\Http\Controllers\Murid\AbsenMuridController;
use Illuminate\Support\Facades\Artisan;

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

// Landing Page
Route::view('/', 'landingpage')->name('landingpage');

Route::get('/download-panduan', [HomeController::class, 'downloadPanduan'])->name('downloadPanduan');

// Auth Routes
Auth::routes();
Route::get('/foo', function () {
    Artisan::call('storage:link');
});

// Guru Routes
Route::group(['middleware' => 'role:guru'], function () {
    Route::prefix('guru')->group(function () {
        // Route Guru Start from here
        Route::get('/dashboard', [HomeController::class, 'guru'])->name('dashboard.guru');
        Route::get('/data-murid/kelompok', [DataSiswaController::class, 'kelompok'])->name('data-murid.kelompok');
        Route::resources([
            'absen-guru' => AbsenController::class,
            'data-murid' => DataSiswaController::class,
            'materi-guru' => MateriGuruController::class,
            'kelompok-guru' => KelompokController::class,
            'tugas-guru' => TugasGuruController::class,
            'referensi-guru' => ReferensiGuruController::class,
            'tutorial-guru' => TutorialGuruController::class,
            'nilai-guru' => NilaiGuruController::class
        ]);
        Route::get('/nilai/{id}', [TugasGuruController::class, 'getTugasResult'])->name('get-tugas-result');
        Route::get('/tugas-guru/{id}/nilai', [TugasGuruController::class, 'nilai'])->name('tugas-guru.nilai');
        Route::get('/absen/detail/{id}', [AbsenController::class, 'detail'])->name('absen.detail');


        Route::prefix('kuis')->group(function () {
            // Routes Kuis Start From Here
            Route::resources([
                'kategori' => KategoriKuisController::class,
                'soal' => SoalKuisController::class,
                'opsi' => OpsiKuisController::class,
                'hasil' => HasilKuisController::class
            ]);
        });
        Route::get('/download-panduan', [HomeController::class, 'panduanGuru'])->name('download-panduan.guru');
    });
});


// Murid Routes
Route::group(['middleware' => 'role:murid'], function () {
    Route::prefix('murid')->group(function () {
        // Route Murid Start from here

        Route::get('/tugas/belum-kelompok', [TugasMuridController::class, 'belumKelompok'])->name('tugas.belum_kelompok');
        Route::get("/kuis/{kategori_kuis}/mulai", [KuisController::class, 'mulai'])->name('kuis.mulai');

        Route::post('/run_cpp', [CppController::class, 'runCpp'])->name('run_cpp');

        Route::get('/dashboard', [HomeController::class, 'murid'])->name('dashboard.murid');
        Route::resources([
            'materi' => MateriMuridController::class,
            'tugas' => TugasMuridController::class,
            'kuis' => KuisController::class,
            'kelompok-murid' => KelompokMuridController::class,
            'referensi' => ReferensiMuridController::class,
            'tutorial' => TutorialMuridController::class,
            "absen" => AbsenMuridController::class,
        ]);
        Route::get('/download-panduan', [HomeController::class, 'panduanMurid'])->name('download-panduan.murid');
    });
});



Route::get('/home', [HomeController::class, 'index'])->name('home');
