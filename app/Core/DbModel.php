<?php


namespace App\Core;

use App\Core\Application;

abstract class DbModel extends Model
{
    abstract public function getTableName();  
    abstract public function getAttributes();
    abstract public function getPrimaryKey();

    public function save()
    {
        $table = $this->getTableName();  
        $attributes = $this->getAttributes();
        $columns = implode(',', $attributes);
        $placeholders = implode(',', array_fill(0, count($attributes), '?'));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders);";
        $stmt = $this->prepare($sql);
        $values = [];

        foreach($attributes as $attribute) {
            $values[] = $this->{$attribute};
        }
        return $stmt->execute($values); 
    }

    public function delete(int $id): bool
    {
        $table = $this->getTableName();
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = self::prepare($sql);
        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public static function findOne(array $where)
    {
        $tableName = (new static())->getTableName();
        $attributes = array_keys($where);
        $columns = implode(",",(new static())->getAttributes());
        $sql = implode(" AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $stmt = self::prepare("SELECT     $columns  FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $stmt->bindValue(":$key", $item);
        }
        $stmt->execute();
        return $stmt->fetchObject(static::class);
    }

    public function getDb()
    {
        return Application::$app->db;
    }

    public static function prepare($sql)
    {
        return Application::$app->db->conn->prepare($sql);
    }

    public static function findBySql($sql)
    {
        $stmt = self::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}

