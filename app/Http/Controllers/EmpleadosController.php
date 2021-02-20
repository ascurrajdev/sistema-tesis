<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmpleadoService;

class EmpleadosController extends Controller
{
    private $empleadoService;
    public function __construct(){
        $this->empleadoService = resolve(EmpleadoService::class);
    }
    public function index(){
        return view("empleados.index",[
            "empleados" => $this->empleadoService->getAll()
        ]);
    }
}
