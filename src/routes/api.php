<?php

use Fatoorahpayment\Gatewayintegration\Http\controllers\MyFatoorahApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/')->group(function () {
    Route::controller(MyFatoorahApiController::class)->group(function () {
        Route::post('initial_data', 'initial_data');
        Route::post('execute_payment', 'execute_payment');
        Route::any('error', 'error_page')->name('api_error_page');
        Route::any('success', 'sucess_page')->name('api_sucess_page');
    });

});
