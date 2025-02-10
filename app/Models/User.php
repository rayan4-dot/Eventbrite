<?php

namespace App\Models;

use App\Core\DbModel;

class User extends DbModel
{
    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public int $role_id = 2;

    public function getTableName() : string
    {
        return 'users';
    }

    public function getAttributes() : array
    {
        return ['firstName', 'lastName', 'email', 'password', 'role_id'];
    }

    public function primaryKey() : string
    {
        return 'id';
    }

    public function rules() : array
    {
        return [
            "firstName" => [$this->validator::RULE_REQUIRED],
            "lastName" => [$this->validator::RULE_REQUIRED],
            "email" => [$this->validator::RULE_REQUIRED, $this->validator::RULE_EMAIL],
            "password" => [$this->validator::RULE_REQUIRED],
            "confirmPassword" => [$this->validator::RULE_REQUIRED, [$this->validator::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function register()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return $this->save();
    }
}