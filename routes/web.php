<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataSiswaController;
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
    return view('auth.login');
});

Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'registration']);
Route::post('register', [AuthController::class, 'register']);

Route::get('home', [DataSiswaController::class, 'index']);
Route::get('home/create', [DataSiswaController::class, 'create']);
Route::post('home', [DataSiswaController::class, 'store']);
Route::get('home/{slug}/edit', [DataSiswaController::class, 'edit']);
Route::patch('home/{slug}', [DataSiswaController::class, 'update']);
Route::delete('home/{slug}/delete', [DataSiswaController::class, 'destroy']);
