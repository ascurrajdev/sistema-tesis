<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ServiciosCreateOrUpdate;
use App\Models\Servicio;
use App\Models\ImageServicio;
use App\Http\Responsables\Servicios\ServicioIndex;

class ServiciosController extends Controller
{
    
    public function index(){
        return new ServicioIndex();
    }

    public function create(){
        return view('servicios.create');
    }

    public function uploadFiles(Request $request){
        if($request->hasFile('archivo')){
            $path = $request->archivo->store('images','public');
            return response()->json([
                'data' => 'El archivo fue subido con exito',
                'file' => $path,
            ],200);
        }
        return abort(422);
    }

    public function store(ServiciosCreateOrUpdate $request){
        $validated = $request->validated();
        $validated["files"] = explode(",",$validated["files"]);
        $servicio = Servicio::create($validated);
        foreach($validated["files"] as $file){
            ImageServicio::create([
                'file' => $file,
                'servicio_id' => $servicio->id
            ]);
        }
        return redirect()
                        ->route('servicios.index')
                        ->with([
                            'create' => 'El servicio fue create correctamente'
                        ]);
    }
    
    public function edit(Servicio $servicio){
        return view("servicios.edit",["servicio" => $servicio]);
    }

    public function update(Servicio $servicio,ServiciosCreateOrUpdate $request){
        $validated = $request->validated();
        $servicio->update($validated);
        return redirect()
                        ->route('servicios.index')
                        ->with([
                            'update' => 'El servicio ha sido actualizado correctamente'
                        ]);
    }

    public function destroy(Servicio $servicio){
        $servicio->delete();
        return redirect()
                        ->route('servicios.index')
                        ->with([
                            'destroy' => 'El servicio ha sido eliminado correctamente'
                        ]);
    }

    public function indexApi(){
        return Servicio::all(['id','titulo','precio']);
    }
}
