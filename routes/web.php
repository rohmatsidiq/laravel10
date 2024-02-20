<?php

use App\Http\Controllers\DataTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login_proses');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register_proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// prefix untuk menambahkan route admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard']);
    Route::get('/user', [HomeController::class, 'index'])->name('index');

    Route::get('/clientside', [DataTableController::class, 'clientSide'])->name('clientSide');
    Route::get('/serverside', [DataTableController::class, 'serverSide'])->name('serverSide');

    Route::get('/create', [HomeController::class, 'create'])->name('create');
    Route::post('/store', [HomeController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete');
});
