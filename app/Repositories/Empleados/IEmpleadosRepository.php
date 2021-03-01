<?php
namespace App\Repositories\Empleados;

interface IEmpleadosRepository{

    public function getAllEmpleados();
    public function getAllEmpleadosNoAutorizados();
    public function getAllEmpleadosCount();
}