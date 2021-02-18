<?php
namespace App\Services;
use App\Traits\ConsumesExternalServices;
class PaypalService{
    use ConsumesExternalServices;

    private $urlBase;
    private $clientId;
    private $clientSecret;

    public function __construct(){
        $this->urlBase = config('services.paypal.base_uri');
        $this->clientId = config('services.paypal.client_id');
        $this->clientSecret = config('services.paypal.client_secret');
    }

    public function resolveAuthorization(&$headers,&$queryParams,&$formParams){
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response){
        return json_decode($response);
    }

    public function createOrder($monto,$moneda){
        return $this->makeRequest(
            'POST',
            '/v2/checkout/orders',
            [],
            [
                'intent' => 'CAPTURE',
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => strtoupper($moneda),
                            'value' => $monto
                        ]
                    ]
                ],
                'application_context'=>[
                    'brand_name' => env('APP_NAME'),
                    'user_action' => 'PAY_NOW',
                    'shipping_preference' => 'NO_SHIPPING',
                    'return_url' => route('agendamientos.accept'),
                    'cancel_url' => route('agendamientos.cancelled')
                ]
            ],
            [
                'Content-Type' =>'application/json'
            ],
            $isJsonRequest = true
        );
    }

    public function handlePayment($order){
        $linksPayment = collect($order->links);
        $approvalLink = $linksPayment->firstWhere('rel','approve');
        return redirect($approvalLink->href);
    }
    
    public function capturePayment($orderId){
        return $this->makeRequest(
            'POST',
            "/v2/checkout/orders/{$orderId}/capture",
            [],
            [],
            [
                'Content-Type' => 'application/json'
            ],
        );
    }

    public function resolveAccessToken(){
        $credenciales = base64_encode("{$this->clientId}:{$this->clientSecret}");
        return "Basic {$credenciales}";
    }
}