<?php

use Fatoorahpayment\Gatewayintegration\Http\controllers\MyFatoorahApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('api/')->group(function () {
    Route::controller(MyFatoorahApiController::class)->group(function () {
        Route::post('initial_data', 'initial_data');
        Route::post('execute_payment', 'execute_payment');
        
    });

});
