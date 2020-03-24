<?php

namespace Hexters\Ladmin\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Hexters\Ladmin\Models\LadminNotification;

class LadminNotificationEvent implements ShouldBroadcast {

    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $model;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(LadminNotification $model) {
        $this->model = $model;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn() {

        return new Channel('ladmin');
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'notification';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith() {

        return $this->model;
    }
}
