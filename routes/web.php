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

        /**
         * FHU Team add line items, view details on form
        */
        Route::get('/wareHouseAccess', [HomeController::class, 'wareHouseAccess'])->name('wareHouseAccess');
        Route::post('getClientService',[HomeController::class,'getClientService'])->name('wareHouseAccess.clientService');
        Route::post('/addClientService',[HomeController::class,'addClientService'])->name('wareHouseAccess.addClientService');
    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Home Routes client list,(add,edit,delete client)
        */
        Route::get('/home', [HomeController::class, 'index'])->name('home.index');
        Route::get('/addClient', [HomeController::class, 'addClient'])->name('home.addClient');
        Route::post('/saveClient', [HomeController::class, 'saveClient'])->name('home.saveClient');
        Route::get('/editClient/{id}', [HomeController::class, 'editClient'])->name('home.editClient');
        Route::post('/updateClient', [HomeController::class, 'updateClient'])->name('home.updateClient');
        Route::get('/deleteClient/{id}', [HomeController::class, 'deleteClient'])->name('home.deleteClient');

        /**
         * view payment list,view Invoice,add line items,add hub employee in general,View & add & edit client fees
        */
        Route::get('/clientPayments/{id}', [HomeController::class, 'clientPaymentsList'])->name('home.clientPayments');
        Route::get('/clientMonthlyInvoice/{user_id}/{invoiceId}/{month}/{year}', [HomeController::class, 'clientMonthlyInvoice'])->name('home.clientMonthlyInvoice');
        Route::post('/addClientLineItem',[HomeController::class, 'addClientLineItem'])->name('client.addClientLineItem');
        Route::get('/clientFees/{user_id}/{invoiceId}/{month}/{year}', [HomeController::class, 'clientFees'])->name('home.clientFees');
        Route::post('/clientFeesPost', [HomeController::class, 'clientFeesPost'])->name('home.clientFeesPost');

        /**
         * view general fees/edit/update,
         */
        Route::get('/generalFees', [HomeController::class, 'generalFees'])->name('home.generalFees');
        Route::post('/generalFeesPost', [HomeController::class, 'generalFeesPost'])->name('home.generalFeesPost');

         /**
         * view monthly wareHouseAccess request line items 
         */
        Route::get('/viewRequestedItems/{user_id}/{invoiceId}/{month}/{year}', [HomeController::class, 'viewRequestedItems'])->name('warehouse.requestedList');
        Route::get('/approveRejectItems/{id}/{status}/{user_id}/{invoiceId}/{month}/{year}', [HomeController::class, 'approveRejectItems'])->name('warehouse.approveReject');

        /**
         * Logout Routes
         */
        Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    });
});