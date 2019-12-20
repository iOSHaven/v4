<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class InstallEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('install');
    }
}
