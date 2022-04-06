<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\UserLogController;
use App\Http\Controllers\UserInfoController;

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

Route::resource('/dashboard/device', DeviceController::class);

Route::resource('/dashboard/user-info', UserInfoController::class);

Route::get('/absen/get', [AbsenController::class, 'absen']);

Route::get('/dashboard/userlog', [UserLogController::class, 'index']);