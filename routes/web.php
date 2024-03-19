<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hocsinh', [\App\Http\Controllers\HocsinhController::class, 'index']);// Hien thi danh sach hoc sinh
Route::get('hocsinh/create', [\App\Http\Controllers\HocsinhController::class, 'create']);// Them moi hoc sinh
Route::post('hocsinh/create', [\App\Http\Controllers\HocsinhController::class, 'store']);// Xu ly them moi hoc sinh
Route::get('hocsinh/{id}/edit', [\App\Http\Controllers\HocsinhController::class, 'edit']);// Sua hoc sinh
Route::post('hocsinh/update', [\App\Http\Controllers\HocsinhController::class, 'update']);
Route::get('hocsinh/{id}/delete', [\App\Http\Controllers\HocsinhController::class, 'destroy']);
