<?php

namespace Fatoorahpayment\Gatewayintegration\Http\controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Cart\AddOrderApiRequest;
use Fatoorahpayment\Gatewayintegration\Services\FatoorahServicesGateway;
use App\Services\OrderApiService;
use Illuminate\Http\Request;

class MyFatoorahApiController extends Controller
{

    public function initial_data(Request $request)
    {
        /** still need to handle the request  */
        $data = [
            "InvoiceAmount" =>  $request->InvoiceAmount,
            "CurrencyIso" => $request->CurrencyIso
        ];
        $fatoorahServices = new FatoorahServicesGateway();
        $response = $fatoorahServices->initial_data($data);
        return $response;
    }


    public function execute_payment(Request $request)
    {
        /** still need to handle the request  */
        $data = [
            "PaymentMethodId" => $request->PaymentMethodId,
            "CustomerName" => $request->CustomerName,
            "DisplayCurrencyIso" =>  $request->DisplayCurrencyIso,
            "MobileCountryCode" => $request->MobileCountryCode,
            "CustomerMobile" => $request->CustomerMobile,
            "CustomerEmail" => $request->CustomerEmail,
            "InvoiceValue" => $request->InvoiceValue,
            "CallBackUrl" => $request->CallBackUrl ?? route('CallBackUrl'), //"http://196.219.155.101:3000/success",
            "ErrorUrl" => $request->ErrorUrl ?? route('ErrorUrl'), //"http://196.219.155.101:3000/error",
            "Language" => $request->header('Accept-Language') ??  app()->getLocale(),
            "CustomerReference" => "noshipping-nosupplier",
            // "CustomerAddress":{
            //     "Block": "string",
            //     "Street": "string",
            //     "HouseBuildingNo": "string",
            //     "AddressInstructions": "string"
            // },
            // "InvoiceItems": [
            //     {
            //         "ItemName": "item name",
            //         "Quantity": 10,
            //         "UnitPrice": 1,
            //         "Weight": 2,
            //         "Width": 3,
            //         "Height": 4,
            //         "Depth": 5
            //     }
            // ]
        ];
        $fatoorahServices = new FatoorahServicesGateway();
        $response = $fatoorahServices->execute_payment($data);
        return $response;
    }

    public function error_page(Request $request){
        // echo($request->all());
        // [$id,$pa] = request()->all();
        // echo($id);
        return view('fatoorahpackage.error');
    }
    public function sucess_page(Request $request){
        // [$id,$pa] = $request->all();
        // echo($id);
        return view('fatoorahpackage.success');
    }
}
