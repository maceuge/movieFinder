<?php

namespace App\Events;

//use GuzzleHttp\Message\Request;
use Illuminate\Http\Request;
use Illuminate\Broadcasting\Channel;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMeMail extends Event
{
    use SerializesModels;

    public $request;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
       // return new PrivateChannel('channel-name');
        return [];
    }
}
