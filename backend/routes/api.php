<?php

use App\Http\Controllers\Api\Coefficient\CoefficientController;
use App\Http\Controllers\Api\Crown\CrownController;
use App\Http\Controllers\Api\ExtraWork\ExtraWorkController;
use App\Http\Controllers\Api\Logistic\LogisticController;
use App\Http\Controllers\Api\Material\MaterialController;
use App\Http\Controllers\Api\Settings\SettingsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('materials')->group(function () {
    Route::get('/', [MaterialController::class, 'index']);
});

Route::prefix('extraWorks')->group(function () {
    Route::get('/', [ExtraWorkController::class, 'index']);
});

Route::prefix('coefficients')->group(function () {
    Route::get('/', [CoefficientController::class, 'index']);
});

Route::prefix('crowns')->group(function () {
    Route::get('/', [CrownController::class, 'index']);
});

Route::prefix('settings')->group(function () {
    Route::get('/', [SettingsController::class, 'index']);
});

Route::prefix('logistic')->group(function () {
    Route::post('calculate', [LogisticController::class, 'calculatePrice']);
});
