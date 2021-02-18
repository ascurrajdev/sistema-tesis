<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Agendamiento\{IAgendamientoRepository, IAgendamientoRepositoryImpl};
use App\Repositories\Users\{IUsersRepository, IUsersRepositoryImpl};
use App\Repositories\Empleados\{IEmpleadosRepository, IEmpleadosRepositoryImpl};
use App\Repositories\Servicios\{IServiciosRepository, IServiciosRepositoryImpl};
class ModelsRepositoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register():void
    {
        $this->app->bind(IAgendamientoRepository::class,IAgendamientoRepositoryImpl::class);
        $this->app->bind(IUsersRepository::class, IUsersRepositoryImpl::class);
        $this->app->bind(IEmpleadosRepository::class,IEmpleadosRepositoryImpl::class);
        $this->app->bind(IServiciosRepository::class,IServiciosRepositoryImpl::class);
    }

}
