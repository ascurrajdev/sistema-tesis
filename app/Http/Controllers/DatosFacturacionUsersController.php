<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DatosFacturacionUser;
use Auth;
use Validator;
class DatosFacturacionUsersController extends Controller
{
    public function index(){
        return view("usuarios.facturacion.index",[
            "datos" => Auth::user()->datosFacturacion
        ]);
    }

    public function allDatosFacturacionFromUser(Request $request){
        $user = $request->user();
        if($user->datosFacturacion){
            return response()->json([
                'data' => $user->datosFacturacion
            ]);
        }
        return response()->json([
            'error' => 'No tiene datos de facturacion'
        ],404);
    }

    public function store(Request $request){
        Validator::make($request->all(),[
            'cedula' => ['required'],
            'razon_social' => ['required'],
            'ruc' => ['required'],
            'direccion' => ['required'],
            'ciudad' => ['required'],
            'telefono' => ['required']
        ])->validate();
        $user = $request->user();
        $parametros = $request->all();
        $parametros['user_id'] = $user->id;
        $datosFacturacionUser = DatosFacturacionUser::create($parametros);
        if($datosFacturacionUser){
            return response()->json([
                "data" => "Los datos de facturacion se guardaron satisfactoriamente"
            ]);
        }
        return response()->json([
            "error" => "Error al guardar los datos de facturacion"
        ]);
    }

}
