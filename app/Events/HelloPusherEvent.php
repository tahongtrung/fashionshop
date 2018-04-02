<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Pusher;

class HelloPusherEvent extends Event
{
    use SerializesModels;

    public $message;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;

        $options = array(
        'cluster' => 'ap1',
        'encrypted' => true
        );
        $pusher = new Pusher(
        '280081bfca7e082907af',
        '4b483933fae76780ff2a',
        '321587',
        $options
        );

        $data['message'] = 'hello world';
        $pusher->trigger('my-channel', 'my-event', $data);
        var_dump('abc');
        //
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['my-channel'];
    }
}
