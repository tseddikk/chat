<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user_id;

    public function __construct($user_id,$message)
    {
        $this->message = $message;
        $this->user_id = $user_id;
    }

    public function broadcastOn()
    {
        return ['livechat-channel'];
    }

    public function broadcastAs()
    {
        return 'livechat-event';
    }
}
