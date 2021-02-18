<?php
namespace App\Http\Responsables;

use Illuminate\Contracts\Support\Responsable;
use App\Services\AgendamientoService;
use App\Services\UserService;
use App\Services\EmpleadoService;
use App\Services\ServiciosService;

class HomeAdminIndex implements Responsable{
    
    protected $agendamientoService,$serviciosService,$usuarioService,$empleadoService;

    public function __construct(){
        $this->agendamientoService = resolve(AgendamientoService::class);        
        $this->usuarioService = resolve(UserService::class);
        $this->empleadoService = resolve(EmpleadoService::class);
        $this->serviciosService = resolve(ServiciosService::class);
    }

    public function toResponse($request){
        return view('dashboards.admin',array(
            "agendamientos" => $this->agendamientoService->getCount(),
            "usuarios" => $this->usuarioService->getCount(),
            "empleados" => $this->empleadoService->getCount(),
            "servicios" => $this->serviciosService->getCount()
        ));
    }

}