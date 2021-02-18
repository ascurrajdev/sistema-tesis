<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\DetallePagoCreated;
use App\Events\DetallePagoUpdate;

class DetallePagoAgendamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'agendamiento_id','forma_pago_id','estado_pago_id','monto','transaccion_id'
    ];

    public function agendamiento(){
        return $this->belongsTo('App\Models\Agendamiento');
    }

    protected $dispatchesEvents = [
        'created' => DetallePagoCreated::class,
        'updated' => DetallePagoUpdate::class,
    ];
}
