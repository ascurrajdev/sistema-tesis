<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\DetallePagoAgendamiento;

class DetallePagoUpdate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $detallePagoAgendamiento;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DetallePagoAgendamiento $detallePagoAgendamiento)
    {
        $this->detallePagoAgendamiento = $detallePagoAgendamiento;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
