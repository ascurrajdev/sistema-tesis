<?php
namespace App\Http\Responsables\Servicios;

use Illuminate\Contracts\Support\Responsable;
use App\Services\ServiciosService;

class ServicioIndex implements Responsable{
    
    private $serviciosService;

    public function __construct(){
        $this->serviciosService = resolve(ServiciosService::class);
    }

    public function toResponse($request){
        return view("servicios.index",array(
            "servicios" => $this->serviciosService->getAllPaginate()
        ));
    }
}