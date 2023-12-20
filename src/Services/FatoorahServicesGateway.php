<?php

namespace Fatoorahpayment\Gatewayintegration\Services;


use Illuminate\Support\Facades\Http;

class FatoorahServicesGateway
{
    // private $base_url  = config('myfatoorah.fatoora_base_url', 'https://apitest.myfatoorah.com/');
    private $headers;
    public $order_api_service;
    private $token;
    const sandbox ="https://apitest.myfatoorah.com/" ;
    const live= "https://api.myfatoorah.com/";

    protected $base_url;

    protected $mode;
    public function __construct($mode ="test")
    {
        $this->mode = $mode;

        if($mode == "test"){
            $this->base_url = self::sandbox;
        }else{
            $this->base_url = self::live;
        }

        $this->token = config('myfatoorahConfig.api_token_key');

        $this->headers = [
            "Content-Type" => 'application/json',
            "Authorization" => 'Bearer '. $this->token
        ];
    }

    public function initial_data($data)
    {


        $response = Http::baseUrl($this->base_url)->withHeaders($this->headers)->asJson()
        ->post('v2/InitiatePayment', $data);

        $responseData=   $response->json();

        if($responseData["IsSuccess"] == true && $responseData["ValidationErrors"] == null){

            return $responseData;

        }else{
            return "Unexpected Error: " .$responseData;
        }
    }


    public function execute_payment($data){

        $response = Http::baseUrl($this->base_url)->withHeaders($this->headers)->asJson()
        ->post('v2/ExecutePayment', $data);

        $responseData=   $response->json();

        if($responseData["IsSuccess"] == true && $responseData["ValidationErrors"] == null){

            return $responseData;
        }else{
            return "Unexpected Error: " .$responseData;
        }

    }


}
