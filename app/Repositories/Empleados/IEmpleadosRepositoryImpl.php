<?php
namespace App\Repositories\Empleados;

use App\Models\Empleado;

class IEmpleadosRepositoryImpl implements IEmpleadosRepository{

    public function getAllEmpleadosCount(){
        return (Empleado::all())->count();
    }
}