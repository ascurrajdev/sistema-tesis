<?php
namespace App\Repositories\Empleados;

use App\Models\Empleado;

class IEmpleadosRepositoryImpl implements IEmpleadosRepository{

    public function getAllEmpleados(){
        return Empleado::where('aceptado','=',true)->paginate(25);
    }

    public function getAllEmpleadosNoAutorizados(){
        return Empleado::where('aceptado','=',false)->paginate(25);
    }

    public function getAllEmpleadosCount(){
        return (Empleado::all())->count();
    }
}