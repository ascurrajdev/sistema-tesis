<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Agendamiento;
use Log;

class RemoverAgendamientoSinConfirmacion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'agendamiento:remover';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remueve los agendamientos que han superado la fecha de confirmacion de pago para la reserva de la casa de retiro';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info('Ejecutando la tarea para remover los agendamientos sin confirmacion');
        $agendamientosExpirados = Agendamiento::whereDate('fecha_maxima_confirmacion',date('Y-m-d'))->where('estado_id','=',1)->get();
        foreach($agendamientosExpirados as $agendamiento){
            $agendamientosExpirados->delete();
        }
    }
}
