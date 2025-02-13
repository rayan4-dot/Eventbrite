<?php

namespace App\Models;

use App\Core\DbModel;

class Region extends DbModel
{
    public string $name = '';
    public function getTableName() : string
    {
        // TODO: Implement getTableName() method.
        return 'regions';
    }

    public function getAttributes() : array
    {
        // TODO: Implement getAttributes() method.
        return ['name'];
    }

    function rules(): array
    {
        // TODO: Implement rules() method.
        return [];
    }


}