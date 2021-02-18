<?php
namespace App\Http\Resources\Json;

use Illuminate\Http\Resources\Json\JsonResource;

class AgendamientosListJson extends JsonResource{
    
    public function toArray($request){
        return [
            'start' => $this->start->format('Y-m-d H:i:s'),
            'end' => $this->end->format('Y-m-d H:i:s')
        ];
    }
}