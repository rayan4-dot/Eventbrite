<?php

namespace App\Models;

class F2FEvent extends Event
{
    public string $city;
    public string $location;

    public function getAttributes()
    {
        // TODO: Implement getAttributes() method.
        return ['title', 'picture', 'description', 'eventDate', 'price', 'type', 'city', 'location'];
    }
}