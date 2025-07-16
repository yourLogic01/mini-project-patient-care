<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\VisitController;
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

Route::get('/', function () {
    return view('home');
});
// route pasien
Route::resource('patients', PatientController::class)->except('show');

// route daftar kunjungan
Route::get('/visits/create', [VisitController::class, 'create'])->name('visits.create');
Route::post('/visits', [VisitController::class, 'store'])->name('visits.store');

// route riwayat kunjungan
Route::get('/histories', [HistoryController::class, 'index'])->name('histories.index');
Route::get('/histories/{visit}', [HistoryController::class, 'show'])->name('histories.show');




