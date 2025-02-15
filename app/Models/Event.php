<?php

namespace App\Models;

use App\Core\Application;
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
    public int $organiserId;


    public function getTableName() : string
    {
        return 'events';
    }

    public function getPrimaryKey() : string
    {
        // TODO: Implement getPrimaryKey() method.
        return 'id';
    }


    public function rules() : array
    {
        return [
            'title' => [$this->validator::RULE_REQUIRED],
            'picture' => [$this->validator::RULE_REQUIRED],
            'description' => [$this->validator::RULE_REQUIRED],
            'type' => [$this->validator::RULE_REQUIRED],
            'eventDate' => [$this->validator::RULE_REQUIRED, [$this->validator::RULE_DATE, 'minDate' => (new \DateTime())->modify('+7 days')->format('Y-m-d')]],
            'categoryId' => [$this->validator::RULE_REQUIRED],
            'capacity' => [$this->validator::RULE_REQUIRED]
        ];
    }

    public static function getAll() : array
    {
        return self::getAll();
    }

}