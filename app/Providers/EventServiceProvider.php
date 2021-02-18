<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\AgendamientoCreated;
use App\Listeners\AgendamientoCreatedListener;
use App\Events\DetallePagoCreated;
use App\Listeners\DetallePagoCreatedListener;
use App\Events\DetallePagoUpdate;
use App\Listeners\DetallePagoUpdateListener;
use App\Events\PagoProcesado;
use App\Listeners\PagoProcesadoListener;
use App\Events\PagoCancelado;
use App\Listeners\PagoCanceladoListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AgendamientoCreated::class => [
            AgendamientoCreatedListener::class,
        ],
        DetallePagoCreated::class => [
            DetallePagoCreatedListener::class,
        ],
        DetallePagoUpdate::class => [
            DetallePagoUpdateListener::class,
        ],
        PagoProcesado::class => [
            PagoProcesadoListener::class,
        ],
        PagoCancelado::class => [
            PagoCanceladoListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
