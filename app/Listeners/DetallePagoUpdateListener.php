<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\DetallePagoUpdate;
use App\Models\HistorialAgendamiento;

class DetallePagoUpdateListener
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
    public function handle(DetallePagoUpdate $detallePagoUpdate)
    {
        $descripcion = 'Pago procesado correctamente';
        if(intval($detallePagoUpdate->detallePagoAgendamiento->estado_pago_id) == 3){
            $descripcion = 'El pago fue cancelado';
        }
        $detallePago = $detallePagoUpdate->detallePagoAgendamiento;
        HistorialAgendamiento::create([
            'agendamiento_id' => $detallePago->agendamiento_id,
            'descripcion' => $descripcion,
            'fecha_operacion' => date('Y-m-d')
        ]);
    }
}
