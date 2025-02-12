<?php

namespace App\Models;

use App\Core\DbModel;

abstract class Event extends DbModel
{
    public string $title = '';
    public string $picture = '';
    public string $description = '';
    public string $eventDate = '';
    public string $city = '';
    public ?float $price = null;
    public int $capacity = 0;

    public function getTableName() : string
    {
        return 'events';
    }

    public function rules() : array
    {
        return [
            'title' => [$this->validator::RULE_REQUIRED],
            'description' => [$this->validator::RULE_REQUIRED],
            'eventDate' => [$this->validator::RULE_REQUIRED]
        ];
    }


}