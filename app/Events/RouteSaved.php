<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RouteSaved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $attributes;

    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $attributes, User $user)
    {
        $this->attributes = $attributes;

        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('core-events');
    }
}