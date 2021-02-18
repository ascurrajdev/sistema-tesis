<?php

namespace App\Policies;

use App\Models\Empleado;
use App\Models\Servicio;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiciosPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(Empleado $empleado){
        return $empleado->isAdmin();
    }

}
