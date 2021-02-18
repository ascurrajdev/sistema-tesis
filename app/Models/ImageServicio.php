<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageServicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'file','servicio_id'
    ];

    public function servicio(){
        return $this->belongsTo('App\Models\Servicio');
    }
}
