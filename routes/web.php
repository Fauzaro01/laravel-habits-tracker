<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HabitsController;
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
})->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('store', 'store')->name('store');
    Route::get('login', 'login')->name('login');
    Route::post('authenticate', 'authenticate')->name('authenticate');
    Route::get('dashboard', 'dashboard')->name('dashboard');
    Route::post('logout', 'logout')->name('logout');
});

Route::prefix('/habits')->controller(HabitsController::class)->group(function () {
    Route::get('/{id}', 'index')->name('habits.index');
    Route::post('/checkin', 'checkin')->name('habits.checkin');
    Route::post('/store', 'store')->name('habits.store');
    Route::get('/update/{id}', 'updatepage')->name('habits.updatepage');
    Route::put('/{id}', 'update')->name('habits.update');
    Route::delete('/{id}', 'destroy')->name('habits.destroy');
});
