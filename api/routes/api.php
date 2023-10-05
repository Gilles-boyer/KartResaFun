<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FormulaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationFormulaController;

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

//clients
Route::get('/clients', [ClientController::class, 'index']);
Route::get('/client/{id}', [ClientController::class, 'show']);
Route::post('/client', [ClientController::class, 'store']);
Route::put('/client/{id}', [ClientController::class, 'update']);
Route::delete('/client/{id}', [ClientController::class, 'destroy']);

//formulas
Route::get('/formulas', [FormulaController::class, 'index']);
Route::get('/formula/{id}', [FormulaController::class, 'show']);
Route::post('/formula', [FormulaController::class, 'store']);
Route::put('/formula/{id}', [FormulaController::class, 'update']);
Route::delete('/formula/{id}', [FormulaController::class, 'destroy']);

//reservations
Route::get('/reservations', [ReservationController::class, 'index']);
Route::get('/reservation/{id}', [ReservationController::class, 'show']);
Route::post('/reservation', [ReservationController::class, 'store']);
Route::put('/reservation/{id}', [ReservationController::class, 'update']);
Route::delete('/reservation/{id}', [ReservationController::class, 'destroy']);

//payments
Route::get('/payments', [PaymentController::class, 'index']);
Route::get('/payment/{id}', [PaymentController::class, 'show']);
Route::post('/payment', [PaymentController::class, 'store']);
Route::put('/payment/{id}', [PaymentController::class, 'update']);
Route::delete('/payment/{id}', [PaymentController::class, 'destroy']);

//ReservationFormulas
Route::get('/reservationformulas', [ReservationFormulaController::class, 'index']);
Route::get('/reservationformula/{id}', [ReservationFormulaController::class, 'show']);
Route::post('/reservationformula', [ReservationFormulaController::class, 'store']);
Route::put('/reservationformula/{id}', [ReservationFormulaController::class, 'update']);
Route::delete('/reservationformula/{id}', [ReservationFormulaController::class, 'destroy']);

//Slot
Route::get('/slots', [SlotController::class, 'index']);
Route::get('/slot/{id}', [SlotController::class, 'show']);
Route::post('/slot', [SlotController::class, 'store']);
Route::put('/slot/{id}', [SlotController::class, 'update']);
Route::delete('/slot/{id}', [SlotController::class, 'destroy']);
