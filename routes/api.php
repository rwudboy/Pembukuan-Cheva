<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\MyUnitController;

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
Route::get('/units', [MyUnitController::class, 'index']);
Route::get('/get-token', [MyUnitController::class, 'getTokenCSRF']);
Route::get('/units/{id}', [MyUnitController::class, 'show']);
Route::post('/units', [MyUnitController::class, 'store']);
Route::put('/units/{id}', [MyUnitController::class, 'update']);
Route::delete('/units/{id}', [MyUnitController::class, 'destroy']);

