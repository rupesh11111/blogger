<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
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
    return redirect('auth/login');
});


Route::group(['prefix' => 'auth'], function () {
    Route::get('login', [AuthController::class,'login'])->name('login');
    Route::post('login', [AuthController::class,'postLogin'])->name('postLogin');
    Route::get('signup', [AuthController::class,'signup'])->name('signup');
    Route::post('signup', [AuthController::class,'postSignup'])->name('postSignup');
});

Route::group([ 'middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('blog', BlogController::class);
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
});

