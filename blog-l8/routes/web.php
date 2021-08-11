<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Auth::routes();

Route::middleware(['web', 'auth'])->group(function () {

    Route::get('profile', [RegisterController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [RegisterController::class, 'update'])->name('profile.update');

    Route::get('dashboard', [BlogController::class, 'dashboard']);
    Route::resource('blog', BlogController::class);

    Route::resource('users', RegisterController::class);
});


