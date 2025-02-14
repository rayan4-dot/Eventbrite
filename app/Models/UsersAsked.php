<?php

namespace App\Models;

use App\Core\DbModel;

class UsersAsked extends DbModel
{
    public int $id;
    public int $user_id;
    public string $email;
    public string $first_name;
    public string $last_name;
    public string $requested_at;

   
    public function getTableName() : string
    {
        return 'usersasked';  
    }

    public function getAttributes() : array
    {
        return ['user_id', 'email', 'first_name', 'last_name'];
    }

  
    public function rules() : array
    {
        return [
            "email" => [$this->validator::RULE_REQUIRED, $this->validator::RULE_EMAIL],
            "first_name" => [$this->validator::RULE_REQUIRED],
            "last_name" => [$this->validator::RULE_REQUIRED],
        ];
    }
}
