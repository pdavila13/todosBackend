<?php

namespace PaoloDavila\TodosBackend\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use PaoloDavila\TodosBackend\GcmToken;
use PaoloDavila\TodosBackend\User;

class GcmTokenCreated extends \Notification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $token;

    /**
     * GcmTokenCreated constructor.
     *
     * @param $user
     * @param $token
     */
    public function __construct(User $user, GcmToken $token)
    {
        $this->user = $user;
        $this->message = $token;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('gcm');
    }
}
