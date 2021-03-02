<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\AgendamientoCreated;

class Agendamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'start','end','motivo','user_id','estado_id','cantidad_personas','numero_telefono','servicio_id','fecha_maxima_confirmacion'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'fecha_maxima_confirmacion' => 'date',
        'start' => 'datetime',
        'end' => 'datetime'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function historial(){
        return $this->hasMany('App\Models\HistorialAgendamiento');
    }

    public function servicio(){
        return $this->belongsTo("App\Models\Servicio");
    }

    protected $dispatchesEvents = [
        'created' => AgendamientoCreated::class,
    ];
}
