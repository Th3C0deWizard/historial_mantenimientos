<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1;

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

// Users Routes
Route::post('v1/users', [v1\UserController::class, 'store']);

// Computers Routes
Route::apiResource('v1/computers', v1\ComputerController::class)
    ->except(['store']);
Route::post('v1/users/{user}/computers', [v1\ComputerController::class, 'store']);

// Observations Routes
Route::apiResource('v1/users.observations', v1\ObservationController::class)
    ->only(['index', 'store', 'show']);
Route::apiResource('v1/observations', v1\ObservationController::class)
    ->only(['update', 'destroy']);
Route::get('v1/computers/{computer}/observations', [v1\ObservationController::class, 'indexComputerObservations']);
Route::get('v1/computers/{computer}/observations/{observation}', [v1\ObservationController::class, 'showComputerObservation']);

// Categories Routes
Route::apiResource('v1/categories', v1\CategoryController::class)
    ->except(['update', 'show']);

// Auth Routes
Route::post('v1/login', [v1\AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('v1/users', v1\UserController::class)->except(['store']);
});
