<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\AgendamientoCreated;
use App\Models\HistorialAgendamiento;
use Log;

class AgendamientoCreatedListener
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
    public function handle(AgendamientoCreated $event)
    {
        $historialAgendamiento = HistorialAgendamiento::create(array(
            'agendamiento_id' => $event->agendamiento->id,
            'descripcion' => 'Creacion de la reserva',
            'fecha_operacion' => date('Y-m-d'),
        ));
        Log::info('Se registro una nueva reserva');
    }
}
