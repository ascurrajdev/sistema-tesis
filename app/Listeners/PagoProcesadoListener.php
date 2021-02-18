<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PagoProcesado;
use App\Models\Agendamiento;
use App\Models\HistorialAgendamiento;

class PagoProcesadoListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PagoProcesado $pagoProcesado)
    {   
        $agendamientoId = $pagoProcesado->detallePagoAgendamiento->agendamiento_id;
        HistorialAgendamiento::create([
            'agendamiento_id' => $agendamientoId,
            'descripcion' => 'La reserva ha sido completado satisfactoriamente',
            'fecha_operacion' => date('Y-m-d')
        ]);
        $agendamiento = Agendamiento::findOrFail($agendamientoId);
        $agendamiento->estado_id = 2;
        $agendamiento->save();
    }
}
