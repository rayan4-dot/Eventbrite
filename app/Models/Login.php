<?php

namespace App\Models;

use App\Core\DbModel;
use App\Core\Application;

class Login extends DbModel
{
    public string $email = '';
    public string $password = '';
    public function getTableName() : string
    {
        return 'users';
    }

    public function getAttributes() : array
    {
        return ['email', 'password'];
    }

    public function rules() : array
    {
        return [
          'email' => [$this->validator::RULE_REQUIRED],
          'password' => [$this->validator::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if(!$user) {
            $this->validator->createErrorMessage('email', 'User not Found');
            return false;
        }

        if(!password_verify($this->password, $user->password)) {
            $this->validator->createErrorMessage('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->login($user);
    }

}