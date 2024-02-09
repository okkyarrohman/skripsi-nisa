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
Route::view('/', 'welcome');

// Auth Routes
Auth::routes();

// Guru Routes
Route::group(['middleware' => 'role:guru'], function () {
    Route::prefix('guru')->group(function () {
        // Route Guru Start from here
        Route::get('/dashboard', [HomeController::class, 'guru'])->name('dashboard.guru');
        Route::resources([
            'data-murid' => DataSiswaController::class,
            'materi-guru' => MateriGuruController::class,
            'tugas-guru' => TugasGuruController::class,
            'referensi-guru' => ReferensiGuruController::class,
            'tutorial-guru' => TutorialGuruController::class,
        ]);
        Route::prefix('kuis')->group(function () {
            // Routes Kuis Start From Here
            Route::resources([
                'kategori' => KategoriKuisController::class,
                'soal' => SoalKuisController::class,
                'opsi' => OpsiKuisController::class,
                'hasil' => HasilKuisController::class
            ]);
        });
    });
});


// Murid Routes
Route::group(['middleware' => 'role:murid'], function () {
    Route::prefix('murid')->group(function () {
        // Route Murid Start from here
        Route::get('/dashboard', [HomeController::class, 'murid'])->name('dashboard.murid');
        Route::resources([
            'materi' => MateriMuridController::class,
            'tugas' => TugasMuridController::class,
            'kuis' => KuisController::class,
            'referensi' => ReferensiMuridController::class,
            'tutorial' => TutorialMuridController::class,

        ]);
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
