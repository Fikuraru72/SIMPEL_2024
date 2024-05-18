<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegristController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PopulationController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\HistoryPopulationController;
use App\Http\Controllers\User\PendudukController;

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
Route::get('login/', [LoginController::class, 'index']);
Route::get('regrist/', [RegristController::class, 'index']);

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
});

Route::prefix('datapenduduk')->group(function () {
    Route::get('/', [PopulationController::class, 'index']);
});

Route::prefix('laporan')->group(function () {
    Route::get('/', [ReportController::class, 'index']);
});

Route::prefix('riwayatPenduduk')->group(function () {
    Route::get('/', [HistoryPopulationController::class, 'index']);
});

Route::prefix('penduduk')->group(function () {
    Route::get('/', [PendudukController::class, 'index']);
});

