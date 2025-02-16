<?php

namespace App\Models;

class F2FEvent extends Event
{
    public ?int $cityId;
    public ?string $location = '';

    public function getAttributes() : array
    {
        // TODO: Implement getAttributes() method.
        return ['title', 'picture', 'categoryId', 'description', 'eventDate', 'price', 'capacity', 'type', 'cityId', 'location'];
    }

    public function rules() : array
    {
        return array_merge(parent::rules(), [
            'cityId' => [$this->validator::RULE_REQUIRED],
            'location' => [$this->validator::RULE_REQUIRED]
        ]);
    }
}