<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ResponsibleController;
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
Route::middleware('api')->group(function () {
    Route::apiResource('artist', ArtistController::class);
    Route::apiResource('responsible', ResponsibleController::class);
    Route::apiResource('events', EventController::class);

    Route::prefix('payments')->group(function () {
        Route::get('/', [PaymentController::class, 'index']);
        Route::get('{payment}', [PaymentController::class, 'show']);
        Route::post('/create', [PaymentController::class, 'store']);
        Route::put('/{payment}/update', [PaymentController::class, 'updateStatus']);
    });
});
