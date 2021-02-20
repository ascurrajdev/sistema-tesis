<?php
namespace App\Services;

use App\Repositories\Empleados\IEmpleadosRepository;

class EmpleadoService {
    
    private $empleadoRepository;

    public function __construct(){
        $this->empleadoRepository = resolve(IEmpleadosRepository::class);    
    }

    public function getAll(){
        return $this->empleadoRepository->getAllEmpleados();
    }

    public function getCount(){
        return $this->empleadoRepository->getAllEmpleadosCount();
    }
}