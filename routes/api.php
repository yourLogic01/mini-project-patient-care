<?php

use App\Http\Controllers\Api\HistoryController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\VisitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API for patient
Route::get('/patients', [PatientController::class, 'index']);
Route::get('/patients/{id}', [PatientController::class, 'show']);
Route::post('/patients', [PatientController::class, 'store']);
Route::put('/patients/{id}', [PatientController::class, 'update']);
Route::delete('/patients/{id}', [PatientController::class, 'destroy']);

// API for daftar kunjungan
Route::post('/visits', [VisitController::class, 'store']);

// API for riwayat kunjungan
Route::get('/histories', [HistoryController::class, 'index']);
Route::get('/histories/{visit}', [HistoryController::class, 'show']);
Route::get('/histories/{id}/patient', [HistoryController::class, 'byPatient']);
