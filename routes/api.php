<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangPinjamController;
use App\Http\Controllers\BarangRusakController;
use App\Http\Controllers\unitController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



use App\Http\Controllers\MyUnitController;
use App\Http\Controllers\supplierControlle;

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
Route::controller(MyUnitController::class)->group(function () {
    Route::get('/units',  'index');
    Route::get('/get-token',  'getTokenCSRF');
    Route::get('/units/{id}',  'show');
    Route::post('/units',  'store');
    Route::put('/units/{id}',  'update');
    Route::delete('/units/{id}',  'destroy');
    Route::get('/login', 'index2');
    Route::post('/login', 'authentiocaating');
    Route::post('/registerAdmin', 'registerAdmin');
    Route::post('/registerSupplier', 'registerSupplier');
    Route::get('/logout', 'logout');
});
Route::controller(AuthController::class)->group(function () {
    Route::post("/register", "register");
    Route::post("/login", "login");
    Route::post("/logout", "logout")->middleware("auth:sanctum");
    Route::get("/forgot-password", "index")->middleware('guest')->name('password.request');
    Route::post("/forgot-password", "forgottpassword")->middleware('guest')->name('password.email');
    Route::get("/reset-password/{token}", "token")->middleware('guest')->name('password.reset');
    Route::post("/reset-password", "update")->middleware('guest')->name('password.update');
});
Route::controller(BarangController::class)->group(function () {
    Route::get("/barang", "index");
    Route::get("/barang/show/{id}", "show");
    Route::get("/barang/create", "create");
    Route::post("/barang/store", "store");
    Route::get("/barang/edit/{id}", "edit");
    Route::post("/barang/update/{id}", "update");
    Route::delete("/barang/delete/{id}", "destroy");
});
Route::controller(BarangMasukController::class)->group(function () {
    Route::get("/barang_masuk", "index");
    Route::get("/barang_masuk/create", "create");
    Route::post("/barang_masuk/store", "store");
    Route::get("/barang_masuk/edit/{id}", "edit");
    Route::get("/barang_masuk/show/{id}", "show");
    Route::post("/barang_masuk/update/{id}", "update");
    Route::delete("/barang_masuk/delete/{id}", "destroy");
});
Route::controller(supplierControlle::class)->group(function () {
    Route::get("/supplier", "index");
    Route::get("/supplier/create", "create");
    Route::post("/supplier/store", "store");
    Route::get("/supplier/edit/{id}", "edit");
    Route::get("/supplier/show/{id}", "show");
    Route::post("/supplier/update/{id}", "update");
    Route::delete("/supplier/delete/{id}", "destroy");
});
Route::controller(BarangPinjamController::class)->group(function () {
    Route::get("/barang_pinjam", "index");
    Route::get("/barang_pinjam/create", "create");
    Route::post("/barang_pinjam/store", "store");
    Route::get("/barang_pinjam/show/{id}", "show");
    Route::post("/barang_pinjam/pengembalian/{id}", "update");
    Route::delete("/barang_pinjam/delete/{id}", "destroy");
});
Route::controller(BarangRusakController::class)->group(function () {
    Route::get("/barang_rusak", "index");
    Route::get("/barang_rusak/create", "create");
    Route::post("/barang_rusak/store", "store");
    Route::get("/barang_rusak/show/{id}", "show");
    Route::post("/barang_rusak/update/{id}", "update");
    Route::delete("/barang_rusak/delete/{id}", "destroy");
});
Route::controller(unitController::class)->group(function () {
    Route::get("/unit", "index");
    Route::get("/unit/create", "create");
    Route::post("/unit/store", "store");
    Route::get("/unit/edit/{id}", "edit");
    Route::put("/unit/update/{id}", "update");
    Route::delete("/unit/delete/{id}", "destroy");
});
