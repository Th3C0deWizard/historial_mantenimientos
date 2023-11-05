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
<<<<<<< HEAD
Route::post('v1/users', [v1\UserController::class, 'store']);
=======
Route::post('v1/register', [v1\UserController::class, 'store']);
>>>>>>> 21ab92851d93bc9ce0e562807f27aaea50be0619

// Computers Routes
Route::apiResource('v1/computers', v1\ComputerController::class)
    ->only(['index', 'show']);

// Observations Routes
Route::get('v1/computers/{computer}/observations', [v1\ObservationController::class, 'indexComputerObservations']);
Route::get('v1/computers/{computer}/observations/{observation}', [v1\ObservationController::class, 'showComputerObservation']);

<<<<<<< HEAD
// Categories Routes
Route::apiResource('v1/categories', v1\CategoryController::class)
    ->except(['update', 'show']);

// Auth Routes
Route::post('v1/login', [v1\AuthController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('v1/users', v1\UserController::class)->except(['store']);
=======
// Login
Route::post('/v1/login', [App\Http\Controllers\api\v1\AuthController::class, 'login'])->name('api.login');

// Authenticated Routes
Route::middleware(['auth:sanctum'])->group(function () {

    // Users Routes
    Route::get('v1/users', [v1\UserController::class, 'index']);
    Route::get('v1/profile', [v1\UserController::class, 'show']);
    Route::put('v1/profile', [v1\UserController::class, 'update']);
    Route::delete('v1/profile', [v1\UserController::class, 'destroy']);
    Route::put('v1/profile/changePassword', [v1\UserController::class, 'changePassword']);

    // Computers Routes
    Route::put('v1/computers/{computer}', [v1\ComputerController::class, 'update']);
    Route::delete('v1/computers/{computer}', [v1\ComputerController::class, 'destroy']);
    Route::post('v1/users/{user}/computers', [v1\ComputerController::class, 'store']);

    // Observations Routes
    Route::apiResource('v1/users.observations', v1\ObservationController::class)
        ->only(['index', 'show']);
    Route::post('v1/computers/{computer}/observations', [v1\ObservationController::class, 'store']);
    Route::apiResource('v1/observations', v1\ObservationController::class)
        ->only(['update', 'destroy']);

    // Categories Routes
    Route::apiResource('v1/categories', v1\CategoryController::class)
        ->except(['update', 'show']);

    // Logout
    Route::post('/v1/logout', [App\Http\Controllers\api\v1\AuthController::class, 'logout'])->name('api.logout');
>>>>>>> 21ab92851d93bc9ce0e562807f27aaea50be0619
});
