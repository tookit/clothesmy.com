<?php

namespace App\Events;

use App\Models\Mall\Product;
use App\Models\Mall\PropertyValue;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PropertyValueAttached
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $propertyValue;

    public $proudct;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Product $product, PropertyValue $propertyValue)
    {
        //
        $this->proudct = $product;
        $this->propertyValue = $propertyValue;
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
