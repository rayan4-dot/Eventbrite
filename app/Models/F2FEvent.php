<?php

namespace App\Models;

class F2FEvent extends Event
{
    public ?int $cityId = null;
    public string $location = '';

    public function getAttributes() : array
    {
        // TODO: Implement getAttributes() method.
        return ['title', 'picture', 'description', 'eventDate', 'price', 'capacity', 'cityId', 'location'];
    }
}