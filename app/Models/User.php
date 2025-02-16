<?php


namespace App\Models;

use App\Core\DbModel;
use App\Core\Application;

class User extends DbModel
{
    public int $id = 0;
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public string $created_at = '';
    public string $status = '';
    public string $block_status = '';
    public int $role_id = 1;


    public function getTableName() : string
    {
        return 'users'; 
    }

    public function getAttributes() : array
    {
        return ['id', 'firstName', 'lastName', 'email', 'password', 'role_id', 'status'];
    }

    public function getPrimaryKey() : string
    {
        return 'id';
    }

    public function rules() : array
    {
        return [
            "firstName" => [$this->validator::RULE_REQUIRED],
            "lastName" => [$this->validator::RULE_REQUIRED],
            "email" => [$this->validator::RULE_REQUIRED, $this->validator::RULE_EMAIL, [$this->validator::RULE_UNIQUE, 'class' => self::class]],
            "password" => [$this->validator::RULE_REQUIRED, [$this->validator::RULE_MIN, 'min' => 6], [$this->validator::RULE_MAX, 'max' => 16]],
            "confirmPassword" => [$this->validator::RULE_REQUIRED, [$this->validator::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function register()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return $this->save();
    }

    public static function findAll(): array
    {
        $sql = "SELECT * FROM " . (new static())->getTableName(); 
        return self::findBySql($sql);
    }

    public function approve(): bool
    {
        $sql = "UPDATE " . $this->getTableName() . " SET status = :status WHERE id = :id";
        return self::execute($sql, ['status' => 'approved', 'id' => $this->id]);
    }

    public function reject(): bool
    {
        $sql = "UPDATE " . $this->getTableName() . " SET status = :status WHERE id = :id";
        return self::execute($sql, ['status' => 'rejected', 'id' => $this->id]);
    }

    public function block(): bool
    {
      
        if ($this->id) {
            $sql = "UPDATE " . $this->getTableName() . " SET status = :status WHERE id = :id";
            $stmt = $this->getDb()->prepare($sql);
            return $stmt->execute(['status' => 'blocked', 'id' => $this->id]);
        }
        return false; 
    }

    public function unblock(): bool
    {
        $query = $this->getDb();
        $sql = "UPDATE " . $this->getTableName() . " SET status = :status WHERE id = :id";
        $stmt = $query->prepare($sql);
        try {
            $stmt->execute(['status' => 'active', 'id' => $this->id]);
            return true;
        } catch (\PDOException $e) {
            echo "error: " . $e->getMessage();
            return false;
        }
    }
}
