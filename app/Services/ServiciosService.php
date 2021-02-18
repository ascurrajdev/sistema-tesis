<?php

namespace App\Services;

use App\Repositories\Servicios\IServiciosRepository;

class ServiciosService {
    
    private $serviciosRepository;
    public function __construct(){
        $this->serviciosRepository = resolve(IServiciosRepository::class);
    }

    public function getCount(){
        return $this->serviciosRepository->getAllServiciosCount();
    }

    public function getAllPaginate(){
        return $this->serviciosRepository->getAllServiciosPaginate();
    }
}