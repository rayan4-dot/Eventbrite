<?php

namespace App\Models;

use App\Core\DbModel;

class City extends DbModel
{
    public string $name = '';
    public int $regionId;
    public function getTableName() : string
    {
        // TODO: Implement getTableName() method.
        return 'cities';
    }

    public function getAttributes() : array
    {
        // TODO: Implement getAttributes() method.
        return ['name', 'regionId'];
    }

    public function getPrimaryKey() : string
    {
        // TODO: Implement getPrimaryKey() method.
        return 'id';
    }

    function rules(): array
    {
        // TODO: Implement rules() method.
        return [];
    }


}