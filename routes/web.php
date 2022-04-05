<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AbsenController;

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

Route::get('/absen/get', [AbsenController::class, 'absen']);

Route::resource('/dashboard/device', DeviceController::class);