<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaypalService;

class PaypalController extends Controller
{
    private $paypalServices;
    
    public function __construct(){
        $this->paypalServices = resolve(PaypalService::class);
    }

    public function handleRedirect(Request $request){
        $response = $this->paypalServices->createOrder(100.00,'usd');
        
    }

    public function handleApprovalPayment(){

    }

    public function handleCancelledPayment(){

    }
}
