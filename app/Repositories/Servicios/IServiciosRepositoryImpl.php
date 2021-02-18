<?php
namespace App\Repositories\Servicios;

use App\Models\Servicio;

class IServiciosRepositoryImpl implements IServiciosRepository{
    
    public function getAllServiciosCount(){
        return (Servicio::all())->count();
    }

    public function getAllServiciosPaginate(){
        return Servicio::paginate(15);
    }
}