<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosFacturacionUser extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'cedula','razon_social','direccion','ciudad','telefono','ruc','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

}
