<?php

namespace App\Models;

use App\Core\DbModel;

class Category extends DbModel
{
    public string $name = '';
    public string $description = '';
    public function getTableName() : string
    {
      
        return 'categories';
    }

    public function getAttributes() : array
    {
       
        return ['name', 'description'];
    }

    public function rules() : array
    {
        return [
            'name' => [$this->validator::RULE_REQUIRED]
        ];
    }
}