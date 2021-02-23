<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AgendamientosUsuariosController extends Controller
{
    public function index(User $user){
        $user->load("agendamientos.historial");
        return view("usuarios.agendamientos.historial",[
            "agendamientos" => $user->agendamientos
        ]);
    }
}
