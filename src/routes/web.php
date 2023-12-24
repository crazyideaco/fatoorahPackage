<?php

use Fatoorahpayment\Gatewayintegration\Http\controllers\MyFatoorahApiController;
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

Route::get('contact', function(){
    return 'Hello from the contact form package';
});

Route::controller(MyFatoorahApiController::class)->group(function () {
    Route::any('error', 'error_page')->name('error_page');
    Route::any('success', 'sucess_page')->name('callback_page');
});