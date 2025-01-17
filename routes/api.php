<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MpesaController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/mpesa/stkpush/response', [MpesaController::class, 'resdata'])->name('stkpush.response');
Route::get('/mpesa', [MpesaController::class, 'stkSimulation'])->name('mpesa'); */
// For traditional web authentication

Route::middleware(['web', 'auth'])->group(function () {
    Route::post('/mpesa/stkpush/response', [MpesaController::class, 'resdata'])->name('stkpush.response');
    Route::get('/mpesa', [MpesaController::class, 'stkSimulation'])->name('mpesa');
});

// For API authentication
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
