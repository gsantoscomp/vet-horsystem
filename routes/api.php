<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTypeController;
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

Route::middleware('auth:api')->group(function () {
    Route::prefix('animals')->group(function () {
        Route::get('/', [AnimalController::class, 'index']);
        Route::get('/{id}', [AnimalController::class, 'show']);
        Route::post('/', [AnimalController::class, 'store']);
        Route::put('update/{id}', [AnimalController::class, 'update']);
        Route::delete('/{id}', [AnimalController::class, 'destroy']);
    });

    Route::prefix('appointment')->group(function () {
        Route::get('/', [AppointmentController::class, 'index']);
        Route::get('/{id}', [AppointmentController::class, 'show']);
        Route::post('/', [AppointmentController::class, 'store']);
        Route::put('update/{id}', [AppointmentController::class, 'update']);
        Route::delete('/{id}', [AppointmentController::class, 'destroy']);
    });

    Route::prefix('medicine')->group(function () {
        Route::get('/', [MedicineController::class, 'index']);
        Route::get('/{id}', [MedicineController::class, 'show']);
        Route::post('/', [MedicineController::class, 'store']);
        Route::put('update/{id}', [MedicineController::class, 'update']);
        Route::delete('/{id}', [MedicineController::class, 'destroy']);
    });

    Route::prefix('client')->group(function () {
        Route::get('/', [ClientController::class, 'index']);
        Route::get('/{id}', [ClientController::class, 'show']);
        Route::post('/', [ClientController::class, 'store']);
        Route::put('update/{id}', [ClientController::class, 'update']);
        Route::delete('/{id}', [ClientController::class, 'destroy']);
    });

    Route::prefix('procedure')->group(function () {
        Route::get('/', [ProcedureController::class, 'index']);
        Route::get('/{id}', [ProcedureController::class, 'show']);
        Route::post('/', [ProcedureController::class, 'store']);
        Route::put('update/{id}', [ProcedureController::class, 'update']);
        Route::delete('/{id}', [ProcedureController::class, 'destroy']);
    });

    Route::prefix('userType')->group(function () {
        Route::get('/', [UserTypeController::class, 'index']);
        Route::get('/{id}', [UserTypeController::class, 'show']);
        Route::post('/', [UserTypeController::class, 'store']);
        Route::put('update/{id}', [UserTypeController::class, 'update']);
        Route::delete('/{id}', [UserTypeController::class, 'destroy']);
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::post('/', [UserController::class, 'store']);
        Route::put('update/{id}', [UserController::class, 'update']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    Route::prefix('permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index']);
        Route::get('/{id}', [PermissionController::class, 'show']);
        Route::post('/', [PermissionController::class, 'store']);
        Route::put('update/{id}', [PermissionController::class, 'update']);
        Route::delete('/{id}', [PermissionController::class, 'destroy']);
    });
});
