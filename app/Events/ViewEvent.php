<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ViewEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('view');
    }
}
