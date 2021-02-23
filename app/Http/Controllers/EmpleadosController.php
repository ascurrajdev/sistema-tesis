<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EmpleadoService;
use App\Models\{Empleado,Role};
use Validator;

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

    public function edit(Empleado $empleado){
        return view("empleados.edit",[
            "empleado" => $empleado,
            "roles" => Role::all()
        ]);
    }

    public function update(Empleado $empleado,Request $request){
        Validator::make($request->all(),[
            "name" => ["required"],
            "email" => ["required","email","unique:empleados"],
            "telefono" => ["required"],
            "role_id" => ["required","exists:roles,id"]
        ])->validate();
        $empleado->update($request->all());
        return redirect()
                        ->route("admin.empleados.index")
                        ->with([
                            "updated" => "El empleado ha sido actualizado correctamente"
                        ]);
    }
}
