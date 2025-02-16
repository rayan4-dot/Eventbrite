<?php

namespace App\Models;

class OnlineEvent extends Event
{
    public string $meetLink = '';

    public function getAttributes() : array
    {
        return ['title', 'picture', 'categoryId', 'description', 'eventDate', 'capacity', 'type', 'price', 'meetLink'];
    }

    public function rules(): array
    {
        // TODO: Implement rules() method.
        return array_merge(parent::rules(), ['meetLink' => [$this->validator::RULE_REQUIRED]]);
    }
}