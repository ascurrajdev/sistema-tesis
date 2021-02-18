<?php
namespace App\Repositories\Servicios;

interface IServiciosRepository{
    public function getAllServiciosCount();
    public function getAllServiciosPaginate();
}