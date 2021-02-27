<?php

namespace App\Notifications;

use App\Models\Empleado;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class SendNotificationEmpleadoNuevoRegistrado extends Notification implements ShouldQueue
{
    use Queueable;
    private $empleado;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Empleado $empleado)
    {
        $this->empleado = $empleado;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                        ->content("Un colaborador se acaba de registrar, se llama {$this->empleado->name} y su telefono es: {$this->empleado->telefono}. Esta esperando la aceptacion para poder usar el sistema");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
