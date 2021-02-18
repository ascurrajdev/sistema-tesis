<?php
namespace App\Repositories\Agendamiento;

use App\Models\Agendamiento;
class IAgendamientoRepositoryImpl implements IAgendamientoRepository{

    public function getAllAgendamientoCount(){
        return (Agendamiento::all())->count();
    }

    public function getAllAgendamientosWithHistorial(){
        return Agendamiento::with('historial')->get();
    }
}