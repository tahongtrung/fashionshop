<?php

namespace App\Listeners;

use App\Events\SomeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Pusher;

class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SomeEvent  $event
     * @return void
     */
    public function handle(SomeEvent $event)
    {
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
    }
}
