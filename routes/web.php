<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegristController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PopulationController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\HistoryPopulationController;
use App\Http\Controllers\admin\HistoryAssistanceController;
use App\Http\Controllers\admin\AssistanceDataController;
use App\Http\Controllers\admin\AssistanceDataVerificationController;
use App\Http\Controllers\Admin\PerhitunganMabacController;
use App\Http\Controllers\Admin\PerhitunganMooraController;
use App\Http\Controllers\User\BansosController;
use App\Http\Controllers\User\BerandaController;
use App\Http\Controllers\User\DataKeluargaController;
use App\Http\Controllers\User\DataPendudukController;
use App\Http\Controllers\User\PengaduanController;

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

Route::get('/', [WelcomeController::class, 'welcome']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkUserLevel:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);
        Route::post('/list', [DashboardController::class, 'list']);
        Route::get('/bansos-data', [DashboardController::class, 'getBansosData']);
        Route::get('/penduduk-data', [DashboardController::class, 'getPendudukData']);
    });


    Route::prefix('datapenduduk')->group(function () {
        Route::get('/', [PopulationController::class, 'index']);
        Route::post('/store', [PopulationController::class, 'store']);
        Route::post('/list', [PopulationController::class, 'list']);
    });

    Route::prefix('laporan')->group(function () {
        Route::get('/', [ReportController::class, 'index']);
        Route::post('/list', [ReportController::class, 'list']);
    });

    Route::prefix('datapenduduk')->group(function () {
        Route::get('/', [PopulationController::class, 'index']);
        Route::post('/store', [PopulationController::class, 'store']);
        Route::post('/list', [PopulationController::class, 'list']);
        Route::get('/show/{id}', [PopulationController::class, 'show']);
        // Route::get('/show/{$id}', [PopulationController::class, 'show']);
    });

    Route::prefix('laporan')->group(function () {
        Route::get('/', [ReportController::class, 'index']);
        Route::post('/list', [ReportController::class, 'list']);
    });

    Route::prefix('riwayatPenduduk')->group(function () {
        Route::get('/', [HistoryPopulationController::class, 'index']);
        Route::post('/list', [HistoryPopulationController::class, 'list']);
    });

    Route::prefix('dataBansos')->group(function () {
        Route::get('/', [AssistanceDataController::class, 'index'])->name('dataBansos.index');
        Route::post('/list', [AssistanceDataController::class, 'list']);
        Route::post('/store', [AssistanceDataController::class, 'store'])->name('dataBansos.store');
    });

    // Route::prefix('perhitunganBansos')->group(function () {
    //     Route::get('/', [PerhitunganMooraController::class, 'index']);
    // });

    Route::prefix('verifikasiBansos')->group(function () {
        Route::get('/', [AssistanceDataVerificationController::class, 'index']);
        Route::get('/details/{id}', [AssistanceDataVerificationController::class, 'detail']);
        Route::put('/tolak/{id}', [AssistanceDataVerificationController::class, 'tolak']);
        Route::put('/konfirmasi/{id}', [AssistanceDataVerificationController::class, 'konfirmasi']);
    });

    Route::prefix('perhitunganBansosMoora')->group(function () {
        Route::get('/', [PerhitunganMooraController::class, 'index'])->name('admin.moora.index');
        Route::post('/simpan', [PerhitunganMooraController::class, 'store'])->name('admin.moora.store');
    });

    Route::prefix('perhitunganBansosMabac')->group(function () {
        Route::get('/', [PerhitunganMabacController::class, 'index'])->name('admin.mabac.index');
        Route::post('/simpan', [PerhitunganMabacController::class, 'store'])->name('admin.mabac.store');
    });

});





Route::group(['middleware' => ['auth', 'checkUserLevel:penduduk']], function () {

    Route::prefix('penduduk')->group(function () {
        Route::get('/', [BerandaController::class, 'index']);
    });

    Route::prefix('dataKeluarga')->group(function () {
        Route::get('/', [DataKeluargaController::class, 'index'])->name('dataKeluarga.index');


    });

    Route::prefix('bansos')->group(function () {
        Route::get('/', [BansosController::class, 'index'])->name('bansos.index');
        Route::get('/detail', [BansosController::class, 'detail'])->name('bansos.detail');
        Route::post('/submit', [BansosController::class, 'submit'])->name('bansos.submit');
    });



    Route::prefix('pengaduan')->group(function () {
        Route::get('/', [PengaduanController::class, 'index'])->name('pengaduan.index');
        Route::post('/store', [PengaduanController::class, 'store'])->name('pengaduan.store');
    });

});


