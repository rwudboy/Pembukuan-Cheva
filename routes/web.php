<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyUnitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(MyUnitController::class)->group(function () {
    Route::get('/login', 'index2');
    Route::post('/login', 'authentiocaating');
    Route::post('/registerAdmin', 'registerAdmin');
    Route::get('/registerAdmin', 'registerAdminn');
    Route::post('/registerSupplier', 'registerSupplier');
    Route::get('/registerSupplier', 'registerSupplierr');
    Route::get('/logout', 'logout');
});
