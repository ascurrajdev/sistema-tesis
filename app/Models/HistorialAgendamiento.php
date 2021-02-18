<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialAgendamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'agendamiento_id','descripcion','fecha_operacion'
    ];
}
