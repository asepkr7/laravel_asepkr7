<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RumahSakitController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});
Route::get('/logout', [AuthController::class,'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/home', fn()=> redirect('/'));
    Route::get('/', fn()=> redirect('/dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/pasien', PasienController::class);
    Route::resource('/rumah-sakit', RumahSakitController::class);
    Route::get('pasien/filter/{rumah_sakit_id}', [PasienController::class, 'filterByRumahSakit']);
});