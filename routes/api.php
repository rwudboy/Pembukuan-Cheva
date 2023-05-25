<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\unitController;
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

Route::controller(BarangController::class)->group(function () {
    Route::get("/barang", "index");
    Route::get("/barang/create", "create");
    Route::post("/barang/store", "store");
    Route::get("/barang/edit/{id}", "edit");
    Route::put("/barang/update/{id}", "update");
    Route::delete("/barang/delete/{id}", "destroy");
});
Route::controller(BarangMasukController::class)->group(function () {
    Route::get("/barang_masuk", "index");
    Route::get("/barang_masuk/create", "create");
    Route::post("/barang_masuk/store", "store");
    Route::get("/barang_masuk/edit/{id}", "edit");
    Route::put("/barang_masuk/update/{id}", "update");
    Route::delete("/barang_masuk/delete/{id}", "destroy");
});
Route::controller(unitController::class)->group(function () {
    Route::get("/unit", "index");
    Route::get("/unit/create", "create");
    Route::post("/unit/store", "store");
    Route::get("/unit/edit/{id}", "edit");
    Route::put("/unit/update/{id}", "update");
    Route::delete("/unit/delete/{id}", "destroy");
});
