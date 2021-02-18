<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\DetallePagoAgendamiento;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;

class SendNotificationReservaPago extends Notification implements ShouldQueue
{
    use Queueable;
    private $detallePago;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(DetallePagoAgendamiento $detallePago)
    {
        $this->detallePago = $detallePago;
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

    public function toNexmo($notifiable){
        $this->detallePago->load('agendamiento.user');
        return (new NexmoMessage)
                ->content("Un pago se acaba de realizar, el monto es de: {$this->detallePago->monto}, el nro de telefono del usuario es: {$this->detallePago->agendamiento->numero_telefono}, y su nombre es: {$this->detallePago->agendamiento->user->name}");
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
