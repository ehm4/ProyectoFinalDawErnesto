<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::view('login', "all/login")->name('login');
Route::view('registro', "all/registro")->name('registro');
Route::view('historia', "all/historia")->name('historia');
Route::view('index', "cliente/index")->middleware('auth')->name('clienteindex');

Route::post('/validar-registro',[LoginController::class, 'register'])->name('validar-registro');
Route::post('/inicia-sesion',[LoginController::class, 'login'])->name('inicia-sesion');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

