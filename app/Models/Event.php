<?php

namespace App\Models;

use App\Core\DbModel;

abstract class Event extends DbModel
{
    public string $title = '';
    public string $picture = '';
    public int $categoryId;
    public string $description = '';
    public string $eventDate = '';
    public string $type = '';
    public string $price = '';
    public int $capacity = 0;


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
            'type' => [$this->validator::RULE_REQUIRED],
            'eventDate' => [$this->validator::RULE_REQUIRED],
            'categoryId' => [$this->validator::RULE_REQUIRED],
            'capacity' => [$this->validator::RULE_REQUIRED]
        ];
    }

}