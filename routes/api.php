<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthUserController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\Brand\BrandController;
use App\Http\Controllers\Api\Unit\UnitController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('test', function (Request $request) {
    return response()->json("the");
});
// routes/api.php



Route::controller(AuthUserController::class)->group(function () {
    // Public routes (no authentication required)
    Route::post('login', 'login');
    Route::post('register', 'register');

    // Protected routes (authentication required)
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::get('me', 'me');
    });
});

// Route::get('Register',[])

// Protected User API Routes with Token Authentication
Route::middleware(['auth:sanctum'])->prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::post('/', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

// Protected Brand API Routes with Token Authentication
Route::middleware(['auth:sanctum'])->prefix('brands')->group(function () {
    Route::get('/', [BrandController::class, 'index']);
    Route::get('/{id}', [BrandController::class, 'show']);
    Route::post('/', [BrandController::class, 'store']);
    Route::put('/{id}', [BrandController::class, 'update']);
    Route::delete('/{id}', [BrandController::class, 'destroy']);
});

// Protected Unit API Routes with Token Authentication
Route::middleware(['auth:sanctum'])->prefix('units')->group(function () {
    Route::get('/', [UnitController::class, 'index']);
    Route::get('/{id}', [UnitController::class, 'show']);
    Route::post('/', [UnitController::class, 'store']);
    Route::put('/{id}', [UnitController::class, 'update']);
    Route::delete('/{id}', [UnitController::class, 'destroy']);
});




