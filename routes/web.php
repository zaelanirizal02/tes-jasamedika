<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelurahanController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('welcome', function () {
    return view('welcome');
});

Route::resource('/kelurahans', \App\Http\Controllers\KelurahanController::class)->middleware('auth');
Route::resource('/pasiens', \App\Http\Controllers\PasienController::class)->middleware('auth');

// Route::get('/', [\App\Http\Controllers\KelurahanController::class, 'index']);

// Route::get('buku', [BukuController::class, 'index']);

// Route::get('/', \App\Http\Controllers\LoginController::class, 'login')->name('login');
// Route::post('actionlogin', \App\Http\Controllers\LoginController::class, 'actionlogin')->name('actionlogin');
// Route::get('index', \App\Http\Controllers\KelurahanController::class, 'index')->name('home')->middleware('auth');
// Route::get('actionlogout', \App\Http\Controllers\LoginController::class, 'actionlogout')->name('actionlogout')->middleware('auth');

Route::get('/main', [KelurahanController::class, 'blade']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('guest');
Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
