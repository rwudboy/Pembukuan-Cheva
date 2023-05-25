<?php

use App\Http\Controllers\BarangController;
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
Route::controller(BarangController::class)->group(function () {
   Route::get("/barang", "index");
   Route::get("/barang/create", "create");
   Route::post("/barang/store", "store");
   Route::get("/barang/edit/{id}", "edit");
   Route::put("/barang/update/{id}", "update");
   Route::delete("/barang/delete/{id}", "destroy");
});