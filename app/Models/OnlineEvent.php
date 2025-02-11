<?php

namespace App\Models;

class OnlineEvent extends Event
{
    public string $meetLink = '';

    public function getAttributes() : array
    {
        return ['title', 'picture', 'description', 'eventDate', 'price', 'type', 'meetLink'];
    }

}