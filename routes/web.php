<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
        Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/', [LoginController::class, 'show'])->name('login.show');
        Route::post('/', [LoginController::class, 'login'])->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Home Routes client list,general fees
         */
        Route::get('/home', [HomeController::class, 'index'])->name('home.index');
        Route::get('/clientInvoices/{id}', [HomeController::class, 'clientInvoices'])->name('home.clientInvoices');
        Route::get('/generalFees', [HomeController::class, 'generalFees'])->name('home.generalFees');
        Route::post('/generalFeesPost', [HomeController::class, 'generalFeesPost'])->name('home.generalFeesPost');

        /**
         * Logout Routes
         */
        Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    });
});