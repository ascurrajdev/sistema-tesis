<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\DetallePagoCreated;
use App\Models\HistorialAgendamiento;

class DetallePagoCreatedListener
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
    public function handle(DetallePagoCreated $detallePagoCreated)
    {
        $detallePago = $detallePagoCreated->detallePagoAgendamiento;
        HistorialAgendamiento::create([
            'agendamiento_id' => $detallePago->agendamiento_id,
            'descripcion' => 'Procesando pago de la reserva',
            'fecha_operacion' => date('Y-m-d'),
        ]);
    }
}
