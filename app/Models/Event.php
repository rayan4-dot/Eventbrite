<?php

namespace App\Models;

use App\Core\DbModel;

abstract class Event extends DbModel
{
    public string $title = '';
    public string $picture = '';
    public string $description = '';
    public string $eventDate = '';
    public ?float $price = null;
    public string $type = '';

    public function getTableName() : string
    {
        return 'events';
    }

    public function rules() : array
    {
        return [
            'title' => [$this->validator::RULE_REQUIRED],
            'picture' => [$this->validator::RULE_REQUIRED],
            'description' => [$this->validator::RULE_REQUIRED],
            'eventDate' => [$this->validator::RULE_REQUIRED, $this->validator::RULE_DATE],
            'type' => [$this->validator::RULE_REQUIRED]
        ];
    }


}