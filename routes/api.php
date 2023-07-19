<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    
    Route::prefix('animals')->group(function () {
        Route::get('/', [AnimalController::class, 'index']);
        Route::get('/{id}', [AnimalController::class, 'show']);
        Route::post('/', [AnimalController::class, 'store']);
        Route::put('/{id}', [AnimalController::class, 'update']);
        Route::delete('/{id}', [AnimalController::class, 'destroy']);
    });
    
    Route::prefix('appointment')->group(function () {
        Route::get('/', [AppointmentController::class, 'index']);
        Route::get('/{id}', [AppointmentController::class, 'show']);
        Route::post('/', [AppointmentController::class, 'store']);
        Route::put('/{id}', [AppointmentController::class, 'update']);
        Route::delete('/{id}', [AppointmentController::class, 'destroy']);
    });
    
    Route::prefix('medicine')->group(function () {
        Route::get('/', [MedicineController::class, 'index']);
        Route::get('/{id}', [MedicineController::class, 'show']);
        Route::post('/', [MedicineController::class, 'store']);
        Route::put('/{id}', [MedicineController::class, 'update']);
        Route::delete('/{id}', [MedicineController::class, 'destroy']);
    });
    
    Route::prefix('client')->group(function () {
        Route::get('/', [ClientController::class, 'index']);
        Route::get('/{id}', [ClientController::class, 'show']);
        Route::post('/', [ClientController::class, 'store']);
        Route::put('/{id}', [ClientController::class, 'update']);
        Route::delete('/{id}', [ClientController::class, 'destroy']);
    });
    
    Route::prefix('procedure')->group(function () {
        Route::get('/', [ProcedureController::class, 'index']);
        Route::get('/{id}', [ProcedureController::class, 'show']);
        Route::post('/', [ProcedureController::class, 'store']);
        Route::put('/{id}', [ProcedureController::class, 'update']);
        Route::delete('/{id}', [ProcedureController::class, 'destroy']);
    });
        
    return response()->json(Gsantoscomp\SharedVetDb\Models\User::all());
});
