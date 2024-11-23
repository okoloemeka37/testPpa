<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaystackController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('callback',PaystackController::class,'callback')->name('callback');
//Route::get('success',PaystackController::class,'success')->name('success');
//Route::get('cancel',PaystackController::class,'cancel')->name('cancel');


Route::post('/pay', [PaystackController::class, 'redirectToGateway'])->name('pay');


Route::get('/payment/callback', [PaystackController::class, 'handleGatewayCallback'])->name('callback');