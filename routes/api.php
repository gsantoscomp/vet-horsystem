<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProcedureController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTypeController;
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
        Route::get('/', [AnimalController::class, 'index'])->name('animals.index');
        Route::get('/{id}', [AnimalController::class, 'show'])->name('animals.show');
        Route::post('/', [AnimalController::class, 'store'])->name('animals.store');
        Route::put('update/{id}', [AnimalController::class, 'update'])->name('animals.update');
        Route::delete('delete/{id}', [AnimalController::class, 'destroy'])->name('animals.destroy');
    });

    Route::prefix('appointment')->group(function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('appointment.index');
        Route::get('/{id}', [AppointmentController::class, 'show'])->name('appointment.show');
        Route::post('/', [AppointmentController::class, 'store'])->name('appointment.store');
        Route::put('update/{id}', [AppointmentController::class, 'update'])->name('appointment.update');
        Route::delete('delete/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
    });

    Route::prefix('medicine')->group(function () {
        Route::get('/', [MedicineController::class, 'index'])->name('medicine.index');
        Route::get('/{id}', [MedicineController::class, 'show'])->name('medicine.show');
        Route::post('/', [MedicineController::class, 'store'])->name('medicine.store');
        Route::put('update/{id}', [MedicineController::class, 'update'])->name('medicine.update');
        Route::delete('delete/{id}', [MedicineController::class, 'destroy'])->name('medicine.destroy');
    });

    Route::prefix('client')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('client.index');
        Route::get('/{id}', [ClientController::class, 'show'])->name('client.show');
        Route::post('/', [ClientController::class, 'store'])->name('client.store');
        Route::put('update/{id}', [ClientController::class, 'update'])->name('client.update');
        Route::delete('delete/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
        Route::get('{id}/animals', [ClientController::class, 'animals'])->name('client.animals');
    });

    Route::prefix('procedure')->group(function () {
        Route::get('/', [ProcedureController::class, 'index'])->name('procedure.index');
        Route::get('/{id}', [ProcedureController::class, 'show'])->name('procedure.show');
        Route::post('/', [ProcedureController::class, 'store'])->name('procedure.store');
        Route::put('update/{id}', [ProcedureController::class, 'update'])->name('procedure.update');
        Route::delete('delete/{id}', [ProcedureController::class, 'destroy'])->name('procedure.destroy');
    });

    Route::prefix('userType')->group(function () {
        Route::get('/', [UserTypeController::class, 'index'])->name('userType.index');
        Route::get('/{id}', [UserTypeController::class, 'show'])->name('userType.show');
        Route::post('/', [UserTypeController::class, 'store'])->name('userType.store');
        Route::put('update/{id}', [UserTypeController::class, 'update'])->name('userType.update');
        Route::delete('delete/{id}', [UserTypeController::class, 'destroy'])->name('userType.destroy');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/{id}', [UserController::class, 'show'])->name('user.show');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::put('update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::delete('delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::prefix('permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('/{id}', [PermissionController::class, 'show'])->name('permission.show');
        Route::post('/', [PermissionController::class, 'store'])->name('permission.store');
        Route::put('update/{id}', [PermissionController::class, 'update'])->name('permission.update');
        Route::delete('delete/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    });
});
