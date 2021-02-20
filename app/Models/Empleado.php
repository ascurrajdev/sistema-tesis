<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Empleado extends Model implements
    AuthorizableContract,
    AuthenticatableContract,
    CanResetPasswordContract
{
    use HasFactory,Notifiable,Authorizable,CanResetPassword,MustVerifyEmail,Authenticatable;

    protected $fillable = [
        'name','email','password','telefono','role_id','avatar'
    ];

    protected $with = [
        'role'
    ];
    public function role(){
        return $this->belongsTo('App\Models\Role');
    }

    public function isAdmin(){
        return $this->role->nombre == "Administrador";
    }

    public function routeNotificationForNexmo($notification){
        return $this->telefono;
    }
}
