<?php
namespace App\Http\Responsables\Agendamientos;

use App\Services\AgendamientoService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Responsable;

class AgendamientosIndex implements Responsable{

    private $agendamientoService;

    public function __construct(){
        $this->agendamientoService = resolve(AgendamientoService::class);
    }

    public function toResponse($request){
        return view("agendamientos.index",array(
            "agendamientos" => $this->getAgendamientos($request),
        ));
    }

    private function isUserAdmin($user){
        return $user->whereHas('role',function(Builder $query){
            $query->where('nombre','like','%Administrador%');
        });
    }

    private function getAgendamientos($request){
        if($this->isUserAdmin($request->user())){
            return $this->agendamientoService->getAllWithHistorial();
        }
        return $this->getAgendamientosUser();
    }

    private function getAgendamientosUser($user){
        $user->loadMissing('agendamientos.historial');
        return $user->agendamientos;
    }
    
}