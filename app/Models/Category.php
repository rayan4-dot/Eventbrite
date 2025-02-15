<?php

namespace App\Models;

use App\Core\DbModel;

class Category extends DbModel
{
    public string $name = '';
    public string $description = '';
    public function getTableName() : string
    {
        // TODO: Implement getTableName() method.
        return 'categories';
    }

    public function getPrimaryKey()
    {
        // TODO: Implement getPrimaryKey() method.
        return 'id';
    }


    public function getAttributes() : array
    {
        // TODO: Implement getAttributes() method.
        return ['name', 'description'];
    }

    public function rules() : array
    {
        return [
            'name' => [$this->validator::RULE_REQUIRED]
        ];
    }
}