<?php
namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumesExternalServices{
    public function makeRequest($method,$requestUrl,$queryParams=[],$formParams = [],$headers = [],$isJsonRequest = false){
        $client = new Client([
            'base_uri'=>$this->urlBase
        ]);

        if(method_exists($this,'resolveAuthorization')){
            $this->resolveAuthorization($headers,$queryParams,$formParams);
        }

        $response = $client->request($method,$requestUrl,[
            $isJsonRequest ? 'json' : 'form_params' => $formParams,
            'headers' => $headers,
            'query' => $queryParams,
        ]);

        $response = $response->getBody()->getContents();
        
        if(method_exists($this,'decodeResponse')){
            $response = $this->decodeResponse($response);
        }
        
        return $response;
    }
}