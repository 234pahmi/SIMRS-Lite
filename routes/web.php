<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ListTodayController;
use App\Http\Controllers\Backend\PatientController;
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

Auth::routes([
    'register' => false,
]);
Route::middleware(['auth','check_role:Admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/pasien', PatientController::class);
    Route::get('/pendaftaran-hari-ini', [PatientController::class, 'today'])->name('today');
    Route::get('/cetak-pdf', [PatientController::class, 'print'])->name('print');
});
Route::middleware(['auth','check_role:Admin,Dokter'])->group(function () {
    Route::get('/pendaftaran-pasien', [PatientController::class, 'registration'])->name('registration');
    Route::patch('/pasien-hari-ini/{id}', [PatientController::class, 'dipoli'])->name('dipoli');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
